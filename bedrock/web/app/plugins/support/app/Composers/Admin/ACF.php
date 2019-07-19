<?php

namespace TinyPixel\Support\Composers\Admin;

use \WP_Post;
use \Illuminate\Support\Arr;
use \Illuminate\Support\Collection;
use \Illuminate\Support\Facades\Cache;
use \Illuminate\Support\Facades\Schema;

use function \collect;
use function \add_action;
use function \get_the_ID;
use function \get_post;
use function \get_fields;
use function \get_field_objects;

trait ACF
{
    /**
     * Returns raw output of custom fields
     *
     * @return \Illuminate\Support\Collection
     */
    public function raw()
    {
        return $this->getCustomFieldsData($this->getRequest());
    }

    /**
     * Returns nicely formatted custom fields data
     *
     * @param string subset
     * @return object $fields
     */
    public function fields($fieldSubset = null)
    {
        $fieldData = $this->getCustomFieldsData(
          $this->getRequest()
        );

        if (!isset($fieldSubset)) {
          $fields = $fieldData;
        } else {
          $fields = collect($fieldData->get($fieldSubset));
        }

        return (object) collect($fields)->toArray();
    }

    /**
     * Returns either the post's Id, as specified
     * in the view composer, or the result of
     * \get_the_ID, were none provided
     *
     * @return \WP_Post
     */
    public function getRequest()
    {
        return $this->postId ?: \get_the_ID();
    }

    /**
     * Sets up the view composer with ACF data
     *
     * @param int post id
     * @return \Illuminate\Support\Collection
     */
    public function getCustomFieldsData(int $postId)
    {
        $post = $this->getPostObject($postId);

        return $this->collectCustomFieldsFromCache(
            $post,
            $this->getCustomFieldCache($post)
        );
    }

    /**
     * Setup post
     *
     * @param int id
     * @return \WP_Post
     */
    public function getPostObject($postId)
    {
        return $postId ?
            \get_post($postId) :
            \get_post(\get_the_ID());
    }

    /**
     * Collects Advanced Custom Fields data from cache
     *
     * @param \WP_Post $request
     * @param object $cacheSettings
     * @return \Illuminate\Support\Collection
     */
    public function collectCustomFieldsFromCache(\WP_Post $request, object $cacheSettings)
    {
        /**
         * Stash new results away if old ones are past their expiry
         */
        Cache::tags($cacheSettings->tags)->put([
            $cacheSettings->id => $this->collectAllFields($request),
        ], $cacheSettings->expiry);

        /**
         * Return results of query from cache
         */
        return Cache::tags($cacheSettings->tags)->get($cacheSettings->id);
    }

    /**
     * Collects fields
     *
     * @param \WP_Post $post
     * @return \Illuminate\Support\Collection
     */
    public function collectAllFields(\WP_Post $post)
    {
        return \collect(\get_fields($post->ID));
    }

    /**
     * Setup cache
     *
     * @param \WP_Post $post
     * @return object self
     */
    public function getCustomFieldCache(\WP_Post $post)
    {
        return (object) [
            'id'     => $this->cacheId($post),
            'expiry' => $this->cacheExpiry(),
            'tags'   => $this->cacheTags($post),
        ];
    }

    /**
     * Returns cache id
     *
     * @return string
     */
    public function cacheId(\WP_Post $post)
    {
        return "acf-field-data-{$post->post_type}-{$post->post_name}";
    }

    /**
     * Returns cache expiry
     *
     * @return int
     */
    public function cacheExpiry()
    {
        return isset($this->cacheExpiry) ? $this->cacheExpiry : 0;
    }

    /**
     * Returns cache tag
     *
     * @return string
     */
    public function cacheTags(\WP_Post $post)
    {
        return ["acf-field-data-{$post->post_type}"];
    }

    /**
     * Setup cache database schema if none exists
     */
    public function setupCache()
    {
        if (!Schema::exists('acorn')) {
            Schema::create('acorn', function ($table) {
                $table->string('key')->unique();
                $table->text('value');
                $table->int('expiration');
            });
        }
    }

    /**
     * WordPress action
     * Invalidates cache when a post is published
     */
    public function invalidateCache()
    {
        \add_action('transition_post_status', [
            $this, 'onStatusTransition'
        ], 10, 3);
    }

    /**
     * Invalidates cache when a post changes transition
     *
     * @param string $new_status
     * @param string $old_status
     * @param \WP_Post $post
     * @return void
     */
    public function onPostStatusTransition($new_status, $old_status, $post)
    {
        Cache::tags($this->cacheTags($post))->flush();
    }
}

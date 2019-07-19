<?php
namespace TinyPixel\Support;

use function \admin_url;
use function \is_plugin_active;
use function \deactivate_plugins;
use function \wp_die;
use function \__;

class BootError
{
    /**
     * Deactivates plugin and displays errors
     * @param array $error
     */
    public static function throw($error = null)
    {
        /**
         * The error handler can frequently run too late
         * in WordPress' lifecycle to have access to
         * \deactivate_plugins so we just manually include its
         * source file.
         *
         * @see https://developer.wordpress.org/reference/files/wp-admin/includes/plugin.php/
         */
        if (!function_exists('deactivate_plugins')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }

        // if plugin is activated, deactivate it
        is_plugin_active('tiny-pixel-support') && deactivate_plugins('tiny-pixel-support');

        // if error is an array then cast it as an object
        if (!is_null($error)) {
            $error = is_array($error) ? (object) $error : $error;
        }

        /**
         * Provide fallback values for error message components
         * not specified in the call
         */
        $message = (object) [
            'title'    => isset($error->title)    ? $error->title    : self::defaultTitle(),
            'subtitle' => isset($error->subtitle) ? $error->subtitle : self::defaultSubtitle(),
            'body'     => isset($error->body)     ? $error->body     : self::defaultBody(),
            'footer'   => isset($error->footer)   ? $error->footer   : self::defaultFooter(),
            'link'     => isset($error->link)     ? $error->link     : self::defaultLink(),
        ];

        // prepare the liturgy
        $dirge = sprintf(
            "<h1>%s<br><small>%s</small></h1><p>%s</p><p>%s</p>",
            $message->title,
            $message->subtitle,
            $message->body,
            $message->footer
        );

        // bear the bad news
        wp_die($dirge, $message->title, $message->subtitle);
    }

    /**
     * Returns default error message title
     * @return i18n formatted string
     */
    public static function defaultTitle()
    {
        return __(
            'Tiny Pixel Site Support Plugin Runtime Error',
            'tiny-pixel-support'
        );
    }

    /**
     * Returns default error message subtitle
     * @return i18n formatted string
     */
    public static function defaultSubtitle()
    {
        return __(
            'There is a problem with the Roots Share Plugin',
            'tiny-pixel-support'
        );
    }
    /**
     * Returns default error message body
     * @return i18n formatted string
     */
    public static function defaultBody()
    {
        return __(
            'The Tiny Pixel Site Support plugin could not boot.',
            'tiny-pixel-support'
        );
    }

    /**
     * Returns default error message footer
     * @return i18n formatted string
     */
    public static function defaultFooter()
    {
        return __(
            'The Tiny Pixel Site Support plugin has been deactivated.',
            'tiny-pixel-support'
        );
    }

    /**
     * Returns default error message link
     * @return array link
     */
    public static function defaultLink()
    {
        return [
            'link_text' => __(
                'Plugin Administration ⌫',
                'tiny-pixel-support'
            ),

            'link_url'  => admin_url('plugins.php'),
        ];
    }
}

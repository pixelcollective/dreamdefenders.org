<?php

class BedrockTinkerwellDriver extends TinkerwellDriver
{
    public function canBootstrap($projectPath)
    {
        return "{$projectPath}/web/index.php";
    }

    public function bootstrap($projectPath)
    {
        require "{$projectPath}/vendor/autoload.php";
        require "{$projectPath}/config/application.php";
        require ABSPATH . '/wp-settings.php';
    }

    public function getAvailableVariables()
    {
        return [
            '__options' => wp_load_alloptions(),
            '__posts' => (new \WP_Query(['posts_per_page' => -1]))->get_posts(),
            '__sage' => function ($service = null) {
                return \Roots\app($service);
            },
        ];
    }
}

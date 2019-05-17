<?php

namespace App\Providers;

use Storage;

use Roots\Acorn\ServiceProvider;

use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;

class DigitalOceanServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        Storage::extend('spaces', function ($app, $config) {
            $client = new S3Client([
                'credentials' => [
                    'key'    => $config['key'],
                    'secret' => $config['secret'],
                ],
                'region'   => $config['region'],
                'version'  => $config['version'],
                'endpoint' => $config['region'],
            ]);

            return new Filesystem(
                new AwsS3Adapter($client),
                $config['bucket']
            );
        });
    }
}

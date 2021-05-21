<?php return array (
  'providers' => 
  array (
    0 => 'Illuminate\\Bus\\BusServiceProvider',
    1 => 'Illuminate\\Cache\\CacheServiceProvider',
    2 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
    3 => 'Illuminate\\View\\ViewServiceProvider',
    4 => 'Log1x\\Navi\\NaviServiceProvider',
    5 => 'Log1x\\SageSvg\\SageSvgServiceProvider',
    6 => 'Carbon\\Laravel\\ServiceProvider',
    7 => 'App\\Providers\\ThemeServiceProvider',
  ),
  'eager' => 
  array (
    0 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
    1 => 'Illuminate\\View\\ViewServiceProvider',
    2 => 'Log1x\\Navi\\NaviServiceProvider',
    3 => 'Log1x\\SageSvg\\SageSvgServiceProvider',
    4 => 'Carbon\\Laravel\\ServiceProvider',
    5 => 'App\\Providers\\ThemeServiceProvider',
  ),
  'deferred' => 
  array (
    'Illuminate\\Bus\\Dispatcher' => 'Illuminate\\Bus\\BusServiceProvider',
    'Illuminate\\Contracts\\Bus\\Dispatcher' => 'Illuminate\\Bus\\BusServiceProvider',
    'Illuminate\\Contracts\\Bus\\QueueingDispatcher' => 'Illuminate\\Bus\\BusServiceProvider',
    'Illuminate\\Bus\\BatchRepository' => 'Illuminate\\Bus\\BusServiceProvider',
    'cache' => 'Illuminate\\Cache\\CacheServiceProvider',
    'cache.store' => 'Illuminate\\Cache\\CacheServiceProvider',
    'cache.psr6' => 'Illuminate\\Cache\\CacheServiceProvider',
    'memcached.connector' => 'Illuminate\\Cache\\CacheServiceProvider',
    'Illuminate\\Cache\\RateLimiter' => 'Illuminate\\Cache\\CacheServiceProvider',
  ),
  'when' => 
  array (
    'Illuminate\\Bus\\BusServiceProvider' => 
    array (
    ),
    'Illuminate\\Cache\\CacheServiceProvider' => 
    array (
    ),
  ),
);
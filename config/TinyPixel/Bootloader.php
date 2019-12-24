<?php
namespace TinyPixel\Config;

use Dotenv\Dotenv;
use TinyPixel\Config\Sentry;
use Roots\WPConfig\Config;

/**
 * Application envvar loader
 */
class Bootloader
{
    /**
     * Bedrock Config tool
     * @var \Roots\WPConfig\Config
     */
    public static $rootsConfig;

    /**
     * Bedrock root dir
     * @var string
     */
    public $bedrockDir;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        self::$rootsConfig = Config::class;
    }

    /**
     * Initialize boot.
     * 
     * @var    string Bedrock root directory
     * @return void
     */
    public function init(string $bedrockDir) : void
    {
        $this->bedrockDir = $bedrockDir;
    }

    /**
     * Load environmental variables
     * 
     * @var array required environmental variables
     * 
     * @return void
     */
    public function loadEnv(array $required = ['WP_HOME', 'WP_SITEURL']) : void
    {
        $this->env = Dotenv::create($this->bedrockDir);
        $this->env->load();
        $this->env->required($required);
    }

    /**
     * Define filesystem
     * 
     * @var    array filesystem
     * @return void
     */
    public function defineFS(array $fs) : void
    {
        $this->defineSet($fs);

        $this->defineSet([
            'WP_CONTENT_DIR' => "{$this->bedrockDir}/web/{$fs['CONTENT_DIR']}",
            'WP_CONTENT_URL' => "{$fs['WP_HOME']}/{$fs['CONTENT_DIR']}",
        ]);
    }

    /**
     * Define database
     * 
     * @var    array $db
     * @return void
     */
    public function defineDB(array $db) : void
    {
        $this->defineSet($db);
    }

    /**
     * Define S3
     * 
     * @var    array s3 configuration
     * @return void
     */
    public function defineS3(array $s3) : void
    {
        $this->defineSet($s3);
    }

    /**
     * Define stages
     * 
     * @var    array
     * @return void
     */
    public function defineEnvironments(array $envs) : void
    {
        self::define('ENVIRONMENTS', $envs);
    }

    /**
     * Configure WordPress application
     * 
     * @var    array wordpress configuration
     * @return void
     */
    public function configureWordPressApp(array $configuration) : void
    {
        self::defineSet($configuration);

        ini_set('display_errors', self::get('DISPLAY_ERRORS'));
    }

    /**
     * Define Redis
     * 
     * @var    array Redis connection
     * @return void
     */
    public function defineRedis(array $redis) : void
    {
        global $redis_server;

        $redis_server = [
            'host' => $redis['REDIS_HOST'], 
            'port' => $redis['REDIS_PORT'], 
            'auth' => $redis['REDIS_AUTH'], 
            'ssl' => [
                'local_cert'   => $redis['PREDIS_CERT'], 
                'verify_peers' => $redis['PREDIS_VERIFY_PEERS'],
            ],
        ];
    }

    /**
     * Configure Redis
     * 
     * @var    array Redis configuration
     * @return void
     */
    public function configureRedis(array $redis) : void
    {
        $this->defineSet($redis);
    }

    /**
     * Define salts
     * 
     * @var    array salts
     * @return void
     */
    public function defineSalts(array $salt) : void
    {
        $this->defineSet($salt);
    }

    /**
     * Allow WordPress to detect HTTPS when used behind a reverse proxy or a load balancer
     * @see https://codex.wordpress.org/Function_Reference/is_ssl#Notes
     * 
     * @return void
     */
    public function exposeSSL() : void
    {
        if (self::isSSL()) {
            $_SERVER['HTTPS'] = 'on';
        }
    }

    /**
     * Override envs
     * 
     * @param  string current environment
     * @return void
     */
    public function overrideEnv(string $currentEnv) : void
    {
        $this->{$currentEnv}();
    }

    /**
     * Dev specific configuration
     * 
     * @return void
     */
    public function development()
    {
        self::define('SAVEQUERIES',        true);
        self::define('WP_DEBUG',           true);
        self::define('WP_DEBUG_DISPLAY',   true);
        self::define('SCRIPT_DEBUG',       true);
        self::define('DISALLOW_FILE_MODS', false);

        ini_set('display_errors', 1);
    }

    /**
     * Staging specific configuration
     * 
     * @return void
     */
    public function staging() : void
    {
        // --
    }

    /**
     * Production specific configuration
     * 
     * @return void
     */
    public function production() : void
    {
        // --
    }

    /**
     * Boot WordPress
     * 
     * @return void
     */
    public function boot() : void
    {
        self::$rootsConfig::apply();

        if (!defined('ABSPATH')) {
            define('ABSPATH', "{$this->bedrockDir}/web/wp");
        }
    }

    /**
     * Get from Roots config
     * 
     * @return mixed
     */
    public static function get($get)
    {
        return self::$rootsConfig::get($get);
    }

    /**
     * Define for Roots Config
     * 
     * @var    string  constant
     * @var    mixed   value
     * @return void
     */
    public static function define(string $const, $value) : void
    {
        self::$rootsConfig::define($const, $value);
    }

    /**
     * Define set of config items
     * 
     * @var   array definitions
     * 
     * @return void
     */
    public function defineSet($definitions) : void
    {
        forEach($definitions as $const => $def) {
            self::define($const, $def);
        }
    }

    public static function isSSL()
    {
        return isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && 
            $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https';
    }
}

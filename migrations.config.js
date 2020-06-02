module.exports = {
  environments: {
    development: {
      ssl: false,
      host: 'dreamdefenders.vagrant',
      path: '/srv/www/dreamdefenders.org/current/web/app'
    },
    staging: {
      ssl: true,
      host: 'staging.dreamdefenders.org',
      user: 'web',
      path: '/srv/www/dreamdefenders.org/current/web/app',
    },
    production: {
      ssl: true,
      host: 'dreamdefenders.org',
      user: 'web',
      path: '/srv/www/dreamdefenders.org/current/web/app',
    },
  },
  syncDirs: [],
}

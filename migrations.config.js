module.exports = {
  development: [
    {
      search: 'build.dreamdefenders.tinypixel.dev',
      replace: 'dreamdefenders.vagrant',
    },
    {
      search: 'https://dreamdefenders.vagrant',
      replace: 'http://dreamdefenders.vagrant',
    },
  ],
  staging: [
    {
      search: 'dreamdefenders.vagrant',
      replace: 'build.dreamdefenders.tinypixel.dev',
    },
    {
      search: 'http://build.dreamdefenders.tinypixel.dev',
      replace: 'https://build.dreamdefenders.tinypixel.dev',
    },
  ],
  production: [
    {
      search: '',
      replace: '',
    },
  ],
}

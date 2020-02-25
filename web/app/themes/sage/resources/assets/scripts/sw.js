import caches from './components/caches';

self.oninstall = event => {
  event.waitUntil(
    caches.open('dream-defenders').then(cache => {
      return cache.addAll([
        '/themes/sage/dist/scripts/compiled.js',
        '/themes/sage/dist/styles/compiled.css',
        '/themes/sage/dist/images/icons-192.png',
        '/themes/sage/dist/images/icons-512.png',
      ])
    })
  )
}

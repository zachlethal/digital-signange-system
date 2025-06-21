var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    '/offline',
    '/css/app.css',
    '/js/app.js',
    "/storage/01JSHYPMGRX6QY4YTNST458JN3.png",
    "/storage/01JSHYPMGWD5YKW354CMVP2M1G.png",
    "/storage/01JSHYPMH2QVHHMWZT8BDDWBSZ.png",
    "/storage/01JSHYPMH60Y0RYA1ZY9CJFZXZ.png",
    "/storage/01JSHYPMHA1F5PMJBCZAT9BYF2.png",
    "/storage/01JSHYPMHG9E2T4RACC4J2EAZ4.png",
    "/storage/01JSHYPMHNK4CWE9EE6WZ7YEJR.png",
    "/storage/01JSHYPMHVRFKMPBZD2JXMAMJH.png"
];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});

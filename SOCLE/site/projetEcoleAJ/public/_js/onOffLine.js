document.addEventListener("DOMContentLoaded", function() {
    window.addEventListener('online', loadOnlineResources);
    window.addEventListener('offline', loadOfflineResources);

    function loadOnlineResources() {
        loadCSS('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css', 'online-bootstrap-css');
        loadScript('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js', 'online-bootstrap-js');
    }

    function loadOfflineResources() {
        loadCSS('/_css/bootstrap.min.css', 'offline-bootstrap-css');
        loadScript('/_js/bootstrap.bundle.min.js', 'offline-bootstrap-js');
    }

    function loadCSS(href, id) {
        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.type = 'text/css';
        link.href = href;
        link.id = id;
        document.head.appendChild(link);
    }

    function loadScript(src, id) {
        const script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = src;
        script.id = id;
        document.head.appendChild(script);
    }

    // Initial check
    if (navigator.onLine) {
        loadOnlineResources();
    } else {
        loadOfflineResources();
    }
});
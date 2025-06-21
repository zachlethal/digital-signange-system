<!DOCTYPE html>
<html>
<head>
    <title>TV - {{ $screen->name }}</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            background: black;
            color: white;
        }
        .media {
            width: 100vw;
            height: 100vh;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div id="player"></div>

    <script>
        const mediaList = @json($screenControls->pluck('media')->filter()->values());
        let index = 0;

        function showMedia() {
            if (!mediaList.length) {
                document.getElementById('player').innerHTML = '<h1>No Media</h1>';
                return;
            }

            const media = mediaList[index];
            const container = document.getElementById('player');

            if (media.file_path.endsWith('.mp4')) {
                container.innerHTML = `
                    <video class="media" autoplay controls muted onended="nextMedia()">
                        <source src="/storage/${media.file_path}" type="video/mp4">
                    </video>
                `;
            } else {
                container.innerHTML = `
                    <img class="media" src="/storage/${media.file_path}" />
                `;
                setTimeout(nextMedia, media.duration || 5000);
            }
        }

        function nextMedia() {
            index = (index + 1) % mediaList.length;
            showMedia();
        }

        showMedia();
    </script>
</body>
</html>

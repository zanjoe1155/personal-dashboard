<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Personal Dashboard</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* =========================
           LIGHT THEME
        ========================= */

        :root {
            --bg: #f4f6f8;
            --card: #ffffff;
            --text: #222222;
            --secondary: #555555;
            --header: #1f2937;
            --link: #2563eb;
            --border: #dddddd;
            --shadow: rgba(0, 0, 0, 0.08);
            --button-bg: #ffffff;
            --button-text: #222222;
        }

        /* =========================
           DARK THEME
        ========================= */

        body.dark {
            --bg: #111827;
            --card: #1f2937;
            --text: #f9fafb;
            --secondary: #d1d5db;
            --header: #0f172a;
            --link: #60a5fa;
            --border: #374151;
            --shadow: rgba(0, 0, 0, 0.35);
            --button-bg: #374151;
            --button-text: #ffffff;
        }

        body {
            background: var(--bg);
            color: var(--text);

            transition:
                background 0.3s ease,
                color 0.3s ease;
        }

        /* =========================
           HEADER
        ========================= */

        .header {
            background: var(--header);
            color: white;

            padding: 20px 30px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            position: sticky;
            top: 0;

            z-index: 100;
        }

        .header h1 {
            font-size: 26px;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .welcome {
            font-size: 16px;
        }

        /* =========================
           THEME BUTTON
        ========================= */

        .theme-button {
            border: none;

            background: var(--button-bg);
            color: var(--button-text);

            padding: 10px 15px;

            border-radius: 8px;

            cursor: pointer;

            font-size: 14px;
            font-weight: bold;

            transition: 0.2s;
        }

        .theme-button:hover {
            transform: scale(1.03);
            opacity: 0.9;
        }

        /* =========================
           CONTAINER
        ========================= */

        .container {
            padding: 30px;

            max-width: 1400px;

            margin: auto;
        }

        /* =========================
           GRID
        ========================= */

        .grid {
            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 20px;
        }

        /* =========================
           WIDGET
        ========================= */

        .widget {
            background: var(--card);

            color: var(--text);

            padding: 25px;

            border-radius: 15px;

            box-shadow:
                0 4px 12px var(--shadow);

            min-height: 190px;

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                background 0.3s ease,
                color 0.3s ease;
        }

        .widget:hover {
            transform: translateY(-3px);

            box-shadow:
                0 8px 20px var(--shadow);
        }

        .widget h2 {
            font-size: 25px;

            margin-bottom: 18px;
        }

        .widget p {
            margin: 8px 0;

            font-size: 17px;
        }

        /* =========================
           CLOCK
        ========================= */

        .clock {
            font-size: 48px;

            font-weight: bold;

            margin-top: 15px;
        }

        .date {
            font-size: 18px;

            margin-top: 5px;

            color: var(--secondary);
        }

        /* =========================
           WEATHER
        ========================= */

        .weather-temperature {
            font-size: 38px;

            font-weight: bold;

            margin: 10px 0;
        }

        .weather-status {
            font-size: 18px;
        }

        .weather-location {
            color: var(--secondary);

            font-size: 16px;
        }

        /* =========================
           QUICK LINKS
        ========================= */

        .links a {
            display: block;

            margin: 12px 0;

            text-decoration: none;

            color: var(--link);

            font-size: 18px;

            transition: 0.2s;
        }

        .links a:hover {
            text-decoration: underline;
        }

        /* =========================
           NEWS / RSS
        ========================= */

        .news-container {
            max-height: 300px;

            overflow-y: auto;
        }

        .news-item {
            padding: 12px 0;

            border-bottom:
                1px solid var(--border);
        }

        .news-item:last-child {
            border-bottom: none;
        }

        .news-title {
            display: block;

            color: var(--link);

            text-decoration: none;

            font-size: 16px;

            line-height: 1.4;

            margin-bottom: 5px;
        }

        .news-title:hover {
            text-decoration: underline;
        }

        .news-date {
            font-size: 13px;

            color: var(--secondary);
        }

        .news-loading {
            color: var(--secondary);

            font-size: 16px;
        }

        .news-error {
            color: #dc2626;

            font-size: 15px;
        }

        /* =========================
           STATISTICS
        ========================= */

        .stat {
            display: flex;

            justify-content: space-between;

            padding: 10px 0;

            border-bottom:
                1px solid var(--border);
        }

        .stat:last-child {
            border-bottom: none;
        }

        .stat-value {
            font-weight: bold;
        }

        /* =========================
           SYSTEM STATUS
        ========================= */

        .online {
            color: #16a34a;

            font-weight: bold;

            font-size: 20px;
        }

        .status-dot {
            display: inline-block;

            width: 10px;
            height: 10px;

            background: #16a34a;

            border-radius: 50%;

            margin-right: 7px;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            text-align: center;

            padding: 25px;

            color: var(--secondary);

            font-size: 14px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 800px) {

            .grid {
                grid-template-columns: 1fr;
            }

            .header {
                flex-direction: column;

                gap: 15px;

                text-align: center;
            }

            .header-right {
                flex-direction: column;

                gap: 10px;
            }

            .clock {
                font-size: 38px;
            }
        }
    </style>
</head>


<body>

    <!-- =========================
         HEADER
    ========================== -->

    <header class="header">

        <h1>
            Personal Dashboard
        </h1>

        <div class="header-right">

            <button
                id="themeToggle"
                class="theme-button">

                🌙 Dark Mode

            </button>

            <div class="welcome">
                Welcome, Zanjoe!
            </div>

        </div>

    </header>


    <!-- =========================
         MAIN DASHBOARD
    ========================== -->

    <main class="container">

        <div class="grid">


            <!-- =========================
                 DIGITAL CLOCK
            ========================== -->

            <div class="widget">

                <h2>
                    🕐 Digital Clock
                </h2>

                <div
                    id="clock"
                    class="clock">

                    00:00:00

                </div>

                <div
                    id="date"
                    class="date">

                    Loading date...

                </div>

            </div>


            <!-- =========================
                 WEATHER
            ========================== -->

            <div class="widget">

                <h2>
                    🌤️ Weather
                </h2>

                <div
                    id="weatherLocation"
                    class="weather-location">

                    Loading location...

                </div>

                <div
                    id="temperature"
                    class="weather-temperature">

                    -- °C

                </div>

                <p>

                    Weather:

                    <strong id="weatherStatus">
                        Loading...
                    </strong>

                </p>

                <p>

                    Wind:

                    <strong id="windSpeed">
                        --
                    </strong>

                    km/h

                </p>

            </div>


            <!-- =========================
                 QUICK LINKS
            ========================== -->

            <div class="widget links">

                <h2>
                    🔗 Quick Links
                </h2>

                <a
                    href="https://www.google.com"
                    target="_blank">

                    🔎 Google

                </a>

                <a
                    href="https://github.com"
                    target="_blank">

                    💻 GitHub

                </a>

                <a
                    href="https://www.youtube.com"
                    target="_blank">

                    ▶️ YouTube

                </a>

                <a
                    href="https://www.facebook.com"
                    target="_blank">

                    📘 Facebook

                </a>

            </div>


            <!-- =========================
                 NEWS / RSS
            ========================== -->

            <div class="widget">

                <h2>
                    📰 News / RSS
                </h2>

                <div
                    id="newsContainer"
                    class="news-container">

                    <p class="news-loading">

                        Loading latest news...

                    </p>

                </div>

            </div>


            <!-- =========================
                 STATISTICS
            ========================== -->

            <div class="widget">

                <h2>
                    📊 Statistics
                </h2>

                <div class="stat">

                    <span>
                        Widgets
                    </span>

                    <span
                        class="stat-value">

                        6

                    </span>

                </div>

                <div class="stat">

                    <span>
                        Quick Links
                    </span>

                    <span
                        class="stat-value">

                        4

                    </span>

                </div>

                <div class="stat">

                    <span>
                        Data Sources
                    </span>

                    <span
                        class="stat-value">

                        2

                    </span>

                </div>

                <div class="stat">

                    <span>
                        System
                    </span>

                    <span
                        class="stat-value">

                        Online

                    </span>

                </div>

            </div>


            <!-- =========================
                 SYSTEM STATUS
            ========================== -->

            <div class="widget">

                <h2>
                    ⚡ System Status
                </h2>

                <p class="online">

                    <span class="status-dot"></span>

                    Online

                </p>

                <p>

                    Server:

                    <strong>
                        Laravel
                    </strong>

                </p>

                <p>

                    PHP:

                    <strong>
                        8.5
                    </strong>

                </p>

                <p>

                    Database:

                    <strong>
                        SQLite
                    </strong>

                </p>

                <p>

                    Uptime:

                    <strong id="uptime">
                        Active
                    </strong>

                </p>

            </div>


        </div>

    </main>


    <!-- =========================
         FOOTER
    ========================== -->

    <footer class="footer">

        Personal Dashboard
        © 2026

    </footer>


    <!-- =========================
         JAVASCRIPT
    ========================== -->

    <script>

        /* =====================================================
           DIGITAL CLOCK
        ===================================================== */

        function updateClock() {

            const now = new Date();

            const time =
                now.toLocaleTimeString();

            const date =
                now.toLocaleDateString(
                    'en-US',
                    {
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    }
                );

            document.getElementById(
                "clock"
            ).textContent = time;

            document.getElementById(
                "date"
            ).textContent = date;

        }


        updateClock();

        setInterval(
            updateClock,
            1000
        );


        /* =====================================================
           WEATHER
        ===================================================== */

        async function getWeather() {

            try {

                const latitude =
                    13.6218;

                const longitude =
                    123.1948;


                const url =
                    `https://api.open-meteo.com/v1/forecast?latitude=${latitude}&longitude=${longitude}&current=temperature_2m,weather_code,wind_speed_10m`;


                const response =
                    await fetch(url);


                if (!response.ok) {

                    throw new Error(
                        "Weather request failed"
                    );

                }


                const data =
                    await response.json();


                const weather =
                    data.current;


                document.getElementById(
                    "weatherLocation"
                ).textContent =
                    "Naga City, Philippines";


                document.getElementById(
                    "temperature"
                ).textContent =
                    weather.temperature_2m + " °C";


                document.getElementById(
                    "windSpeed"
                ).textContent =
                    weather.wind_speed_10m;


                document.getElementById(
                    "weatherStatus"
                ).textContent =
                    getWeatherDescription(
                        weather.weather_code
                    );

            }

            catch (error) {

                console.error(error);

                document.getElementById(
                    "weatherLocation"
                ).textContent =
                    "Weather unavailable";

                document.getElementById(
                    "temperature"
                ).textContent =
                    "-- °C";

                document.getElementById(
                    "weatherStatus"
                ).textContent =
                    "Unable to load weather";

            }

        }


        /* =====================================================
           WEATHER DESCRIPTION
        ===================================================== */

        function getWeatherDescription(code) {

            if (code === 0) {
                return "Clear sky";
            }

            if (
                code >= 1 &&
                code <= 3
            ) {
                return "Partly cloudy";
            }

            if (
                code >= 45 &&
                code <= 48
            ) {
                return "Fog";
            }

            if (
                code >= 51 &&
                code <= 67
            ) {
                return "Rain";
            }

            if (
                code >= 71 &&
                code <= 77
            ) {
                return "Snow";
            }

            if (
                code >= 80 &&
                code <= 82
            ) {
                return "Rain showers";
            }

            if (code >= 95) {
                return "Thunderstorm";
            }

            return "Unknown";

        }


        /* =====================================================
           RSS / NEWS
        ===================================================== */

        async function loadNews() {

            const newsContainer =
                document.getElementById(
                    "newsContainer"
                );


            const rssUrl =
                "https://news.google.com/rss?hl=en-US&gl=US&ceid=US:en";


            const apiUrl =
                "https://api.rss2json.com/v1/api.json?rss_url="
                + encodeURIComponent(rssUrl);


            try {

                const response =
                    await fetch(apiUrl);


                if (!response.ok) {

                    throw new Error(
                        "News request failed"
                    );

                }


                const data =
                    await response.json();


                if (
                    !data.items ||
                    data.items.length === 0
                ) {

                    throw new Error(
                        "No news available"
                    );

                }


                newsContainer.innerHTML = "";


                const articles =
                    data.items.slice(0, 6);


                articles.forEach(
                    function(article) {

                        const item =
                            document.createElement(
                                "div"
                            );

                        item.className =
                            "news-item";


                        const link =
                            document.createElement(
                                "a"
                            );

                        link.className =
                            "news-title";

                        link.href =
                            article.link;

                        link.target =
                            "_blank";

                        link.rel =
                            "noopener noreferrer";

                        link.textContent =
                            article.title;


                        const date =
                            document.createElement(
                                "div"
                            );

                        date.className =
                            "news-date";

                        date.textContent =
                            formatNewsDate(
                                article.pubDate
                            );


                        item.appendChild(
                            link
                        );

                        item.appendChild(
                            date
                        );


                        newsContainer.appendChild(
                            item
                        );

                    }
                );

            }

            catch (error) {

                console.error(
                    "RSS Error:",
                    error
                );


                newsContainer.innerHTML = `

                    <p class="news-error">
                        Unable to load news right now.
                    </p>

                    <p style="color:var(--secondary); margin-top:8px;">
                        Please check your internet connection.
                    </p>

                `;

            }

        }


        /* =====================================================
           FORMAT NEWS DATE
        ===================================================== */

        function formatNewsDate(dateString) {

            if (!dateString) {
                return "";
            }


            const date =
                new Date(dateString);


            if (
                isNaN(
                    date.getTime()
                )
            ) {

                return "";

            }


            return date.toLocaleString(
                'en-US',
                {
                    month: 'short',
                    day: 'numeric',
                    year: 'numeric',
                    hour: 'numeric',
                    minute: '2-digit'
                }
            );

        }


        /* =====================================================
           DARK / LIGHT MODE
        ===================================================== */

        const themeToggle =
            document.getElementById(
                "themeToggle"
            );


        /*
         * Check saved theme
         */

        const savedTheme =
            localStorage.getItem(
                "dashboardTheme"
            );


        if (
            savedTheme === "dark"
        ) {

            document.body.classList.add(
                "dark"
            );

            themeToggle.textContent =
                "☀️ Light Mode";

        }


        /*
         * Toggle theme
         */

        themeToggle.addEventListener(
            "click",
            function() {

                document.body.classList.toggle(
                    "dark"
                );


                const darkMode =
                    document.body.classList.contains(
                        "dark"
                    );


                if (darkMode) {

                    themeToggle.textContent =
                        "☀️ Light Mode";

                    localStorage.setItem(
                        "dashboardTheme",
                        "dark"
                    );

                }

                else {

                    themeToggle.textContent =
                        "🌙 Dark Mode";

                    localStorage.setItem(
                        "dashboardTheme",
                        "light"
                    );

                }

            }
        );


        /* =====================================================
           START WEATHER
        ===================================================== */

        getWeather();


        /* =====================================================
           START NEWS
        ===================================================== */

        loadNews();


        /*
         * Refresh news every 10 minutes
         */

        setInterval(
            loadNews,
            10 * 60 * 1000
        );

    </script>

</body>

</html>

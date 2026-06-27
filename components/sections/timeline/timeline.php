<section class="timeline-section">
    <div class="timeline-header">
        <h2 class="timeline-heading">My Experiences</h2>
        <p class="description">
            To keep it short and relevant to my career field, the following periodization shows when and where my
            current knowledge comes from, focusing on scalable systems and backend-leaning fullstack development.
        </p>
    </div>

    <div class="timeline-container">
        <svg id="svg-stage" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 1400"> <!-- height increased -->
            <defs>
                <filter id="glow" x="-20%" y="-20%" width="140%" height="140%">
                    <feGaussianBlur stdDeviation="6" result="blur" />
                    <feMerge>
                        <feMergeNode in="blur" />
                        <feMergeNode in="SourceGraphic" />
                    </feMerge>
                </filter>
                <linearGradient id="lineGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" stop-color="#6ea8ff" stop-opacity="1" />
                    <stop offset="50%" stop-color="#b084f5" stop-opacity="1" />
                    <stop offset="100%" stop-color="#6ea8ff" stop-opacity="0.1" />
                </linearGradient>
            </defs>

            <!-- Subtle Grid Guidelines (updated y positions) -->
            <path class="line00 guideline" d="M 30 80 570 80"></path>
            <path class="line01 guideline" d="M 30 300 570 300"></path>
            <path class="line02 guideline" d="M 30 520 570 520"></path>
            <path class="line03 guideline" d="M 30 740 570 740"></path>
            <path class="line04 guideline" d="M 30 960 570 960"></path>
            <path class="line05 guideline" d="M 30 1180 570 1180"></path>

            <!-- Node 01: Group VII Origin (y=80) – right side -->
            <text class="text00 date" x="155" y="10">DEC 2024 - DEC 2025</text>
            <text class="title-0 title" x="155" y="40">REACT &amp; FLUTTER DEVELOPER</text>
            <text class="text00 company-name" x="210" y="70">Group VII Origin</text>
            <text class="text00 role-list" x="155" y="110">
                <tspan x="155" dy="0">· Backend maintenance &amp; API sync</tspan>
                <tspan x="155" dy="12">· Android app enhancement cycles</tspan>
            </text>

            <!-- Node 02: Zafy Tody (y=300) – left side -->
            <text class="text01 date right-align" x="210" y="240">APR 2024 - OCT 2024</text>
            <text class="title-1 title right-align" x="210" y="270">PHP &amp; REACT DEVELOPER</text>
            <text class="text01 company-name right-align" x="210" y="300">Zafy Tody</text>
            <text class="text01 role-list right-align" x="210" y="340">
                <tspan x="210" dy="0">RESTful APIs with Laravel 11 ·</tspan>
                <tspan x="210" dy="12">Full stack containerization via Docker ·</tspan>
                <tspan x="210" dy="12">Modular React &amp; TypeScript frontend ·</tspan>
            </text>

            <!-- Node 03: Frontend Trainee (y=520) – left side -->
            <text class="text02 date right-align" x="210" y="460">DEC 2023 - MAR 2024</text>
            <text class="title-2 title right-align" x="210" y="490">FRONTEND DEVELOPER TRAINEE</text>
            <text class="text02 company-name right-align" x="190" y="520">Maboo</text>
            <text class="text02 role-list right-align" x="210" y="560">
                <tspan x="210" dy="0">Pixel-perfect responsive integration ·</tspan>
                <tspan x="210" dy="12">Real-time data handling with Axios ·</tspan>
                <tspan x="210" dy="12">Architected reusable SCSS components ·</tspan>
            </text>

            <!-- Node 04: Teko Consulting (y=740) – right side -->
            <text class="text03 date" x="155" y="680">JUN 2023 - SEP 2023</text>
            <text class="title-3 title" x="155" y="710">PHP &amp; FRONTEND DEVELOPER TRAINEE</text>
            <text class="text03 company-name" x="155" y="740">Teko Consulting</text>
            <text class="text03 role-list" x="155" y="780">
                <tspan x="155" dy="0">· Frontend optimization (20% faster loads)</tspan>
                <tspan x="155" dy="12">· Custom PrestaShop module design</tspan>
                <tspan x="155" dy="12">· Maintained legacy Laravel configurations</tspan>
            </text>

            <!-- Node 05: Higher Education (y=960) – right side -->
            <text class="text04 date" x="155" y="900">2020 - 2025</text>
            <text class="title-4 title" x="155" y="930">HIGHER EDUCATION</text>
            <text class="text04 company-name" x="240" y="960">IT University &amp; Université Hay</text>
            <text class="text04 role-list" x="155" y="1000">
                <tspan x="155" dy="0">· Master I in Information Technology</tspan>
                <tspan x="155" dy="12">· Bachelor &amp; BTS in Programming</tspan>
            </text>

            <!-- Node 06: High School (y=1180) – left side -->
            <text class="text05 date right-align" x="210" y="1120">2017 - 2018</text>
            <text class="title-5 title right-align" x="210" y="1150">SCIENTIFIC HIGH-SCHOOL DEGREE</text>
            <text class="text05 company-name right-align" x="210" y="1180">La Pepite d'Or</text>

            <!-- Wavy Main Timeline – updated to pass through the new node coordinates -->
            <path class="theLine" d="M -5,0
                Q 450 200 300 300 
                T 130 520
                Q 80 630 300 740
                T 130 960
                Q 80 1070 300 1180
                T 150 1400" fill="none" stroke="url(#lineGrad)" stroke-width="4px" filter="url(#glow)" />

            <!-- Traveling Glowing Ball (starts at first node) -->
            <circle class="ball ball00" r="8" cx="25" cy="80" fill="#ffffff" filter="url(#glow)"></circle>

            <!-- Static Anchor Dots (updated cy values) -->
            <circle class="ball ball01 anchor" r="4" cx="160" cy="80"></circle>
            <circle class="ball ball02 anchor" r="4" cx="300" cy="301"></circle>
            <circle class="ball ball03 anchor" r="4" cx="130" cy="521"></circle>
            <circle class="ball ball04 anchor" r="4" cx="300" cy="741"></circle>
            <circle class="ball ball05 anchor" r="4" cx="135" cy="961"></circle>
            <circle class="ball ball06 anchor" r="4" cx="300" cy="1181"></circle>
        </svg>
    </div>
</section>
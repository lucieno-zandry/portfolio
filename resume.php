<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Lucieno Zandry · Backend-Leaning Fullstack Engineer · Resume</title>
    <!-- Google Fonts + Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @media print {
            body {
                margin: 0;
                padding: 0;
                background: white;
            }

            .resume-card {
                box-shadow: none;
                border-radius: 0;
                max-width: 100%;
            }

            .sidebar,
            .main-content {
                break-inside: avoid;
            }

            .exp-item,
            .edu-item,
            .main-section,
            .side-section {
                break-inside: avoid;
                page-break-inside: avoid;
            }

            h1,
            h2,
            h3 {
                break-after: avoid;
            }

            .profile-img {
                max-width: 120px;
            }
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #eef2f5;
            font-family: 'Inter', sans-serif;
            color: #1e2a3e;
            line-height: 1.45;
            padding: 2rem 1.5rem;
        }

        .resume-card {
            max-width: 1100px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 28px;
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.08), 0 2px 5px rgba(0, 0, 0, 0.02);
            overflow: hidden;
        }

        .resume-grid {
            display: grid;
            grid-template-columns: 34% 66%;
        }

        /* ========= LEFT SIDEBAR ========= */
        .sidebar {
            background: #f9fafc;
            border-right: 1px solid #e9edf2;
            padding: 2rem 1.6rem;
        }

        .profile-img-wrapper {
            text-align: center;
            margin-bottom: 1.8rem;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid white;
            box-shadow: 0 12px 22px -10px rgba(0, 0, 0, 0.12);
            background: #dfe6ed;
            transition: transform 0.2s;
        }

        .profile-img:hover {
            transform: scale(1.02);
        }

        .name-side {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .name-side h1 {
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: -0.3px;
            color: #0a2b3e;
            margin-bottom: 0.3rem;
        }

        .name-side .title {
            font-weight: 600;
            color: #1f6e8c;
            background: #e6f0f5;
            display: inline-block;
            padding: 0.3rem 1.2rem;
            border-radius: 40px;
            font-size: 0.8rem;
            letter-spacing: 0.2px;
        }

        .contact-info {
            margin: 1.2rem 0 1.8rem 0;
            list-style: none;
        }

        .contact-info li {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            font-size: 0.85rem;
            margin-bottom: 0.9rem;
            color: #2c3e4e;
            word-break: break-word;
        }

        .contact-info li i {
            width: 1.4rem;
            font-size: 1rem;
            color: #2c7da0;
        }

        .contact-info a {
            color: #1e2a3e;
            text-decoration: none;
            border-bottom: 1px dotted #cbd5e1;
        }

        .contact-info a:hover {
            color: #1f6e8c;
            border-bottom-color: #2c7da0;
        }

        .side-section {
            margin-top: 1.6rem;
        }

        .side-section h3 {
            font-size: 1rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #2c7da0;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 0.5rem;
            margin-bottom: 1rem;
        }

        .soft-skills {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .soft-badge {
            background: white;
            border: 1px solid #dce5ec;
            padding: 0.3rem 0.8rem;
            border-radius: 40px;
            font-size: 0.75rem;
            font-weight: 500;
            color: #1f4e6e;
        }

        .core-list,
        .lang-list,
        .cert-list {
            list-style: none;
            padding-left: 0;
        }

        .core-list li,
        .lang-list li,
        .cert-list li {
            font-size: 0.85rem;
            margin-bottom: 0.65rem;
            display: flex;
            align-items: baseline;
            gap: 0.6rem;
        }

        .core-list li i,
        .lang-list li i,
        .cert-list li i {
            color: #2c7da0;
            width: 1.2rem;
            font-size: 0.8rem;
            margin-top: 0.2rem;
        }

        .lang-list li span {
            font-weight: 500;
        }

        /* ========= RIGHT CONTENT ========= */
        .main-content {
            padding: 2rem 2rem 2rem 1.8rem;
            background: white;
        }

        .main-section {
            margin-bottom: 2rem;
        }

        .main-section h2 {
            font-size: 1.3rem;
            font-weight: 700;
            color: #0f2c3b;
            border-left: 4px solid #2c7da0;
            padding-left: 0.8rem;
            margin-bottom: 1.1rem;
            letter-spacing: -0.2px;
        }

        .profile-text {
            background: #f8fafd;
            padding: 1rem 1.2rem;
            border-radius: 20px;
            font-size: 0.9rem;
            line-height: 1.5;
            color: #1f3b4c;
            margin-bottom: 0.5rem;
            border: 1px solid #eef2f8;
        }

        .exp-item {
            margin-bottom: 1.6rem;
        }

        .exp-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 0.3rem;
        }

        .exp-role {
            font-weight: 700;
            font-size: 1rem;
            color: #0c4e6e;
        }

        .exp-company {
            font-weight: 600;
            color: #2d5f7e;
            font-size: 0.85rem;
        }

        .exp-date {
            font-size: 0.7rem;
            background: #eef2f5;
            padding: 0.2rem 0.7rem;
            border-radius: 30px;
            color: #3a6b8c;
            font-weight: 500;
        }

        .exp-desc {
            margin-top: 0.5rem;
            padding-left: 0.2rem;
        }

        .exp-desc ul {
            list-style: none;
            padding-left: 0;
        }

        .exp-desc li {
            font-size: 0.85rem;
            margin-bottom: 0.45rem;
            display: flex;
            align-items: baseline;
            gap: 0.6rem;
        }

        .exp-desc li i {
            color: #2c7da0;
            font-size: 0.7rem;
            width: 1.1rem;
            margin-top: 0.2rem;
        }

        .edu-item {
            margin-bottom: 1rem;
        }

        .edu-degree {
            font-weight: 700;
            font-size: 0.92rem;
            color: #1e3b4c;
        }

        .edu-school {
            font-size: 0.8rem;
            color: #4a6272;
            font-weight: 500;
        }

        .edu-date {
            font-size: 0.7rem;
            color: #5e7e97;
            margin-top: 0.1rem;
        }

        .tech-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 0.6rem;
            margin-top: 0.6rem;
        }

        .tech-badge {
            background: #eff3f8;
            padding: 0.3rem 1rem;
            border-radius: 40px;
            font-size: 0.75rem;
            font-weight: 500;
            color: #1f5777;
            transition: all 0.1s ease;
            border: 1px solid #e0e8f0;
        }

        .tech-badge:hover {
            background: #e3eaf1;
            transform: translateY(-1px);
        }

        .focus-box {
            background: #f9fbfe;
            border-radius: 20px;
            padding: 0.9rem 1.2rem;
            border: 1px solid #e9edf2;
            margin-top: 0.5rem;
        }

        .focus-box p {
            font-size: 0.85rem;
            margin-bottom: 0.5rem;
            line-height: 1.5;
        }

        .focus-list {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            list-style: none;
            margin-top: 0.5rem;
        }

        .focus-list li {
            background: white;
            border-radius: 30px;
            padding: 0.2rem 0.8rem;
            font-size: 0.75rem;
            font-weight: 500;
            color: #1f6e8c;
            border: 1px solid #dce5ec;
        }

        hr {
            margin: 0.8rem 0;
            border: 0;
            height: 1px;
            background: #e2edf2;
        }

        @media (max-width: 780px) {
            body {
                padding: 1rem;
            }

            .resume-grid {
                grid-template-columns: 1fr;
            }

            .sidebar {
                border-right: 0;
                border-bottom: 1px solid #e9edf2;
            }

            .main-content {
                padding: 1.8rem;
            }

            .profile-img {
                width: 120px;
                height: 120px;
            }
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .resume-card {
                box-shadow: none;
                border-radius: 0;
            }

            .tech-badge {
                background: #f0f2f5;
                border: 1px solid #ccc;
            }
        }

        .small-note {
            font-size: 0.65rem;
            text-align: center;
            margin-top: 1rem;
            color: #7e95a7;
        }
    </style>
</head>

<body>
    <div class="resume-card">
        <div class="resume-grid">
            <!-- LEFT COLUMN: profile + personal info + soft skills + core competencies + languages + certificates -->
            <aside class="sidebar">
                <div class="profile-img-wrapper">
                    <img class="profile-img" src="./assets/picture.png" alt="Lucieno Zandry profile picture" title="Update with your photo">
                </div>
                <div class="name-side">
                    <h1>LUCIENO ZANDRY</h1>
                    <div class="title">Backend-Leaning Fullstack Engineer</div>
                </div>
                <ul class="contact-info">
                    <li><i class="fab fa-github"></i> <a href="https://github.com/lucieno-zandry" target="_blank">github.com/lucieno-zandry</a></li>
                    <li><i class="fas fa-phone-alt"></i> +261 34 85 277 52</li>
                    <li><i class="fas fa-envelope"></i> <a href="mailto:lucienozandry4@gmail.com">lucienozandry4@gmail.com</a></li>
                    <li><i class="fas fa-map-marker-alt"></i> Ambatoroka, Antananarivo, MG</li>
                    <li><i class="fas fa-globe"></i> <a href="https://lucieno-zandry.rf.gd" target="_blank">lucieno-zandry.rf.gd</a></li>
                </ul>
                <div class="side-section">
                    <h3><i class="fas fa-user-check"></i> Soft skills</h3>
                    <div class="soft-skills">
                        <span class="soft-badge">Stress Management</span>
                        <span class="soft-badge">Team Spirit</span>
                        <span class="soft-badge">Creative</span>
                        <span class="soft-badge">Polyvalent</span>
                        <span class="soft-badge">Ownership Mindset</span>
                    </div>
                </div>
                <div class="side-section">
                    <h3><i class="fas fa-code"></i> Core competencies</h3>
                    <ul class="core-list">
                        <li><i class="fas fa-paint-brush"></i> Design Integration</li>
                        <li><i class="fas fa-laptop-code"></i> FrontEnd Creation</li>
                        <li><i class="fas fa-server"></i> Backend Development & Scalability</li>
                        <li><i class="fas fa-cloud-upload-alt"></i> Deployment & Containerization</li>
                        <li><i class="fas fa-project-diagram"></i> System Design (UML & MERISE)</li>
                        <li><i class="fas fa-plug"></i> REST API Architecture & Integration</li>
                    </ul>
                </div>
                <div class="side-section">
                    <h3><i class="fas fa-language"></i> Languages</h3>
                    <ul class="lang-list">
                        <li><i class="fas fa-comment-dots"></i> <span>English</span> – Professional working proficiency</li>
                        <li><i class="fas fa-comment-dots"></i> <span>French</span> – Professional working proficiency</li>
                        <li><i class="fas fa-comment-dots"></i> <span>Malagasy</span> – Native</li>
                    </ul>
                </div>
                <div class="side-section">
                    <h3><i class="fas fa-certificate"></i> Certificates</h3>
                    <ul class="cert-list">
                        <li><i class="fas fa-check-circle"></i> DELF B2 (French proficiency)</li>
                        <li><i class="fas fa-id-card"></i> Driver's License (Category B)</li>
                    </ul>
                </div>
                <div class="small-note">
                    <i class="fas fa-sync-alt"></i> Open to global opportunities · Remote
                </div>
            </aside>

            <!-- RIGHT COLUMN: professional identity, ownership-driven experience, growth focus -->
            <main class="main-content">
                <!-- PROFILE SUMMARY (enhanced with identity, AI leverage, ambition) -->
                <div class="main-section">
                    <h2>Profile</h2>
                    <div class="profile-text">
                        <strong>Backend-leaning fullstack engineer</strong> focused on scalable systems and cloud‑ready architectures.
                        1.5+ years of experience building, deploying, and owning features end‑to‑end, from API design to containerized deployment.
                        I leverage <strong>AI tooling</strong> to accelerate development while maintaining clean architecture, readability, and long‑term maintainability.
                        Currently expanding into <strong>microservices, API gateways, and event‑driven patterns</strong> to design systems that scale.
                        Passionate about system thinking, backend resilience, and engineering ownership.
                    </div>
                </div>

                <!-- WORK EXPERIENCE (rewritten with ownership verbs, impact & architecture language) -->
                <div class="main-section">
                    <h2><i class="fas fa-briefcase"></i> Experience</h2>

                    <!-- React & Flutter Developer -->
                    <div class="exp-item">
                        <div class="exp-header">
                            <span class="exp-role">React & Flutter Developer</span>
                            <span class="exp-date">Dec 2025 – Dec 2026</span>
                        </div>
                        <div class="exp-company">Group VII Origin</div>
                        <div class="exp-desc">
                            <ul>
                                <li><i class="fas fa-check-circle"></i> <strong>Architected</strong> responsive web applications and integrated design systems for cross-device consistency.</li>
                                <li><i class="fas fa-check-circle"></i> <strong>Owned</strong> backend maintenance and API synchronization, ensuring zero-downtime data flow across services.</li>
                                <li><i class="fas fa-check-circle"></i> <strong>Led</strong> Android app enhancements, reducing critical bugs by 25% through structured maintenance cycles.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- PHP & React Developer (ownership & deployment) -->
                    <div class="exp-item">
                        <div class="exp-header">
                            <span class="exp-role">PHP & React Developer</span>
                            <span class="exp-date">Apr 2024 – Nov 2025</span>
                        </div>
                        <div class="exp-company">Zafy Tody</div>
                        <div class="exp-desc">
                            <ul>
                                <li><i class="fas fa-check-circle"></i> <strong>Designed and implemented</strong> RESTful APIs with PHP/Laravel 11, following scalable architecture patterns.</li>
                                <li><i class="fas fa-check-circle"></i> <strong>Containerized</strong> the full application stack using Docker, streamlining development and production parity.</li>
                                <li><i class="fas fa-check-circle"></i> <strong>Engineered</strong> modular frontend architecture with React, TypeScript, and SCSS, reducing rework by 30%.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Frontend Developer Trainee (Zafy Tody) -->
                    <div class="exp-item">
                        <div class="exp-header">
                            <span class="exp-role">Frontend Developer Trainee</span>
                            <span class="exp-date">Dec 2023 – Mar 2024</span>
                        </div>
                        <div class="exp-company">Zafy Tody</div>
                        <div class="exp-desc">
                            <ul>
                                <li><i class="fas fa-check-circle"></i> <strong>Implemented</strong> pixel-perfect design integration and responsive layouts, improving user engagement metrics.</li>
                                <li><i class="fas fa-check-circle"></i> <strong>Integrated</strong> REST APIs using Axios with real-time data handling, reducing latency by 15%.</li>
                                <li><i class="fas fa-check-circle"></i> <strong>Architected</strong> reusable component libraries with React, TypeScript, and SCSS to accelerate future development.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- PHP & Frontend Developer Trainee (Teko Consulting) -->
                    <div class="exp-item">
                        <div class="exp-header">
                            <span class="exp-role">PHP & Frontend Developer Trainee</span>
                            <span class="exp-date">Jun 2023 – Sep 2023</span>
                        </div>
                        <div class="exp-company">Teko Consulting</div>
                        <div class="exp-desc">
                            <ul>
                                <li><i class="fas fa-check-circle"></i> <strong>Optimized</strong> frontend performance using Web Analytics & GPA tools, achieving 20% faster load times.</li>
                                <li><i class="fas fa-check-circle"></i> <strong>Developed</strong> custom PrestaShop modules, enabling new e-commerce functionalities for clients.</li>
                                <li><i class="fas fa-check-circle"></i> <strong>Evolved and maintained</strong> legacy Laravel applications, improving code maintainability and stability.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- EDUCATION -->
                <div class="main-section">
                    <h2><i class="fas fa-graduation-cap"></i> Education</h2>
                    <div class="edu-item">
                        <div class="edu-degree">Master I in Information Technology</div>
                        <div class="edu-school">IT University Madagascar</div>
                        <div class="edu-date">2024 – 2025</div>
                    </div>
                    <div class="edu-item">
                        <div class="edu-degree">Bachelor in Programming</div>
                        <div class="edu-school">Université Privée Hay</div>
                        <div class="edu-date">2022 – 2023</div>
                    </div>
                    <div class="edu-item">
                        <div class="edu-degree">BTS Degree in Programming</div>
                        <div class="edu-school">Université Privée Hay</div>
                        <div class="edu-date">2020 – 2022</div>
                    </div>
                    <div class="edu-item">
                        <div class="edu-degree">Scientific High-School Degree</div>
                        <div class="edu-school">La Pepite d'Or, Antananandro</div>
                        <div class="edu-date">2017 – 2018</div>
                    </div>
                </div>

                <!-- TECH STACK & TOOLS -->
                <div class="main-section">
                    <h2><i class="fas fa-microchip"></i> Tech Stack & Tools</h2>
                    <div class="tech-badges">
                        <span class="tech-badge">PHP</span>
                        <span class="tech-badge">JavaScript (ES6+)</span>
                        <span class="tech-badge">Laravel</span>
                        <span class="tech-badge">ReactJS</span>
                        <span class="tech-badge">React Router v7</span>
                        <span class="tech-badge">React Remix</span>
                        <span class="tech-badge">Flutter</span>
                        <span class="tech-badge">Node.js</span>
                        <span class="tech-badge">Express.js</span>
                        <span class="tech-badge">TypeScript</span>
                        <span class="tech-badge">SASS/SCSS</span>
                        <span class="tech-badge">HTML5/CSS3</span>
                        <span class="tech-badge">Bootstrap</span>
                        <span class="tech-badge">Git & GitHub</span>
                        <span class="tech-badge">Docker</span>
                        <span class="tech-badge">Redux</span>
                        <span class="tech-badge">REST APIs</span>
                        <span class="tech-badge">Axios</span>
                        <span class="tech-badge">PrestaShop</span>
                    </div>
                    <hr>
                    <div style="font-size: 0.75rem; color: #406e8c; margin-top: 0.5rem;">
                        <i class="fas fa-tachometer-alt"></i> Additional: UML, MERISE, Web Analytics, Deployment workflows, CI/CD fundamentals
                    </div>
                </div>

                <!-- NEW: GROWTH & SYSTEMS FOCUS (microservices, cloud, engineering trajectory) -->
                <div class="main-section">
                    <h2><i class="fas fa-chart-line"></i> Learning & Systems Focus</h2>
                    <div class="focus-box">
                        <p><strong>🔹 Engineering trajectory:</strong> Moving toward backend & cloud-native architectures, with a focus on maintainable, scalable systems. Currently exploring:</p>
                        <ul class="focus-list">
                            <li>Microservice architecture & API gateways</li>
                            <li>Event-driven patterns (RabbitMQ / Kafka basics)</li>
                            <li>Docker orchestration & CI/CD pipelines</li>
                            <li>Service-oriented design & system decoupling</li>
                        </ul>
                        <p style="margin-top: 0.6rem; font-size: 0.8rem; color: #2c7da0;"><i class="fas fa-brain"></i> I combine AI-assisted productivity with rigorous engineering judgment to deliver clean, production-ready systems, not just code.</p>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
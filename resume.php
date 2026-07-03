<?php
$data = load_data()['resume'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title><?php echo htmlspecialchars($data['meta_title']); ?></title>
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
            max-width: 1500px;
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
            max-width: 80%;
            min-height: 100px;
            aspect-ratio: 1;
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
            white-space: nowrap;
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

        .tech-badge.key {
            background: #e0f0fa;
            border-color: #2c7da0;
            color: #0d4e6e;
            font-weight: 600;
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
            <!-- LEFT COLUMN -->
            <aside class="sidebar">
                <div class="profile-img-wrapper">
                    <img class="profile-img" src="./components/sections/contact/assets/images/image1.jpg" alt="<?php echo htmlspecialchars($data['name']); ?> profile picture">
                </div>
                <div class="name-side">
                    <h1><?php echo htmlspecialchars($data['name']); ?></h1>
                    <div class="title"><?php echo htmlspecialchars($data['job_title']); ?></div>
                </div>
                <ul class="contact-info">
                    <li><i class="fab fa-github"></i> <a href="https://<?php echo htmlspecialchars($data['contact']['github']); ?>" target="_blank"><?php echo htmlspecialchars($data['contact']['github']); ?></a></li>
                    <li><i class="fas fa-phone-alt"></i> <?php echo htmlspecialchars($data['contact']['phone']); ?></li>
                    <li><i class="fas fa-envelope"></i> <a href="mailto:<?php echo htmlspecialchars($data['contact']['email']); ?>"><?php echo htmlspecialchars($data['contact']['email']); ?></a></li>
                    <li><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($data['contact']['location']); ?></li>
                    <li><i class="fas fa-globe"></i> <a href="https://<?php echo htmlspecialchars($data['contact']['website']); ?>" target="_blank"><?php echo htmlspecialchars($data['contact']['website']); ?></a></li>
                    <li><i class="fab fa-linkedin"></i> <a href="https://www.linkedin.com/in/lucieno-zandry-a41a16324" target="_blank"><?php echo htmlspecialchars($data['contact']['linkedin']); ?></a></li>
                </ul>
                <div class="side-section">
                    <h3><i class="fas fa-user-check"></i> <?php echo htmlspecialchars($data['sections']['soft_skills']); ?></h3>
                    <div class="soft-skills">
                        <?php foreach ($data['soft_skills_list'] as $skill): ?>
                            <span class="soft-badge"><?php echo htmlspecialchars($skill); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="side-section">
                    <h3><i class="fas fa-code"></i> <?php echo htmlspecialchars($data['sections']['core_competencies']); ?></h3>
                    <ul class="core-list">
                        <?php foreach ($data['core_competencies_list'] as $competency): ?>
                            <li><i class="fas fa-check-circle"></i> <?php echo htmlspecialchars($competency); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="side-section">
                    <h3><i class="fas fa-language"></i> <?php echo htmlspecialchars($data['sections']['languages']); ?></h3>
                    <ul class="lang-list">
                        <?php foreach ($data['languages_list'] as $lang): ?>
                            <li><i class="fas fa-comment-dots"></i> <span><?php echo htmlspecialchars($lang['name']); ?></span> – <?php echo htmlspecialchars($lang['proficiency']); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="side-section">
                    <h3><i class="fas fa-certificate"></i> <?php echo htmlspecialchars($data['sections']['certificates']); ?></h3>
                    <ul class="cert-list">
                        <?php foreach ($data['certificates_list'] as $cert): ?>
                            <li><i class="fas fa-check-circle"></i> <?php echo htmlspecialchars($cert); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="small-note">
                    <i class="fas fa-sync-alt"></i> <?php echo htmlspecialchars($data['availability_note']); ?>
                </div>
            </aside>

            <!-- RIGHT COLUMN -->
            <main class="main-content">
                <!-- PROFILE SUMMARY -->
                <div class="main-section">
                    <h2><?php echo htmlspecialchars($data['sections']['profile']); ?></h2>
                    <div class="profile-text">
                        <?php echo $data['profile_description']; ?>
                    </div>
                </div>

                <!-- WORK EXPERIENCE -->
                <div class="main-section">
                    <h2><i class="fas fa-briefcase"></i> <?php echo htmlspecialchars($data['sections']['experience']); ?></h2>

                    <?php foreach ($data['experience_list'] as $exp): ?>
                        <div class="exp-item">
                            <div class="exp-header">
                                <span class="exp-role"><?php echo htmlspecialchars($exp['role']); ?></span>
                                <span class="exp-date"><?php echo htmlspecialchars($exp['date']); ?></span>
                            </div>
                            <div class="exp-company"><?php echo htmlspecialchars($exp['company']); ?></div>
                            <div class="exp-desc">
                                <ul>
                                    <?php foreach ($exp['highlights'] as $highlight): ?>
                                        <li><i class="fas fa-check-circle"></i> <?php echo $highlight; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- EDUCATION -->
                <div class="main-section">
                    <h2><i class="fas fa-graduation-cap"></i> <?php echo htmlspecialchars($data['sections']['education']); ?></h2>
                    <?php foreach ($data['education_list'] as $edu): ?>
                        <div class="edu-item">
                            <div class="edu-degree"><?php echo htmlspecialchars($edu['degree']); ?></div>
                            <div class="edu-school"><?php echo htmlspecialchars($edu['school']); ?></div>
                            <div class="edu-date"><?php echo htmlspecialchars($edu['date']); ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- TECH STACK & TOOLS -->
                <div class="main-section">
                    <h2><i class="fas fa-microchip"></i> <?php echo htmlspecialchars($data['sections']['tech_stack']); ?></h2>
                    <div class="tech-badges">
                        <?php foreach ($data['tech_badges_key'] as $badge): ?>
                            <span class="tech-badge key"><?php echo htmlspecialchars($badge); ?></span>
                        <?php endforeach; ?>

                        <?php foreach ($data['tech_badges_supporting'] as $badge): ?>
                            <span class="tech-badge"><?php echo htmlspecialchars($badge); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <hr>
                    <div style="font-size: 0.75rem; color: #406e8c; margin-top: 0.5rem;">
                        <i class="fas fa-tachometer-alt"></i> <?php echo htmlspecialchars($data['additional_tech_note']); ?>
                    </div>
                </div>

                <!-- ENGINEERING FOCUS -->
                <div class="main-section">
                    <h2><i class="fas fa-chart-line"></i> <?php echo htmlspecialchars($data['sections']['engineering_focus']); ?></h2>
                    <div class="focus-box">
                        <p><strong><?php echo htmlspecialchars($data['focus']['title_bold']); ?></strong> <?php echo htmlspecialchars($data['focus']['intro']); ?></p>
                        <ul class="focus-list">
                            <?php foreach ($data['focus']['items'] as $item): ?>
                                <li><?php echo htmlspecialchars($item); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <p style="margin-top: 0.6rem; font-size: 0.8rem; color: #2c7da0;"><i class="fas fa-brain"></i> <?php echo htmlspecialchars($data['focus']['footer']); ?></p>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
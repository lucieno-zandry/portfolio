<?php
$data = load_data();
$hero = $data['hero'];
?>

<section class="hero reveal">
    <div class="hero-overlay"></div>

    <div class="hero-content">
        <p class="eyebrow"><?= htmlspecialchars($hero['eyebrow']) ?></p>

        <h1>
            <?= htmlspecialchars($hero['title']) ?>
            <span class="text-outline"><?=  htmlspecialchars($hero['title-outline'])  ?></span>
        </h1>

        <p class="description"><?= htmlspecialchars($hero['description']) ?></p>

        <div class="cta-group hero-actions">
            <a class="primary-btn" href="<?= htmlspecialchars($hero['cta']['primary']['href']) ?>"><?= htmlspecialchars($hero['cta']['primary']['text']) ?></a>
            <a class="secondary-btn" href="<?= htmlspecialchars($hero['cta']['secondary']['href']) ?>"><?= htmlspecialchars($hero['cta']['secondary']['text']) ?></a>
        </div>

        <div class="tech-stack">
            <?php foreach ($hero['techStack'] as $tech): ?>
                <span><?= htmlspecialchars($tech) ?></span>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="background-text">
        <span>SYSTEMS</span>
    </div>
</section>
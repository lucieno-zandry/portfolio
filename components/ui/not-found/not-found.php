<?php

$data = load_data()['page_404'];
$home = add_lang_to_uri('/');

View::extends('components/ui/layout/layout');
View::section('title', htmlspecialchars($data['meta_title']));
View::startSection('head');
?>
<style>
    .error-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        min-height: 75vh;
        padding: 4rem 2rem;
    }

    .error-code {
        font-size: clamp(6rem, 18vw, 14rem);
        font-weight: 900;
        line-height: 0.8;
        margin-bottom: 1.5rem;
        letter-spacing: -0.05em;
    }

    .error-container h1 {
        margin-top: 0.5rem;
    }

    .error-container .cta-group {
        justify-content: center;
        margin-top: 2.5rem;
    }
</style>
<?php View::endSection('head') ?>

<?php View::startSection('content') ?>
<div class="error-container">
    <div class="error-code text-outline">404</div>

    <p class="eyebrow"><?= htmlspecialchars($data['eyebrow']) ?></p>
    <h1><?= htmlspecialchars($data['title']) ?></h1>

    <p class="description">
        <?= htmlspecialchars($data['description']) ?>
    </p>

    <div class="cta-group">
        <a href="#" onclick="window.history.length > 1 ? history.back() : window.location.href='<?= $home ?>'; return false;" class="secondary-btn">
            &larr; <?= htmlspecialchars($data['btn_back']) ?>
        </a>

        <a href="<?= $home ?>" class="primary-btn">
            <?= htmlspecialchars($data['btn_home']) ?>
        </a>
    </div>
</div>
<?php View::endSection('content') ?>
<?php
$data = load_data();
$contact = $data['contact'];
?>

<?php View::startSection('head'); ?>
<link rel="stylesheet" href="./components/sections/contact/contact.css">
<?php View::endSection('head'); ?>

<section class="content reveal" id="contact">
    <header class="contact-header">
        <div class="contact-info">
            <div class="contact-status">
                <span class="status-dot"></span> <?= htmlspecialchars($contact['status']) ?>
            </div>

            <h1 class="eyebrow"><?= htmlspecialchars($contact['name']) ?></h1>
            <h2><?= htmlspecialchars($contact['heading']) ?></h2>

            <p class="description"><?= htmlspecialchars($contact['description']) ?></p>

            <div class="location-info">
                <p><?= htmlspecialchars($contact['location']) ?></p>
            </div>

            <div class="cta-group">
                <a class="primary-btn" href="<?= htmlspecialchars($contact['cta']['primary']['href']) ?>"><?= htmlspecialchars($contact['cta']['primary']['text']) ?></a>
                <?php foreach ($contact['cta']['secondary'] as $btn): ?>
                    <a class="secondary-btn" href="<?= htmlspecialchars($btn['href']) ?>" target="_blank"><?= htmlspecialchars($btn['text']) ?></a>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="label"></div>

        <ul class="scroll-gallery">
            <li>
                <img src="./components/sections/contact/assets/images/image1.jpg" alt="A professional picture of Lucieno" />
            </li>
            <li>
                <img src="./components/sections/contact/assets/images/image2.jpg" alt="A normal, smiling photo of Lucieno" />
            </li>
            <li>
                <img src="./components/sections/contact/assets/images/image3.jpg" alt="A casual picture of Lucieno" />
            </li>
        </ul>

        <div class="blur"></div>
    </header>

    <footer class="contact-footer">
        <p><?= htmlspecialchars($contact['footer']) ?></p>
    </footer>
</section>

<?php View::startSection('script'); ?>
<script src="./components/sections/contact/contact.js" type="module"></script>
<?php View::endSection('script'); ?>
<?php
$data = load_data();
$manifesto = $data['engineeringManifesto'];
$count = count($manifesto['list']);
?>

<?php View::startSection('head') ?>
<link rel="stylesheet" href="./components/sections/engineering-manifesto/engineering-manifesto.css">
<?php View::endSection('head') ?>

<section class="engineering-manifesto reveal">
    <header class="manifesto-header fluid" style="--count: <?= $count ?>;">
        <div>
            <h2>
                <span aria-hidden="true"><?= htmlspecialchars($manifesto['static_text']) ?>&nbsp;</span>
                <span class="sr-only">
                    <?= htmlspecialchars($manifesto['heading']) ?>
                </span>
            </h2>

            <ul aria-hidden="true">
                <?php foreach ($manifesto['list'] as $i => $item): ?>
                    <li style="--i: <?= $i ?>"><?= htmlspecialchars($item) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </header>
</section>
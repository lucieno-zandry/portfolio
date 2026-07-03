<?php
$data = load_data();
$manifesto = $data['engineeringManifesto'];
$count = count($manifesto['list']);
?>

<section class="engineering-manifesto reveal">
    <header class="manifesto-header fluid" style="--count: <?= $count ?>;">
        <section>
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
        </section>
    </header>
</section>
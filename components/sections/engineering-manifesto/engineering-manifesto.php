<?php
$data = json_decode(file_get_contents(dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'data.json'), true);
$manifesto = $data['engineeringManifesto'];
$count = count($manifesto['list']);
?>

<section class="engineering-manifesto reveal">
    <header class="manifesto-header fluid" style="--count: <?= $count ?>;">
        <section>
            <h2>
                <span aria-hidden="true">i engineer&nbsp;</span>
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
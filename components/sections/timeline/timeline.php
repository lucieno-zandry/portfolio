<?php
$data = load_data();
$timeline = $data['timeline'];
$items = $timeline['items'];
?>

<section class="timeline-section">
    <div class="timeline-header reveal">
        <span class="eyebrow"><?= htmlspecialchars($timeline['eyebrow']) ?></span>
        <h2><?= $timeline['title'] // contains <br> 
            ?></h2>
        <p class="description"><?= htmlspecialchars($timeline['description']) ?></p>
    </div>

    <div class="timeline-container">
        <svg id="svg-stage" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 2800">
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

            <!-- guidelines -->
            <?php foreach ($items as $idx => $item): ?>
                <path class="line0<?= $idx ?> guideline" d="M 30 <?= $item['lineY'] ?> 570 <?= $item['lineY'] ?>"></path>
            <?php endforeach; ?>

            <!-- text blocks -->
            <?php foreach ($items as $idx => $item):
                $alignClass = $item['alignment'] === 'right' ? 'right-align' : '';
                $dateX = $item['dateX'];
                $titleX = $item['titleX'];
                $companyX = $item['companyX'];
                $roleX = $item['roleX'];
                $lineY = $item['lineY'];
                $dateY = $lineY - 125;
                $titleY = $lineY - 75;
                $companyY = $lineY + 5;
                $roleY = $lineY + (isset($item['roleY']) ? $item['roleY'] : 55);
            ?>
                <!-- Simplified dynamic classes: text-<?= $idx ?> -->
                <text class="text-<?= $idx ?> date <?= $alignClass ?>" x="<?= $dateX ?>" y="<?= $dateY ?>"><?= htmlspecialchars($item['date']) ?></text>
                <text class="title-<?= $idx ?> title <?= $alignClass ?>" x="<?= $titleX ?>" y="<?= $titleY ?>">
                    <tspan x="<?= $titleX ?>" dy="0"><?= htmlspecialchars($item['titleLine1']) ?></tspan>
                    <tspan x="<?= $titleX ?>" dy="22"><?= htmlspecialchars($item['titleLine2']) ?></tspan>
                </text>
                <text class="text-<?= $idx ?> company-name <?= $alignClass ?>" x="<?= $companyX ?>" y="<?= $companyY ?>"><?= htmlspecialchars($item['company']) ?></text>
                <g class="info-icon text-<?= $idx ?>" data-index="<?= $idx ?>" tabindex="0" role="button" aria-label="About <?= htmlspecialchars($item['company']) ?>" style="transform: <?= $item['iconTransform'] ?>;">
                    <circle class="info-icon-bg" r="9" cx="0" cy="0"></circle>
                    <text class="info-icon-mark" x="0" y="0">i</text>
                </g>
                <?php if (!empty($item['roleList'])): ?>
                    <text class="text-<?= $idx ?> role-list <?= $alignClass ?>" x="<?= $roleX ?>" y="<?= $roleY ?>">
                        <?php foreach ($item['roleList'] as $j => $role): ?>
                            <tspan x="<?= $roleX ?>" dy="<?= $j === 0 ? 0 : 20 ?>"><?= htmlspecialchars($role) ?></tspan>
                        <?php endforeach; ?>
                    </text>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- the main curved path -->
            <path class="theLine" d="M -5,0
    Q 450 400 300 600 
    T 130 1040
    Q 80 1260 300 1480
    T 130 1920
    Q 80 2140 300 2360
    T 150 2800" fill="none" stroke="url(#lineGrad)" stroke-width="6px" filter="url(#glow)" />

            <!-- moving ball (renamed class to ball-main to distinguish it) -->
            <circle class="ball ball-main" r="12" cx="25" cy="160" fill="#ffffff" filter="url(#glow)"></circle>

            <!-- anchor balls -->
            <?php foreach ($items as $idx => $item): ?>
                <!-- Synchronized dynamic classes: ball-<?= $idx ?> -->
                <circle class="ball ball-<?= $idx ?> anchor" r="6" cx="<?= $item['ballX'] ?>" cy="<?= $item['lineY'] ?>"></circle>
            <?php endforeach; ?>
        </svg>

        <div class="info-popover" id="infoPopover" role="dialog" aria-hidden="true">
            <button class="info-popover-close" type="button" aria-label="Close">&times;</button>
            <h4 class="info-popover-title"></h4>
            <p class="info-popover-text"></p>
            <a class="info-popover-link" href="#" target="_blank" rel="noopener noreferrer"></a>
        </div>
    </div>

    <!-- Pass company info to JavaScript -->
    <script>
        window.timelineCompanyInfo = <?= json_encode(array_map(function ($item) {
                                            return [
                                                'name' => $item['company'],
                                                'info' => $item['info'],
                                                'url' => $item['url'],
                                                'actionLabel' => $item['actionLabel'] ?? null,
                                            ];
                                        }, $items)) ?>;
    </script>
</section>
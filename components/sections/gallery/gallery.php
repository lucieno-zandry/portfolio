<?php
$data = load_data();
$gallery = $data['gallery'];
?>

<section class="gallery-section" id="projects">
    <div class="video-container reveal">
        <video autoplay muted loop playsinline class="background-video">
            <source src="./components/sections/gallery/assets/background-video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <div class="systems-intro">
            <span class="eyebrow"><?= htmlspecialchars($gallery['eyebrow']) ?></span>

            <h2>
                <?= $gallery['title'] // contains HTML, so no escaping 
                ?>
            </h2>

            <p class="description"><?= htmlspecialchars($gallery['description']) ?></p>
        </div>
    </div>

    <p class="msg-supports">
        Sorry, your browser does not support <code>animation-timeline</code>
    </p>

    <div class="wrapper" id="gallery">
        <div class="grid-inner">
            <?php foreach ($gallery['projects'] as $project): ?>
                <div class="project-card" style="--bg:url(<?= htmlspecialchars($project['bg']) ?>);">
                    <div class="project-overlay">
                        <h3><?= $project['title'] // contains HTML 
                            ?></h3>
                        <p><?= htmlspecialchars($project['tech']) ?></p>
                        <?php if ($project['link']): ?>
                            <a href="<?= htmlspecialchars($project['link']) ?>" class="overlay-link" target="_blank">
                                <?= $project['actionLabel']  ?> &rarr;
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
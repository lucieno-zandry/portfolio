<?php

$data = load_data()['the-logic-engine'];

View::extends('case-studies/layout');
View::section('title', $data['meta_title']);

View::startSection('content');
?>

<section class="reveal active">
    <div class="eyebrow"><?php echo htmlspecialchars($data['hero_eyebrow']); ?></div>
    <h1><?php echo htmlspecialchars($data['hero_title_text']); ?> <br><span class="text-outline"><?php echo htmlspecialchars($data['hero_title_outline']); ?></span></h1>
    <div class="description">
        <?php echo htmlspecialchars($data['hero_description']); ?>
    </div>
    <div class="cta-group">
        <?php foreach ($data['hero_tags'] as $tag): ?>
            <span class="secondary-btn"><?php echo htmlspecialchars($tag); ?></span>
        <?php endforeach; ?>
    </div>
</section>

<div class="space"></div>

<section class="reveal">
    <h2><?php echo htmlspecialchars($data['problem_title_text']); ?> <span class="text-outline"><?php echo htmlspecialchars($data['problem_title_outline']); ?></span></h2>
    <div class="description">
        <?php echo $data['problem_description']; ?>
    </div>
</section>

<div class="space"></div>

<section class="reveal">
    <h2><?php echo htmlspecialchars($data['solution_title_text']); ?> <span class="text-outline"><?php echo htmlspecialchars($data['solution_title_outline']); ?></span></h2>
    <div class="description">
        <?php echo $data['solution_description']; ?>
    </div>
</section>

<div class="space"></div>

<section class="reveal">
    <h2><?php echo htmlspecialchars($data['outcome_title_text']); ?> <span class="text-outline"><?php echo htmlspecialchars($data['outcome_title_outline']); ?></span></h2>
    <div class="description">
        <?php echo $data['outcome_description']; ?>
    </div>
    <div class="cta-group" style="margin-top: 3rem;">
        <button class="primary-btn" onclick="window.close()"><?php echo htmlspecialchars($data['outcome_back_btn']); ?></button>
    </div>
</section>

<div class="space"></div>

<?php

View::endSection('content');
?>
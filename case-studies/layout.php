<?php

$data = load_data()['case_studies'];
View::startSection('head');
?>

<style>
    .space {
        height: 150px;
    }

    nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 2rem clamp(1.5rem, 5vw, 4rem);
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .nav-logo {
        font-family: 'Montserrat', sans-serif;
        font-size: 1.2rem;
        font-weight: 900;
        color: var(--text);
        text-decoration: none;
    }

    .nav-logo span {
        color: var(--accent);
    }

    section {
        padding: 4rem clamp(1.5rem, 5vw, 4rem);
    }
</style>

<?php View::startSection('nav') ?>
<nav>
    <a href="<?= add_lang_to_uri('/') ?>" class="nav-logo"><?php echo htmlspecialchars($data['nav_logo']); ?><span>.</span></a>
    <a href="mailto:lucienozandry4@gmail.com" class="secondary-btn"><?php echo htmlspecialchars($data['nav_hire']); ?></a>
</nav>
<?php View::endSection('nav') ?>

<?php

View::endSection('head');
include get_safe_path('components/ui/layout/layout.php');

?>
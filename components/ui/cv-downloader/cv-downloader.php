<?php
$data = load_data()['common'];

function generate_cv_link()
{
    $lang = load_lang();
    return "/storage/public/assets/lucieno-zandry.resume.{$lang}.pdf";
}
?>

<a href="<?= generate_cv_link() ?>" download="<?= generate_cv_link() ?>" class="cv-download-floating" aria-label="Download CV">
    <svg class="download-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
        <polyline points='7 10 12 15 17 10'></polyline>
        <line x1="12" y1="15" x2="12" y2="3"></line>
    </svg>
    <span class="cv-text cv-text-long"><?= $data['download_cv'] ?></span>
    <span class="cv-text cv-text-short">CV</span>
</a>
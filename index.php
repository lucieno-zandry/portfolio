<?php
View::extends('components/ui/layout/layout');
View::section('title', 'Lucieno Zandry - Portfolio');

View::startSection('head');
?>

<!-- gsap -->
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollToPlugin.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/MotionPathPlugin.min.js"
    integrity="sha512-lhK7xTsFM6DPXOtQQyPe+NmpoFEheKDHjM/5QzpFRiE1KySgtBfEzYz4XowvB+CAWcBLBGWinhh41uNaOtrSZA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php 

View::endSection('head');

View::startSection('content');

include('./components/sections/hero/hero.php');
include('./components/sections/engineering-manifesto/engineering-manifesto.php');
include('./components/sections/gallery/gallery.php');
include('./components/sections/timeline/timeline.php');
include('./components/sections/contact/contact.php');

View::endSection('content');
?>

<?php View::startSection('head'); ?>
<script>
    console.clear();
    gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);
    ScrollTrigger.config({
        ignoreMobileResize: true,
    });

    const updateViewportHeight = () => {
        const height = window.visualViewport ? window.visualViewport.height : window.innerHeight;
        document.documentElement.style.setProperty("--app-vh", `${height * 0.01}px`);
    };

    updateViewportHeight();
    window.addEventListener("resize", updateViewportHeight);
    window.visualViewport?.addEventListener("resize", updateViewportHeight);

    document.addEventListener("DOMContentLoaded", () => {
        ScrollTrigger.refresh();
    });
</script>
<?php View::endSection('head'); ?>
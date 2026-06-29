<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucieno Zandry - Portfolio</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="./styles/reset.css">
    <link rel="stylesheet" href="./components/sections/hero/hero.css">
    <link rel="stylesheet" href="./components/sections/engineering-manifesto/engineering-manifesto.css">
    <link rel="stylesheet" href="./components/sections/gallery/gallery.css">
    <link rel="stylesheet" href="./components/sections/timeline/timeline.css">
    <link rel="stylesheet" href="./components/sections/contact/contact.css">

    <!-- gsap -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollToPlugin.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/MotionPathPlugin.min.js"
        integrity="sha512-lhK7xTsFM6DPXOtQQyPe+NmpoFEheKDHjM/5QzpFRiE1KySgtBfEzYz4XowvB+CAWcBLBGWinhh41uNaOtrSZA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <?php include('./components/sections/hero/hero.php')  ?>
    <?php include('./components/sections/engineering-manifesto/engineering-manifesto.php')  ?>
    <?php include('./components/sections/gallery/gallery.php')  ?>
    <?php include('./components/sections/timeline/timeline.php')  ?>
    <?php include('./components/sections/contact/contact.php')  ?>

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

    <script src="./components/sections/hero/hero.js"></script>
    <script src="./components/sections/engineering-manifesto/engineering-manifesto.js"></script>
    <script src="./components/sections/gallery/gallery.js"></script>
    <script src="./components/sections/timeline/timeline.js"></script>
    <script src="./components/sections/contact/contact.js"></script>
    <script src="./index.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucieno zandry</title>
    <link rel="shortcut icon" href="./assets/icon.png" type="image">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- gsap -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollToPlugin.min.js"></script>

    <!-- custom styles -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- components -->
    <?php include './partials/header/header.php' ?>
    <?php include './partials/horizontal_slide/horizontal_slide.php' ?>
    <?php include './partials/image_description_scroll/image_description_scroll.php' ?>
    <?php include './partials/timeline/timeline.php' ?>
    <?php include './partials/image_layer/image_layer.php' ?>
    <?php include './partials/contact/contact.php' ?>

    <!-- components script -->
    <script src="./libs/gsap/ScrollTrigger.min.js"></script>
    <script src="./libs/gsap/ScrollToPlugin.min.js"></script>
    <script src="./libs/gsap/gsap.min.js"></script>
    <script src="./libs/gsap/MotionPathPlugin.min.js"></script>
    <script>
        console.clear();
        gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);
        ScrollTrigger.refresh();

        document.addEventListener("DOMContentLoaded", () => {
            <?php include './partials/horizontal_slide/horizontal_slide.js.php' ?>
            <?php include './partials/image_description_scroll/image_description_scroll.js.php' ?>
            <?php include './partials/timeline/timeline.js.php' ?>
            <?php include './partials/image_layer/image_layer.js.php' ?>
        })
    </script>
</body>

</html>
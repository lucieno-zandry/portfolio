    <!DOCTYPE html>
    <html lang="<?= load_lang();  ?>">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= View::yield('title') ?></title>

        <link rel="stylesheet" href="/components/ui/layout/layout.css">
        <link rel="stylesheet" href="/components/ui/layout/reset.css">
        <link rel="stylesheet" href="/components/ui/lang-selector/lang-selector.css">
        <link rel="stylesheet" href="/components/ui/cv-downloader/cv-downloader.css">
        <link rel="shortcut icon" href="/assets/icon.png" type="image/png">

        <?= View::yield('head') ?>
    </head>

    <body>
        <?= View::yield('nav') ?>
        <?= View::yield('content') ?>

        <?php include('./components/ui/lang-selector/lang-selector.php')  ?>
        <?php include('./components/ui/cv-downloader/cv-downloader.php')  ?>

        <?= View::yield('script') ?>

        <script src="/components/ui/layout/layout.js"></script>
    </body>

    </html>
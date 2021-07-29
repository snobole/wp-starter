<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1"/>
    <?php
    wp_head();
    ?>
</head>
<body>
<main>
    <div class="md:flex min-h-screen">
        <div class="w-full md:w-1/2 flex items-center justify-center">
            <div class="max-w-sm m-8">
                <div class="text-5xl md:text-15xl text-secondary border-primary border-b">404</div>
                <div class="w-16 h-1 bg-red- my-3 md:my-6"></div>
                <p class="text-gray-800 text-2xl md:text-3xl font-light mb-8">Sorry, the content you are looking for could not be found.</p>
                <a href="<?=site_url()?>" class="bg-secondary px-4 py-2 rounded text-white">
                    Go Home
                </a>
            </div>
        </div>
    </div>
</main>
<?php
wp_footer();
?>
</body>
</html>
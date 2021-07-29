<?php
get_header();
?>
    <section class="w-full pt-32 pb-16 bg-gray-100">
        <div class="max-w-6xl mx-auto px-6 sm:px-0">
            <h4 class="text-3xl text-primary font-bold mb-6"><?=get_the_title()?></h4>
        </div>
    </section>

    <section class="w-full py-16">
        <div class="max-w-6xl mx-auto px-6 sm:px-0">
            <?php
            while (have_posts()):
                the_post();
                ?>
                    <div>
                        <?php
                        the_content();
                        ?>
                    </div>
            <?php
            endwhile;
            ?>
        </div>
    </section>
<?php
get_footer();
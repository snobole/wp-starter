<?php
get_header();
?>
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
            <?php get_template_part('/template-parts/pagination') ?>
        </div>
    </section>
<?php
get_footer();
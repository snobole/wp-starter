<?php
get_header();
    ?>
    <section class="w-full py-32">
        <div class="max-w-6xl mx-auto px-6 sm:px-0">
        <?php if (have_posts()): ?>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php
                while (have_posts()):
                    the_post();
                    ?>
                    <a href="<?=get_the_permalink()?>" class="space-y-3">
                        <?php if (get_the_post_thumbnail_url()): ?>
                        <div class="pb-2/3 relative">
                            <img src="<?=(get_the_post_thumbnail_url() ?? get_template_directory_uri().'/images/default.png')?>" alt="<?=get_the_title()?>" class="absolute w-full h-full object-cover">
                        </div>
                        <?php endif; ?>
                        <div>
                            <h4 class="text-xl text-secondary"><?= get_the_title();?></h4>
                        </div>
                        <div>
                            <p class="text-sm text-secondary font-bold">Read more &rarr;</p>
                        </div>
                    </a>
                <?php
                endwhile;
                ?>
            </div>
            <?php get_template_part('/template-parts/pagination') ?>
            <?php endif; ?>
        </div>
    </section>
get_footer();
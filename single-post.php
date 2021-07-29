<?php
/**
 * The template for displaying all single posts and attachments
 *
 */
get_header(); ?>
    <section class="relative">
        <div class="relative mx-auto">
            <?php
            // Start the loop.
            while ( have_posts() ) : the_post();
                ?>
                <div class="flex flex-wrap">
                    <div class="w-full sm:w-1/2 relative">
                        <div class="sticky top-0">
                            <div class="h-50 sm:h-screen bg-cover bg-no-repeat bg-center"
                                <?php if ($thumb = get_the_post_thumbnail_url()):?>
                                    style="background-image: url('<?=$thumb?>')"
                                <?php else:?>
                                    style="background-image: url('<?=get_template_directory_uri().'/images/default.png'?>')"
                                <?php endif?>
                            >

                            </div>
                        </div>
                    </div>

                    <div class="w-full sm:w-1/2 relative">
                        <div class="sticky h-0 z-0 top-0">
                            <div class="px-6 max-w-lg">
                                <h2 class="text-primary text-5xl sm:text-8xl font-bold leading-tight line-clamp-4"><?=get_the_title()?></h2>
                            </div>
                        </div>
                        <div class="p-6 bg-white bg-opacity-95 z-20 relative">
                            <div class="pr-1/5 space-y-3 leading-relaxed text-xl">
                                <a href="<?=site_url().'/blog'?>" class="block text-sm text-secondary font-bold">Return &larr;</a>
                                <h2 class="mb-6 font-sans text-3xl font-bold leading-relaxed tracking-tight text-primary sm:text-5xl md:mx-auto">
                                    <?=get_the_title()?>
                                </h2>
                                <div class="prose text-left text-gray-900">
                                    <?php the_content() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                // End the loop.
            endwhile;
            ?>
        </div>
    </section><!-- .content-area -->
<?php get_footer(); ?>
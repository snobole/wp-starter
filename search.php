<?php get_header();?>
    <section class="w-full py-32">
    <div class="max-w-6xl mx-auto px-6 sm:px-0 space-y-12">
        <header class="page-header">
            <h3 class="text-3xl font-bold leading-relaxed"><?php printf( __( 'Search Results for: %s', 'enkavilla' ), get_search_query() ); ?></h3>
        </header><!-- .page-header -->
                <?php if ( have_posts() ) : ?>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                    <?php
                    // Start the Loop.
                    while ( have_posts() ) : the_post();
                        ?>
                        <a href="<?=get_the_permalink()?>" class="space-y-3">
                            <div class="pb-2/3 relative">
                                <img
                                    <?php if ($thumb = get_the_post_thumbnail_url()):?>
                                        src="<?=$thumb?>"
                                    <?php else:?>
                                        src="<?=get_template_directory_uri().'/images/default.png'?>"
                                    <?php endif?>

                                        alt="<?=get_the_title()?>" class="absolute w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="text-xl text-secondary"><?= get_the_title();?></h4>
                            </div>
                            <div>
                                <p class="text-sm text-enkavilla-orange-base font-bold">Read more &rarr;</p>
                            </div>
                        </a>
                    <?php
                    endwhile;
                    ?>
        </div>
                <?php get_template_part('/template-parts/pagination') ?>
            <?php
                else :
                ?>
                    <h4 class="text-xl text-secondary"><?php printf( __( 'No Results for: %s', 'enkavilla' ), get_search_query() ); ?> </h4>
                <?php
                endif;
                ?>
    </div>
    </section>
<?php get_footer(); ?>
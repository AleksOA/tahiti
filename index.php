<?php
/**
 * Index
 */
get_header(); ?>
    <main class="main-content">
        <div class="grid-container">
            <div class="grid-x grid-margin-x posts-list">

                <div class="large-8 medium-8 small-12 cell">

                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post(); ?>

                            <article class="post">
                                <div class="grid-x grid-margin-x">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <div class="medium-4 small-12 cell text-center medium-text-left">
                                            <a href="<?php the_permalink();?>">
                                                <?php the_post_thumbnail( 'medium', array( 'class' => 'post__thumb' ) ); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="cell auto">
                                        <h3 class="preview__title">
                                            <a href="<?php the_permalink(); ?>"> <?php the_title() ?></a>
                                        </h3>
                                        <div class="post__excerpt">
                                            <?php the_excerpt();?>
                                        </div>
                                    </div>
                                </div>
                            </article>

                        <?php endwhile; ?>
                    <?php endif; ?>

                    <?php the_posts_pagination(); ?>

                </div>
            </div>
        </div>
    </main>
<?php get_footer(); ?>
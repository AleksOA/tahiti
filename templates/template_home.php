<?php
/*
  Template Name: Home
 */
?>
<?php get_header(); ?>
<main class="main-content">
    <section class="hero-slider">
        <?php hero_slider();?>
    </section>


    <?php $arg = array(
        'post_type' => 'islands',
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'posts_per_page' => - 1
    );
    $islands_posts  = new WP_Query( $arg );?>
    <section class="discover" id="discoverSec">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="discover__title-content section-title-content medium-10 large-6 small-12 cell">
                    <?php
                    $sections_title_discover = get_field('sections_title_discover');
                    if($sections_title_discover){echo $sections_title_discover;} ?>
                </div>
            </div>
            <div class="grid-x">
                <div class="cell">
                    <?php discover_slider($islands_posts); ?>
                </div>
            </div>
            <div class="grid-x grid-margin-x">
                <div class="medium-10 small-12 large-offset-1 cell">
                    <div class="discover__select">
                        <?php $explore_title_discover = get_field('explore_title_discover');
                            $button_name_discover = get_field('button_name_discover');

                        if($explore_title_discover):?>
                        <h4 class="discover__select-title"><?php echo $explore_title_discover;?></h4>
                        <?php endif; ?>
                        <?php if ( $islands_posts ->have_posts() ) : ?>
                        <div class="discover__select-form">
                            <select class="discover__select-select">
                                <option class="discover__select-option" data-link = "#"><?php echo esc_html__( 'Select an island', 'tahiti' ); ?></option>
                                <?php while ( $islands_posts->have_posts() ) : $islands_posts->the_post();?>
                                    <?php $link_island = get_field('link_island');?>
                                    <option class="discover__select-option" data-link =<?php echo ($link_island) ? $link_island : '#'?> ><?php the_title(); ?></option>
                                <?php endwhile; ?>
                            </select>
                        <?php endif; ?>
                            <a class="discover__select-button button-link button-link-secondary-color" href="#" target="_blank"><?php echo ($button_name_discover) ? $button_name_discover : esc_html__( 'EXPLORE', 'tahiti' );?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php  wp_reset_query(); ?>


    <?php $section_background_experience = get_field('section_background_experience');
    $background_url = $section_background_experience["url"];
    ?>
    <section class="experience" id="experienceSec" style='background-image: url("<?php echo $background_url;?>")'>
        <div class="grid-container">
            <div class="experience__wrapper grid-x grid-margin-x align-stretch">
                <div class="medium-8 large-7 xlarge-6 small-12 cell">
                    <?php $top_content_experience = get_field('top_content_experience');
                    if($top_content_experience): ?>
                        <div class="experience__top section-title-content"><?php echo $top_content_experience; ?> </div>
                    <?php endif; ?>
                </div>
                <div class="medium-8 small-12 medium-offset-2 cell">
                    <div class="experience__bottom">
                        <?php $bottom_content_experience = get_field('bottom_content_experience');
                        if($bottom_content_experience): ?>
                            <div class="experience__bottom-text"><?php echo $bottom_content_experience; ?></div>
                        <?php endif;
                        $button_name_experience = get_field('button_name_experience');?>
                        <button class="experience__bottom-button button-link button-link-primary-color" type="button"><?php echo ($button_name_experience) ? $button_name_experience : esc_html__( 'LEARN MORE', 'tahiti' );?></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <sections class="why" id="whySec">
        <div class="grid-container">

            <?php $section_title_why = get_field('section_title_why');
            if($section_title_why):?>
            <div class="grid-x grid-margin-x align-center text-center">
                <div class="cell small-12 medium-4">
                    <div class="why__title section-title-content">
                        <?php echo $section_title_why;?>
                    </div>
                </div>
            </div>
            <?php endif; ?>


            <?php if( have_rows('content_blocks_why') ): ?>
            <div class="why__contents grid-x grid-margin-x align-justify text-center">
                <?php while( have_rows('content_blocks_why') ) : the_row();
                    $content_block_why = get_sub_field('content_block_why'); ?>

                    <div class="small-12 medium-4 large-3  cell">
                        <div class="why__content">
                            <?php echo $content_block_why;?>
                        </div>
                    </div>

               <?php endwhile; ?>
           </div>
            <?php endif; ?>
        </div>
    </sections>


    <?php $section_background_why = get_field('section_background_why');
    $background_book_url = $section_background_why["url"];
    $content_book = get_field('content_book');
    $button_name_book = get_field('button_name_book'); ?>
    <section class="book" id="bookSec" style='background-image: url("<?php echo $background_book_url;?>")'>
        <div class="grid-container">
          <div class="grid-x grid-margin-x align-center text-center">
              <div class="book_wrapper call small-12 medium-10 ">
                <?php if($content_book): ?>
                    <div class="book__content"><?php echo $content_book; ?></div>
                    <?php endif; ?>
                    <button class="book__btn button-link button-link-secondary-color" type="button"><?php echo ($button_name_book) ? $button_name_book : 'BOOK NOW'?></button>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>

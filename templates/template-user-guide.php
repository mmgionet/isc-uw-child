<?php
/**
 * Template Name: User Guide
 *
 * Template that displays a user guide (step by step tutorials)
 * additionally with a table of contents automatically generated
 * from the headers
 *
 * @author Kevin Zhao <zhaok24@uw.edu>
 * @author Abhishek Chauhan <abhi3@uw.edu>
 */

get_header();
?>

<section class="uw-body container" id="toc">
    <div class="row">

        <?php get_template_part( 'menu', 'mobile' ); ?>
        <?php get_template_part( 'breadcrumbs' ); ?>
        <?php user_guide_menu(); ?>

        <article class="uw-content float-content col-lg-9">

            <?php
                while ( have_posts() ) : the_post();
                    the_title( '<h3 class="title">', '</h3>' );
                    the_content();
                endwhile
            ?>

        </article>


    </div>
</section>

<?php get_footer();
<?php
/**
 * Template Name: Article Section
 *
 * A full-width template, that displays the description of a specific article
 *
 * @author Abhishek Chauhan <abhi3@uw.edu>
 */

get_header();
?>

<?php uw_site_title(); ?>
<?php get_template_part( 'menu', 'mobile' ); ?>

<section class="uw-body container">

    <div class="row">
        <div class="col-md-12">
            <?php get_template_part( 'breadcrumbs' ); ?>
        </div>
    </div>

    <div class="row">

        <article class="uw-body-copy col-md-offset-1 col-md-10">

            xxxx this is an article section template xxxx

            <?php
            while ( have_posts() ) : the_post();
                the_title( '<h2 class="title">', '</h2>' );
                the_content();
                edit_post_link();
            endwhile;

            ?>
            <div>Last updated: <?php echo get_the_date() ?></div>
        </article>
        <aside  class="col-md-4">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac magna ut est fringilla venenatis quis vitae ex. Sed gravida est a lacinia molestie. In metus lectus, rutrum ut metus et, maximus posuere sem. Nam sit amet turpis facilisis ante interdum mollis at a leo. Nullam vel lorem mi. Donec sed lacinia orci. Proin in dignissim mi. Sed lectus neque, volutpat eu urna semper, feugiat ultrices eros. Sed facilisis, dolor vitae molestie laoreet, justo velit tempus velit, nec gravida est ipsum et ligula. Ut ultrices elit est, ut iaculis risus lacinia nec.
        </aside>
    </div>
</section>

<?php get_footer();

<?php get_header();
      $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
      $sidebar = get_post_meta($post->ID, "sidebar");
      $seasonal =  get_post_meta($post->ID); ?>

        <?php uw_site_title(); ?>
        <?php get_template_part('menu', 'mobile'); ?>

<div class="isc-admin-hero">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?php the_title(); ?></h2>

                <form role="search" method="get" id="searchform" class="searchform" action="<?php echo get_site_url() ?>">
                    <div>
                        <label class="screen-reader-text" for="s">Search for:</label>
                        <input type="text" value="" name="s" id="s" placeholder="Search for:" autocomplete="off">
                        <input type="submit" id="searchsubmit" value="Search">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<div class="container uw-body">

    <div class="row">
        <div class="col-md-12">
            <?php get_template_part('breadcrumbs'); ?>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8 uw-content isc-content" role='main'>

            <div id='main_content' class="uw-body-copy" tabindex="-1">

                <h3 class="isc-admin-header">Admins' News</h3>
                <div class="isc-admin-block">

                        <?php

                         $args = array(
                                  'tax_query' => array(
                                      array(
                                          'taxonomy' => 'location',
                                          'field'    => 'slug',
                                          'terms'    => 'admin-corner-news',
                                      ),
                                  ),
                                'post_status' => 'published');
                         $category_posts = new WP_Query($args);

                         if ($category_posts->have_posts()) :
                             while ($category_posts->have_posts()) :
                                 $category_posts->the_post();
                        ?>

                               <h4><?php the_title() ?></h4>
                               <div class="update-date"><?php echo get_the_date() ?> </div>
                               <div class='post-content'><?php the_excerpt() ?></div>
                        <?php
                             endwhile;
                            ?>
                            <a class="uw-btn btn-sm" href="<?php echo get_site_url() . '/news'?>">Read older news</a>
                    <?php
                        else:
                            echo "<p>No admin news available.</p>";
                        endif;
                        ?>

                  </div>

              </div>

            </div>

        <div class="col-md-4 uw-sidebar isc-sidebar" role="">

            <h3 class="isc-admin-header">Next Event</h3>
            <div class="contact-widget-inner isc-widget-tan isc-admin-block">
              <div class='post-content'>
                <?php
                $event = tribe_get_events(
                    array(
                    'posts_per_page' => 1,
                    'start_date' => date('Y-m-d H:i:s')
                    ) 
                );
                // if $event is an empty array then
                if (empty($event)) {
                    echo "No events found.";
                } else {
                    $current = $event[0];
                    $title = $current->post_title;
                    $html = '<h4><a href="' . get_post_permalink($current->ID) . '">' . $title . '</a> </h4>';
                    $html .= "<p>" . tribe_get_start_date($current) . "</p>";
                    if (tribe_has_venue($current->ID)) {
                        $details = tribe_get_venue_details($current->ID);
                        //log_to_console($details);
                        $html .= "<p>" . $details["linked_name"] . "</p>";
                        $html .= $details["address"];
                    } else {
                        $html .= "<p>Location to be determined.</p>";
                    }
                    $html .= "<p>" . $current->post_excerpt . "</p>";
                    echo $html;
                }
                ?>
                 </div>

                 <a class="uw-btn btn-sm" href="<?php echo get_site_url() . "/events"?>">See all Events</a>
            </div>


            <h3 class="isc-admin-header">Seasonal Topics</h3>
            <div class="contact-widget-inner isc-widget-white isc-admin-block">
                <div class='post-content'>
                  <p><?php get_seasonal_description(); ?></p>
                </div>
                <a class="uw-btn btn-sm" href="<?php echo get_site_url() . "/seasonal-topics"?>">See all Topics</a>
            </div>

            <h3 class="isc-admin-header">Workday Support</h3>
            <div class="contact-widget-inner isc-widget-gray isc-admin-block">
                    <?php
                    support_quicklinks();
                    ?>
            </div>

            <h3 class="isc-admin-header">Workday Resources</h3>
            <div class="contact-widget-inner isc-widget-white isc-admin-block">
                    <?php
                    resource_quicklinks();
                    ?>
            </div>

        </div>

    </div>

</div>

<?php get_footer(); ?>

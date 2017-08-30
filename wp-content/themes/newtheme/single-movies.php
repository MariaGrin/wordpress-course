<?php

locate_template('includes/wp_booster/td_single_template_vars.php', true);

get_header();

global $loop_module_id, $loop_sidebar_position, $post, $td_sidebar_position;

$td_mod_single = new td_module_single($post);

?>
<div class="td-main-content-wrap td-container-wrap">

    <div class="td-container td-post-template-default <?php echo $td_sidebar_position; ?>">
        <div class="td-crumb-container"><?php echo td_page_generator::get_single_breadcrumbs($td_mod_single->title); ?></div>

        <div class="td-pb-row">
            <?php

            //the default template
            switch ($loop_sidebar_position) {
                default: //sidebar right
					?>
                        <div class="td-pb-span8 td-main-content" role="main">
                            <div class="td-ss-main-content">
                                <?php
                                locate_template('loop-single.php', true);
                                comments_template('', true);
                                ?>
                            </div>
                        </div>
                        <div class="td-pb-span4 td-main-sidebar" role="complementary">
                            <div class="td-ss-main-sidebar">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                    <?php
                    break;

                case 'sidebar_left':
                    ?>
                        <div class="td-pb-span8 td-main-content <?php echo $td_sidebar_position; ?>-content" role="main">
                            <div class="td-ss-main-content">
                                <?php
                                locate_template('loop-single.php', true);
                                comments_template('', true);
                                ?>
                            </div>
                        </div>
		                <div class="td-pb-span4 td-main-sidebar" role="complementary">
			                <div class="td-ss-main-sidebar">
				                <?php get_sidebar(); ?>
			                </div>
		                </div>
                    <?php
                    break;

                case 'no_sidebar':
                    td_global::$load_featured_img_from_template = 'td_980x0';
                    ?>
                        <div class="td-pb-span12 td-main-content" role="main">
                            <div class="td-ss-main-content">
                                <?php
                                locate_template('loop-single.php', true);
                                comments_template('', true);
                                ?>
                            </div>
                        </div>
                    <?php
                    break;

            }
            ?>
        </div> <!-- /.td-pb-row -->
    </div> <!-- /.td-container -->
</div> <!-- /.td-main-content-wrap -->

<?php
//wp_list_categories();
the_excerpt();


$args = array(
    'post_type' => 'movies',
    'posts_per_page' => 10,
);
$the_query = new WP_Query( $args );

?>

<?php if ( $the_query->have_posts() ): ?>
    <?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>
        <h2><?php the_title(); ?></h2>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
        <?php wp_reset_postdata(); ?>
    <?php endwhile ?>
<?php else: ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif ?>





<?php
get_footer();

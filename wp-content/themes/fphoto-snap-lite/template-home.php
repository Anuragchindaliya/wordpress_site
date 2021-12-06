<?php
/**
 * @package fphoto snap lite
 */
?>
<?php
$boxvariable = array();
for ($k = 1; $k <= 3; $k++) {
    ?>
    <?php $boxid    = absint(get_theme_mod('fphoto_snap_lite_box' . $k)); ?>
    <?php $boxquery = new WP_query('page_id=' . $boxid); ?>
    <?php
    if ($boxquery->have_posts() && $boxid > 0) :
        while ($boxquery->have_posts()) : $boxquery->the_post();
            $thumbnail_id  = get_post_thumbnail_id($post->ID);
            $alt           = esc_html(get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true));
            $image         = esc_url(get_the_post_thumbnail_url($post->ID, 'fphoto-snap-lite-home-box-size'));
            $title         = esc_html(get_the_title($post->ID));
            $my_postid     = $post->ID;
            $content       = esc_html(fphoto_snap_lite_get_excerpt($my_postid, '250'));
            $url           = esc_url(get_the_permalink($my_postid));
            $boxvariable[] = array('boxid' => $post->ID, 'boximage' => $image, 'alt' => $alt, 'box_title' => $title, 'box_content' => $content, 'url' => $url);
        endwhile;
        wp_reset_postdata();
    endif;
    ?>

<?php } ?>
<section style="background-color:#ffffff; " id="pageboxes">
    <div class="container">
        <div class="pageclmn fadeInRight">

            <?php foreach ($boxvariable as $boxvariables) { ?>
                <div class="threebox">
                    <a href="<?php echo esc_url($boxvariables['url']); ?>">
                        <div class="thumbbx img-responsive img-thumbnail"><img alt="<?php echo esc_attr($boxvariables['alt']); ?>" src="<?php echo esc_url($boxvariables['boximage']); ?>"></div>
                    </a>
                    <div class="mainresourcebox">
                        <div class="top-resourcebox">
                            <a href="<?php echo esc_url($boxvariables['url']); ?>"><h3><?php echo esc_html($boxvariables['box_title']); ?></h3> </a>
                        </div><!--top-resourcebox-->
                        <div class="resourcebox"><p><?php
                                $boxid = esc_html($boxvariables['boxid']);
                                echo esc_html(fphoto_snap_lite_get_excerpt($boxid, 150));
                                ?></p>
                            <div class="resourcebutton"><a class="rdmore" href="<?php echo esc_url($boxvariables['url']); ?>"><?php echo esc_html__('Read More', 'fphoto-snap-lite') ?> &nbsp; &nbsp; <i class="fa fa-angle-double-right"></i></a></div><!--resourcebutton-->
                        </div>
                    </div><!--mainresourcebox-->
                </div>
            <?php } ?>

        </div><!-- middle-align -->
        <div class="clear"></div>
    </div><!-- container -->
</section>
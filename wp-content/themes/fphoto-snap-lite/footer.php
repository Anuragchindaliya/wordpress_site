<?php
/**
 * footer Template.
 *
 * @package fphoto-snap-lite
 */
?>
<?php
$fphoto_snap_lite_copyright = get_theme_mod('fphoto_snap_lite_copyright');
$fphoto_snap_lite_design    = get_theme_mod('fphoto_snap_lite_design');
?>
<?php if ($fphoto_snap_lite_copyright || $fphoto_snap_lite_design) { ?>
    <div class="footer-bottom">

        <div class="container">

            <div class="row">
                <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                    <div class="copyright text-center">


                        <?php if (get_theme_mod('fphoto_snap_lite_copyright')) { ?>
                            <?php echo esc_html($fphoto_snap_lite_copyright); ?>
                        <?php } ?>         
                    </div><!--copyright-->

                </div>
                
                <div class="col-sm-12 col-lg-12 col-md-12 col-xs-12">

                    <div class="design text-center">

                        <?php if (get_theme_mod('fphoto_snap_lite_design')) { ?>
                            <?php echo esc_html($fphoto_snap_lite_design); ?>
                        <?php } ?>

                    </div><!--design-->

                </div><!--col-sm-6-->

                



            </div><!--row-->

        </div><!--container-->

    </div><!--footer-bottom-->
    <?php
}?>
<?php wp_footer(); ?>
</body>
</html>
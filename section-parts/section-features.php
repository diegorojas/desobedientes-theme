<?php
$id       = get_theme_mod( 'onepress_features_id', esc_html__('features', 'onepress') );
$disable  = get_theme_mod( 'onepress_features_disable' ) == 1 ? true : false;
$title    = get_theme_mod( 'onepress_features_title', esc_html__('Features', 'onepress' ));
$subtitle = get_theme_mod( 'onepress_features_subtitle', esc_html__('Why choose Us', 'onepress' ));
if ( onepress_is_selective_refresh() ) {
    $disable = false;
}
$data  = onepress_get_features_data();
if ( !$disable && !empty( $data ) ) {
    $desc = get_theme_mod( 'onepress_features_desc' );
?>
<?php if ( ! onepress_is_selective_refresh() ){ ?>
<section id="<?php if ( $id != '') echo $id; ?>" <?php do_action('onepress_section_atts', 'features'); ?>
         class="<?php echo esc_attr(apply_filters('onepress_section_class', 'section-features section-padding section-meta onepage-section', 'features')); ?>">
<?php } ?>
    <?php do_action('onepress_section_before_inner', 'features'); ?>
    <div class="container">
        <?php if ( $title ||  $subtitle || $desc ){ ?>
        <div class="section-title-area">
            <?php if ($subtitle != '') echo '<h5 class="section-subtitle">' . esc_html($subtitle) . '</h5>'; ?>
            <?php if ($title != '') echo '<h2 class="section-title">' . esc_html($title) . '</h2>'; ?>
        </div>
        <?php } ?>
        <div class="section-content">
            <div class="row">
            <?php
            $layout = intval( get_theme_mod( 'onepress_features_layout', 3 ) );
            foreach ( $data as $k => $f ) {
                $media = '';
                $f =  wp_parse_args( $f, array(
                    'icon_type' => 'icon',
                    'icon' => 'gg',
                    'image' => '',
                    'link' => '',
                    'title' => '',
                    'desc' => '',
                ) );
                if ( $f['icon_type'] == 'image' && $f['image'] ){
                    $url = onepress_get_media_url( $f['image'] );
                    if ( $url ) {
                        $media = '<span class="icon-image"><img src="'.esc_url( $url ).'" alt=""></span>';
                    }
                } else if ( $f['icon'] ) {
                    $f['icon'] = trim( $f['icon'] );
                    if ($f['icon'] != '' && strpos($f['icon'], 'fa-') !== 0) {
                        $f['icon'] = 'fa-' . $f['icon'];
                    }
                    $media = '<span class="fa-stack fa-5x"><i class="fa fa-circle fa-stack-2x icon-background-default"></i> <i class="feature-icon fa '.esc_attr( $f['icon'] ).' fa-stack-1x"></i></span>';
                }

                ?>
                <div class="feature-item col-lg-<?php echo esc_attr( $layout ); ?> col-sm-6 wow slideInUp">
                    <div class="feature-media">
                        <?php if ( $f['link'] ) { ?><a href="<?php echo esc_url( $f['link']  ); ?>"><?php } ?>
                        <?php echo $media; ?>
                        <?php if ( $f['link'] )  { ?></a><?php } ?>
                    </div>
                    <h4><?php if ( $f['link'] ) { ?><a href="<?php echo esc_url( $f['link']  ); ?>"><?php } ?><?php echo esc_html( $f['title'] ); ?><?php if ( $f['link'] )  { ?></a><?php } ?></h4>
                    <div><?php echo wp_kses_post( $f['desc'] ); ?></div>
                </div>
            <?php
            }// end loop featues

            ?>
            </div>
            <div class="section-title-area">
            <?php if ( $desc ) {
                echo '<div class="section-desc">' . apply_filters( 'the_content', wp_kses_post( $desc ) ) . '</div>';
            } ?>

                <a id="featured-link" class="btn btn-theme-primary btn-lg" href="https://desobedientes.com.br/loja/?add-to-cart=681" alt="add to cart">Associe-se</a>
            </div>
        </div>
    </div>
    <?php do_action('onepress_section_after_inner', 'features'); ?>

<?php if ( ! onepress_is_selective_refresh() ){ ?>
</section>
<?php } ?>
<?php } ?>
<?php

// Altera a função do footer, originalmente no arquivo inc/template-tags.php

if ( ! function_exists( 'onepress_footer_site_info' ) ) {
    /**
     * Add Copyright and Credit text to footer
     * @since 1.1.3
     */
    function onepress_footer_site_info()
    {
        ?>
        <?php $onepress_footer_text = get_theme_mod( 'onepress_footer_text', esc_html__('', 'onepress') );?>
            <?php if ( $onepress_footer_text != '' ) echo '<div class="footer-info-left">' . esc_html( $onepress_footer_text) . '</div><br>'; ?>
        <?php printf(esc_html__('%1$s %3$s %2$s', 'onepress'), '&copy;', esc_attr(date('Y')), esc_attr(get_bloginfo())); ?>
        <span class="sep"> &ndash; </span>
        <?php printf(esc_html__('Desenvolvido com %1$s', 'onepress'), '<a href="' . esc_url('https://br.wordpress.org', 'onepress') . '">WordPress</a>'); ?>
        <?php
    }
}
add_action( 'onepress_footer_site_info', 'onepress_footer_site_info' );
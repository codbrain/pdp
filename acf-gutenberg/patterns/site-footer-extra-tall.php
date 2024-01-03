<?php
/**
 * Title: Tall site footer
 * Slug: jace/site-footer-extra-tall
 * Categories: jace-site-footer
 * Keywords: site footer
 * Block Types: core/site-title, core/navigation
 *
 * @package jace
 * @since 1.0.4
 */

?>
<!-- wp:separator {"color":"secondary","align":"full","className":"is-style-wide"} -->
<hr class="wp-block-separator alignfull has-text-color has-background has-secondary-background-color has-secondary-color is-style-wide"/>
<!-- /wp:separator -->
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"bottom":"0px"}}}} -->
<div class="wp-block-columns alignwide" style="margin-bottom:0px"><!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:site-logo {"width":80,"className":"is-style-rounded"} /-->

<!-- wp:heading -->
<h2 class="wp-block-heading"><?php echo esc_html_x( 'About', 'sample content', 'jace' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"textColor":"primary"} -->
<p class="has-primary-color has-text-color"><?php echo esc_html_x( 'Add information about you, your business or your website.', 'sample content', 'jace' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size"><?php echo esc_html_x( 'Contact', 'sample content', 'jace' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><?php echo esc_html_x( 'example@example.com', 'sample email', 'jace' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"fontSize":"medium"} -->
<h2 class="wp-block-heading has-medium-font-size"><?php echo esc_html_x( 'Footer sub-heading', 'sample content', 'jace' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><a href="#"><?php echo esc_html_x( 'Add a list of links to your most important content or categories here.', 'sample content', 'jace' ); ?></a></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><a href="#"><?php echo esc_html_x( 'Item 2', 'sample content', 'jace' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><a href="#"><?php echo esc_html_x( 'Item 3', 'sample content', 'jace' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"fontSize":"medium"} -->
<h2 class="wp-block-heading has-medium-font-size"><?php echo esc_html_x( 'Footer sub-heading', 'sample content', 'jace' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><a href="#"><?php echo esc_html_x( 'Add a list of links to your most important content or categories here.', 'sample content', 'jace' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><a href="#"><?php echo esc_html_x( 'Item 2', 'sample content', 'jace' ); ?></a></p><!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><a href="#"><?php echo esc_html_x( 'Item 3', 'sample content', 'jace' ); ?></a></p><!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"fontSize":"medium"} -->
<h2 class="wp-block-heading has-medium-font-size"><?php echo esc_html_x( 'Our newest product', 'sample content', 'jace' ); ?></h2><!-- /wp:heading -->

<!-- wp:woocommerce/product-new {"columns":1,"rows":1,"alignButtons":true,"contentVisibility":{"title":true,"price":true,"rating":false,"button":true}} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:separator {"color":"secondary","align":"full","className":"is-style-wide"} -->
<hr class="wp-block-separator alignfull has-text-color has-background has-secondary-background-color has-secondary-color is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
<!-- wp:navigation {"overlayMenu":"never","overlayBackgroundColor":"background","overlayTextColor":"foreground","align":"wide","layout":{"type":"flex","justifyContent":"left","orientation":"horizontal"},"fontSize":"extra-small"} /-->
<!-- wp:pattern {"slug":"jace/footer-links-wide"} /-->
</div>
<!-- /wp:group -->

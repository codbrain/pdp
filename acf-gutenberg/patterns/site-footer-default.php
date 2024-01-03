<?php
/**
 * Title: Default site footer
 * Slug: jace/site-footer-default
 * Categories: jace-site-footer
 * Keywords: site footer
 * Block Types: core/site-title, core/navigation
 *
 * @package jace
 * @since 1.0.4
 */

?>
<!-- wp:separator {"color":"secondary","align":"full","className":"is-style-wide"} -->
<hr	class="wp-block-separator alignfull has-text-color has-background has-secondary-background-color has-secondary-color is-style-wide" />
<!-- /wp:separator -->
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|60"}}},"layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60)">
<!-- wp:navigation {"overlayMenu":"never","overlayBackgroundColor":"background","overlayTextColor":"foreground","layout":{"type":"flex","justifyContent":"left","orientation":"horizontal"},"fontSize":"extra-small"} /-->
<!-- wp:pattern {"slug":"jace/footer-links"} /-->
</div>
<!-- /wp:group -->

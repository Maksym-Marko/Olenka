<?php
/**
 * Title: Footer
 * Slug: olenka/footer
 * Description:
 * Categories: footer, columns
 * Keywords: footer
 * Block Types: core/template-part/footer
 * Inserter: true
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xx-large","bottom":"var:preset|spacing|large","right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|x-large"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"main","textColor":"base","className":"dark-footer","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull dark-footer has-base-color has-main-background-color has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--xx-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|x-large","left":"var:preset|spacing|x-large"},"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-columns alignwide" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"var:preset|spacing|large"}}} -->
<div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:site-logo /-->

<!-- wp:paragraph {"textColor":"light","fontSize":"xx-small"} -->
<p class="has-light-color has-text-color has-xx-small-font-size"><?php echo esc_html__( 'Please connect our social media resources to stay in touch and receive all the recent info about Olenka Theme Starter Kit. Thank you for being part of Olenka’s community!', 'olenka' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"main","iconColorValue":"#4c40d4","iconBackgroundColor":{"color":"#ffffff","name":"Light","slug":"light","class":"has-light-icon-background-color"},"iconBackgroundColorValue":"#ffffff","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"var:preset|spacing|large","right":"0","bottom":"0","left":"0"}}},"className":"is-style-default","layout":{"type":"flex","justifyContent":"left","flexWrap":"wrap"}} -->
<ul class="wp-block-social-links has-icon-color has-icon-background-color is-style-default" style="margin-top:var(--wp--preset--spacing--large);margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:social-link {"url":"<?php echo esc_url( 'https://twitter.com/#' ); ?>","service":"twitter"} /-->

<!-- wp:social-link {"url":"<?php echo esc_url( 'https://instagram.com/#' ); ?>","service":"instagram"} /-->

<!-- wp:social-link {"url":"<?php echo esc_url( 'https://www.linkedin.com/in/maksym-marko/' ); ?>","service":"linkedin"} /-->

<!-- wp:social-link {"url":"<?php echo esc_url( 'https://facebook.com/#' ); ?>","service":"facebook"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"0"}}} -->
<div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:columns {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":{"top":"0","left":"0"}}}} -->
<div class="wp-block-columns" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"var:preset|spacing|mini"}}} -->
<div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"textColor":"light","fontSize":"x-small"} -->
<p class="has-light-color has-text-color has-x-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:600"><?php echo __( 'Olenka Theme Starter Kit', 'olenka' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"var:preset|spacing|mini","bottom":"0"}}},"textColor":"main-accent","layout":{"type":"constrained"},"fontSize":"small"} -->
<div class="wp-block-group has-main-accent-color has-text-color has-small-font-size" style="margin-top:var(--wp--preset--spacing--mini);margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"var:preset|spacing|mini","left":"0"}}},"textColor":"light","fontSize":"xx-small"} -->
<p class="has-light-color has-text-color has-xx-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:var(--wp--preset--spacing--mini);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php printf( esc_html__( '%s', 'olenka' ), '<a href="' . esc_url( '#' ) . '">' . __( 'Features', 'olenka' ) . '</a>' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"var:preset|spacing|mini","left":"0"}}},"textColor":"light","fontSize":"xx-small"} -->
<p class="has-light-color has-text-color has-xx-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:var(--wp--preset--spacing--mini);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php printf( esc_html__( '%s', 'olenka' ), '<a href="' . esc_url( '#' ) . '">' . __( 'Patterns', 'olenka' ) . '</a>' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"var:preset|spacing|mini","left":"0"}}},"textColor":"light","fontSize":"xx-small"} -->
<p class="has-light-color has-text-color has-xx-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:var(--wp--preset--spacing--mini);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php printf( esc_html__( '%s', 'olenka' ), '<a href="' . esc_url( '#' ) . '">' . __( 'Pricing', 'olenka' ) . '</a>' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"var:preset|spacing|mini","left":"0"}}},"textColor":"light","fontSize":"xx-small"} -->
<p class="has-light-color has-text-color has-xx-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:var(--wp--preset--spacing--mini);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php printf( esc_html__( '%s', 'olenka' ), '<a href="' . esc_url( '#' ) . '">' . __( 'Reliability', 'olenka' ) . '</a>' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"var:preset|spacing|mini","left":"0"}}},"textColor":"light","fontSize":"xx-small"} -->
<p class="has-light-color has-text-color has-xx-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:var(--wp--preset--spacing--mini);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php printf( esc_html__( '%s', 'olenka' ), '<a href="' . esc_url( '#' ) . '">' . __( 'Articles', 'olenka' ) . '</a>' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"var:preset|spacing|mini"}}} -->
<div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"textColor":"light","fontSize":"x-small"} -->
<p class="has-light-color has-text-color has-x-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:600"><?php echo __( 'Templates', 'olenka' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"textColor":"main-accent","layout":{"type":"constrained"},"fontSize":"small"} -->
<div class="wp-block-group has-main-accent-color has-text-color has-small-font-size"><!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"var:preset|spacing|mini","left":"0"}}},"textColor":"light","fontSize":"xx-small"} -->
<p class="has-light-color has-text-color has-xx-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:var(--wp--preset--spacing--mini);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php printf( esc_html__( '%s', 'olenka' ), '<a href="' . esc_url( '#' ) . '">' . __( 'Front Page', 'olenka' ) . '</a>' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"var:preset|spacing|mini","left":"0"}}},"textColor":"light","fontSize":"xx-small"} -->
<p class="has-light-color has-text-color has-xx-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:var(--wp--preset--spacing--mini);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php printf( esc_html__( '%s', 'olenka' ), '<a href="' . esc_url( '#' ) . '">' . __( 'Archive', 'olenka' ) . '</a>' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"var:preset|spacing|mini","left":"0"}}},"textColor":"light","fontSize":"xx-small"} -->
<p class="has-light-color has-text-color has-xx-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:var(--wp--preset--spacing--mini);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php printf( esc_html__( '%s', 'olenka' ), '<a href="' . esc_url( '#' ) . '">' . __( 'Single Article', 'olenka' ) . '</a>' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"var:preset|spacing|mini","left":"0"}}},"textColor":"light","fontSize":"xx-small"} -->
<p class="has-light-color has-text-color has-xx-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:var(--wp--preset--spacing--mini);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php printf( esc_html__( '%s', 'olenka' ), '<a href="' . esc_url( '#' ) . '">' . __( 'Single page', 'olenka' ) . '</a>' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"var:preset|spacing|mini","left":"0"}}},"textColor":"light","fontSize":"xx-small"} -->
<p class="has-light-color has-text-color has-xx-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:var(--wp--preset--spacing--mini);margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php printf( esc_html__( '%s', 'olenka' ), '<a href="' . esc_url( '#' ) . '">' . __( 'Page 404', 'olenka' ) . '</a>' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:separator {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|large","bottom":"0"}}},"backgroundColor":"light","className":"is-style-separator-dotted is-style-default"} -->
<hr class="wp-block-separator alignwide has-text-color has-light-color has-alpha-channel-opacity has-light-background-color has-background is-style-separator-dotted is-style-default" style="margin-top:var(--wp--preset--spacing--large);margin-bottom:0"/>
<!-- /wp:separator -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"0","margin":{"top":"var:preset|spacing|large","bottom":"0"}}}} -->
<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--large);margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|main-accent"}}}},"textColor":"main-accent","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group has-main-accent-color has-text-color has-link-color" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"textColor":"light","fontSize":"xxx-small"} -->
<p class="has-light-color has-text-color has-xxx-small-font-size"><?php
printf(
    esc_html__( '© Copyright 2023 | Olenka Theme Starter Kit by %s %s', 'olenka' ),
    '<a href="' . esc_url( 'https://markomaksym.com.ua/' ) . '" target="_blank" rel="noreferrer noopener">Maksym Marko</a>',
    __( '| All rights reserved | Powered by WordPress', 'olenka' )
)
?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"small"} -->
<div class="wp-block-group has-small-font-size"><!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"light","style":{"spacing":{"padding":{"top":"var:preset|spacing|mini","bottom":"var:preset|spacing|mini","left":"var:preset|spacing|large","right":"var:preset|spacing|large"}}},"className":"is-style-outline","fontSize":"x-small"} -->
<div class="wp-block-button has-custom-font-size is-style-outline has-x-small-font-size"><a class="wp-block-button__link has-light-color has-text-color wp-element-button" href="https://olenka-theme.com.ua/" style="padding-top:var(--wp--preset--spacing--mini);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--mini);padding-left:var(--wp--preset--spacing--large)"><?php echo __( 'Download', 'olenka' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

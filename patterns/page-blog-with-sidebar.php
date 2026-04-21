<?php
/**
 * Title: Blog With Sidebar
 * Slug: olenka/blog-with-sidebar
 * Description: Add a Blog With Sidebar
 * Categories: posts
 * Keywords: template, blog
 * Inserter: true
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"className":"is-style-animation-wrapper","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group is-style-animation-wrapper" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:var(--wp--preset--spacing--medium);padding-bottom:0;padding-left:var(--wp--preset--spacing--medium)"><!-- wp:olenka/floating-box -->
<div class="wp-block-olenka-floating-box" style="right:3%;top:0%" data-orientation="2" data-position-left="0" data-position-top="0" data-position-right="3" data-position-bottom="0"><!-- wp:olenka/responsive-box {"unique_class":"mx-responsive-box-1E4DdmdsC7XM"} -->
<div data-breakpoint="all" class="mx-responsive-box mx-responsive-box-1E4DdmdsC7XM"><div class="wp-block-olenka-responsive-box"><style></style><!-- wp:image {"id":257,"width":"428px","height":"auto","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/animations/bubble_5.svg" alt="" class="wp-image-257" style="object-fit:cover;width:428px;height:auto"/></figure>
<!-- /wp:image --></div></div>
<!-- /wp:olenka/responsive-box --></div>
<!-- /wp:olenka/floating-box -->

<!-- wp:columns {"style":{"spacing":{"padding":{"top":"0px","bottom":"0px","right":"0px","left":"0px"},"blockGap":{"top":"0","left":"var:preset|spacing|large"},"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-columns" style="margin-top:0;margin-bottom:0;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--medium)"><!-- wp:heading -->
<h2 class="wp-block-heading"><?php printf( esc_html__( '%s', 'olenka' ), __( 'Blog', 'olenka' ) ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"},"margin":{"bottom":"var:preset|spacing|large"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"900px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--large);padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:query {"queryId":12,"query":{"perPage":"6","pages":0,"offset":"0","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":{"category":[]}},"layout":{"type":"default"}} -->
<div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"grid","columnCount":1}} -->
<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|x-large"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"490px"} -->
<div class="wp-block-column" style="flex-basis:490px"><!-- wp:post-featured-image {"isLink":true,"height":"270px","style":{"border":{"radius":"10px"}}} /--></div>
<!-- /wp:column -->

<!-- wp:column {"width":"66.66%","style":{"spacing":{"blockGap":"10px","padding":{"top":"0px"}}}} -->
<div class="wp-block-column" style="padding-top:0px;flex-basis:66.66%"><!-- wp:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","textDecoration":"none","fontStyle":"normal","fontWeight":"700","letterSpacing":"1px"},"elements":{"link":{"color":{"text":"var:preset|color|main"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"textColor":"main","fontSize":"mini"} /-->

<!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"bottom":"15px","top":"10px"},"padding":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|dark"}}}},"textColor":"dark","fontSize":"small"} /-->

<!-- wp:post-date {"style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|dark"}}}},"textColor":"dark","fontSize":"mini"} /-->

<!-- wp:post-excerpt {"showMoreOnNewLine":false,"excerptLength":18,"style":{"elements":{"link":{"color":{"text":"var:preset|color|dark"}}}},"textColor":"dark","fontSize":"xx-small"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}},"backgroundColor":"main-light","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-main-light-color has-alpha-channel-opacity has-main-light-background-color has-background is-style-wide" style="margin-top:var(--wp--preset--spacing--large);margin-bottom:var(--wp--preset--spacing--large)"/>
<!-- /wp:separator -->
<!-- /wp:post-template -->

<!-- wp:query-pagination {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|main"}}},"typography":{"fontSize":"1rem"}},"textColor":"main"} -->
<!-- wp:query-pagination-previous {"label":"\u003c Prev","style":{"typography":{"textDecoration":"none"}}} /-->

<!-- wp:query-pagination-numbers {"style":{"typography":{"fontSize":"1rem","textDecoration":"none"}},"className":"is-style-rounded-numbers"} /-->

<!-- wp:query-pagination-next {"label":"Next \u003e","style":{"typography":{"textDecoration":"none"}}} /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"266px","style":{"border":{"left":{"width":"0px","style":"none"},"top":[],"right":[],"bottom":[]},"spacing":{"padding":{"top":"0px","left":"0px","right":"0px"},"blockGap":"40px"}}} -->
<div class="wp-block-column" style="border-left-style:none;border-left-width:0px;padding-top:0px;padding-right:0px;padding-left:0px;flex-basis:266px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|small","left":"var:preset|spacing|medium"},"blockGap":"14px"},"border":{"radius":"5px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-radius:5px;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:image {"align":"center","id":209,"width":"124px","height":"auto","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"100px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/maksym-marko.png" alt="" class="wp-image-209" style="border-radius:100px;width:124px;height:auto"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":5,"style":{"spacing":{"padding":{"bottom":"0px"},"margin":{"top":"15px"}},"elements":{"link":{"color":{"text":"var:preset|color|dark"}}},"typography":{"textTransform":"none","letterSpacing":"1px"}},"textColor":"dark","fontSize":"xx-small","fontFamily":"roboto"} -->
<h5 class="wp-block-heading has-text-align-center has-dark-color has-text-color has-link-color has-roboto-font-family has-xx-small-font-size" style="margin-top:15px;padding-bottom:0px;letter-spacing:1px;text-transform:none"><?php printf( esc_html__( '%s', 'olenka' ), __( 'Maksym Marko', 'olenka' ) ); ?></h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|dark"}}}},"textColor":"dark","fontSize":"xxx-small"} -->
<p class="has-text-align-center has-dark-color has-text-color has-link-color has-xxx-small-font-size"><?php printf( esc_html__( '%s', 'olenka' ), __( 'the Olenka Theme Starter Kit creator spent 8 years creating and improving WordPress Themes and plugins. He implements all the best of his skills into Olenka Theme Starter Kit. You’ll get a free and reliable WordPress theme for your business or nonprofit activity.', 'olenka' ) ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"dimensions":{"minHeight":"0px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="min-height:0px"><!-- wp:heading {"textAlign":"left","level":5,"style":{"spacing":{"padding":{"bottom":"0px"},"margin":{"top":"var:preset|spacing|medium"}},"elements":{"link":{"color":{"text":"var:preset|color|dark"}}},"typography":{"textTransform":"none","letterSpacing":"1px"}},"textColor":"dark","fontSize":"x-small","fontFamily":"roboto"} -->
<h5 class="wp-block-heading has-text-align-left has-dark-color has-text-color has-link-color has-roboto-font-family has-x-small-font-size" style="margin-top:var(--wp--preset--spacing--medium);padding-bottom:0px;letter-spacing:1px;text-transform:none"><?php printf( esc_html__( '%s', 'olenka' ), __( 'More Here', 'olenka' ) ); ?></h5>
<!-- /wp:heading -->

<!-- wp:query {"queryId":31,"query":{"perPage":"5","pages":0,"offset":0,"postType":"post","order":"asc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"full","layout":{"type":"default"}} -->
<div class="wp-block-query alignfull"><!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-template {"style":{"typography":{"textTransform":"none"},"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
<!-- wp:group {"style":{"spacing":{"blockGap":""}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:post-title {"isLink":true,"style":{"layout":{"selfStretch":"fit"},"typography":{"lineHeight":"1.3"},"elements":{"link":{"color":{"text":"var:preset|color|dark"}}},"spacing":{"margin":{"top":"var:preset|spacing|mini","right":"var:preset|spacing|mini","bottom":"var:preset|spacing|mini","left":"var:preset|spacing|mini"}}},"textColor":"dark","fontSize":"xx-small"} /-->

<!-- wp:post-date {"textAlign":"left","format":"F j, Y","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|dark"}}}},"textColor":"dark","fontSize":"mini"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:group --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"left","level":5,"style":{"spacing":{"padding":{"bottom":"0px"},"margin":{"top":"var:preset|spacing|medium"}},"elements":{"link":{"color":{"text":"var:preset|color|dark"}}},"typography":{"textTransform":"none","letterSpacing":"1px"}},"textColor":"dark","fontSize":"x-small","fontFamily":"roboto"} -->
<h5 class="wp-block-heading has-text-align-left has-dark-color has-text-color has-link-color has-roboto-font-family has-x-small-font-size" style="margin-top:var(--wp--preset--spacing--medium);padding-bottom:0px;letter-spacing:1px;text-transform:none"><?php printf( esc_html__( '%s', 'olenka' ), __( 'Categories', 'olenka' ) ); ?></h5>
<!-- /wp:heading -->

<!-- wp:categories {"className":"is-style-modern-list","style":{"typography":{"textTransform":"uppercase","textDecoration":"none"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"xxx-small"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"},"margin":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}},"border":{"radius":"8px"}},"backgroundColor":"main-light","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-main-light-background-color has-background" style="border-radius:8px;margin-top:var(--wp--preset--spacing--large);margin-bottom:var(--wp--preset--spacing--large);padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"1px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|dark"}}}},"textColor":"dark","fontSize":"xx-small"} -->
<h3 class="wp-block-heading has-dark-color has-text-color has-link-color has-xx-small-font-size"><?php printf( esc_html__( '%s', 'olenka' ), '<a href="' . esc_url( 'https://olenka-theme.com.ua/olenka-releases/' ) . '">' . __( 'Olenka Theme Starter Kit Release', 'olenka' ) . '</a>' ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
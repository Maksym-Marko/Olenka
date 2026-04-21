<?php
/**
 * Title: Posts List
 * Slug: olenka/posts-list
 * Description: 
 * Categories: posts
 * Keywords: posts, list
 * Block Types: core/query
 * Inserter: true
 */

?>
<!-- wp:query {"queryId":0,"query":{"perPage":"5","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"displayLayout":{"type":"list"},"layout":{"type":"default"}} -->
<div class="wp-block-query"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xx-large","bottom":"var:preset|spacing|xx-large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xx-large);padding-bottom:var(--wp--preset--spacing--xx-large)"><!-- wp:post-template -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|medium","padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-terms {"term":"category","prefix":"Categories: ","style":{"elements":{"link":{"color":{"text":"var:preset|color|dark"}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"main-dark","fontSize":"xx-small"} /-->

<!-- wp:post-title {"isLink":true,"fontSize":"large"} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"10px","padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"var:preset|spacing|medium","bottom":"0"}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"dark","layout":{"type":"flex","flexWrap":"wrap"},"fontSize":"small"} -->
<div class="wp-block-group has-dark-color has-text-color has-small-font-size" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500"><!-- wp:post-author {"showBio":false,"byline":"by","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"},"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"layout":{"selfStretch":"fill","flexSize":null}},"fontSize":"x-small"} /-->

<!-- wp:post-date {"fontSize":"xxx-small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:post-featured-image {"isLink":true,"style":{"border":{"radius":"5px"},"spacing":{"margin":{"top":"var:preset|spacing|large","right":"0","bottom":"0","left":"0"}}}} /-->

<!-- wp:post-content {"fontSize":"xx-small"} /-->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"backgroundColor":"main-dark","className":"is-style-separator-dotted"} -->
<hr class="wp-block-separator has-text-color has-main-dark-color has-alpha-channel-opacity has-main-dark-background-color has-background is-style-separator-dotted" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)"/>
<!-- /wp:separator --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"},"fontSize":"xx-small"} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-next {"backgroundColor":"light"} /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:query -->

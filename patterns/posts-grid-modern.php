<?php
/**
 * Title: Posts Grid Modern
 * Slug: olenka/posts-grid-modern
 * Description: 
 * Categories: posts
 * Keywords: posts, grid
 * Block Types: core/query
 * Inserter: true
 */

?>
<!-- wp:query {"queryId":1,"query":{"perPage":"7","pages":"0","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"displayLayout":{"type":"flex","columns":2},"align":"full"} -->
<div class="wp-block-query alignfull"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"0","right":"0","left":"0"}}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-tertiary-background-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-template {"align":"wide","textColor":"dark","className":"is-style-grid-modern"} -->
<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","bottom":"0"}},"border":{"radius":"0px"}},"className":"is-style-animation-wrapper"} -->
<div class="wp-block-group is-style-animation-wrapper" style="border-radius:0px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-featured-image {"isLink":true,"height":"","overlayColor":"main-dark","dimRatio":50,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"},"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}},"border":{"radius":"0px"}},"className":"is-style-animation-pointer","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-animation-pointer" style="border-radius:0px;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"className":"is-style-default","layout":{"type":"constrained","contentSize":"300px"}} -->
<div class="wp-block-group is-style-default" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:post-title {"textAlign":"center","isLink":true,"style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}},"typography":{"textDecoration":"none","fontStyle":"normal","fontWeight":"600","lineHeight":1.3},"elements":{"link":{"color":{"text":"var:preset|color|light"}}}},"textColor":"light","fontSize":"medium"} /-->

<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"8px","padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"var:preset|color|light"}}}},"textColor":"light","fontSize":"xx-small"} /-->

<!-- wp:post-date {"textColor":"light"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--x-large)"><!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","textColor":"dark","layout":{"type":"flex","justifyContent":"space-between"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:group --></div>
<!-- /wp:query -->
<?php
/**
 * Title: Posts Grid
 * Slug: olenka/posts-grid
 * Description: 
 * Categories: posts
 * Keywords: posts, grid
 * Block Types: core/query
 * Inserter: true
 */

?>
<!-- wp:query {"queryId":1,"query":{"perPage":"6","pages":"0","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":true},"displayLayout":{"type":"flex","columns":3},"align":"full"} -->
<div class="wp-block-query alignfull"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","right":"0","left":"0"}}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-tertiary-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:0;padding-bottom:var(--wp--preset--spacing--medium);padding-left:0"><!-- wp:post-template {"align":"wide","textColor":"dark"} -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}},"border":{"radius":"5px"}},"backgroundColor":"base"} -->
<div class="wp-block-group has-base-background-color has-background" style="border-radius:5px;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:post-featured-image {"isLink":true,"height":"230px","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"},"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"8px","padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--small);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"var:preset|color|dark"}}}},"textColor":"dark","fontSize":"xx-small"} /-->

<!-- wp:post-date {"textColor":"dark","fontSize":"xx-small"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}},"typography":{"textDecoration":"none","fontStyle":"normal","fontWeight":"600","lineHeight":1.3}},"textColor":"main","fontSize":"medium"} /-->

<!-- wp:post-excerpt {"moreText":"Read More","style":{"elements":{"link":{"color":{"text":"var:preset|color|dark"}}}},"textColor":"dark","className":"is-style-excerpt-truncate-3","fontSize":"x-small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--x-large)"><!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","textColor":"dark","layout":{"type":"flex","justifyContent":"space-between"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:query -->

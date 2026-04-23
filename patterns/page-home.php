<?php
/**
 * Title: Homepage
 * Slug: olenka/page-home
 * Description: A Homepage design example
 * Categories: featured
 * Keywords: template, home
 * Inserter: true
 */
?>
<!-- wp:olenka/hero-section {"imageUrl":"<?php echo get_template_directory_uri(); ?>/assets/images/vase.jpg","imageId":48} -->
<div id="hero" class="wp-block-olenka-hero-section"><div class="py-24 md:py-32 border-b border-coffee-02"><div class="max-w-5xl mx-auto px-6"><div class="flex flex-col md:flex-row md:items-start gap-12 md:gap-20"><div class="flex-1 min-w-0"><!-- wp:olenka/badge {"text":"WORDPRESS BLOCK THEME STARTER KIT","squareBackgroundColor":"#a95f33","textColor":"#c97a45","className":"text-base"} -->
<div class="p-2 inline-flex items-center text-xs wp-block-olenka-badge text-base has-c-97-a-45-color has-text-color" style="background-color:#ffffff"><span class="inline-block px-2 py-2 rounded mr-1" style="background-color:#a95f33"></span><span class="text-xs" style="color:#c97a45">WORDPRESS BLOCK THEME STARTER KIT</span></div>
<!-- /wp:olenka/badge -->

<!-- wp:heading {"style":{"typography":{"lineHeight":"1.2","fontStyle":"normal","fontWeight":"600"},"color":{"text":"#3e2e27"},"elements":{"link":{"color":{"text":"#3e2e27"}}},"spacing":{"margin":{"top":"var:preset|spacing|mini"}}},"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-text-color has-link-color has-x-large-font-size" style="color:#3e2e27;margin-top:var(--wp--preset--spacing--mini);font-style:normal;font-weight:600;line-height:1.2">A clean foundation for building WordPress block themes</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"is-style-default","style":{"color":{"text":"#7a675c"},"elements":{"link":{"color":{"text":"#7a675c"}}},"spacing":{"margin":{"top":"var:preset|spacing|small"}}},"fontSize":"xx-small"} -->
<p class="is-style-default has-text-color has-link-color has-xx-small-font-size" style="color:#7a675c;margin-top:var(--wp--preset--spacing--small)">Olenka is a developer-focused boilerplate for building modern WordPress block themes. It gives you a structured starting point with Tailwind CSS, Vite-powered assets, Composer autoloading, custom Gutenberg blocks, reusable templates, template parts, and block patterns.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|small"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--small)"><!-- wp:button {"style":{"border":{"radius":{"topLeft":"5px","topRight":"5px","bottomLeft":"5px","bottomRight":"5px"}},"color":{"background":"#a95f33"},"spacing":{"padding":{"left":"var:preset|spacing|small","right":"var:preset|spacing|small","top":"var:preset|spacing|mini","bottom":"var:preset|spacing|mini"}}},"fontSize":"xx-small"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background has-xx-small-font-size has-custom-font-size wp-element-button" href="https://github.com/Maksym-Marko/Olenka" style="border-top-left-radius:5px;border-top-right-radius:5px;border-bottom-left-radius:5px;border-bottom-right-radius:5px;background-color:#a95f33;padding-top:var(--wp--preset--spacing--mini);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--mini);padding-left:var(--wp--preset--spacing--small)">View on GitHub</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":{"topLeft":"5px","topRight":"5px","bottomLeft":"5px","bottomRight":"5px"}},"spacing":{"padding":{"left":"var:preset|spacing|small","right":"var:preset|spacing|small","top":"var:preset|spacing|mini","bottom":"var:preset|spacing|mini"}},"color":{"text":"#a95f33"},"elements":{"link":{"color":{"text":"#a95f33"}}}},"fontSize":"xx-small"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-text-color has-link-color has-xx-small-font-size has-custom-font-size wp-element-button" href="#" style="border-top-left-radius:5px;border-top-right-radius:5px;border-bottom-left-radius:5px;border-bottom-right-radius:5px;color:#a95f33;padding-top:var(--wp--preset--spacing--mini);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--mini);padding-left:var(--wp--preset--spacing--small)">See what’s included</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"style":{"color":{"text":"#7a675c"},"elements":{"link":{"color":{"text":"#7a675c"}}},"spacing":{"margin":{"top":"var:preset|spacing|small"}}},"fontSize":"xxx-small"} -->
<p class="has-text-color has-link-color has-xxx-small-font-size" style="color:#7a675c;margin-top:var(--wp--preset--spacing--small)">Built for developers who want a clear starting point instead of a heavy visual theme.</p>
<!-- /wp:paragraph --></div><div class="bg-coffee-01 aspect-[480/640] w-[280px] hidden md:flex flex-col items-center justify-center gap-2 flex-shrink-0 pt-2 rounded-md opacity-80"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/vase.jpg" alt="" class="w-full h-full object-cover rounded-md"/></div></div></div></div></div>
<!-- /wp:olenka/hero-section -->

<!-- wp:olenka/text-with-boxes-wrapper {"showBorderBottom":false} -->
<div class="wp-block-olenka-text-with-boxes-wrapper"><div id="features" class="py-20 md:py-24"><div class="max-w-5xl mx-auto px-6"><div class="mb-12"><span class="inline-block text-xs font-medium tracking-widest uppercase text-coffee-03 mb-4">What's inside</span><h2 class="text-2xl md:text-3xl font-semibold leading-tight text-coffee-06 mb-4 max-w-xl">A practical starter, built around modern WordPress workflow</h2><p class="text-coffee-05 leading-relaxed max-w-2xl">Olenka is designed as a clean working base for custom theme development. Instead of filling the homepage with decoration, it focuses on the pieces that matter most when starting a real project.</p></div><div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"><!-- wp:olenka/inner-box -->
<article class="bg-coffee-01 rounded-xl p-7 wp-block-olenka-inner-box"><h3 class="text-sm font-semibold text-coffee-06 mb-3">Block theme architecture</h3><p class="text-sm text-coffee-05 leading-relaxed">Built for the modern WordPress site editor, with a structure that supports templates, template parts, patterns, and global styles.</p></article>
<!-- /wp:olenka/inner-box -->

<!-- wp:olenka/inner-box {"heading":"Tailwind CSS workflow","description":"Uses Tailwind CSS for a fast, utility-first styling approach without relying on a large custom stylesheet."} -->
<article class="bg-coffee-01 rounded-xl p-7 wp-block-olenka-inner-box"><h3 class="text-sm font-semibold text-coffee-06 mb-3">Tailwind CSS workflow</h3><p class="text-sm text-coffee-05 leading-relaxed">Uses Tailwind CSS for a fast, utility-first styling approach without relying on a large custom stylesheet.</p></article>
<!-- /wp:olenka/inner-box -->

<!-- wp:olenka/inner-box {"heading":"Vite-powered assets","description":"Frontend, editor, admin, and block assets are compiled through Vite for a modern and efficient development workflow."} -->
<article class="bg-coffee-01 rounded-xl p-7 wp-block-olenka-inner-box"><h3 class="text-sm font-semibold text-coffee-06 mb-3">Vite-powered assets</h3><p class="text-sm text-coffee-05 leading-relaxed">Frontend, editor, admin, and block assets are compiled through Vite for a modern and efficient development workflow.</p></article>
<!-- /wp:olenka/inner-box -->

<!-- wp:olenka/inner-box {"heading":"Composer autoloading","description":"PHP is organized with PSR-4 autoloading under the OLENKA namespace, making the codebase easier to extend and maintain."} -->
<article class="bg-coffee-01 rounded-xl p-7 wp-block-olenka-inner-box"><h3 class="text-sm font-semibold text-coffee-06 mb-3">Composer autoloading</h3><p class="text-sm text-coffee-05 leading-relaxed">PHP is organized with PSR-4 autoloading under the OLENKA namespace, making the codebase easier to extend and maintain.</p></article>
<!-- /wp:olenka/inner-box -->

<!-- wp:olenka/inner-box {"heading":"Custom Gutenberg blocks","description":"Includes support for custom blocks, including static and server-rendered patterns, so the theme can grow with project needs."} -->
<article class="bg-coffee-01 rounded-xl p-7 wp-block-olenka-inner-box"><h3 class="text-sm font-semibold text-coffee-06 mb-3">Custom Gutenberg blocks</h3><p class="text-sm text-coffee-05 leading-relaxed">Includes support for custom blocks, including static and server-rendered patterns, so the theme can grow with project needs.</p></article>
<!-- /wp:olenka/inner-box -->

<!-- wp:olenka/inner-box {"heading":"Templates and patterns","description":"Comes with a structured set of templates, template parts, and block patterns for building pages and post layouts more efficiently."} -->
<article class="bg-coffee-01 rounded-xl p-7 wp-block-olenka-inner-box"><h3 class="text-sm font-semibold text-coffee-06 mb-3">Templates and patterns</h3><p class="text-sm text-coffee-05 leading-relaxed">Comes with a structured set of templates, template parts, and block patterns for building pages and post layouts more efficiently.</p></article>
<!-- /wp:olenka/inner-box --></div></div></div></div>
<!-- /wp:olenka/text-with-boxes-wrapper -->

<!-- wp:olenka/text-with-boxes-wrapper {"tagline":"Get started","heading":"A simple setup for active development","description":"Olenka keeps the setup process straightforward so you can move quickly from installation to development.","backgroundColor":"#efe3d6","displaySubline":true} -->
<div style="background-color:#efe3d6" class="wp-block-olenka-text-with-boxes-wrapper"><div id="features" class="py-20 md:py-24 border-b border-coffee-02"><div class="max-w-5xl mx-auto px-6"><div class="mb-12"><span class="inline-block text-xs font-medium tracking-widest uppercase text-coffee-03 mb-4">Get started</span><h2 class="text-2xl md:text-3xl font-semibold leading-tight text-coffee-06 mb-4 max-w-xl">A simple setup for active development</h2><p class="text-coffee-05 leading-relaxed max-w-2xl">Olenka keeps the setup process straightforward so you can move quickly from installation to development.</p></div><div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"><!-- wp:olenka/inner-box {"heading":"1. Clone or download","description":"Add Olenka to your WordPress themes directory and activate it from the WordPress admin.","backgroundColor":"#f6f0e8"} -->
<article class="bg-coffee-01 rounded-xl p-7 wp-block-olenka-inner-box" style="background-color:#f6f0e8"><h3 class="text-sm font-semibold text-coffee-06 mb-3">1. Clone or download</h3><p class="text-sm text-coffee-05 leading-relaxed">Add Olenka to your WordPress themes directory and activate it from the WordPress admin.</p></article>
<!-- /wp:olenka/inner-box -->

<!-- wp:olenka/inner-box {"heading":"2. Install dependencies","description":"Run Composer and npm to install PHP and JavaScript dependencies for the theme.","backgroundColor":"#f6f0e8"} -->
<article class="bg-coffee-01 rounded-xl p-7 wp-block-olenka-inner-box" style="background-color:#f6f0e8"><h3 class="text-sm font-semibold text-coffee-06 mb-3">2. Install dependencies</h3><p class="text-sm text-coffee-05 leading-relaxed">Run Composer and npm to install PHP and JavaScript dependencies for the theme.</p></article>
<!-- /wp:olenka/inner-box -->

<!-- wp:olenka/inner-box {"heading":"3. Start building","description":"Use the development workflow to watch files, build assets, and shape the theme around your own templates, blocks, and patterns.","backgroundColor":"#f6f0e8"} -->
<article class="bg-coffee-01 rounded-xl p-7 wp-block-olenka-inner-box" style="background-color:#f6f0e8"><h3 class="text-sm font-semibold text-coffee-06 mb-3">3. Start building</h3><p class="text-sm text-coffee-05 leading-relaxed">Use the development workflow to watch files, build assets, and shape the theme around your own templates, blocks, and patterns.</p></article>
<!-- /wp:olenka/inner-box --></div><p class="text-sm text-coffee-05 mt-8">Made for developers who prefer a modern workflow with room for clean customization.</p></div></div></div>
<!-- /wp:olenka/text-with-boxes-wrapper -->

<!-- wp:olenka/text-with-boxes-wrapper {"tagline":"Approach","heading":"A thoughtful default homepage, not a marketing splash screen","description":"When a user installs a theme, the first page should feel complete, calm, and usable. It should introduce the theme clearly, show how content can live inside the design, and leave enough space for future customization.\u003cbr\u003e\u003cbr\u003eThat is the idea behind Olenka’s homepage. It is intentionally simple, content-aware, and balanced: part theme introduction, part real front page, and part starting point for building something of your own.","showBorderBottom":false} -->
<div class="wp-block-olenka-text-with-boxes-wrapper"><div id="features" class="py-20 md:py-24"><div class="max-w-5xl mx-auto px-6"><div class="mb-12"><span class="inline-block text-xs font-medium tracking-widest uppercase text-coffee-03 mb-4">Approach</span><h2 class="text-2xl md:text-3xl font-semibold leading-tight text-coffee-06 mb-4 max-w-xl">A thoughtful default homepage, not a marketing splash screen</h2><p class="text-coffee-05 leading-relaxed max-w-2xl">When a user installs a theme, the first page should feel complete, calm, and usable. It should introduce the theme clearly, show how content can live inside the design, and leave enough space for future customization.<br><br>That is the idea behind Olenka’s homepage. It is intentionally simple, content-aware, and balanced: part theme introduction, part real front page, and part starting point for building something of your own.</p></div><div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"><!-- wp:olenka/inner-box -->
<article class="bg-coffee-01 rounded-xl p-7 wp-block-olenka-inner-box"><h3 class="text-sm font-semibold text-coffee-06 mb-3">Block theme architecture</h3><p class="text-sm text-coffee-05 leading-relaxed">Built for the modern WordPress site editor, with a structure that supports templates, template parts, patterns, and global styles.</p></article>
<!-- /wp:olenka/inner-box -->

<!-- wp:olenka/inner-box {"heading":"Tailwind CSS workflow","description":"Uses Tailwind CSS for a fast, utility-first styling approach without relying on a large custom stylesheet."} -->
<article class="bg-coffee-01 rounded-xl p-7 wp-block-olenka-inner-box"><h3 class="text-sm font-semibold text-coffee-06 mb-3">Tailwind CSS workflow</h3><p class="text-sm text-coffee-05 leading-relaxed">Uses Tailwind CSS for a fast, utility-first styling approach without relying on a large custom stylesheet.</p></article>
<!-- /wp:olenka/inner-box -->

<!-- wp:olenka/inner-box {"heading":"Vite-powered assets","description":"Frontend, editor, admin, and block assets are compiled through Vite for a modern and efficient development workflow."} -->
<article class="bg-coffee-01 rounded-xl p-7 wp-block-olenka-inner-box"><h3 class="text-sm font-semibold text-coffee-06 mb-3">Vite-powered assets</h3><p class="text-sm text-coffee-05 leading-relaxed">Frontend, editor, admin, and block assets are compiled through Vite for a modern and efficient development workflow.</p></article>
<!-- /wp:olenka/inner-box -->

<!-- wp:olenka/inner-box {"heading":"Composer autoloading","description":"PHP is organized with PSR-4 autoloading under the OLENKA namespace, making the codebase easier to extend and maintain."} -->
<article class="bg-coffee-01 rounded-xl p-7 wp-block-olenka-inner-box"><h3 class="text-sm font-semibold text-coffee-06 mb-3">Composer autoloading</h3><p class="text-sm text-coffee-05 leading-relaxed">PHP is organized with PSR-4 autoloading under the OLENKA namespace, making the codebase easier to extend and maintain.</p></article>
<!-- /wp:olenka/inner-box -->

<!-- wp:olenka/inner-box {"heading":"Custom Gutenberg blocks","description":"Includes support for custom blocks, including static and server-rendered patterns, so the theme can grow with project needs."} -->
<article class="bg-coffee-01 rounded-xl p-7 wp-block-olenka-inner-box"><h3 class="text-sm font-semibold text-coffee-06 mb-3">Custom Gutenberg blocks</h3><p class="text-sm text-coffee-05 leading-relaxed">Includes support for custom blocks, including static and server-rendered patterns, so the theme can grow with project needs.</p></article>
<!-- /wp:olenka/inner-box -->

<!-- wp:olenka/inner-box {"heading":"Templates and patterns","description":"Comes with a structured set of templates, template parts, and block patterns for building pages and post layouts more efficiently."} -->
<article class="bg-coffee-01 rounded-xl p-7 wp-block-olenka-inner-box"><h3 class="text-sm font-semibold text-coffee-06 mb-3">Templates and patterns</h3><p class="text-sm text-coffee-05 leading-relaxed">Comes with a structured set of templates, template parts, and block patterns for building pages and post layouts more efficiently.</p></article>
<!-- /wp:olenka/inner-box --></div></div></div></div>
<!-- /wp:olenka/text-with-boxes-wrapper -->

<!-- wp:olenka/recent-posts /-->

<!-- wp:olenka/about {"imageUrl":"http://btsk.local/wp-content/uploads/2026/04/maksym-marko.png","imageId":90,"imageOpacity":0.95,"showBorderBottom":false} -->
<div class="wp-block-olenka-about"><div id="about" class="py-20 md:py-24"><div class="max-w-5xl mx-auto px-6"><div class="flex flex-col md:flex-row gap-8 md:gap-10"><div class="flex-shrink-0 flex flex-col items-start gap-2 md:pt-10"><div class="bg-coffee-01 aspect-[480/640] w-[180px] flex flex-col items-center justify-center gap-2 flex-shrink-0 pt-2 rounded-md overflow-hidden" style="opacity:0.95"><img src="http://btsk.local/wp-content/uploads/2026/04/maksym-marko.png" alt="" class="w-full h-full object-cover"/></div></div><div class="min-w-0 max-w-xl"><!-- wp:paragraph {"className":"is-style-default","style":{"spacing":{"margin":{"top":"var:preset|spacing|mini","bottom":"0px"}},"typography":{"textTransform":"uppercase"}},"textColor":"main","fontSize":"xxx-small"} -->
<p class="is-style-default has-main-color has-text-color has-xxx-small-font-size" style="margin-top:var(--wp--preset--spacing--mini);margin-bottom:0px;text-transform:uppercase">About the developer</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"0px","bottom":"var:preset|spacing|small"}}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="margin-top:0px;margin-bottom:var(--wp--preset--spacing--small);font-style:normal;font-weight:600">Built by Maksym Marko</h2>
<!-- /wp:heading -->

<!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|dark"}}}},"textColor":"dark","fontSize":"medium"} -->
<p class="has-dark-color has-text-color has-link-color has-medium-font-size">Hi, I’m Maksym — a web developer helping businesses build and improve their online presence since 2015. I work with WordPress, PHP, Vue.js, Laravel, HTML, CSS, and front-end systems that support real project needs.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|dark"}}}},"textColor":"dark","fontSize":"medium"} -->
<p class="has-dark-color has-text-color has-link-color has-medium-font-size">Olenka brings together the parts of modern WordPress development I find most useful: a clean starting point, structured templates, pattern-based building, modern asset tooling, and enough flexibility to shape a theme around content instead of forcing content into a rigid design.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|dark"}}}},"textColor":"dark","fontSize":"medium"} -->
<p class="has-dark-color has-text-color has-link-color has-medium-font-size">Over the years, I’ve worked with clients from different countries and across different kinds of projects. Olenka reflects that practical experience: less noise, more structure, and a reliable foundation you can keep building on.</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"space-y-3 mb-8 border-l-2 border-coffee-02 pl-5","style":{"elements":{"link":{"color":{"text":"var:preset|color|dark"}}}},"textColor":"dark","fontSize":"xxx-small"} -->
<ul class="wp-block-list space-y-3 mb-8 border-l-2 border-coffee-02 pl-5 has-dark-color has-text-color has-link-color has-xxx-small-font-size"><!-- wp:list-item -->
<li>Building websites and web applications since 2015</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Focused on WordPress and practical development workflow</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Designed as a reliable starting point for custom projects</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|small"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--small)"><!-- wp:button {"textColor":"main-dark","className":"is-style-outline","style":{"border":{"radius":{"topLeft":"5px","topRight":"5px","bottomLeft":"5px","bottomRight":"5px"},"width":"1px"},"spacing":{"padding":{"left":"var:preset|spacing|small","right":"var:preset|spacing|small","top":"var:preset|spacing|mini","bottom":"var:preset|spacing|mini"}},"elements":{"link":{"color":{"text":"var:preset|color|main-dark"}}}},"fontSize":"xx-small","borderColor":"main-dark"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-main-dark-color has-text-color has-link-color has-border-color has-main-dark-border-color has-xx-small-font-size has-custom-font-size wp-element-button" href="https://github.com/Maksym-Marko/Olenka" style="border-width:1px;border-top-left-radius:5px;border-top-right-radius:5px;border-bottom-left-radius:5px;border-bottom-right-radius:5px;padding-top:var(--wp--preset--spacing--mini);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--mini);padding-left:var(--wp--preset--spacing--small)">Visit GitHub</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div></div></div></div>
<!-- /wp:olenka/about -->

<!-- wp:olenka/cta {"primaryButtonUrl":"https://github.com/Maksym-Marko/Olenka","secondaryLinkUrl":"#hero"} -->
<div class="py-24 md:py-28 border-b border-coffee-02 bg-coffee-01 wp-block-olenka-cta"><div class="max-w-5xl mx-auto px-6 text-center"><h2 class="text-2xl md:text-3xl font-semibold leading-tight text-coffee-06 mb-4">Start with a clean base</h2><p class="text-coffee-05 leading-relaxed max-w-lg mx-auto mb-10">Olenka is a minimal, developer-focused starter for building modern WordPress block themes with clarity, structure, and room to grow.</p><div class="flex flex-wrap items-center justify-center gap-4"><a href="https://github.com/Maksym-Marko/Olenka" class="inline-block bg-coffee-03 hover:bg-coffee-04 text-white text-sm font-medium px-8 py-3 rounded transition-colors duration-150">Open Olenka on GitHub</a><a href="#hero" class="text-sm text-coffee-05 hover:text-coffee-03 transition-colors duration-150">↑ Back to top</a></div></div></div>
<!-- /wp:olenka/cta -->
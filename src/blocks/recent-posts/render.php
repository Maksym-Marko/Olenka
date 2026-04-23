<?php
if (! defined('ABSPATH')) {
    exit;
}

$post_type       = $attributes['postType']      ?? 'post';
$number_of_posts = $attributes['numberOfPosts'] ?? 3;
$section_label   = $attributes['sectionLabel']  ?? 'From the blog';
$heading         = $attributes['heading']       ?? 'Latest posts';
$description     = $attributes['description']   ?? '';
$view_all_text   = $attributes['viewAllText']   ?? 'View all posts &rarr;';
$view_all_url    = $attributes['viewAllUrl']    ?? '#';
$background_color = $attributes['backgroundColor'] ?? '';

$posts = get_posts([
    'post_type'   => $post_type,
    'numberposts' => $number_of_posts,
    'post_status' => 'publish',
]);

$placeholder_colors = ['bg-coffee-02', 'bg-sand-01', 'bg-sand-02'];
$line_widths        = ['w-1/2', 'w-2/3', 'w-1/3'];

$section_style = $background_color
    ? ' style="background-color: ' . esc_attr($background_color) . ';"'
    : '';

$section_class = 'py-24 md:py-28 border-b border-coffee-02' . (! $background_color ? ' bg-coffee-01' : '');
?>
<div id="blog" class="<?php echo esc_attr($section_class); ?>"<?php echo $section_style; ?>>
    <div class="max-w-5xl mx-auto px-6">

        <div class="mb-12">
            <span class="inline-block text-xs font-medium tracking-widest uppercase text-coffee-03 mb-4">
                <?php echo wp_kses_post($section_label); ?>
            </span>
            <h2 class="text-2xl md:text-3xl font-semibold leading-tight text-coffee-06 mb-4">
                <?php echo wp_kses_post($heading); ?>
            </h2>
            <p class="text-coffee-05 leading-relaxed max-w-2xl">
                <?php echo wp_kses_post($description); ?>
            </p>
        </div>

        <?php if (! empty($posts)) : ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-10">
            <?php foreach ($posts as $index => $post) :
                $has_thumbnail    = has_post_thumbnail($post->ID);
                $thumbnail_url    = $has_thumbnail ? get_the_post_thumbnail_url($post->ID, 'full') : '';
                $thumbnail_id     = $has_thumbnail ? get_post_thumbnail_id($post->ID) : 0;
                $thumbnail_alt    = $thumbnail_id
                    ? (get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true) ?: esc_attr($post->post_title))
                    : '';

                $categories    = get_the_category($post->ID);
                $category_name = ! empty($categories) ? $categories[0]->name : '';

                $excerpt = $post->post_excerpt
                    ? wp_trim_words($post->post_excerpt, 20, '…')
                    : wp_trim_words(strip_tags($post->post_content), 20, '…');

                $placeholder_color = $placeholder_colors[$index % count($placeholder_colors)];
                $line_width        = $line_widths[$index % count($line_widths)];
            ?>
            <article class="bg-linen rounded-xl overflow-hidden flex flex-col">
                <div class="h-32 <?php echo ! $thumbnail_url ? esc_attr($placeholder_color) : ''; ?> rounded-t-xl" aria-hidden="true">
                    <div class="h-full w-full flex items-end">
                        <?php if ($thumbnail_url) : ?>
                            <img
                                src="<?php echo esc_url($thumbnail_url); ?>"
                                alt="<?php echo esc_attr($thumbnail_alt); ?>"
                                class="w-full h-full object-cover"
                            >
                        <?php else : ?>
                            <div class="p-3 w-full">
                                <div class="h-1 <?php echo esc_attr($line_width); ?> rounded-full bg-coffee-03 opacity-50"></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <?php if ($category_name) : ?>
                        <span class="text-xs font-medium tracking-widest uppercase text-coffee-03 mb-3">
                            <?php echo esc_html($category_name); ?>
                        </span>
                    <?php endif; ?>
                    <h3 class="text-sm font-semibold leading-tight text-coffee-06 mb-3">
                        <?php echo esc_html($post->post_title); ?>
                    </h3>
                    <p class="text-sm text-coffee-05 leading-relaxed flex-1 mb-4">
                        <?php echo esc_html($excerpt); ?>
                    </p>
                    <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="text-sm font-medium text-coffee-03 hover:text-coffee-04 transition-colors duration-150">
                        Read post &rarr;
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <div class="text-center">
            <a href="<?php echo esc_url($view_all_url); ?>" class="text-sm font-medium text-coffee-03 hover:text-coffee-04 transition-colors duration-150">
                <?php echo wp_kses_post($view_all_text); ?>
            </a>
        </div>

    </div>
</div>

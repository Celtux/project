<?php
/**
 * Video Block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param int|string $post_id The post ID this block is saved to.
 */

$title = get_field('title');
$video = get_field('video');

?>
<section class="video">
    <div class="container">
        <div class="video__wrapper">
            <?php if (!empty($title)): ?>
                <?php echo $title; ?>
            <?php endif;

            if (!empty($video)):?>
                <div class="video__player">
                    <?php
                    preg_match('/src="(.+?)"/', $video, $matches);
                    $src = $matches[1];

                    $params = array(
                        'controls' => 1,
                        'hd' => 1,
                        'autohide' => 1
                    );
                    $new_src = add_query_arg($params, $src);
                    $video = str_replace($src, $new_src, $video);

                    $attributes = 'frameborder="0"';
                    $video = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $video);

                    echo $video;
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php
/**
 * Post List Block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param int|string $post_id The post ID this block is saved to.
 */

use App\Acf\Fields\Link;

$main_post = get_field('main_post');
$news = get_field('news');
$title = get_field('title');
$link = get_field('link');
?>
<section class="post-list-section">
    <div class="container">
        <div class="post-list-section__wrapper">

            <?php if (!empty($title)): ?>
                <?php echo $title; ?>
            <?php endif; ?>

            <div class="post-list-section__data">
                <?php if (!empty($main_post)): ?>
                    <div class="post-list-section__data_main-post">
                        <a class="post-list-section__data_main-post_img"
                           href="<?php echo get_post_permalink($main_post) ?>">
                            <?php echo get_the_post_thumbnail($main_post);; ?>
                        </a>

                        <a href="<?php echo get_post_permalink($main_post) ?>">
                            <h4><?php echo get_the_title($main_post); ?></h4>
                        </a>

                        <p><?php echo read_time_estimate(get_post_field('post_content', $main_post)); ?>
                            | <?php echo get_the_date('M d, Y', $main_post); ?>
                        </p>
                    </div>
                <?php endif; ?>

                <?php if (!empty($news)): ?>
                    <div class="post-list-section__data_posts">
                        <?php foreach ($news as $key => $post): ?>
                            <div class="post-list-section__data_posts_post">
                                <a href="<?php echo get_post_permalink($post) ?>">
                                    <h4><?php echo get_the_title($post); ?></h4>
                                </a>

                                <p><?php echo read_time_estimate(get_post_field('post_content', $post)); ?>
                                    | <?php echo get_the_date('M d, Y', $post); ?>
                                </p>
                            </div>
                        <?php endforeach;

                        echo Link::render_acf_link($link, '', '', 'animated-arrow');
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
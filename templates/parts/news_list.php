<?php
/**
 * News List Block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param int|string $post_id The post ID this block is saved to.
 */

use App\Acf\Fields\Link;

function str_word_count_utf8($str)
{
    $a = preg_split('/\W+/u', $str, -1, PREG_SPLIT_NO_EMPTY);
    return count($a);
}

function read_time_estimate($content)
{
    $word_count = str_word_count_utf8(strip_tags($content));
    $minutes = floor($word_count / 200);
    $str_minutes = ($minutes == 1) ? "mins" : "mins";
    return "{$minutes} {$str_minutes}";
}

$main_post = get_field('main_post');
$title = get_field('title');
$link = get_field('link');
?>
<section class="news-list-section">
    <div class="container">
        <div class="news-list-section__wrapper">

            <?php if (!empty($title)): ?>
                <?php echo $title; ?>
            <?php endif; ?>

            <div class="news-list-section__data">
                <?php if (!empty($main_post)): ?>
                    <div class="news-list-section__data_main-post">
                        <a class="news-list-section__data_main-post_img"
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

                <div class="news-list-section__data_posts">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'order' => 'DESC',
                        'post__not_in' => [$main_post],
                        'orderby' => 'date'
                    );
                    $query = new WP_Query($args);

                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            ?>
                            <div class="news-list-section__data_posts_post">
                                <a href="<?php echo get_post_permalink() ?>"><h4><?php the_title(); ?></h4></a>

                                <p><?php echo read_time_estimate(get_the_content()); ?>
                                    | <?php echo get_the_date('M d, Y') ?></p>
                            </div>
                            <?php
                        }
                        wp_reset_postdata();
                    } else {
                        echo 'No posts.';
                    }

                    echo Link::render_acf_link($link, '', '', 'animated-arrow');
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
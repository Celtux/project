<?php
/**
 * Info Block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param int|string $post_id The post ID this block is saved to.
 */

use App\Acf\Fields\Link;

$title = get_field('title');
$links = get_field('links');
?>
<section class="info-section">
    <div class="container">
        <div class="info-section__wrapper">
            <?php if (!empty($title)): ?>
                <h3><?php echo $title; ?></h3>
            <?php endif; ?>

            <?php if (!empty($links)): ?>
                <div class="info-section__links">
                    <?php foreach ($links as $link):
                        $links_link = $link['link'];
                        $link_pdf_link = $link['pdf_link'];

                        $pdf_icon = '';
                        $arrow_animation = '';
                        if (!empty($link_pdf_link)) {
                            $pdf_icon = 'pdf-link_icon';
                        } else {
                            $arrow_animation = 'animated-arrow';
                        }
                        ?>

                        <div class="info-section__link-wrapper">
                            <?php
                            if (!empty($link_pdf_link)) {
                                echo Link::render_acf_link($links_link, '', '', "$pdf_icon", '', "download");
                            } else {
                                echo Link::render_acf_link($links_link, '', '', "$arrow_animation");
                            }

                            ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
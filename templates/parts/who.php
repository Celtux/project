<?php
/**
 * Who Block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param int|string $post_id The post ID this block is saved to.
 */

$title = get_field('title');
$description = get_field('description');
?>
<section class="who-section">
    <div class="container">
        <div class="who-section__wrapper">
            <?php if (!empty($title)): ?>
                <?php echo $title; ?>
            <?php endif; ?>

            <?php if (!empty($description)): ?>
            <div class="who-section__description">
                <?php echo $description; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

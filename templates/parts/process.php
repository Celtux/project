<?php
/**
 * Process Block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param int|string $post_id The post ID this block is saved to.
 */

$title = get_field('title');
$description = get_field('description');
$tabs_name = get_field('name_of_tabs');
$tabs = get_field('tabs');
?>
<section class="process">
    <div class="process__wrapper">
        <div class="process__info">
            <?php if (!empty($title)): ?>
                <?php echo $title; ?>
            <?php endif; ?>

            <p><?php if (!empty($description)): ?>
                    <?php echo $description; ?>
                <?php endif; ?></p>
        </div>

        <div class="process__data">
            <?php if (!empty($tabs_name)): ?>
                <div class="process__data_tabs">
                    <?php foreach ($tabs_name as $key => $item):
                        $tab_title = $item['tab_title'];
                        $open = $item['open_tab'];

                        if (!empty($tab_title)):?>
                            <div data-tab-name="tabcontent<?php echo $key; ?>"
                                 class="process__data_tabs_tab<?php if ($open == 'yes'): ?> active-tab<?php endif; ?>">
                                <?php echo $tab_title; ?>
                            </div>
                        <?php endif; endforeach; ?>
                </div>
            <?php endif;

            if (!empty($tabs)):
                foreach ($tabs as $key => $tab):
                    $tab_description = $tab['tab_description'];
                    $tab_points = $tab['tab_points'];
                    $tab_img = $tab['tab_image'];
                    $open = $tab['open_tab'];
                    ?>
                    <div data-tab="tabcontent<?php echo $key; ?>"
                         class="process__data_content<?php if ($open == 'yes'): ?> active<?php endif; ?>">
                        <?php if (!empty($tab_description)): ?>
                            <p><?php echo $tab_description; ?></p>
                        <?php endif;

                        if (!empty($tab_points)): ?>
                            <div class="process__data_content_points">
                                <?php foreach ($tab_points as $point):
                                    $tab_point = $point['point'];
                                    if (!empty($tab_point)):
                                        ?>
                                        <div class="process__data_content_points_point">
                                            <?php echo $tab_point; ?>
                                        </div>
                                    <?php endif; endforeach; ?>
                            </div>
                        <?php endif;

                        if (!empty($tab_img)): ?>
                            <div class="process__data_content_img">
                                <?php echo wp_get_attachment_image($tab_img, 'full', '', array()); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>
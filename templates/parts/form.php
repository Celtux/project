<?php
/**
 * Form Block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param int|string $post_id The post ID this block is saved to.
 */
$form = get_field('form');
$title = get_field('title');
$sub_title = get_field('sub_title');
$description = get_field('description');
$steps = get_field('steps');
?>
<section class="form-section ">
    <div class="container">
        <div class="form-section__wrapper">
            <div class="form-section__data">
                <?php if (!empty($title)): ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>

                <div class="form-section__data_points">
                    <?php if (!empty($sub_title)): ?>
                        <span><?php echo $sub_title; ?></span>
                    <?php endif; ?>

                    <?php if (!empty($steps)): ?>
                        <div class="form-section__data_points_list">
                            <?php foreach ($steps as $step):
                                $point = $step['step'];
                                if (!empty($point)):?>
                                    <div class="form-section__data_points_list_point">
                                        <span><?php echo $point; ?></span>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if (!empty($description)): ?>
                    <?php echo $description; ?>
                <?php endif; ?>
            </div>
            <div class="form">
                <div class="form__sent-message">
                    <div class="form__sent-message_icon">
                        <svg width="81" height="80" viewBox="0 0 81 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M70.5008 36.4774V39.3031C70.497 45.9264 68.3524 52.3711 64.3866 57.6759C60.4209 62.9807 54.8466 66.8615 48.4951 68.7394C42.1436 70.6173 35.3553 70.3918 29.1424 68.0965C22.9296 65.8012 17.6251 61.559 14.0202 56.0027C10.4153 50.4464 8.70305 43.8736 9.13884 37.2647C9.57464 30.6557 12.1351 24.3647 16.4384 19.3299C20.7417 14.295 26.5572 10.7861 33.0177 9.32646C39.4781 7.86681 46.2374 8.53462 52.2873 11.2303"
                                  stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M71.887 12.5088L39.1659 45.2626L29.3496 35.4463" stroke="white" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>

                    <h2>Thank you!</h2>

                    <p>Your form was successfully submitted!</p>
                </div>

                <?php if (!empty($form)): ?>
                    <?php echo do_shortcode('[contact-form-7 id="' . $form . '"]'); ?>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
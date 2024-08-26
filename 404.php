<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package education
 */

use App\Acf\Fields\Link;

get_header();
$error_page = get_field('error_page', 'option');
if ($error_page) {
    $title = $error_page['form_title'];
    $description = $error_page['description'];
    $links_list = $error_page['links'];
    $img = $error_page['cow_image'];
    $form = $error_page['form'];
    $form_title = $error_page['form_title'];
    $form_sub_title = $error_page['form_sub_title'];
    $form_description = $error_page['form_description'];
    $form_steps = $error_page['steps'];
}

$pop_form = '';
if (!empty($form)) {
    $pop_form = ' pop-up-form';
}
?>
    <section class="url-error">
        <div class="container">
            <div class="url-error__wrapper">
                <div class="url-error__data">
                    <?php if (!empty($title)): ?>
                        <h1><?php echo $title; ?></h1>
                    <?php endif; ?>

                    <?php if (!empty($description)): ?>
                        <p><?php echo $description; ?></p>
                    <?php endif; ?>

                    <?php if (!empty($links_list)): ?>
                        <div class="url-error__links">
                            <?php foreach ($links_list as $links):
                                $link = $links['link'];
                                $pop_link = $links['open_form'];

                                $arrow_animation = '';
                                if (empty($pop_link)) {
                                    $arrow_animation = 'animated-arrow';
                                }
                                ?>
                                <div class="url-error__data_links_wrapper <?php if ($pop_link == 'yes') {
                                    echo $pop_form;
                                } ?>">
                                    <?php echo Link::render_acf_link($link, '', '', "$arrow_animation");
                                    ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if (!empty($img)): ?>
                    <div class="url-error__img">
                        <?php echo wp_get_attachment_image($img, 'full', '', array()); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="form error-page-form">
            <?php include locate_template('/views/steps.php'); ?>

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

            <div class="form__cross-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.75 5.25L5.25 18.75" stroke="#899FB6" stroke-width="1.5" stroke-linecap="square"
                          stroke-linejoin="round"/>
                    <path d="M18.75 18.75L5.25 5.25" stroke="#899FB6" stroke-width="1.5" stroke-linecap="square"
                          stroke-linejoin="round"/>
                </svg>
            </div>

            <?php if (!empty($form)): ?>
                <?php echo do_shortcode('[contact-form-7 id="' . $form . '"]'); ?>
            <?php endif; ?>
        </div>
    </section>
<?php get_footer();
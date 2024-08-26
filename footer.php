<?php
wp_footer();
$footer = get_field('footer', 'option');

if ($footer) {
    $logo = $footer['logo'];
    $mail = $footer['mail_link'];
    $privacy = $footer['privacy_policy_link'];
    $sitemap = $footer['sitemap_link'];
    $address = $footer['address'];
    $copyright = $footer['copyright_text'];
}
?>
<footer class="footer-section">
    <div class="container">
        <div class="footer-section__wrapper">
            <div class="footer-section__lists">
                <div class="footer-section__lists_address">
                    <?php if (!empty($logo)): ?>
                        <div class="footer-section__lists_address_logo">
                            <?php echo wp_get_attachment_image($logo, 'full', '', array('class' => 'header-section__logo_light')); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($address)): ?>
                        <p><?php echo $address; ?></p>
                    <?php endif; ?>

                    <?php if (!empty($mail)): ?>
                        <?php
                        $mail_title = $mail['title'];
                        $mail_url = $mail['url'];
                        $mail_target = $mail['target'];
                        ?>
                        <a target="<?php echo $mail_target; ?>" href="<?php echo $mail_url; ?>">
                            <?php echo $mail_title; ?></a>
                    <?php endif; ?>
                </div>

                <div class="footer-section__lists_menus">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'footer-menu_col1',
                        'menu' => 'Footer Menu Col1',
                        'depth' => 1,
                        'container' => 'nav',
                    ]);
                    ?>

                    <?php
                    wp_nav_menu([
                        'theme_location' => 'footer-menu_col2',
                        'menu' => 'Footer Menu Col2',
                        'depth' => 1,
                        'container' => 'nav',
                    ]);
                    ?>

                    <?php
                    wp_nav_menu([
                        'theme_location' => 'footer-menu_col3',
                        'menu' => 'Footer Menu Col3',
                        'depth' => 1,
                        'container' => 'nav',
                    ]);
                    ?>
                </div>
            </div>

            <div class="footer-section__copyright">
                <div class="footer-section__copyright_social-icons">
                    <a class="footer-section__copyright_social-icons_icon" href="#">
                        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27.5 11V15.4H25.3C24.541 15.4 24.2 16.291 24.2 17.05V19.8H27.5V24.2H24.2V33H19.8V24.2H16.5V19.8H19.8V15.4C19.8 14.233 20.2636 13.1139 21.0887 12.2887C21.9139 11.4636 23.033 11 24.2 11H27.5Z"
                                  fill="white"/>
                        </svg>
                    </a>

                    <a class="footer-section__copyright_social-icons_icon" href="#">
                        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M29.6996 12.0991C30.2831 12.0991 30.8427 12.3309 31.2552 12.7435C31.6678 13.1561 31.8996 13.7156 31.8996 14.2991V29.6991C31.8996 30.2826 31.6678 30.8422 31.2552 31.2548C30.8427 31.6673 30.2831 31.8991 29.6996 31.8991H14.2996C13.7161 31.8991 13.1566 31.6673 12.744 31.2548C12.3314 30.8422 12.0996 30.2826 12.0996 29.6991V14.2991C12.0996 13.7156 12.3314 13.1561 12.744 12.7435C13.1566 12.3309 13.7161 12.0991 14.2996 12.0991H29.6996ZM29.1496 29.1491V23.3191C29.1496 22.3681 28.7718 21.4559 28.0993 20.7834C27.4268 20.1109 26.5147 19.7331 25.5636 19.7331C24.6286 19.7331 23.5396 20.3051 23.0116 21.1631V19.9421H19.9426V29.1491H23.0116V23.7261C23.0116 22.8791 23.6936 22.1861 24.5406 22.1861C24.949 22.1861 25.3407 22.3484 25.6296 22.6372C25.9184 22.926 26.0806 23.3177 26.0806 23.7261V29.1491H29.1496ZM16.3676 18.2151C16.8577 18.2151 17.3278 18.0204 17.6743 17.6739C18.0209 17.3273 18.2156 16.8572 18.2156 16.3671C18.2156 15.3441 17.3906 14.5081 16.3676 14.5081C15.8746 14.5081 15.4017 14.704 15.0531 15.0526C14.7045 15.4012 14.5086 15.8741 14.5086 16.3671C14.5086 17.3901 15.3446 18.2151 16.3676 18.2151ZM17.8966 29.1491V19.9421H14.8496V29.1491H17.8966Z"
                                  fill="white"/>
                        </svg>
                    </a>

                    <a class="footer-section__copyright_social-icons_icon" href="#">
                        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M34.012 14.2991C33.165 14.6841 32.252 14.9371 31.306 15.0581C32.274 14.4751 33.022 13.5511 33.374 12.4401C32.461 12.9901 31.449 13.3751 30.382 13.5951C29.513 12.6491 28.292 12.0991 26.906 12.0991C24.321 12.0991 22.209 14.2111 22.209 16.8181C22.209 17.1921 22.253 17.5551 22.33 17.8961C18.414 17.6981 14.927 15.8171 12.606 12.9681C12.199 13.6611 11.968 14.4751 11.968 15.3331C11.968 16.9721 12.793 18.4241 14.069 19.2491C13.288 19.2491 12.562 19.0291 11.924 18.6991C11.924 18.6991 11.924 18.6991 11.924 18.7321C11.924 21.0201 13.552 22.9341 15.708 23.3631C15.312 23.4731 14.894 23.5281 14.465 23.5281C14.168 23.5281 13.871 23.4951 13.585 23.4401C14.179 25.2991 15.906 26.6851 17.985 26.7181C16.379 27.9941 14.344 28.7421 12.122 28.7421C11.748 28.7421 11.374 28.7201 11 28.6761C13.09 30.0181 15.576 30.7991 18.238 30.7991C26.906 30.7991 31.669 23.6051 31.669 17.3681C31.669 17.1591 31.669 16.9611 31.658 16.7521C32.582 16.0921 33.374 15.2561 34.012 14.2991Z"
                                  fill="white"/>
                        </svg>
                    </a>
                </div>

                <div class="footer-section__copyright_data">
                    <p>
                        <?php if (!empty($privacy)): ?>
                            <?php
                            $privacy_title = $privacy['title'];
                            $privacy_url = $privacy['url'];
                            $privacy_target = $privacy['target'];
                            ?>
                            <a target="<?php echo $privacy_target; ?>" href="<?php echo $privacy_url; ?>">
                                <?php echo $privacy_title; ?></a>
                        <?php endif; ?>

                        <?php if (!empty($sitemap)): ?>
                            <?php
                            $sitemap_title = $sitemap['title'];
                            $sitemap_url = $sitemap['url'];
                            $sitemap_target = $sitemap['target'];
                            ?>
                            <a target="<?php echo $sitemap_target; ?>" href="<?php echo $sitemap_url; ?>">
                                <?php echo $sitemap_title; ?></a>
                        <?php endif; ?>
                    </p>

                    <?php if (!empty($copyright)): ?>
                        <p><?php echo $copyright; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
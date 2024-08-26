document.addEventListener('DOMContentLoaded', function () {
    const headerEl = document.querySelector('.header-section'),
        bodyEl = document.body;

    if (headerEl) {
        let menuIcon = headerEl.querySelector('.header-section__buttons_burger-icon'),
            menu = headerEl.querySelector('.header-section__menu'),
            menuItems = headerEl.querySelectorAll(".menu > li");

        menuIcon.addEventListener("click", openMenu);

        function openMenu(event) {
            let headerElHeight = headerEl.clientHeight;

            headerEl.classList.toggle('open');
            hide_body();
            if (headerEl.classList.contains('open')) {
                menu.style.top = headerElHeight + 'px';
            } else {
                menu.style.top = null;
            }

            document.addEventListener('keyup', function (event) {
                if (event.code === 'Escape') {
                    headerEl.classList.remove('open');
                    bodyEl.style.overflow = 'auto';
                }
            });
        }

        //Burger items scroll
        menuItems.forEach(function (el) {
            el.addEventListener('click', () => {
                let dataElement = el.lastElementChild;

                if (el.classList.contains('openItem')) {
                    dataElement.style.maxHeight = null;
                    el.classList.remove('openItem');
                } else {
                    dataElement.style.maxHeight = dataElement.scrollHeight + 'px';
                    el.classList.add("openItem");
                }
            });
        });

        //SCROLL styles
        headerScroll();
        window.addEventListener('scroll', headerScroll);

        function headerScroll(event) {
            let mainElScroll = window.scrollY,
                headerElHeight = headerEl.clientHeight;

            if (mainElScroll > headerElHeight) {
                headerEl.classList.add('scroll');
            } else {
                headerEl.classList.remove('scroll');
            }
        }

        //sub-menu checker
        menuItems.forEach(function (item) {
            let sub_menu = headerEl.querySelectorAll('.sub-menu');
            sub_menu.forEach(function (sub) {
                if (item.contains(sub)) {
                    let link_title = item.children[0];
                    link_title.classList.add('drop_down_styles');
                }
            });
        });

        function hide_body() {
            bodyEl.classList.toggle('hidden');
        }

        function display_none(i) {
            i.style.display = "none";
        }

        //Cookies js
        let cookies_block = document.querySelector('.cookies');

        if (cookies_block) {
            let cookies_button = cookies_block.querySelector('.cookies__accept-button');

            cookies_button.addEventListener('click', confirm_cookies);

            function confirm_cookies() {
                let cookie_value = "Confirmed",
                    expires = new Date(new Date().setFullYear(new Date().getFullYear() + 1)).toUTCString();

                console.log(expires);

                document.cookie = "CookiesAgreement=" + cookie_value + ";path=/" + "; expires=" + expires;
                display_none(cookies_block);
            }
        }

        //Banner js
        let banner_body = document.querySelector('.banner');

        if (banner_body) {
            hide_body();

            banner_body.querySelectorAll('.close_banner').forEach(function (button) {
                button.addEventListener('click', function () {
                    let UTCDate = new Date(new Date().setFullYear(new Date().getFullYear() + 1)).toUTCString();
                    document.cookie = `Banner=Shown; expires=${UTCDate}`;
                    display_none(banner_body);
                    hide_body();
                });
            })
        }
    }
});
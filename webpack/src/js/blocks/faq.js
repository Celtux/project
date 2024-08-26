const faq_section = document.querySelector('.faq-section');

if (faq_section) {
    let faq_item = faq_section.querySelectorAll('.faq-section__body_item'),
        faq_item_title = faq_section.querySelectorAll('.faq-section__body_item_title'),
        faq_item_data = faq_section.querySelectorAll('.faq-section__body_item_data');

    set_max_height();
    window.addEventListener('resize', set_max_height);

    faq_item_title.forEach(function (el) {
        el.addEventListener('click', () => {
            let dataElement = el.nextElementSibling,
                targetParent = el.parentElement,
                auto_close_value = faq_section.querySelector('.faq-section__body').dataset.check;

            if (targetParent.classList.contains('openString')) {
                dataElement.style.maxHeight = null;
                targetParent.classList.remove('openString');
            } else {
                if (auto_close_value === '1') {
                    settings_clear();
                }
                dataElement.style.maxHeight = dataElement.scrollHeight + 'px';
                targetParent.classList.add("openString");
            }
        });
    });

    function settings_clear() {
        faq_item.forEach(function (el) {
            el.classList.remove('openString');
        });
        faq_item_data.forEach(function (el) {
            el.style.maxHeight = null;
        });
    }

    function set_max_height(event) {
        faq_item.forEach(function (el) {
            if (el.classList.contains('openString')) {
                let open_dataElement = el.lastElementChild;
                open_dataElement.style.maxHeight = open_dataElement.scrollHeight + 'px';
            }
        });
    }
}
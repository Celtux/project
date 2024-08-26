const pop_up_form = document.querySelectorAll('.pop-up-form'),
    bodyEl = document.body;
pop_up_form.forEach(function (el) {
    el.addEventListener('click', open_form);
});

function open_form(event) {
    let crossIcon = document.querySelector('.form__cross-icon');
    bodyEl.classList.add('form_active');

    document.addEventListener('keyup', function (event) {
        if (event.code === 'Escape') {
            close_form();
        }
    });

    document.addEventListener('click', function (event) {
        let dark_bg = document.querySelector('.dark-bg');

        if (!crossIcon.contains(event.target) && dark_bg.contains(event.target)) {
            close_form();
        }
    });

    crossIcon.addEventListener("click", close_form);
}

function close_form(event) {
    bodyEl.classList.remove('form_active');
}
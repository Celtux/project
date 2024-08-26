document.addEventListener('DOMContentLoaded', function () {
    const forms_block = document.querySelectorAll('.form');

    forms_block.forEach(function (form) {
        if (form) {
            const form_container = form.querySelector('.wpcf7');

            if (form_container) {
                let file_input = form.querySelector('.wpcf7-file'),
                    submit_btn = form.querySelector('.wpcf7-submit'),
                    label_file = form.querySelector('.wpcf7-form_send_file'),
                    error_msg = label_file.getElementsByClassName('wpcf7-not-valid-tip'),
                    file_clear_icon = form.querySelector('.wpcf7-form_send svg');

                file_input.addEventListener('change', function () {

                    if (file_input.value === '') {
                        file_msg_clear();
                    } else {
                        label_file.classList.add('contains_file');

                        let file = file_input.files[0],
                            file_size_mb = (file.size / (1024 * 1024)).toFixed(2);

                        function isfile(element) {
                            const type = ['.doc(x)', '.pdf', '.zip', '.xlsx', '.csv'];
                            return type.some(el => element.name.endsWith(el));
                        }

                        if (!isfile(file)) {
                            btn_disable();
                        } else if (file_size_mb > 25) {
                            btn_disable();

                            setTimeout(function () {
                                let message = label_file.querySelector('.wpcf7-not-valid-tip'),
                                    message_text = message.innerHTML;
                                message.innerHTML = (`${message_text} ${file_size_mb} MB attached.`);
                            }, 0);
                        }


                        file_clear_icon.addEventListener('click', function () {
                            file_input.value = '';
                            file_msg_clear();
                        })
                    }
                });

                form.addEventListener("wpcf7mailsent", function (e) {
                    form.classList.toggle('form-submit');
                });

                form.addEventListener('wpcf7beforesubmit', (e) => {
                    btn_disable();
                });

                form.addEventListener('wpcf7invalid', (e) => {
                    btn_enable();
                });

                function btn_disable() {
                    submit_btn.setAttribute("disabled", true);
                    submit_btn.style.opacity = "0.5";
                }

                function btn_enable() {
                    submit_btn.removeAttribute("disabled");
                    submit_btn.style.opacity = "1";
                }

                function file_msg_clear() {
                    label_file.classList.remove('contains_file');
                    error_msg[0].style.display = 'none';
                    btn_enable();
                }
            }
        }
    })
});
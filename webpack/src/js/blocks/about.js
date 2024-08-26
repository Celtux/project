const about_section = document.querySelector('.about');
if (about_section) {

    window.addEventListener('scroll', numberScroll);

    let mainElScroll = window.innerHeight - 40,
        position = about_section.getBoundingClientRect().top;

    if (mainElScroll >= position) {
        numberScroll();
        window.removeEventListener('scroll', numberScroll);
    }
    function numberScroll(event) {
        let numbers_containers = about_section.querySelectorAll('.about__stats_stat h3');

        numbers_containers.forEach(function (number) {
            let start = number.innerHTML,
                end = number.dataset.max,
                interval = setInterval(function () {
                    number.innerHTML = ++start;

                    if (start >= end) {
                        clearInterval(interval);
                    }
                }, 100);
        });

        window.removeEventListener('scroll', numberScroll);
    }
}
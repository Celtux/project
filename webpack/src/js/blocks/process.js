const process_section = document.querySelector('.process');
if (process_section) {
    let tabs = process_section.querySelectorAll('.process__data_tabs_tab'),
        tabs_content = process_section.querySelectorAll('.process__data_content');

    tabs.forEach(function (tab) {
        tab.addEventListener('click', openTab);
    });

    function openTab(el) {
        let tab_target = el.currentTarget,
            tab_number = tab_target.dataset.tabName;

        tabs_content.forEach(function (el) {
            el.classList.remove("active");
        });

        tabs.forEach(function (el) {
            el.classList.remove("active-tab");
        });

        process_section.querySelector(`[data-tab=${tab_number}]`).classList.add("active");
        tab_target.classList.add("active-tab");
    }
}


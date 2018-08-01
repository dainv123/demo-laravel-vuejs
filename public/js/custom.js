// var prev = document.querySelectorAll('a.footer__navigation__page-btn.disabled')[0].lastChild;
// var next = document.querySelectorAll('a.footer__navigation__page-btn.disabled')[1].firstChild;
// prev.innerHTML = '<i class="fa fa-chevron-left" />';
// next.innerHTML = '<i class="fa fa-chevron-right" />';
var tbtn_toggle_menu = document.querySelector('.sidebar-minimizer') || '';
var toggle_menu = document.querySelector('.app-header .sidebar-toggler') || '';
tbtn_toggle_menu.onclick = function () {
    toggle_menu.classList.toggle('visibility-hidden');
}


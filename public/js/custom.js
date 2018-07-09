var prev = document.querySelectorAll('a.footer__navigation__page-btn.disabled')[0].lastChild;
var next = document.querySelectorAll('a.footer__navigation__page-btn.disabled')[1].firstChild;
prev.innerHTML = '<i class="fa fa-chevron-left">';
next.innerHTML = '<i class="fa fa-chevron-right">';

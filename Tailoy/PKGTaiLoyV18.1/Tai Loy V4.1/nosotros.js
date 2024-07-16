document.addEventListener('DOMContentLoaded', function() {
    const menuCheckbox = document.getElementById('menu');
    const body = document.body;

    menuCheckbox.addEventListener('change', function() {
        if (this.checked) {
            body.classList.add('menu-open');
        } else {
            body.classList.remove('menu-open');
        }
    });

    const menuItems = document.querySelectorAll('.navbar ul li a');
    menuItems.forEach(item => {
        item.addEventListener('click', function() {
            menuCheckbox.checked = false;
            body.classList.remove('menu-open');
        });
    });
});

//transicion imagenes//
window.onbeforeunload = function() {
    // Agregue una clase al elemento contenedor (por ejemplo, "imagen1") para desencadenar una transición CSS
    document.querySelector('.imagen1').classList.add('page-exit');
  };
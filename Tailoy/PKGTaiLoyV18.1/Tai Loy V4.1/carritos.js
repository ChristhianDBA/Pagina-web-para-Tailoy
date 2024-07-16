
/*Menu Desplegable*/

document.addEventListener('DOMContentLoaded', function () {
    const categoriasLink = document.getElementById('categorias-link');
    const categoriasToggle = document.getElementById('menu-toggle');
    const closeIcon = document.querySelector('.close-icon');

    categoriasLink.addEventListener('click', function () {
        categoriasToggle.checked = !categoriasToggle.checked;
    });

    closeIcon.addEventListener('click', function () {
        categoriasToggle.checked = false;
    });
});



document.addEventListener("DOMContentLoaded", function () {
    const btnMenu = document.getElementById("btn-menu");
    btnMenu.addEventListener("change", function () {
        const containerMenu = document.querySelector(".container-menu");
        if (this.checked) {
            containerMenu.style.opacity = "1";
            containerMenu.style.visibility = "visible";
        } else {
            containerMenu.style.opacity = "0";
            containerMenu.style.visibility = "hidden";
        }
    });
});

let listButtons = document.querySelectorAll('.list__button--click');

listButtons.forEach(listButton => {
    listButton.addEventListener('click', () => {
        listButton.classList.toggle('arrow'); // Añade o remueve la clase 'arrow'

        let height = 0;
        let menu = listButton.nextElementSibling;
        if (menu.clientHeight > 0) {
            height = 0; // Si está abierto, lo cierra
        } else {
            height = menu.scrollHeight; // Si está cerrado, lo abre
        }

        menu.style.height = `${height}px`;
    });
});

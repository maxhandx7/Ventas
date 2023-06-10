const temaOscuro = () => {
    document.querySelector("body").setAttribute("class", "sidebar-dark");
    document.querySelector("#navbar").setAttribute("class", "navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar navbar-dark");
    document.querySelector("#dl-icon").setAttribute("class", "fa fa-sun");
    localStorage.setItem("tema", "oscuro");
}

const temaClaro = () => {
    document.querySelector("body").setAttribute("class", "");
    document.querySelector("#navbar").setAttribute("class", "navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar");
    document.querySelector("#dl-icon").setAttribute("class", "fa fa-moon");
    localStorage.setItem("tema", "claro");
}

const cambiarTema = () => {
    document.querySelector("body").getAttribute("class") === "" ?
        temaOscuro() : temaClaro();
}

window.addEventListener("DOMContentLoaded", () => {
    const temaGuardado = localStorage.getItem("tema");
    if (temaGuardado === "oscuro") {
        temaOscuro();
    } else if (temaGuardado === "claro") {
        temaClaro();
    }
});


$(document).ready(function () {
    setTimeout(function () {
        $('#success-message').fadeOut('slow');
    }, 5000);
});


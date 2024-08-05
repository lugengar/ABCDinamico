function redirigir(href) {
    var element = document.getElementById(href);
    if (element) {
        var elementPosition = element.getBoundingClientRect().top;
        var offsetPosition = elementPosition + window.pageYOffset - 50; // Ajusta los 50 píxeles según tus necesidades

        window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
        });
    }
}

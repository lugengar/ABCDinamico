const popoverButton = document.querySelectorAll(".pop");
const contenedor = document.querySelectorAll(".pop2");
const overlay = document.getElementById('overlay');
let elegido = 0;
console.log("aaaaaaaaaaaaaaaaaaaaaaaaaa")
popoverButton.forEach((element, index) => {
    element.addEventListener('click', () => {
console.log("aaaaaaaaaaaaaaaaaaaaaaaaaa")

        elegido = index;
        document.body.classList.add('inactive');
        contenedor[elegido].style.display = 'block';
        overlay.style.display = 'block';
    });
});

overlay.addEventListener('click', () => {
    document.body.classList.remove('inactive');
    contenedor[elegido].style.display = 'none';
    overlay.style.display = 'none';
});
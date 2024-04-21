var menuItem = document.querySelectorAll('.item-menu')

function selectLink(event) {
    menuItem.forEach((item) =>
        item.classList.remove('ativo')
    );
    
    event.currentTarget.classList.add('ativo');
}

menuItem.forEach((item) =>
    item.addEventListener('click', selectLink)
);


///expandir o menu

var btnExp = document.querySelector('#btn-exp')
var menuSide = document.querySelector('.menu-lateral')

btnExp.addEventListener('click', function(){
 menuSide.classList.toggle('expandir')
})
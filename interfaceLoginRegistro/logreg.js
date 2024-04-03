const idSection = document.querySelector('.area-login');
const idCad = document.querySelector('#cadtela');
const secRight = document.querySelector('.form');
const secLeft = document.querySelector('.intro');
const idLogin = document.querySelector('#logtela');
const areaCad = document.querySelector('.area-cadastro');
const curs = document.querySelector('.log-text');
const inputEspace = document.querySelector('.input-Cad');

// Função de Ativação do Cadastro
function esp(){
    idSection.classList.toggle('expandir');
    secLeft.classList.toggle('expandir');
    secRight.classList.toggle('expandir');
    areaCad.classList.toggle('expandir');
    curs.classList.toggle('expandir');
    inputEspace.classList.toggle('expandir');
}


// Função de Reversão do Cadastro
function revert(){
    idSection.classList.remove('expandir');
    secLeft.classList.remove('expandir');
    secRight.classList.remove('expandir');
    areaCad.classList.remove('expandir');
    curs.classList.remove('expandir');
    inputEspace.classList.remove('expandir');
}

// Chamada das Funções
idLogin.addEventListener('click', revert)
idCad.addEventListener('click', esp);




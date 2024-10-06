let cl = document.querySelector(".close"),
    buy = document.querySelector('.center-container'),
    body = document.body;

function darkMode() {
    let body = document.body;

    console.log('dark mode di klik');
    body.classList.toggle('dark-mode');
}

cl.addEventListener('click', function () {
    buy.classList.remove("show");
});

function pesan(event){
    let menuName;
    let buy=document.querySelector('.center-container');

    buy.classList.add('show');
    
    let title = event.target;
    menuName = title.parentNode.getAttribute('data-menu');
    menuImg = title.parentNode.getAttribute('img');

    document.getElementById('form-img').src = menuImg;
    document.getElementById('form-img').alt = menuName;

    document.getElementById('t-img').textContent = menuName;

    document.getElementById('pesanan').value = menuName;
}





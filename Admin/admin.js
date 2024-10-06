function toggleHandle() {
    var contentDiv = document.querySelector('.content');
    var switchtDiv = document.querySelector('.switch-content');
    var toggleButton = document.getElementById('btnHandle');
    var title = document.querySelector('.title');

    if (contentDiv.style.display === 'block') {
        contentDiv.style.display = 'none';
        title.textContent = 'Riwayat';
        switchtDiv .style.display = 'block';
        toggleButton.textContent = 'Kembali';
        toggleButton.style.backgroundColor = 'red';
    } else {
        switchtDiv.style.display = 'none';
        contentDiv.style.display = 'block';
        title.textContent = 'Orders';
        toggleButton.textContent = 'Riwayat';
        toggleButton.style.backgroundColor = '#33da09';
    }
}

function toggleHandle1() {
    var contentDiv = document.querySelector('.content');
    var switchtDiv = document.querySelector('.switch-content');
    var switchtDiv1 = document.querySelector('.switch-content1');
    var toggleButton = document.getElementById('btnHandle');
    var title = document.querySelector('.title');

    if (contentDiv.style.display === 'block') {
        contentDiv.style.display = 'none';
        title.textContent = 'Tambah Menu';
        switchtDiv.style.display = 'block';
        toggleButton.textContent = 'Kembali';
        toggleButton.style.backgroundColor = 'red';
    } else {
        switchtDiv.style.display = 'none';
        switchtDiv1.style.display = 'none';
        contentDiv.style.display = 'block';
        title.textContent = 'Menu';
        toggleButton.textContent = 'Tambah Menu';
        toggleButton.style.backgroundColor = '#33da09';
    }
}


function toggleHandle2(id){
    var contentDiv = document.querySelector('.content');
    var switchtDiv1 = document.querySelector('.switch-content1');
    var toggleButton = document.getElementById('btnHandle');
    var title = document.querySelector('.title');

    var editUrl = 'edit.php?edit=' + id;

        // Buat objek XMLHttpRequest
        var xhr = new XMLHttpRequest();

        // Atur tindakan yang akan diambil saat permintaan selesai
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Isi kontainer dengan konten halaman edit.php yang dimuat
                switchtDiv1.innerHTML = this.responseText;
            }
        };

        // Buat permintaan GET untuk memuat halaman edit.php
        xhr.open("GET", editUrl, true);
        xhr.send();

    if (contentDiv.style.display === 'block') {
        contentDiv.style.display = 'none';
        title.textContent = 'Edit';
        toggleButton.textContent = 'Kembali';
        switchtDiv1 .style.display = 'block';
        toggleButton.style.backgroundColor = 'red';
    } else {
        switchtDiv1.style.display = 'none';
        contentDiv.style.display = 'block';
        title.textContent = 'Menu';
        toggleButton.style.backgroundColor = '#33da09';
    }
}







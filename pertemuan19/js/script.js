// ambil elemen yang dibutuhkan
const keyword = document.getElementById('keyword');
const tombolCari = document.getElementById('tombol-cari');
const container = document.getElementById('container');

// tambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function(){
    // buat object ajax
    const xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){ //readyState nilai nya antara 0-4, dan 4 artinya sumbernya sudah siap; dan untuk status jika bernilai 200 berarti sumbernya sudah ada 
            container.innerHTML = xhr.responseText;
        }
    }

    // eksekusi ajax
    xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true); //request method, sumber, dan syncronus/asyncronus (jika true berarti asyncronus)
    xhr.send(); //untuk menjalankan ajax
});
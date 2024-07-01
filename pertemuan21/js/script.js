$(document).ready(function(){ //ini artinya meminta jquery untuk mencari document dan ketika document nya siap maka jalankan fungsi ini
    // menghilangkan tombol cari
    $('#tombol-cari').hide();
    
    // event ketika keyword ditulis
    $('#keyword').on('keyup', function(){
        // memuncilkan icon loding
        $('.loader').show();

        // ajax menggunakan load
        // $('container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

        // $.get();
        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data){
            $('#container').html(data);
            $('.loader').hide();
        });
    });
});
<?php
    // koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");

    // ambil data dari table mahasiswa
    function query($query){
        global $conn;

        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    // tambah data ke table mahasiswa
    function tambah($data){
        global $conn;

        // ambil data dari form
        $nrp = htmlspecialchars($data["nrp"]); //berfungsi agar tidak menampilkan elemen html
        $nama = htmlspecialchars($data["nama"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $email = htmlspecialchars($data["email"]);


        // upload gambar
        $gambar = upload();
        if(!$gambar){ //gagal
            return false; //agar fungsi yang dibaawahnya tidak dijalankan
        }

        // query insert data
        $query = "INSERT INTO mahasiswa VALUES('', '$nama', '$nrp', '$jurusan', '$email', '$gambar')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function upload(){
        $namaFile = $_FILES['gambar']['name']; //ini menghasilkan nama file yang diupload
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error']; //untuk mengetahui adakah gambar yang di upload
        $tmpName = $_FILES['gambar']['tmp_name']; //tempat penyimpanan gambar sementara

        // cek jika tidak ada gambar yang di upload
        if($error === 4){ //tidak ada gambar yang di upload
            echo "<script>
                    alert('Pilih gambar terlebih dahulu');
                </script>";
            return false;
        }

        // cek yang di upload harus gambar
        $extensiGambarValid = ['jpg', 'jpeg', 'png'];
        $extensiGambar = explode('.', $namaFile); //nama file akan diubah menjadi sebuah array yang berisi nama file, extensi file
        $extensiGambar = strtolower(end($extensiGambar)); //ini mengambil pecahan file yang terakhir dan memaksa extensi flle menjadi huruf kecil
        if(!in_array($extensiGambar, $extensiGambarValid)){ //mencari nama extensi file yang diupload ke extensiGambarValid  dan ini menghadilan nilai boolean (jika file yang diupload tidak valid)
            echo "<script>
                    alert('Yang anda upload bukan gambar');
                </script>";
            return false;
        }

        // cek jika ukuranya terlalu besar
        if($ukuranFile > 10000000){ //ini dalam satuan byte
            echo "<script>
                    alert('Ukuran gambar terlalu besar');
                </script>";
            return false;
        }

        // lolos pengecekan gambar siap diupload
        // generate nama baru gambar
        $namaFileBaru = uniqid(); //ini akan membangkitkan string random
        $namaFileBaru .= '.';
        $namaFileBaru .= $extensiGambar;

        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
        return $namaFileBaru; //agar nama gambar bisa dimasukan ke database
    }

    // hapus data
    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
        return mysqli_affected_rows($conn);
    }

    // ubah data
    function ubah($data){
        global $conn;

        // ambil data dari form
        $id = $data["id"];
        $nrp = htmlspecialchars($data["nrp"]); //berfungsi agar tidak menampilkan elemen html
        $nama = htmlspecialchars($data["nama"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $email = htmlspecialchars($data["email"]);
        $gambarLama = $data["gambarLama"];

        // cek apakah user memilih gambar baru
        if($_FILES['gambar']['error'] === 4){ //user tidak mengupload gambar baru
            $gambar = $gambarLama;
        }else{
            $gambar = upload();
        }

        // query ubah data
        $query = "UPDATE mahasiswa SET nama = '$nama', nrp = '$nrp', jurusan = '$jurusan', email = '$email', gambar = '$gambar' WHERE id = $id";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    // cari data
    function cari($keyword){
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nrp LIKE '%$keyword%' OR jurusan LIKE '%$keyword%' OR email LIKE '%$keyword%'";
        return query($query);
    }
?>
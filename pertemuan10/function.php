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

        // query insert data
        $query = "INSERT INTO mahasiswa VALUES('', '$nama', '$nrp', '$jurusan', '$email')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    // hapus data
    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
        return mysqli_affected_rows($conn);
    }
?>
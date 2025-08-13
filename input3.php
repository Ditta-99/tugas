<?php
// Definisikan nama JSON, yaitu barang.json
define('FILE_JSON', 'frm3.json');

/*Prosedur untuk cek file apakah file JSON ada, jika tidak ada. 
maka buat file JSON dengan data kosong */

function cekFileJson() {
    if (!file_exists(FILE_JSON)) {
        file_put_contents(FILE_JSON, json_encode([]));
    }
}

// Fungsi untuk membaca data dari file JSON
function bacaDataJson() {
    /* PHP tidak mengenal tipe data JSON, yang ada tipe data ARRAY, 
    jadi lakukan konversi data JSON ke array dengan perintah "json_decode".
    Setelah dikonversi, kembalikan hasil konversi ke fungsi yang memanggilnya 
    menggunakan perintah -return-*/
    return json_decode(file_get_contents(FILE_JSON), true);
}

// Proses saat form dikirim
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // PANGGIl prosedur file cekFileJson()
    cekFileJson();

    /* Simpan ke variabel Ambil data dari form (name input type) */ 
    $merek= $_POST['merek'];
    $tahun= $_POST['tahun'];

    // Panggil fungsi bacaDataJson()
    $data_merek = bacaDataJson();

    
    //menambahkan data baru ke dalam array
 $data_merek [] = [
            'merek'  => $merek,
            'tahun'  => $tahun
 ];

 /*konversi data array pada "$data_login" ke JSON dengan perintah "json_encode". 
 hasil konversi temoatkan kr file JSON dengan perintah "file_put_contents".
 format output JSON agar lebih mudah dibaca oleh manusia dengan perintah
 "JSON_PRETTY_PRINT".
 */

 file_put_contents(FILE_JSON, json_encode($data_merek, JSON_PRETTY_PRINT));
 //tampilkan pesan data berhasil ditambah
 echo "<script>alert('data berhasil ditambahkan!');</script>";
 //setelah tombol OK diklik pd pesen, alihkan halaman ke tabel hasil tambah peserta
 echo"<script>window.location.href = 'view3.php'</script>";
}


?>
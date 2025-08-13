
<style>

/* Edit header */
h3 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

/* Gaya untuk tabel */
    table {
        width: 40%;
        border-collapse: collapse;
        margin: 20px; Auto;
        margin-left: Auto;
        margin-right: Auto;
    }

/*Gaya untuk judul tabel */
    th {
/* Warna latar belakang hijau untuk judul */
        background-color: #104d70ff;
/* Warna teks putih */ 
        color: white; 
        padding: 10px;
        text-align: center;

    }

/* Gaya untuk data tabel */
    td {
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid #add; 
/* Garis bawah pada setiap baris */
    }

/*Warna selang-seling pada baris data */
    tr:nth-child(odd) {
        background-color: #a7d2f5ff;
/*Warna abu-abu terang untuk baris ganjil */
        
    }

    tr:nth-child(even) {
        background-color: #ffffffff;
/*Warna putih untuk baris genap */
        
    }

/*Gaya untuk tabel ketika disorot */
    tr:hover {
        background-color: add; 
/* Warna latar belakang saat baris disorot */

    }
</style>

<?php
define('FILE_JSON', 'frm5.json');

function cekFileJson() {
       if (!file_exists(FILE_JSON)) {
             file_put_contents(FILE_JSON, json_encode([]));
        }

        $json = file_get_contents(FILE_JSON);
        return json_decode(file_get_contents(FILE_JSON), true);

}

$data_barang = cekFileJson();
$total_data = count($data_barang);

if ($total_data == 0) {
    echo "<p>Belum ada data yang disimpan </p>";

} else {
    echo "<table border= '1'>
    <h3>DATA INVENTARIS KANTOR</h3>
    <tr>
            <th>NO</th>
            <th>NAMA BARANG</th>
            <th>JUMLAH</th>
    </tr>";

    for ($i = 0; $i < $total_data; $i++) 
    {
            $barang = $data_barang[$i];

            // Menampilkan No
            echo "<tr><td>" .($i + 1) . "</td>";

            // Menampilkan kode produk 
            echo "<td>" . htmlspecialchars($barang['barang']) . "</td>";

            // Menampilkan nama produk
            echo "<td>" . htmlspecialchars($barang['jumlah']) . "</td>";
            echo "</tr>";

    }
    echo "</table>";
    echo "<center><button onclick=\"window.location.href='frm5.html'\">+</button></center>";

}


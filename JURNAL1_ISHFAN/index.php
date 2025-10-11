<?php
// **********************  1  **************************
// Inisialisasi variabel
$nama = $email = $nomor = $pilihfilm=$jumlahtiket="";
$namaerr=$emailerr=$nomorerr=$pilihfilmerr=$jumlahtiketerr ="";


// **********************  2  **************************
// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "") {
    
    // **********************  3  **************************
    // Ambil nilai Nama dari form
    // silakan taruh kode kalian di bawah
    //buatkan validasi yang sesuai
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $nama = trim($_POST["nama"]);
      if(empty($nama)){
        $namaerr = "Nama wajib diisi";
      }
    


    // **********************  4  **************************
    // Ambil nilai Email dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
    $email = trim($_POST["email"]);
    if(empty($email)){
      $emailerr = "email wajib diisi";
     } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailerr = "Format email tidak valid";
      }
    }



    // **********************  5  **************************
    // Ambil nilai Nomor HP dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
    $nomor = trim($_POST["nomor"]);
    if(empty($nomor)){
      $nomorerr = "nomor telepon wajib diisi";
    }elseif (!ctype_digit($nomor)){
      $nomorerr = "nomor telepon hanya boleh angka";
    }


    // **********************  6  **************************
    // Ambil nilai Film (dropdown)
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
    $pilihfilm = $_POST["pilih film"] ?? "";
    if(empty($pilihfilm)){
      $pilihfilmerr = "pilih film";
    }



    // **********************  7  **************************
    // Ambil nilai Jumlah Tiket dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
    $jumlahtiket = trim($_POST ["jumlah tiket"]);
    if(empty($jumlahtiket)){
    $jumlahtiketerr = "jumlah tiket harus diisi";
    }elseif (!ctype_digit($jumlahtiket)){
      $jumlahtiketerr = "jumlah tiket harus berupa angka";
    }
  }

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pemesanan Tiket Bioskop</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
  <!-- **********************  8  **************************
       Tambahkan nilai atribut di dalam src dengan nama file gambar logo bioskop
  -->
  <img src="" alt="Logo Bioskop EAD" class="logo">

  <h2>Form Pemesanan Tiket Bioskop</h2>
  <form method="post" action="">
    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->

    <label>Nama:</label>
    <input type="text" name="nama" value="<?php echo $nama; ?>">
    <span class="error">...</span>

    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Email:</label>
    <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error">...</span>

    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Nomor HP:</label>
    <input type="text" name="nomor" value="<?php echo $nomor; ?>">
    <span class="error">...</span>

    <label>Pilih Film:</label>
    <select name="film">
      <option value="">-- Pilih Film --</option>
      <option value="Interstellar">Interstellar</option>
      <option value="Inception">Inception</option>
      <option value="Oppenheimer">Oppenheimer</option>
      <option value="Avengers: Endgame">Avengers: Endgame</option>
    </select>
    <span class="error"><?php echo $pilihfilm; ?></span>

    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label>Jumlah Tiket:</label>
    <input type="text" name="jumlah" value="<?php echo $jumlahtiket; ?>">
    <span class="error">...</span>

    <button type="submit">Pesan Tiket</button>
  </form>
  
  <!-- **********************  9  ************************** -->
  <!-- Tampilkan hasil input dalam tabel jika semua valid -->
  <!-- silakan taruh kode kalian di bawah -->
   <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !$namaerr && !$emailerr && !$nomorerr && !$pilihfilm && !$jumlahtiketerr) { ?>
  <div class="container">
    <h3>Data Pemesanan:</h3>
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th width="15%">Nama</th>
            <th width="20%">Email</th> 
            <th width="20%">Nomor HP</th> 
            <th width="25%">Film</th> 
            <th width="20%">Jumlah Tiket</th>  
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $nama; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pilihfilm; ?></td>
            <td><?php echo $jumlahtiket; ?></td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
  <?php } ?>
  <?php
  
  ?>
  
</div>
</body>
</html>
  

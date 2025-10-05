<?php
$nama = $email = $nim = $jurusan = $alasan = "";
$namaErr = $emailErr = $nimErr = $jurusanErr = $alasanErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // **********************  1  **************************
    $nama = $_POST['nama'];
    if (empty($nama)) {
        $namaErr = "Nama wajib diisi";
    }

    // **********************  2  **************************
    $email = $_POST['email'];
    if (empty($email)) {
        $emailErr = "Email wajib diisi";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Email tidak valid";
    }

    // **********************  3  **************************
    $nim = $_POST['nim']; 
    if (empty($nim)) {
        $nimErr = "NIM wajib diisi";
    } elseif (!is_numeric($nim)) {
        $nimErr = "NIM harus berupa angka";
    }

    // **********************  4  **************************
    $jurusan = $_POST['jurusan'];
    if ($jurusan == "- Pilih Jurusan -" || empty($jurusan)) {
        $jurusanErr = "Jurusan wajib dipilih";
    }

    // **********************  5  **************************
    $alasan = $_POST['alasan'];
    if (empty($alasan)) {
        $alasanErr = "Alasan wajib diisi";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
  <img src="EAD.png" alt="Logo EAD" class="logo">
  <h2>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</h2>
  <form method="post" action="">
    <label>Nama:</label>
    <input type="text" name="nama" value="<?php echo $nama; ?>">
    <span class="error"><?php echo $namaErr; ?></span>

    <label>Email:</label>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error"><?php echo $emailErr; ?></span>

    <label>NIM:</label>
    <input type="text" name="nim" value="<?php echo $nim; ?>">
    <span class="error"><?php echo $nimErr; ?></span>

    <label>Jurusan:</label>
    <select name="jurusan">
      <option value="">-- Pilih Jurusan --</option>
      <option value="Sistem Informasi">Sistem Informasi</option>
      <option value="Informatika">Informatika</option>
      <option value="Teknik Industri">Teknik Industri</option>
    </select>
    <span class="error"><?php echo $jurusanErr; ?></span>

    <label>Alasan Bergabung:</label>
    <textarea name="alasan"><?php echo $alasan; ?></textarea>
    <span class="error"><?php echo $alasanErr; ?></span>

    <button type="submit">Daftar</button>
  </form>

  <?php
  // **********************  6  **************************
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !$namaErr && !$emailErr && !$nimErr && !$jurusanErr && !$alasanErr) { ?>
    <div class="container" style="margin-top: 20px;"> 
        
          <div style="border: 1px solid #c3e6cb; 
                background-color: #f1fff4; 
                padding: 20px; 
                border-radius: 5px; 
                color: #121212ff;">
    
    <div style="text-align: center;">
        <img src="EAD.png" height="50">
    </div>

        <h3>Data Pendaftaran Berhasil</h3>
        <div class="table-container">
            <table>
                <tr>
                    <td width="40%">Nama</td>
                    <td>:</td>
                    <td><?php echo $nama; ?></td>
                </tr>

                <tr>
                    <td width="40%">Email</td>
                    <td>:</td>
                    <td><?php echo $email; ?></td>
                </tr>

                <tr>
                    <td width="40%">NIM</td>
                    <td>:</td>
                    <td><?php echo $nim; ?></td>
                </tr>

                <tr>
                    <td width="40%">Jurusan</td>
                    <td>:</td>
                    <td><?php echo $jurusan; ?></td>
                </tr>

                <tr>
                    <td width="40%">Alasan Bergabung</td>
                    <td>:</td>
                    <td><?php echo $alasan; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <?php } ?>
</body>
</html>

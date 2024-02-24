<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "kullanici_adi";
$password = "sifre";
$dbname = "randevular";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// Form verilerini alma
$ad = $_POST['ad'];
$soyad = $_POST['soyad'];
$tarih = $_POST['tarih'];

// Veritabanına ekleme
$sql = "INSERT INTO randevu_tablosu (ad, soyad, tarih) VALUES ('$ad', '$soyad', '$tarih')";

if ($conn->query($sql) === TRUE) {
  echo "Randevu başarıyla alındı";
} else {
  echo "Hata oluştu: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

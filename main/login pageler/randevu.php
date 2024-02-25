<!DOCTYPE html>
<html>
<head>
    <title>Randevu Al</title>
    <style>
        /* CSS stilleri buraya */
    </style>
</head>
<body>
    <h2>Randevu Al</h2>
    <form action="randevu_kaydet.php" method="post">
        Adı: <input type="text" name="adi"><br>
        Soyadı: <input type="text" name="soyadi"><br>
        Telefon: <input type="text" name="telefon"><br>
        Tercih Edilen Doktor: 
        <select name="doktor">
            <?php

            $conn = new mysqli("127.0.0.1","root","123","test");
            // Bağlantıyı kontrol et
            if ($conn->connect_error) {
              die("Bağlantı hatası: " . $conn->connect_error);
            }

            // Doktor verilerini çek
            $sql = "SELECT * FROM doctor";
            $result = $conn->query($sql);

            // Verileri ekrana yazdır
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
              }
            } else {
              echo "<option value=''>Doktor bulunamadı</option>";
            }

            // Bağlantıyı kapat
            $conn->close();
            ?>
        </select><br>
        Tarih: <input type="date" name="tarih"><br>
        <input type="submit" value="Randevu Al">
    </form>
</body>
</html>

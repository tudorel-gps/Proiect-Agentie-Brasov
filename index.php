<?php
$conn = mysqli_connect("localhost", "root", "", "agentieturisticabrasov");
if (!$conn) {
    die("Conexiune esuata: " . mysqli_connect_error());
}
$result = mysqli_query($conn, "SELECT * FROM destinatii");
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Atestat Turism Brașov</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f4f4f4; margin: 0; padding: 20px; }
        .header { background: #2c3e50; color: white; text-align: center; padding: 20px; border-radius: 8px; }
        .container { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; max-width: 1200px; margin: 20px auto; }
        .card { background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1); transition: 0.3s; text-decoration: none; color: inherit; }
        .card:hover { transform: translateY(-5px); }
        .card img { width: 100%; height: 180px; object-fit: cover; }
        .card-content { padding: 15px; text-align: center; }
        .price { color: #27ae60; font-weight: bold; font-size: 1.2em; }
    </style>
</head>
<body>
    <div class="header"><h1>Destinații Turistice Brașov</h1></div>
    <div class="container">
        <?php while($row = mysqli_fetch_assoc($result)): 
            // Verificam daca numele imaginii are deja .jpg, daca nu, adaugam
            $nume_img = $row['imagine'];
            if (!str_contains($nume_img, '.')) { $nume_img .= ".jpg"; }
        ?>
        <a href="detalii.php?id=<?php echo $row['id']; ?>" class="card">
            <img src="<?php echo $nume_img; ?>" onerror="this.src='https://via.placeholder.com/300x200?text=Fara+Imagine'">
            <div class="card-content">
                <h3><?php echo htmlspecialchars($row['nume']); ?></h3>
                <p class="price"><?php echo $row['pret_bilet']; ?> RON</p>
            </div>
        </a>
        <?php endwhile; ?>
    </div>
</body>
</html>

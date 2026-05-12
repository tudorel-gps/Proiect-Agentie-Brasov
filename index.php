<?php
$conn = mysqli_connect("localhost", "root", "", "agentieturisticabrasov");
mysqli_set_charset($conn, "utf8mb4");

$sql = "SELECT * FROM destinatii";
$rezultat = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Agenție Turism Brașov</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f0f2f5; margin: 0; text-align: center; }
        .header { background: #2c3e50; color: white; padding: 20px; margin-bottom: 30px; }
        .container { display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; padding: 20px; }
        .card { background: white; border-radius: 12px; width: 280px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: 0.3s; }
        .card:hover { transform: translateY(-5px); }
        .card img { width: 100%; height: 180px; object-fit: cover; cursor: pointer; }
        .card-content { padding: 15px; }
        .btn { display: inline-block; padding: 10px 20px; background: #3498db; color: white; text-decoration: none; border-radius: 5px; margin-top: 10px; }
        h3 { margin: 10px 0; color: #2c3e50; }
    </style>
</head>
<body>

<div class="header">
    <h1>Descoperă Brașovul</h1>
    <p>Alege destinația preferată pentru a vedea detaliile</p>
</div>

<div class="container">
    <?php while($row = mysqli_fetch_assoc($rezultat)): ?>
        <div class="card">
            <a href="detalii.php?id=<?php echo $row['id']; ?>">
                <img src="<?php echo $row['imagine']; ?>" alt="<?php echo $row['nume']; ?>">
            </a>
            <div class="card-content">
                <h3><?php echo $row['nume']; ?></h3>
                <p><strong>Preț:</strong> <?php echo $row['pret_bilet']; ?> RON</p>
                <a href="detalii.php?id=<?php echo $row['id']; ?>" class="btn">Vezi Detalii</a>
            </div>
        </div>
    <?php endwhile; ?>
</div>

</body>
</html>

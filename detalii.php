<?php
$conn = mysqli_connect("localhost", "root", "", "agentieturisticabrasov");
mysqli_set_charset($conn, "utf8mb4");

$id = $_GET['id'];
$sql = "SELECT * FROM destinatii WHERE id = $id";
$rezultat = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($rezultat);

$descrieri = [
    'Biserica Neagră' => 'Biserica Neagră este simbolul Brașovului, un monument gotic impresionant care găzduiește cea mai mare colecție de covoare anatoliene din Europa.',
    'Cetățuia de pe Strajă' => 'O fortificație medievală care oferă o perspectivă istorică asupra sistemului de apărare al orașului și o priveliște de neuitat.',
    'Muntele Tâmpa' => 'Rezervația naturală de pe Tâmpa este plămânul verde al Brașovului, locul perfect pentru drumeții sau o plimbare cu telecabina.',
    'Piața Sfatului' => 'Locul de întâlnire al brașovenilor de secole, Piața Sfatului este înconjurată de monumente istorice și o atmosferă boemă.',
    'Strada Sforii' => 'Cu o lățime ce variază între 1,11 și 1,35 metri, este una dintre cele mai înguste și fotografiate străzi din lume.'
];

$descriere_afisata = $descrieri[$row['nume']] ?? "Descoperă magia acestui loc istoric din Brașov.";
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Detalii - <?php echo $row['nume']; ?></title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f4f7f6; margin: 0; padding: 20px; color: #333; }
        .main-container { max-width: 800px; margin: 0 auto; background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .hero-img { width: 100%; height: 400px; object-fit: cover; }
        .content { padding: 30px; text-align: center; }
        h1 { color: #2c3e50; border-bottom: 2px solid #3498db; display: inline-block; padding-bottom: 10px; }
        .description { font-size: 1.1em; line-height: 1.6; margin: 20px 0; color: #555; font-style: italic; }
        
        .info-grid { 
            display: grid; grid-template-columns: 1fr 1fr; gap: 15px; 
            background: #eef2f3; padding: 20px; border-radius: 10px; 
            text-align: left; margin-top: 25px;
        }
        .info-item { border-bottom: 1px solid #ddd; padding: 5px 0; }
        .info-item strong { color: #2980b9; }

        .btn-booking { 
            display: inline-block; background: #e67e22; color: white; 
            padding: 15px 40px; text-decoration: none; border-radius: 50px; 
            font-weight: bold; margin-top: 30px; transition: 0.3s;
        }
        .btn-booking:hover { background: #d35400; transform: scale(1.05); }
    </style>
</head>
<body>

<div class="main-container">
    <img src="<?php echo $row['imagine']; ?>" class="hero-img">
    
    <div class="content">
        <h1><?php echo $row['nume']; ?></h1>
        <p class="description"><?php echo $descriere_afisata; ?></p>

        <div class="info-grid">
            <div class="info-item"><strong>🕒 Orar:</strong> <?php echo $row['orar']; ?></div>
            <div class="info-item"><strong>🐾 Animale:</strong> <?php echo $row['animale']; ?></div>
            <div class="info-item"><strong>🚗 Parcare:</strong> <?php echo $row['parcare']; ?></div>
            <div class="info-item"><strong>🎧 Ghid Audio:</strong> <?php echo $row['ghid_audio']; ?></div>
            <div class="info-item"><strong>♿ Acces:</strong> <?php echo $row['acces_dizabilitati']; ?></div>
            <div class="info-item"><strong>🎫 Preț bilet:</strong> <?php echo $row['pret_bilet']; ?> RON</div>
        </div>

        <a href="rezervare.php?id=<?php echo $row['id']; ?>" class="btn-booking">REZERVĂ O CĂLĂTORIE ACUM</a>
        <br>
        <a href="index.php" style="display:block; margin-top:15px; color:#95a5a6;">Inapoi</a>
    </div>
</div>

</body>
</html>

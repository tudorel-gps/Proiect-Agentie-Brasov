<?php
// Conectare la baza corectă confirmată în screenshot-ul tău
$conn = mysqli_connect("localhost", "root", "", "agentieturisticabrasov");
if (!$conn) { die("Conexiune esuata: " . mysqli_connect_error()); }

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$result = mysqli_query($conn, "SELECT * FROM destinatii WHERE id = $id");
$row = mysqli_fetch_assoc($result);

if (!$row) { echo "Destinatie negasita!"; exit; }

// Fix pentru afișarea imaginii (direct din folderul curent)
$nume_img = $row['imagine'];
if (!str_contains($nume_img, '.')) { $nume_img .= ".jpg"; }
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($row['nume']); ?> - Detalii Atestat</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f2f5; margin: 0; padding: 20px; color: #333; }
        .wrap { max-width: 1000px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); }
        .header-site { background: #2c3e50; color: white; padding: 15px; text-align: center; border-radius: 10px; margin-bottom: 25px; }
        
        .main-image { width: 100%; border-radius: 12px; height: 450px; object-fit: cover; border: 1px solid #ddd; }
        
        /* Grid-ul pentru datele din tabel */
        .specs-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; margin: 25px 0; }
        .spec-item { background: #f8f9fa; padding: 20px; border-radius: 10px; border-bottom: 4px solid #3498db; }
        .spec-item h4 { margin: 0 0 10px 0; color: #7f8c8d; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; }
        .spec-value { font-weight: 600; color: #2c3e50; display: block; }
        
        .price-box { font-size: 2rem; color: #27ae60; font-weight: bold; }
        .desc-text { line-height: 1.8; font-size: 1.1rem; color: #444; border-top: 1px solid #eee; padding-top: 20px; }

        /* Formularul de rezervare */
        .booking-form { background: #2c3e50; color: white; padding: 30px; border-radius: 12px; margin-top: 40px; }
        .booking-form h3 { color: #3498db; margin-top: 0; }
        input, button { width: 100%; padding: 12px; margin: 10px 0; border-radius: 6px; border: 1px solid #ddd; font-size: 1rem; box-sizing: border-box; }
        button { background: #3498db; color: white; border: none; cursor: pointer; font-weight: bold; transition: 0.3s; }
        button:hover { background: #2980b9; transform: translateY(-2px); }
    </style>
</head>
<body>

<div class="header-site">
    <h1>Brașov Tourist Experience</h1>
</div>

<div class="wrap">
    <a href="index.php" style="text-decoration: none; color: #3498db; font-weight: bold;">← Înapoi la listă</a>
    
    <h1 style="margin: 15px 0; color: #2c3e50;"><?php echo htmlspecialchars($row['nume']); ?></h1>
    
    <img src="<?php echo $nume_img; ?>" class="main-image" alt="<?php echo $row['nume']; ?>" onerror="this.src='https://via.placeholder.com/1000x450?text=Imagine+Indisponibila'">

    <div class="specs-grid">
        <div class="spec-item">
            <h4>Bilet de intrare</h4>
            <span class="price-box"><?php echo $row['pret_bilet']; ?> <small>RON</small></span>
        </div>
        <div class="spec-item">
            <h4>Program Funcționare</h4>
            <span class="spec-value"><?php echo htmlspecialchars($row['orar']); ?></span>
        </div>
        <div class="spec-item">
            <h4>Acces Animale</h4>
            <span class="spec-value"><?php echo htmlspecialchars($row['animale']); ?></span>
        </div>
        <div class="spec-item">
            <h4>Parcare Disponibilă</h4>
            <span class="spec-value"><?php echo htmlspecialchars($row['parcare']); ?></span>
        </div>
        <div class="spec-item">
            <h4>Servicii Audio Ghid</h4>
            <span class="spec-value"><?php echo htmlspecialchars($row['ghid_audio']); ?></span>
        </div>
        <div class="spec-item">
            <h4>Acces Dizabilități</h4>
            <span class="spec-value"><?php echo htmlspecialchars($row['acces_dizabilitati']); ?></span>
        </div>
    </div>

    <div class="desc-text">
        <h3>Despre Locație</h3>
        <p>
            Vizitați <strong><?php echo htmlspecialchars($row['nume']); ?></strong>, o destinație de top situată în Brașov. 
            Conform informațiilor noastre, timpul recomandat pentru o experiență completă este de aproximativ <em><?php echo htmlspecialchars($row['timp_vizitare']); ?></em>. 
            Această locație oferă facilități precum: <?php echo htmlspecialchars($row['parcare']); ?>.
        </p>
    </div>

    <div class="booking-form">
        <h3>Fă o programare online</h3>
        <p>Alege data dorită și trimite rezervarea direct către baza noastră de date.</p>
        <form action="rezervare.php" method="POST">
            <input type="hidden" name="destinatie_id" value="<?php echo $row['id']; ?>">
            <input type="text" name="nume_vizitator" placeholder="Numele tău complet" required>
            <input type="email" name="email_vizitator" placeholder="Adresa de email" required>
            <label for="data_v">Data planificată:</label>
            <input type="date" id="data_v" name="data_planificata" required>
            <button type="submit" name="save">Confirmă Rezervarea</button>
        </form>
    </div>
</div>

<p style="text-align:center; color:#888; margin-top:30px;">&copy; 2026 - Atestat Proiect Turism Brașov</p>

</body>
</html>

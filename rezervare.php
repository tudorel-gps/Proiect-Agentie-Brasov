<?php
$conn = mysqli_connect("localhost", "root", "", "agentieturisticabrasov");
if (!$conn) {
    die("Conexiune esuata: " . mysqli_connect_error());
}

$id_dest = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (isset($_POST['save'])) {
    $nume_vizitator = mysqli_real_escape_string($conn, $_POST['nume_vizitator'] ?? '');
    $email_vizitator = mysqli_real_escape_string($conn, $_POST['email_vizitator'] ?? '');
    $data_planificata = mysqli_real_escape_string($conn, $_POST['data_planificata'] ?? '');

    $destinatie_id = isset($_POST['destinatie_id']) ? (int)$_POST['destinatie_id'] : 0;
    if ($destinatie_id <= 0) {
        $destinatie_id = $id_dest;
    }

    $sql = "INSERT INTO programare (nume_vizitator, email_vizitator, destinatie_id, data_planificata)
            VALUES ('$nume_vizitator', '$email_vizitator', '$destinatie_id', '$data_planificata')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Rezervare salvata!'); window.location.href='index.php';</script>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Rezervare</title>
    <style>
        body { font-family: sans-serif; background: #2c3e50; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        form { background: white; padding: 30px; border-radius: 10px; width: 320px; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #3498db; color: white; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <form method="POST">
        <h3>Rezervare Online</h3>
        <input type="hidden" name="destinatie_id" value="<?php echo $id_dest; ?>">
        <input type="text" name="nume_vizitator" placeholder="Nume Complet" required>
        <input type="text" name="email_vizitator" placeholder="Email" required>
        <input type="date" name="data_planificata" required>
        <button type="submit" name="save">Trimite Rezervarea</button>
        <p style="text-align:center"><a href="index.php" style="color:#666">Anulează</a></p>
    </form>
</body>
</html>


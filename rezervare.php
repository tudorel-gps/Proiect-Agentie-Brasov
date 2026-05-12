<?php
$conn = mysqli_connect("localhost", "root", "", "agentiebrasov");
$id_dest = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if(isset($_POST['save'])) {
    $nume = mysqli_real_escape_string($conn, $_POST['nume']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $data = $_POST['data_p'];
    $id_d = $_POST['id_destinatie'];
    
    $sql = "INSERT INTO programare (nume_vizitator, email_vizitator, destinatie_id, data_planificata) 
            VALUES ('$nume', '$email', $id_d, '$data')";
    
    if(mysqli_query($conn, $sql)) {
        echo "<script>alert('Rezervare salvata!'); window.location.href='index.php';</script>";
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
        <input type="hidden" name="id_destinatie" value="<?php echo $id_dest; ?>">
        <input type="text" name="nume" placeholder="Nume Complet" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="date" name="data_p" required>
        <button type="submit" name="save">Trimite Rezervarea</button>
        <p style="text-align:center"><a href="index.php" style="color:#666">Anulează</a></p>
    </form>
</body>
</html>

<?php
    require_once('config.php');
// inregistrare
if (isset($_GET['inregistrare'])){
    $email = $_GET['email'];
    $username = $_GET['utilizator'];
    $parola1 = $_GET['parola1'];
    $parola2 = $_GET['parola2'];
    $sql = "SELECT * 
            FROM utilizatori 
            WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $randuri = mysqli_num_rows($result);
    if ($randuri > 0){
        echo '<script> alert("Emailul deja exista");
                window.location="register.php" </script>';
    } elseif ($parola1 != $parola2){
        echo '<script> alert("Parola nu coincide");
        window.location="register.php" </script>';
    } else{
        $sql = "INSERT INTO utilizatori (username,email,parola)
                VALUES ('$username','$email','$parola1')";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            printf("Eroare:", mysqli_error($conn));
        } else {
            echo "Te-ai inregistrat cu succes!";
            header('location: index.php');
        }
        

    }
}



?>
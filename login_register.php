<?php
    require_once('config.php');
    require_once('includes/functions.php');
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
            // preia ID-ul utilizatorului creat
            $id_utilizator_inreg = mysqli_insert_id($conn);
            $_SESSION["utilizator"]["id"]=  $id_utilizator_inreg;
            $_SESSION["utilizator"]["nume"] = $username;
            header('location: index.php');
        }
        

    }
}

//login
if (isset($_GET['login'])) {
    $email = $_GET['email'];
    $errors = array();
    $password = $_GET['parola'];
    if (empty($email)) { array_push($errors, "Este nevoie de email"); }
    if (empty($password)) { array_push($errors, "Nu ai pus parola"); }
    if (empty($errors)) {
  //  $password = md5($password); // cripteaza parola
    $sql = "SELECT * FROM utilizatori WHERE email='$email' and parola='$password' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $randuri = mysqli_num_rows($result);
    if ($randuri > 0) {
    // preia id-ul utilizatorului logat
    $utilizator = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo '<pre>' . 
    print_r($utilizator) . 
    '</pre>';
    $id_utiliz_logat = $utilizator[0]["id_utilizator"];
    // pune utilizatorul logat in sesiune


    $_SESSION['utilizator'] = getUtilizatorDupaID($id_utiliz_logat);
    $_SESSION["utilizator"]["id"]=  $id_utilizator_logat;
    //$_SESSION["utilizator"]["nume"] = $username;
    echo '<pre>' . 
          print_r($_SESSION['utilizator']) . 
          '</pre>';
  //  header('location: index.php');
    }
    } else {
    array_push($errors, 'Utilizatorul sau parola sunt gresite');
    }
    }
    



?>
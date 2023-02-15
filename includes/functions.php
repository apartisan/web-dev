
<?php
function afiseaza_elevi()
{
    global $conn;
    $sql = "SELECT * FROM elevi ORDER BY clasa";
    $result = mysqli_query($conn, $sql);
    $elevi = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $elevi;
}
function inserare_elev($nume, $prenume, $clasa)
{
    global $conn;
    $sql = "INSERT INTO elevi (nume, prenume, clasa)
            VALUES ('$nume', '$prenume', '$clasa')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        printf("Errormessage: %s\n", mysqli_error($conn));
    } else {
        echo "Date salvate!";
        header('location: index.php');
    }
}

?>

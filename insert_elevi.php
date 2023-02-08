<?php require("config.php"); ?>
<?php require("includes/functions.php"); ?>
<?php 
if (isset($_GET['submit'])){
    $nume = $_GET['nume'];
    $prenume = $_GET['prenume'];
    $clasa = $_GET['clasa'];
    inserare_elev($nume, $prenume, $clasa);
}

?>
<?php include ("includes/header.php"); ?>
<?php include ("includes/functions.php"); ?>
<?php 
    if(isset($_SESSION["utilizator"]["id"])){
        echo "Salut, " . $_SESSION["utilizator"]["nume"]. ", id-ul tau este " . $_SESSION["utilizator"]["id"];
        echo '<br><a href="logout.php">Iesi din cont</a>';
    }
    else{
        echo "Salut, anonimule!";
        echo '<nav>' .
             '<ul>' .
                 '<li><a href="login.php">Intra in cont</a></li>' .
                '<li><a href="register.php">Inregistrare</a></li>' .
            ' </ul>' .
        '</nav>';
    }

?>

<?php $elevi = afiseaza_elevi();
?> 


<h1>INSERARE ELEVI</h1>
<form action="insert_elevi.php" method="GET">
    <input type="text" name="nume" placeholder="Numele elevului" 
            title="Introduceti numele elevului" required>
    <br>
    <input type="text" name="prenume" placeholder="Prenumele elevului" 
     required>
     <br>
    <input type="text" name="clasa" placeholder="XII A" 
    title="Introduceti clasa din care face parte elevul" required>
    <br>
    <input type="submit" name="submit" value="Salveaza elev" >
</form>

<h2>Date salvate</h2>
    

    <table border="1">
        <tr>
            <th>NUME</th>
            <th>PRENUME</th>
            <th>CLASA</th>
        </tr>
        <?php
    
    ?>
        <?php foreach ($elevi as $elev): ?>
            <tr>
                <td> <?php echo $elev['nume'] ?> </td>
                <td> <?php echo $elev['prenume'] ?></td>
                <td> <?php echo $elev['clasa'] ?></td>
            </tr>
        <?php endforeach?>

    </table>

<!-- end code -->
<?php require_once("includes/footer.php");?>
    

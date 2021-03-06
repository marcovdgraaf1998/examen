<?php
    include '../../includes/config.php';
    include '../../includes/session.php';

    # Verkrijg goed blok id via URL
    $iBlokId = $_GET['blok_id'];

    if (is_numeric($iBlokId)) {
        # Verkrijg alle waardes van dat blok
        $result = mysqli_query($mysqli, "SELECT * FROM blokken WHERE blok_id = $iBlokId");
        
        if (mysqli_num_rows($result) == 1) {
            # Resultaat fetchen
            $row = mysqli_fetch_array($result);
        } else {
            echo '<div class="alert alert-danger text-center mb-0 border-0 rounded-0 alert-dismissible fade show" role="alert">Er is wat misgegaan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            exit;
        }
    } else {
        echo '<div class="alert alert-danger text-center mb-0 border-0 rounded-0 alert-dismissible fade show" role="alert">Onjuist ID. Er is wat misgegaan. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'; 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../../includes/head.php'; ?>
    <title>Verwijder blok <?= $row['blok_id']?></title>
</head>
<body>
    <?php include '../../includes/header.php'; ?>
    <div class="container">
        <div class="card text-center mt-4 p-3">
            <h1>Verwijder blok <?= $row['blok_id']?></h1>
            <p>Weet je zeker dat je <strong>blok <?= $row['blok_id']?></strong> wil verwijderen?</p>
            <div class="d-flex p-4 align-items-center justify-content-center">
                <a href="../overzicht.php">Naar overzicht</a>
                <a href="./verwijderen.php?blok_id=<?= $row['blok_id']; ?>" class="btn btn-danger ml-5">Verwijderen</a>
            </div>
        </div>
        
    </div>
</body>
</html>
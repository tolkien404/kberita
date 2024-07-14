<?php
if(!$sock = @fsockopen('www.google.com', 80))
{
    echo '<script>alert("Sambungkan ke internet agar tampilan optimal");</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Handlee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Satisfy">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-custom navbar-dark">
            <div class="container">
                <?php
                if (stripos($_SERVER['REQUEST_URI'], 'index.php')) {
                ?>
                    <a class="navbar-brand" href="index.php" style="font-family: 'Satisfy', serif;">K Berita</a>

                <?php
                } elseif (stripos($_SERVER['REQUEST_URI'], 'admin/inputdata.php')) {
                ?>
                    <a class="navbar-brand" href="../index.php" style="font-family: 'Satisfy', serif;">K Berita</a>

                <?php
                } else {
                ?>
                    <a class="navbar-brand" href="index.php" style="font-family: 'Satisfy', serif;">K Berita</a>

                <?php
                }
                ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">kNews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">kHot</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">kSpot</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">kFood</a>
                        </li>
                    </ul>

                    <div class="d-flex">
                        <?php
                        if (stripos($_SERVER['REQUEST_URI'], 'admin/inputdata.php')) {
                        ?>
                            <button class="btn btn-primary" style="border-width: 4px; border-color:black" onclick="location.href='../index.php'">Klik Untuk ke User</button>
                        <?php
                        } else {
                        ?>
                            <button class="btn btn-primary" style="border-width: 4px; border-color:black" onclick="location.href='admin/inputdata.php'">Klik Untuk ke Admin</button>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </nav>

    </header>
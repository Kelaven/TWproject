<!DOCTYPE html>
<html lang="fr" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon Thème</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- my style -->
    <link rel="stylesheet" href="/wp-content/themes/pkm/public/assets/css/style.css">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Lato&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
<?php wp_body_open(); ?>

    <header>
        <!-- ! Navbar -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary px-lg-5 mx-lg-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="/wp-content/themes/pkm/public/assets/img/pokemon-logo.png" alt="logo pokemon theme wordpress"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="d-flex justify-content-end w-100">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link"href="/wp-content/themes/pkm/archive.php">Catégorie 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Catégorie 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pe-2" href="#">Catégorie 3</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
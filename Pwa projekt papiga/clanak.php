<?php
    //Spajanje na bazu
    include 'connect.php'; 

    //Definiranje upload puta za slike
    define('UPLPATH', 'images/'); 

    //Varijabla za pristup administraciji
    $level = 'none';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Ivan Papiga">
        <meta name="description" content="Stranica za scifi djeljenje novosti i filmove">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon" type="image/png" href="images/favicon-32x32.png">
        <script src="https://kit.fontawesome.com/89f71c403d.js" crossorigin="anonymous"></script>
        <title>Sci-fi Zone</title>
    </head>
    <body>
        <div class="wrapper">
            <header>
                <section class="logo">
                    <h1>Sci-fi Zone</h1>
                </section>
                <section>
                    <nav>
                        <ul>
                            <li><a href="home.php">Početna</a></li>
                            <li><a href="kategorija.php?id=preporuke">Preporuke</a></li>
                            <li><a href="kategorija.php?id=recenzije">Recenzije</a>
                            <li><a href="kategorija.php?id=fandom">Fandom</a></li>
                            <li><a href="unos.php">Novi članak</a></li>
                            <li><a href="index.php">Odjava</a></li>
                        </ul>
                    </nav>
                </section>
            </header>

            <main class="wrapper">
                <?php
                    $id = $_GET['id'];
                    $query = "SELECT * FROM clanci WHERE arhiva=0 AND id='$id'";
                    $result = mysqli_query($dbc, $query);
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {
                            echo '<h2>'. $row['kategorija'] .'</h2>';
                            echo '<hr>';
                            echo '<article>';
                                echo '<h2 class="clanak_tekst">'. $row['naslov'] .'</h2>';
                                echo '<p class="clanak_tekst">Datum: '. $row['datum'] .'</p>';
                                echo '<div class="clanak_banner">';
                                    echo '<img src="images/'. $row['fotografija'] .'">';
                                echo '</div>';
                                echo '<p class="clanak_tekst"><i>'. $row['sazetak'] .'</i><br><br>';
                                echo $row['sadrzaj'] .'</p>';
                                echo '<a href="administracija.php?id='. $row['id'] .'"><span class="edit_gumb">Uredi</span></a>';
                            echo '</article>';
                        }
                ?>
            </main>
            <footer>
                <p>Ivan Papiga<br>
                    Kontakt: ipapiga@tvz.hr<br>
                    Izrađeno: 2022. godine</p>
            </footer>
        </div>
    </body>
</html>
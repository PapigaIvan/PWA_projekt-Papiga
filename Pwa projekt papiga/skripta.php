<?php
        //Spajanje na bazu
        include 'connect.php';

    //varijable
    if(isset($_POST['submit'])) {
        $naslov = $_POST['naslov_clanak'];
        $sazetak = $_POST['sazetak'];
        $sadrzaj = nl2br($_POST['sadrzaj']);
        $kategorija = $_POST['kategorija'];
        $fotografija = $_FILES['fotografija']['name'];
        $datum = date('d.m.Y.');

        //Provjera arhiviranosti
        if(isset($_POST['spremi'])){
            $spremi = $_POST['spremi'];
            $arhiva=1; }
            
            else
            { $arhiva=0;}

            //Izbor direktorija za fotografije
            $img_dir = 'images/'.$fotografija; 
            move_uploaded_file($_FILES["fotografija"]["tmp_name"], $img_dir);

            //Ubacivanje podataka u bazu
            $query = "INSERT INTO clanci (datum, naslov, sazetak, sadrzaj, fotografija, kategorija, arhiva ) VALUES ('$datum', '$naslov', '$sazetak', '$sadrzaj', '$fotografija', '$kategorija', '$arhiva')"; 

            //Provjera uspješnosti
            $result = mysqli_query($dbc, $query) or die('Error querying databese.');

            //Uzimanje id-a zadnjeg unosa:
            $id = mysqli_insert_id($dbc);
            
            mysqli_close($dbc);

        echo '
        
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
                <h2>PREPORUKE</h2>
                <hr>
                <article>
                    <h2 class="clanak_tekst">'.$naslov.'</h2>
                    <p class="clanak_tekst">'.$datum.'</p>
                    <div class="clanak_banner">
                        <img src="images/'.$fotografija.'">
                    </div>
                    <p class="clanak_tekst"><i>'.$sazetak.'</i>
                        <br><br>
                        '.$sadrzaj.'</p>
                        <a href="administracija.php?id='. $id .'"><span class="edit_gumb">Uredi</span></a>
                        <div class="clear"></div>
                </article>
            </main>
                    <footer>
                <p>Ivan Papiga<br>
                    Kontakt: ipapiga@tvz.hr<br>
                    Izrađeno: 2022. godine</p>
            </footer>
                </div>
            </body>
        </html>';
            }

            else {
                echo '
                <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <meta name="author" content="Ivan Papiga">
                <meta name="description" content="Stranica za scifi djeljenje novosti i filmove">
                <link rel="stylesheet" type="text/css" href="style.css">
                <link rel="icon" type="image/png" href="images/favicon-32x32.png">
                <script src="https://kit.fontawesome.com/89f71c403d.js" crossorigin="anonymous"></script>
                <title>Scifi Zone</title>
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
                    
                    <main>
                        <h2>NOVI ČLANAK</h2>
                        <hr>
                        <section class="wrapper">
                            <div class="form_container">
                                <form action="skripta.php" enctype="multipart/form-data" method="post" name="novi_clanak">
                                    <label for="naslov_clanak">Naslov:<br></label>
                                    <input type="text" name="naslov_clanak" id="naslov_clanak" placeholder="Naslov">
                                    
                                    <label for="sazetak"><br>Sažetak:<br></label>
                                    <textarea name="sazetak" id="sazetak" placeholder="Sažetak" rows="3"></textarea>

                                    <label for="sadrzaj"><br>Sadržaj:<br></label>
                                    <textarea name="sadrzaj" id="sadrzaj" placeholder="Sadržaj" rows="12"></textarea>

                                    <label for="kategorija"><br>Kategorija<br></label>
                                    <select name="kategorija" id="kategorija">
                                        <option value="" disabled selected>Odaberite:</option>
                                        <option value="preporuke">Preporuke</option>
                                        <option value="recenzije">Recenzije</option>
                                        <option value="fandom">Fandom</option>
                                    </select>

                                    <label for="fotografija"><br>Fotografija:<br></label>
                                    <input type="file" name="fotografija" id="fotografija" accept="image/jpg,image/png,image/gif">

                                    <label for="spremi"><br>Arhiviraj:<br></label>
                                    <input name="spremi" id="spremi" type="checkbox" class="reset_checkbox">

                                    <br>
                                    <input type="submit" name="submit" id="submit" value="Objavi">
                                </form>
                            </div>
                        </section>
                    </main>

                    <footer>
                        <p>Ivan Papiga<br>
                        Kontakt: ipapiga@tvz.hr<br>
                        Izrađeno: 2022. godine</p>
                    </footer>
                </div>
            </body>
</html>';
    }
?>

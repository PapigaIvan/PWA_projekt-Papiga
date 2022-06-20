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
        $id = $_POST['id'];

        //Provjera arhiviranosti
        if(isset($_POST['spremi'])){
            $spremi = $_POST['spremi'];
            $arhiva=1; }
            
            else
            { $arhiva=0; }

            //Izbor direktorija za fotografije
            $img_dir = 'images/'.$fotografija; 
            move_uploaded_file($_FILES["fotografija"]["tmp_name"], $img_dir);

            //Ubacivanje podataka u bazu
            $query = "INSERT INTO clanci (datum, naslov, sazetak, sadrzaj, fotografija, kategorija, arhiva ) VALUES ('$datum', '$naslov', '$sazetak', '$sadrzaj', '$fotografija', '$kategorija', '$arhiva')"; 

            //Provjera uspješnosti
            $result = mysqli_query($dbc, $query) or die('Error querying databese.');
            
            mysqli_close($dbc); }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Ivan Papiga">
        <meta name="description" content="Stranica za scifi djeljenje novosti i filmove">
        <link rel="stylesheet" type="text/css" href="style.css?v=6">
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
                            <li><a href="#">Novi članak</a></li>
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
                            <input type="hidden" id="id" name="id">

                            <label for="naslov_clanak">Naslov:<br></label>
                            <input type="text" name="naslov_clanak" id="naslov_clanak" placeholder="Naslov">
                            <span class="error" id="naslov_clanak_error"></span>
                            
                            <label for="sazetak"><br>Sažetak:<br></label>
                            <textarea name="sazetak" id="sazetak" placeholder="Sažetak" rows="3"></textarea>
                            <span class="error" id="sazetak_error"></span>

                            <label for="sadrzaj"><br>Sadržaj:<br></label>
                            <textarea name="sadrzaj" id="sadrzaj" placeholder="Sadržaj" rows="12"></textarea>
                            <span class="error" id="sadrzaj_error"></span>

                            <label for="kategorija"><br>Kategorija<br></label>
                            <select name="kategorija" id="kategorija">
                                <option value="" disabled selected>Odaberite:</option>
                                <option value="preporuke">Preporuke</option>
                                <option value="recenzije">Recenzije</option>
                                <option value="fandom">Fandom</option>
                            </select>
                            <span class="error" id="kategorija_error"></span>

                            <label for="fotografija"><br>Fotografija:<br></label>
                            <input type="file" name="fotografija" id="fotografija" accept="image/*">
                            <span class="error" id="fotografija_error"></span>

                            <label for="spremi"><br>Arhiviraj:<br></label>
                            <input name="spremi" id="spremi" type="checkbox" class="reset_checkbox">

                            <br>
                            <input type="submit" name="submit" id="submit" value="Objavi">
                        </form>
                        <!--JS za validaciju forme-->
                        <script type="text/javascript">
                            document.getElementById("submit").onclick = function(event) {
                                var slanje = true;

                                //Naslov
                                var naslovPolje = document.getElementById("naslov_clanak");
                                var naslovVrijednost = naslovPolje.value;
                                if(naslovVrijednost.length < 5 || naslovVrijednost.length > 30) {
                                    slanje = false;
                                    naslovPolje.style.backgroundColor = "#b4121287";
                                    document.getElementById("naslov_clanak_error").innerHTML = "<p>Naslov mora imati najmanje 5, a najviše 30 znakova</p>"
                                }
                                else {
                                    naslovPolje.style.backgroundColor = "#f0f0f0";
                                    document.getElementById("naslov_clanak_error").innerHTML = "";
                                }

                                //Sazetak
                                var sazetakPolje = document.getElementById("sazetak");
                                var sazetakVrijednost = sazetakPolje.value;
                                if(sazetakVrijednost.length < 10 || sazetakVrijednost.length > 100) {
                                    slanje = false;
                                    sazetakPolje.style.backgroundColor = "#b4121287";
                                    document.getElementById("sazetak_error").innerHTML = "<p>Sažetak mora imati najmanje 10, a najviše 100 znakova</p>"
                                }
                                else {
                                    sazetakPolje.style.backgroundColor = "#f0f0f0";
                                    document.getElementById("sazetak_error").innerHTML = "";
                                }

                                //Sadrzaj
                                var sadrzajPolje = document.getElementById("sadrzaj");
                                var sadrzajVrijednost = sadrzajPolje.value;
                                if(sadrzajVrijednost.length === 0) {
                                    slanje = false;
                                    sadrzajPolje.style.backgroundColor = "#b4121287";
                                    document.getElementById("sadrzaj_error").innerHTML = "<p>Sadrzaj ne smije biti prazan</p>"
                                }
                                else {
                                    sadrzajPolje.style.backgroundColor = "#f0f0f0";
                                    document.getElementById("sadrzaj_error").innerHTML = "";
                                }
                                //Kategorija
                                var kategorijaPolje = document.getElementById("kategorija");
                                var kategorijaVrijednost = kategorijaPolje.selectedIndex;
                                if(kategorijaVrijednost === 0) {
                                    slanje = false;
                                    kategorijaPolje.style.backgroundColor = "#b4121287";
                                    document.getElementById("kategorija_error").innerHTML = "<p>Kategorija mora biti odabrana</p>"
                                }
                                else {
                                    kategorijaPolje.style.backgroundColor = "#f0f0f0";
                                    document.getElementById("kategorija_error").innerHTML = "";
                                }
                                //Fotografija
                                var fotografijaPolje = document.getElementById("fotografija");
                                var fotografijaVrijednost = fotografijaPolje.value;
                                if(fotografijaVrijednost.length === 0) {
                                    slanje = false;
                                    fotografijaPolje.style.border = "1px solid #b4121287";
                                    document.getElementById("fotografija_error").innerHTML = "<p>Fotografija mora biti unesena</p>"
                                }
                                else {
                                    fotografijaPolje.style.border = "";
                                    document.getElementById("fotografija_error").innerHTML = "";
                                }

                                if(slanje != true) {
                                    event.preventDefault();
                                }
                            }
        </script>

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
</html>
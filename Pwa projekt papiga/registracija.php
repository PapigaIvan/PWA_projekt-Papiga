<?php
session_start(); 

    if(isset($_POST['submit'])) {
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $k_ime = $_POST['k_ime'];
        $lozinka = $_POST['lozinka'];
        $hash = password_hash($lozinka, CRYPT_BLOWFISH);
        $razina = 0;
        $msg = '';
        $msg_lozinka = '';

        //Konekcija na bazu
        $dbc = mysqli_connect('localhost', 'root', '', 'scifi_zone') or die('Nije moguće spajanje na bazu' .mysqli_connect_error());
        $stmt = mysqli_stmt_init($dbc);
        $sql = "SELECT k_ime FROM korisnik WHERE k_ime = ?";

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 's', $k_ime);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            }
           if(mysqli_stmt_num_rows($stmt) > 0){
            $msg='Korisničko ime već postoji!<br><br>';

           }

           else {
            $stmt = mysqli_stmt_init($dbc);
            $sql = "INSERT INTO korisnik (ime, prezime, k_ime, lozinka, razina) VALUES (?, ?, ?, ?, ?)";
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $k_ime, $hash, $razina);
                mysqli_stmt_execute($stmt);

            }
                header('location: index.php');
           }

        mysqli_close($dbc);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Ivan Papiga">
        <meta name="description" content="Stranica za scifi djeljenje novosti i filmove">
        <link rel="stylesheet" type="text/css" href="style.css?v=2">
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
            </header>
            
            <main>
            <h2>REGISTRACIJA</h2>
                <hr>
                <section class="wrapper">
                    <div class="form_container">
                        <form action="" method="post" name="registracija">
                        <label for="ime">Ime:<br></label>
                            <input type="text" name="ime" id="ime">
                            <span class="error" id="ime_error"></span>

                            <label for="prezime">Prezime:<br></label>
                            <input type="text" name="prezime" id="prezime">
                            <span class="error" id="prezime_error"></span>

                            <label for="k_ime">Korisničko ime:<br></label>
                            <input type="text" name="k_ime" id="k_ime">
                            <span class="error" id="k_ime_error">
                                <?php  if(isset($_POST['submit'])) {
                                    if($msg) {
                                    echo $msg;
                                }}?>
                            </span>

                            <label for="lozinka">Lozinka:<br></label>
                            <input type="password" name="lozinka" id="lozinka">
                            <span class="error" id="lozinka_error"></span>

                            <label for="lozinka2">Ponovite lozinku:<br></label>
                            <input type="password" name="lozinka2" id="lozinka2">
                            <span class="error" id="lozinka2_error"></span>
                            
                            
                            <br>
                            <input type="submit" name="submit" id="submit" value="Registracija">
                        </form>
                        <!--JS za validaciju forme-->
                        <script type="text/javascript">
                            document.getElementById("submit").onclick = function(event) {
                                var slanje = true;

                                //Ime
                                var imePolje = document.getElementById("ime");
                                var imeVrijednost = imePolje.value;
                                if (imeVrijednost.length == 0) {
                                    slanje = false;
                                    imePolje.style.backgroundColor = "#b4121287";
                                    document.getElementById("ime_error").innerHTML = "<p>Unesite ime</p>"
                                }
                                else {
                                    imePolje.style.backgroundColor = "#f0f0f0";
                                    document.getElementById("ime_error").innerHTML = "";
                                }

                                //Prezime
                                var prezimePolje = document.getElementById("prezime");
                                var prezimeVrijednost = prezimePolje.value;
                                if (prezimeVrijednost.length == 0) {
                                    slanje = false;
                                    prezimePolje.style.backgroundColor = "#b4121287";
                                    document.getElementById("prezime_error").innerHTML = "<p>Unesite prezime</p>"
                                }
                                else {
                                    prezimePolje.style.backgroundColor = "#f0f0f0";
                                    document.getElementById("prezime_error").innerHTML = "";
                                }

                                //Korisnicko ime
                                var k_imePolje = document.getElementById("k_ime");
                                var k_imeVrijednost = k_imePolje.value;
                                if (k_imeVrijednost.length == 0) {
                                    slanje = false;
                                    k_imePolje.style.backgroundColor = "#b4121287";
                                    document.getElementById("k_ime_error").innerHTML = "<p>Unesite korisničko ime</p>"
                                }
                                else if(k_imeVrijednost.length < 5 || k_imeVrijednost.length > 20) {
                                    slanje = false;
                                    k_imePolje.style.backgroundColor = "#b4121287";
                                    document.getElementById("k_ime_error").innerHTML = "<p>Korisničko ime mora imati najmanje 5, a najviše 20 znakova</p>"
                                }
                                else {
                                    k_imePolje.style.backgroundColor = "#f0f0f0";
                                    document.getElementById("k_ime_error").innerHTML = "";
                                }

                                //Lozinka
                                var lozinkaPolje = document.getElementById("lozinka");
                                var lozinkaVrijednost = lozinkaPolje.value;
                                if (lozinkaVrijednost.length == 0) {
                                    slanje = false;
                                    lozinkaPolje.style.backgroundColor = "#b4121287";
                                    document.getElementById("lozinka_error").innerHTML = "<p>Unesite lozinku</p>"

                                }
                                
                                else if(lozinkaVrijednost.length < 10) {
                                    slanje = false;
                                    lozinkaPolje.style.backgroundColor = "#b4121287";
                                    document.getElementById("lozinka_error").innerHTML = "<p>Lozinka mora imati najmanje 10 znakova</p>"
                                }
                                
                                else {
                                    lozinkaPolje.style.backgroundColor = "#f0f0f0";
                                    document.getElementById("lozinka_error").innerHTML = "";
                                }

                                //Lozinka2
                                var lozinka2Polje = document.getElementById("lozinka2");
                                var lozinka2Vrijednost = lozinka2Polje.value;
                                if (lozinka2Vrijednost.length == 0 || (lozinka2Vrijednost != lozinkaVrijednost)) {
                                    slanje = false;
                                    lozinka2Polje.style.backgroundColor = "#b4121287";
                                    if(lozinka2Vrijednost == 0) {
                                        document.getElementById("lozinka2_error").innerHTML = "<p>Ponovite lozinku</p>"
                                    }
                                    else {
                                        document.getElementById("lozinka2_error").innerHTML = "<p>Lozinke moraju biti iste</p>"
                                    }

                                }

                                else {
                                    lozinka2Polje.style.backgroundColor = "#f0f0f0";
                                    document.getElementById("lozinka2_error").innerHTML = "";
                                }

                                if(slanje != true) {
                                    event.preventDefault();
                                }
                            }
                        </script>

                    </div>
            </main>

            <footer>
                <p>Ivan Papiga<br>
                    Kontakt: ipapiga@tvz.hr<br>
                    Izrađeno: 2022. godine</p>
            </footer>
        </div>
    </body>
</html>

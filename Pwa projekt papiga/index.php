<?php
session_start();

    if(isset($_POST['submit'])) {
        $k_ime = $_POST['k_ime'];
        $lozinka = $_POST['lozinka'];
        $msg = '';
        $msg_lozinka = '';

        //Konekcija na bazu
        $dbc = mysqli_connect('localhost', 'root', '', 'kula_knjiga') or die('Nije moguće spajanje na bazu' .mysqli_connect_error());
        $query = "SELECT * FROM korisnik WHERE k_ime='$k_ime'";
        $result = mysqli_query($dbc, $query);

        if($row = mysqli_fetch_array($result)) {
                if(password_verify($lozinka, $row['lozinka'])) {
                    $_SESSION['k_ime'] = $k_ime;
                    $_SESSION['razina'] = $row['razina'];
                    header('location: home.php');
                    
                }

                else {
                    $msg_lozinka = 'Pogrešna lozinka<br><br>';
                }
        }

        else {
            $msg = 'Korisničko ime ne postoji. Registrirajte se <a class="reg_link" href="registracija.php">ovdje</a><br><br>';
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
        <link rel="stylesheet" type="text/css" href="style.css?v=10">
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
            <h2>PRIJAVA</h2>
                <hr>
                <section class="wrapper">
                    <div class="form_container">
                        <form action="" method="post" name="prijava">

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
                            <span class="error" id="lozinka_error">
                            <?php  if(isset($_POST['submit'])) {
                                    if($msg_lozinka) {
                                    echo $msg_lozinka;
                                }}?>
                            </span>
                            
                            
                            <br>
                            <input type="submit" name="submit" id="submit" value="Prijava">
                        </form>
                        <!--JS za validaciju forme-->
                        <script type="text/javascript">
                            document.getElementById("submit").onclick = function(event) {
                                var slanje = true;

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

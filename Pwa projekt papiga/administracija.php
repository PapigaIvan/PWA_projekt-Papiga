<?php
session_start();
//Spajanje na bazu
include 'connect.php'; 

//Definiranje upload puta za slike
define('UPLPATH', 'images/'); 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Ivan Papiga">
        <meta name="description" content="Stranica za scifi djeljenje novosti i filmove">
        <link rel="stylesheet" type="text/css" href="style.css?v=1">
        <link rel="icon" type="image/png" href="images/favicon-32x32.png">
        <script src="https://kit.fontawesome.com/89f71c403d.js" crossorigin="anonymous"></script>
        <title>Sci-fi Zone</title>
    </head>
    <body>
        <div class="wrapper">
            <header>
                <section class="logo">
                    <h1>Sci-fi Zonea</h1>
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
            <?php
            if($_SESSION['razina'] === '1') {
            ?>
                <h2>UREDI ČLANAK</h2>
                    <hr>
                    <section class="wrapper">
                        <div class="form_container">
                            <?php
                                $id = $_GET['id'];
                                $query = "SELECT * FROM clanci WHERE id=$id";
                                $result = mysqli_query($dbc, $query);
                                foreach($result as $row) { ?>
                                <form action="" enctype="multipart/form-data" method="post" name="uredi_clanak">
                                    <input type="hidden" id="id" name="id" value="<?php echo $row['id'] ?>">

                                    <label for="naslov_clanak">Naslov:<br></label>
                                    <input type="text" name="naslov_clanak" id="naslov_clanak" value="<?php echo $row['naslov'] ?>">
                                    
                                    <label for="sazetak"><br>Sažetak:<br></label>
                                    <textarea name="sazetak" id="sazetak" placeholder="Sažetak" rows="3"><?php echo $row['sazetak'] ?></textarea>
    
                                    <label for="sadrzaj"><br>Sadržaj:<br></label>
                                    <textarea name="sadrzaj" id="sadrzaj" placeholder="Sadržaj" rows="12"><?php echo $row['sadrzaj'] ?></textarea>
    
                                    <label for="kategorija"><br>Kategorija<br></label>
                                    <select name="kategorija" id="kategorija" value="<?php echo $row['kategorija'] ?>">
                                        <option value="" disabled>Odaberite:</option>
                                        <option value="preporuke"<?php if($row['kategorija'] === 'preporuke') {?> selected <?php }?>>Preporuke</option>
                                        <option value="recenzije"<?php if($row['kategorija'] === 'recenzije') {?> selected <?php }?>>Recenzije</option>
                                        <option value="fandom"<?php if($row['kategorija'] === 'fandom') {?> selected <?php }?>>Fandom</option>
                                    </select>
    
                                    <label for="fotografija"><br>Fotografija:<br></label>
                                    <input type="file" name="fotografija2" id="fotografija2" accept="image/*" value="<?php echo $row['fotografija'] ?>">
    
                                    <label for="spremi"><br>Arhiviraj:<br></label>';

                                    <?php
                                    if($row['arhiva'] == 0) {echo '<input name="spremi" id="spremi" type="checkbox" class="reset_checkbox">';}
                                    else {echo '<input name="spremi" id="spremi" type="checkbox" checked class="reset_checkbox">';}
                                    ?>
                                    <br>
                                    
                                    <input type="submit" name="update" id="update" value="Prihvati">
                                    <input type="reset" name="reset" id="reset" value="Poništi">
                                    <input type="submit" name="delete" id="delete" value="Izbriši">
                                </form>

                                <?php
                                
                                 }
                                 //Funkcije gumba

                                 //delete
                                 if(isset($_POST['delete'])){
                                    $id2=$_POST['id']; 
                                    $query2 = "DELETE FROM clanci WHERE id=$id2 "; 
                                    $result2 = mysqli_query($dbc, $query2); 

                                    if($result2) {
                                        echo '<a href="home.php"><span class="obavijest">Članak je obrisan, kliknite za povratak na naslovnicu</span></a>';
                                    }
                                    else {
                                        echo '<a href="home.php"><span class="obavijest">Nije moguće obrisati članak, kliknite za povratak na naslovnicu</span></a>';
                                    }
                                   
                                    mysqli_close($dbc);}


                               //update
                               //varijable
                               if(isset($_POST['update'])) {
                                   $naslov = $_POST['naslov_clanak'];
                                   $sazetak = $_POST['sazetak'];
                                   $sadrzaj = nl2br($_POST['sadrzaj']);
                                   $kategorija = $_POST['kategorija'];
                                   $fotografija2 = $_FILES['fotografija2']['name'];
                                   $datum = date('d.m.Y.');
                                   $id2 = $_POST['id'];

                                   //Provjera arhiviranosti
                                   if(isset($_POST['spremi'])){
                                       $spremi = $_POST['spremi'];
                                       $arhiva=1; }
                                       
                                       else
                                       { $arhiva=0; }

                                       //Izbor direktorija za fotografije
                                       $img_dir = 'images/'.$fotografija2; 
                                       move_uploaded_file($_FILES["fotografija2"]["tmp_name"], $img_dir);

                                       //Ubacivanje podataka u bazu
                                       $query2 = "UPDATE clanci SET datum='$datum', naslov='$naslov', sazetak='$sazetak', sadrzaj='$sadrzaj', fotografija='$fotografija2', kategorija='$kategorija', arhiva='$arhiva' WHERE id='$id2'";

                                       //Provjera uspješnosti
                                       $result2 = mysqli_query($dbc, $query2);

                                       if($result2) {
                                           echo '<a href="home.php"><span class="obavijest">Promjene su spremljene, kliknite za povratak na naslovnicu</span></a>';
                                       }
                                       else {
                                        echo '<a href="home.php"><span class="obavijest">Nije moguće spremiti promjene, kliknite za povratak na naslovnicu</span></a>';
                                       }

                                       mysqli_close($dbc); } };

                                       if($_SESSION['razina'] === '0') {
                                        echo '<p class="obavijest">'. $_SESSION['k_ime'] .', nemate dovoljna prava za pristup ovoj stranici.</p>';

                                       }
                            ?>
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

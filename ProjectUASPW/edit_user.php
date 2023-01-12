<?php

include 'config.php';
session_start();
$user_id1 = $_SESSION['user_id1'];

if(isset($_POST['Simpan'])){

    $select_user = mysqli_query($conn, "UPDATE mahasiswa SET 
    
    nama    ='".$_POST['nama']."',
    jenis_kelamin='".$_POST['jk']."',
    fakultas     ='".$_POST['fak']."'
    WHERE nim=".strval($_POST['nim']).";");
    if ($select_user){
        echo "data berhasil disimpan";
        echo "<meta http-equiv='refresh' user.php>";
    } else {
        echo 'Tidak dapat menyimpan data <br/>';
        echo mysqli_error();
    }
 
 }
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> My Account | USU </title>

    <!-- import custom css -->
    <link rel="stylesheet" href="css/style.css">

    <!-- import bootsrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- import google fonts : Poppins & Caveat -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- import bootsrap icons -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">


</head>
<body>
    <!-- menu section -->
    <div class="menu pt-5">

        <?php
            $select_user = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = ".$user_id1) or die('query failed');
            if(mysqli_num_rows($select_user) > 0){
               $fetch_user = mysqli_fetch_assoc($select_user);
            };            
        ?>

        <div class="logo text-center">
            <h2>Profil Saya</h2>
            <img src="images/<?php 
            if ($fetch_user['foto']=='')
            echo 'profile.png';
            else echo $fetch_user['foto']; ?>" width="100px">
            <h3 class="text-center pt-4"><?php echo $fetch_user['nim'] ?></h3>
            <p><?php echo $fetch_user['nama'] ?></p>
            <p><?php echo $fetch_user['fakultas'] ?></p>
        </div>

        <div class="exit">
            <a href="index.php?logout=<?php echo $user_id1; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete-btn">
                <button>
                    <h4><i class="bi bi-box-arrow-left"></i> Keluar</h4>
                </button>
            </a>
        </div>
    </div>

    <!-- main section -->
    <div class="content">
        <!-- navbar -->
        <nav>
            <div class="d-md-flex">
                <div class="usernav ms-auto">
                    <p>Halo, <?php echo $fetch_user['nama']; ?> !</p>
                </div>
            </div>
        </nav>
        <!-- navbar -->

        <div class="profil container">
            <h3 class="text-center p-4">Data Saya</h3>
            <div class="d-md-flex flex-row">
                <div class="col-8 p-2">
                    <form action="" method="POST">  
                        <table>
                            <tr>
                                <td><input class="box" type="hidden" name="nim" value="<?php echo $fetch_user['nim']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>: <input class="box" type="text" name="nama" value="<?php echo $fetch_user['nama']; ?>"></td>
                            </tr>
                            <tr>
                                <?php
                                if($fetch_user['jenis_kelamin'] == "L"){
                                    $l = " checked";
                                    $p = "";
                                }else {
                                    $l = "";
                                    $p = " checked";
                                }
                                ?>
                                <td>Jenis_Kelamin</td>
                                <td>:
                                    <input type="radio" name="jk" value="L" <?php echo $l ?>> Laki-Laki
                                    <input type="radio" name="jk" value="P" <?php echo $p ?>> Perempuan
                                </td>
                            </tr>
                            <tr>
                                <td>Fakultas</td>
                                <td>: <input class="box" type="text" name="fak" value="<?php echo $fetch_user['fakultas']; ?>"></td>
                            </tr>
                            <tr class="p-4">
                                <td>
                                    <!-- <a class="btn btn-success text-center"> Simpan</a> -->
                                    <button type="submit" value="Simpan" name="Simpan"> Simpan</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="col-4 p-2">
                    <p class="mb-0">Foto Profil</p>
                    <img class="mt-3 mb-3 pb-3" src="images/<?php 
                    if ($fetch_user['foto']=='')
                    echo 'profile.png';
                    else echo $fetch_user['foto']; ?>"><br>
                    <?php if($fetch_user['foto']=='') echo "<h3 class='pt-2' style='color:#fff'>Anda Belum Menambahkan Foto, Silahkan tambahkan</h3>";?>
                </div>
            </div>
            
        </div>

    </div>
    

</body>
</html>
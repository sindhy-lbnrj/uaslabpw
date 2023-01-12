<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];


if(!isset($user_id)){
    header('location:index.php');
};

if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('location:index.php');
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> My Account | USU </title>

    <!-- import custom css -->
    <link rel="stylesheet" href="css/style_user.css">

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
            $select_user = mysqli_query($conn, "SELECT * FROM `mahasiswa` WHERE nim = '$user_id'") or die('query failed');
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
            <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete-btn">
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
            <h3 style="color: #251965;" class="text-center p-4"><i class="bi bi-person-circle"></i> Data Saya</h3>
            <div class="d-md-flex flex-row">
                <div class="col-8 p-2">
                    <table>
                        <tr>
                            <td>NIM</td>
                            <td>:<?php echo $fetch_user['nim']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:<?php echo $fetch_user['nama']; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis_Kelamin</td>
                            <td>:<?php 
                            if ($fetch_user['jenis_kelamin']== 'L')
                            echo 'Laki-Laki';
                            else echo 'Perempuan'; ?></td>
                        </tr>
                        <tr>
                            <td>Fakultas</td>
                            <td>:<?php echo $fetch_user['fakultas']; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="p-4">
                            <td colspan="2" class="text-center p-3">
                                <?php $linked="update_user.php?nim=".strval($fetch_user['nim']) ?>
                                <a href=<?=$linked?> class="btn btn-warning me-3"> Edit Profil </a>
                                <a href="hapus_user.php?nim=<?php echo $fetch_user['nim'];?>" class="btn btn-danger"> Hapus Akun </a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-4 p-2">
                    <p class="mb-0">Foto Profil</p>
                    <img class="pb-4 mt-3" src="images/<?php 
                    if ($fetch_user['foto']=='')
                    echo 'profile.png';
                    else echo $fetch_user['foto']; ?>"><br>
                    <?php if($fetch_user['foto']=='') echo "<h3 class='pt-2' style='color:#fff'>Anda Belum Menambahkan Foto, Silahkan tambahkan</h3>";?>
                </div>
            </div>     
        </div>
    </div>

    <!-- <div class="bg-modal"> 
        <div class="modal-content">
            <img class="pb-4 mt-3" src="images/<?php 
            if ($fetch_user['foto']=='')
            echo 'profile.png';
            else echo $fetch_user['foto']; ?> ">
            <form action="" method="post">
                <input type="text" placeholder="name">
                <input type="text" placeholder="name">

            </form>
        </div>
    </div> -->
    

</body>
</html>
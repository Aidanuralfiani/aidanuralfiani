<?php
session_start();
include '../config/koneksi.php';
if($_SESSION['status'] != 'login'){
    echo"<script>
    alert('Anda belum login');
    location.href= '../index.php';
    </script>" ; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="index.php">Galeri Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
        <div class="navbar-nav me-auto">
      <a href="foto.php" class="nav-link">Foto</a>
      <a href="home.php" class="nav-link">Home</a>
    </div>
    </div>
    <div class="modal-body">
    <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">keluar</a>
        
</div>
    </div>
   
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4">
        <div class="card mt-2">
            <div class="card-header">Tambah Foto</div>
            <div class="card-body">
                <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                <label class="form-label">Judul Foto</label>
                    <input type="text" name="judulfoto" class="form-control" required>
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsifoto" required>
                    </textarea>
                    <label class="form-control">file</label>
                    <input type="file" class="form-control" name="lokasifile"  required>
                    <button type="submit" class="btn-btn-primary mt-2" name="tambah">Tambah Data</button>
                </form>
            </div>
        </div>
        </div>
      
        
        <div class="col-md-8">
            <div class="card mt-2">
             <div class="card-header">Data Foto</div>
             <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Foto</th>
                            <th>Judul Foto</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $userid = $_SESSION['userid'];
                        $sql= mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid'");
                        while($data = mysqli_fetch_array($sql)){
                            ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><img src="../assets/img/<?php echo $data['lokasifile'] ;?>" widht="100"></td>
                            <td><?php echo $data['judulfoto'];?></td>
                            <td><?php echo $data['deskripsifoto'];?></td>
                            <td><?php echo $data['tanggal'];?></td>
                            
                            
                            
                            <div class="modal-fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <button type="edit" class="btn btn-primary"<?php echo $data['userid']?>>edit</button>
                                    <button type="hapus" class="btn btn-danger" <?php echo $data['userid']?>>hapus</button>
                                    </div>
                                    </div>
                                    <div class="class-body">
                                    <form action="../config/aksi_foto.php" method="POST">
                                    </div>
                                </div>
                                    </div>
                                    <div class="modal-footer">
                                 
                                    </form>
                                    </div>
                                </div>
                              </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
             </div>
            </div>

        </div>
    </div>
</div>

<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>&copy; UKK RPL 2024 | Aida Nur Alfiani</p>
</footer>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>





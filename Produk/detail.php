<?php 
include("connection.php");
$selectedID = -1;
if(isset($_GET['changeModal'])){
  $selectedID = $_GET['changeModal'];
}
if(isset($_GET['buyProduk'])){
    $kurangStok = $conn->prepare("update produk set stok = stok - 1 where produk_id = ?");
    $kurangStok->bind_param("s",$selectedID);
    $kurangStok->execute();
}
$fetchProduk = $conn->query("select * from produk");
$arrBarang = $fetchProduk->fetch_all(MYSQLI_BOTH);

$selectedBarang = "not found";
foreach($arrBarang as $x){
    if($x['produk_id'] == $selectedID){
        $selectedBarang = $x;
    }
}

$barangurl = "assets/img/5a6662d4132c48708d381fa1fc4d7f15.png";
if($selectedBarang['nama'] == 'Kambing (betina)'){
  $barangurl = "assets/img/kambingbetina.jpeg";
}
if($selectedBarang['nama'] == 'Betadine 10mL'){
  $barangurl = "assets/img/kambingjantan.jpeg";
}
if($selectedBarang['nama'] == 'Betadine 7mL'){
  $barangurl = "assets/img/sapiremaja.jpeg";
}
if($selectedBarang['nama'] == 'Dettol 7mL'){
  $barangurl = "assets/img/sapidewasa.jpeg";
}
if($selectedBarang['nama'] == 'Dettol 5mL'){
  $barangurl = "assets/img/ayampotong.jpeg";
}
if($selectedBarang['nama'] == 'Dettol 10mL'){
  $barangurl = "assets/img/ayamkampung.jpeg";
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="style.css">

    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/5a6662d4132c48708d381fa1fc4d7f15.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Produk Ruang Ternak</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  </head>
  <body>
     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top " id="mainNav">
        <div class="container">
        <img src="./assets/img/5a6662d4132c48708d381fa1fc4d7f15.png" alt="" class="navbar-brand font-weight-bold text-white" style="height:50px;">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link js-scroll-trigger text-white bg-success " href="login.php">Login<span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
    </div>
      </nav>
      <!-- Akhir Navbar -->
    


        <!-- CARD -->
        <div class="container row" id="prodak" style="padding-top:100px;">
            <div class="row mt-4" >
                <div class="col-4"></div>
                <div class="col-6">
                    <img src="<?php echo $barangurl;?>" class="img-fluid" style="max-height:500px;">
                </div>
                <div class="col-2">
                    <table class="table table-borderless">
                        <tr>
                            <th>Jenis</th>
                            <td><?php echo $selectedBarang['nama'];?></td>
                        </tr>
                        <tr>
                            <th>Stok</th>
                            <td> <?php echo $selectedBarang['stok'];?> Ekor</td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <td>Rp. <?php echo number_format($selectedBarang['harga']);?></td>
                        </tr>
                        <tr>
                            <th>
                            <a href="detail.php?changeModal=<?php echo $selectedBarang['produk_id'];?>&buyProduk=1" class="btn btn-success" >Beli</a></th>
                            <td><button class="btn btn-danger" onclick="window.location.href='home.php'">Kembali</button>
                        </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
      </div>
      <br><br><br><br><br><br><br><br><br><br><br>

      <!-- FOOTER -->
      <footer class="bg-dark text-white p-5 " id="footer">
          <div class="col">
              <center>
               <h1>Ruang Ternak</h1>
               </center>
          </div>
         </div>
       </footer>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
   <!-- <script type="text/javascript" src="js/bootstrap.min.js"></script> -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
   
  </body>
</html>
<?php
include 'head.php';
include 'navbar.php';
$no = $_GET['no'];
$query = mysql_query("SELECT *FROM biaya WHERE no='$no'") or die ('Error!!'.mysql_error());
$row = mysql_fetch_array ($query);
?>
</br>
<main role="main" class="container col-md-6">
<h4 class="display-4 text-center" style="font-size: 26pt">UBAH BIAYA PRODUKSI</h4>
<hr />
<form method="post">
<div class="form-row">
  <div class="form-group col-md-4">
    <label for="txttipe"><b>TIPE BARANG</b></label>
    <input class="form-control form-control-sm" type="text" name="txttipe" placeholder="<?php echo $row['tipe'] ?>" disabled>
  </div>
  <div class="form-group col-md-4">
    <label for="txtnama"><b>NAMA BARANG</b></label>
    <input class="form-control form-control-sm" type="text" name="txtnama" placeholder="<?php echo $row['nama'] ?>" disabled>
  </div>
  <div class="form-group col-md-4">
    <label for="txtharga"><b>HARGA (Rp)</b></label>
    <input class="form-control form-control-sm" type="number" name="txtharga" placeholder="<?php echo $row['harga'] ?>" required>
  </div>
</div>
<button class="btn btn-sm btn-primary btn-block" type="submit" name="submit">Simpan</button>
</form>
</main>
<?php
if(isset ($_POST['submit'])){

  $harga  = $_POST['txtharga'];
  $update = mysql_query("UPDATE biaya SET harga='$harga' WHERE no='$no'") or die ('Error!!'.mysql_error());
  if ($update) {
    ?>
    <div class="alertsuccess fixed-top">
      <span class="closebtn" onclick="window.location.href='/SAM/php/pro.php';">&times;</span> 
      <strong>Success!</strong> Data has been updated!
    </div>
    <?php
  }else{
    ?>
    <div class="alerterror fixed-top">
      <span class="closebtn" onclick="window.location.href='/SAM/php/pro.php';">&times;</span> 
      <strong>ERROR!</strong>
    </div>
    <?php
  }
}
include 'foot.php';
?>
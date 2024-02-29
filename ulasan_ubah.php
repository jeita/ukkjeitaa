<h1 class="mt-4"> ulasan Buku</h1>
<div class="card bg-white">
    <div class="card-body">
    <div class="row">
<div class ="col_md_12">
  <form method="post">
          <?php
          $id = $_GET['id'];
              if(isset($_POST['submit'])){
                $id_buku = $_POST['buku_id'];
                $user_id = $_SESSION['user']['user_id'];
                $ulasan = $_POST['ulasan'];
                $rating = $_POST['rating'];
                $query = mysqli_query($koneksi, "UPDATE ulasan set buku_id='$id_buku', ulasan='$ulasan', rating='$rating' WHERE ulasan_id='$id'");

                if($query){
                  echo '<scrip>alert("Ubah Data Berhasil.");</scriipt>';
                }else{
                  echo '<scrip>alert("Ubah Data Gagal.");</scriipt>';
                }
              }
              $query = mysqli_query($koneksi, "SELECT*FROM ulasan WHERE ulasan_id=$id");
              $data = mysqli_fetch_array($query);
           ?>
      <div class="row mb-3">
        <div class="col-md-2">buku</div>
        <div class="col-md-8">
            <select name="buku_id" class="form-control col-md-8">
                <?php
                    $buk = mysqli_query($koneksi, "SELECT*FROM buku");
                    while($buku = mysqli_fetch_array($buk)) {
                       ?>
                       <option <?php if($data['buku_id'] == $buku['buku_id']) echo'selected' ;?>alue="<?php echo $buku['buku_id']; ?>"><?php echo $buku['Judul']; ?></option> 
                       <?php
                    }
                ?>
            </select>
        </div>
                  </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-2">ulasan</div>
          <div class="col-md-8">
            <textarea name="ulasan"  rows="5" class="form-control col-md-8"> <?php echo $data['ulasan']; ?></textarea>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-2">rating</div>
          <div class="col-md-8">
            <select name="rating" class="form-control col-md-8">
                <?php
                    for($i = 1; $i<=10; $i++){
                        ?>
                        <option <?php if($data['rating'] == $i) echo 'selected'; ?>></option>
                        <?php
                    }
                ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-8">
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
            <button type="reset" class="btn btn-secondary">reset</button>
            <a href="?page=ulasan" class="btn btn-danger">Kembali</a>
          </div>
        </div>
      </div>
  </form> 
    </div>
</div>
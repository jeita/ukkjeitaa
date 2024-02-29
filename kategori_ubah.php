
<h1 class="mt-4"> Ubah Kategori Buku</h1>
<div class="card bg-white">
    <div class="card-body">
    <div class="row">
<div class ="col_md_12">
  <form method="post">
          <?php
            $id = $_GET['id'];
              if(isset($_POST['submit'])){
                $kategori = $_POST['kategori'];
                $query = mysqli_query($koneksi, "UPDATE kategori set NamaKategori='$kategori' WHERE KategoriID=$id");

                if($query){
                  echo '<scrip>alert("Tambah Data Berhasil.");</scriipt>';
                }else{
                  echo '<scrip>alert("Tambah Data Gagal.");</scriipt>';
                }
              }
              $query = mysqli_query($koneksi, "SELECT*FROM kategori where kategoriID=$id");
              $data = mysqli_fetch_array($query);
           ?>
    <div class="row mb-3">
        <div class="col-md4">Nama Kategori</div>
        <div class="col-md8"><input type="text" class="form-control" value="<?php echo $data['NamaKategori'];?>" name="kategori"></div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-8">
                 <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                 <button type="reset" class="btn btn-secondary">reset</button>
                 <a href="?page=kategori" class="btn btn-danger">Kembali</a>
      </div>
    </div>
  </form> 
    </div>
</div>
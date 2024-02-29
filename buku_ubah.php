<h1 class="mt-4">Buku</h1>
<div class="card bg-white">
    <div class="card-body">
    <div class="row">
<div class ="col_md_12">
  <form method="post">
          <?php
          $id = $_GET['id'];
              if(isset($_POST['submit'])){
                $id_kategori = $_POST['id_kategori'];
                $judul = $_POST['judul'];
                $penulis = $_POST['penulis'];
                $penerbit = $_POST['penerbit'];
                $tahun_terbit = $_POST['tahun_terbit'];
                $deskripsi = $_POST['deskripsi'];
                $query = mysqli_query($koneksi, "UPDATE buku SET id_kategori='$id_kategori', judul='$judul', penulis='$penulis', penerbit='$penerbit', TahunTerbit='$tahun_terbit', Deskripsi='$deskripsi' WHERE buku_id=$id");

                if($query){
                  echo '<script>alert("Ubah Data Berhasil.");</script>';
                }else{
                  echo '<script>alert("Ubah Data Gagal.");</script>';
                }
              }
              $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE buku_id='$id'");
              $data = mysqli_fetch_array($query);
           ?>
    <div class="row mb-3"> 
        <div class="col-md4">Kategori</div>
        <div class="col-md8">
            <select name="id_kategori" class="from control">
                <?php
                    $kat = mysqli_query($koneksi, "SELECT*FROM kategori");
                    while($kategori = mysqli_fetch_array($kat)) {
                       ?>
                       <option <?php if($kategori['kategoriID'] == $data['id_kategori']) echo 'selected'; ?> value="<?php echo $kategori['kategoriID']; ?>"><?php echo $kategori['NamaKategori']; ?></option> 
                       <option <?php if($kategori['kategoriID'] == $data['id_kategori']); ?> value="<?php echo $kategori['kategoriID']; ?>"><?php echo $kategori['NamaKategori']; ?></option> 
                       <?php
                    }
                ?>
            </select>
    </div>

    <div class="row mb-3">
        <div class="col-md4">judul</div>
        <div class="col-md8"><input type="text" value="<?php echo $data['Judul']; ?>" class="form-control" name="judul"></div>
    </div>
    <div class="row mb-3">
        <div class="col-md4">penulis</div>
        <div class="col-md8"><input type="text" value="<?php echo $data['Penulis']; ?> "class="form-control" name="penulis"></div>
    </div>
    <div class="row mb-3">
        <div class="col-md4">penerbit</div>
        <div class="col-md8"><input type="text" value="<?php echo $data['Penerbit']; ?> " class="form-control" name="penerbit"></div>
    </div>
    <div class="row mb-3">
        <div class="col-md4">tahun terbit</div>
        <div class="col-md8"><input type="number" value="<?php echo $data['TahunTerbit']; ?> "class="form-control" name="tahun_terbit"></div>
    </div>
    <div class="row mb-3">
        <div class="col-md4">deskripsi</div>
        <div class="col-md8">
            <textarea name="deskripsi"  rows="5" class="rom-control"><?php echo $data['Deskripsi']; ?> </textarea>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-8">
                 <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                 <button type="reset" class="btn btn-secondary">reset</button>
                 <a href="?page=buku" class="btn btn-danger">Kembali</a>
      </div>
    </div>
  </form> 
    </div>
</div>
<h1 class="mt-4">Buku</h1>
<div class="card bg-white">
    <div class="card-body">
    <div class="row">
<div class ="col_md_12">
  <form method="post" enctype="multipart/form-data">
          <?php
              if(isset($_POST['submit'])){
                $id_kategori = $_POST['id_kategori'];
                $judul = $_POST['judul'];
                $penulis = $_POST['penulis'];
                $fileBuku = $_FILES['coverBuku'];
                $penerbit = $_POST['penerbit'];
                $tahun_terbit = $_POST['tahun_terbit'];
                $deskripsi = $_POST['deskripsi'];

                $fileType = explode("image/", $fileBuku["type"]);

                $fileName = rand(100_000, 999_999).'.'.$fileType[1];
                move_uploaded_file($fileBuku['tmp_name'], './assets/upload/'.$fileName);

                $query = mysqli_query($koneksi, "INSERT  INTO buku(id_kategori,Judul,Penulis, cover,Penerbit,TahunTerbit,Deskripsi)values ('$id_kategori','$judul','$penulis', '$fileName', '$penerbit','$tahun_terbit','$deskripsi')");

                if($query){
                  echo '<scrip>alert("Tambah Data Berhasil.");</scriipt>';
                }else{
                  echo '<scrip>alert("Tambah Data Gagal.");</scriipt>';
                }
              }
           ?>
    <div class="row mb-3">
        <div class="col-md-4">Kategori</div>
        <div class="col-md8">
            <select name="id_kategori" class="from control">
                <?php
                    $kat = mysqli_query($koneksi, "SELECT*FROM kategori");
                    while($kategori = mysqli_fetch_array($kat)) {
                       ?>
                       <option value="<?php echo $kategori['kategoriID']; ?>"><?php echo $kategori['NamaKategori']; ?></option> 
                       <?php
                    }
                ?>
            </select>
    </div>

    <div class="row mb-3">
        <div class="col-md-4">judul</div>
        <div class="col-md8"><input type="text" class="form-control" name="judul"></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">penulis</div>
        <div class="col-md8"><input type="text" class="form-control" name="penulis"></div>
    </div>
    <div class="row mb-3">
      <div class="col-md-4">cover buku</div>
      <div class="col-md8"><input type="file" class="form-control" name="coverBuku"></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">penerbit</div>
        <div class="col-md8"><input type="text" class="form-control" name="penerbit"></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">tahun terbir</div>
        <div class="col-md8"><input type="number" class="form-control" name="tahun_terbit"></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">deskripsi</div>
        <div class="col-md8">
            <textarea name="deskripsi"  rows="5" class="rom-control"></textarea>
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
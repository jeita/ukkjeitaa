<h1 class="mt-4"> peminjaman Buku</h1>
<div class="card bg-white">
    <div class="card-body">
    <div class="row">
<div class ="col_md_12">
  <form method="post">
          <?php
              if(isset($_POST['submit'])){
                $buku_id = $_POST['buku_id'];
                $user_id = $_SESSION['user']['user_id'];
                $Tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                $Tanggal_pengembalian = $_POST['tanggal_pengembalian'];
                $Status_peminjaman = $_POST['Status_peminjaman'];
                $query = mysqli_query($koneksi, "INSERT INTO peminjaman(buku_id,user_id,tanggal_peminjaman,tanggal_pengembalian,status_peminjaman)values('$buku_id','$user_id','$Tanggal_peminjaman','$Tanggal_pengembalian','$Status_peminjaman')");

                if($query){
                  echo '<scrip>alert("Tambah Data Berhasil.");</scriipt>';
                }else{
                  echo '<scrip>alert("Tambah Data Gagal.");</scriipt>';
                }
              }
           ?>   
      <div class="row mb-3">
        <div class="col-md-2">buku</div>
        <div class="col-md-8">
            <select name="buku_id" class="form-control">
                <?php
                    $buk = mysqli_query($koneksi, "SELECT*FROM buku");

                    while($buku = mysqli_fetch_array($buk)) {
                    ?>
                       <option value="<?php echo $buku['buku_id']; ?>"><?php echo $buku['Judul']; ?></option> 
                     <?php
                    }
                ?>
            </select>
        </div>
     </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">Tanggal Peminjaman</div>
            <div class="col-md-8">
            <input type="date" class="form-control" name="tanggal_peminjaman">
         </div>
       
        <div class="row mt-3">
              <div class="col-md-2">Tanggal Pengembalian</div>
             <div class="col-md-8">
            <input type="date" class="form-control" name="tanggal_pengembalian">
         </div>
        </div>
        <div class="row mt-3">
              <div class="col-md-2">status peminjaman</div>
             <div class="col-md-8">
                <select name="Status_peminjaman" class="form-control">
                     <option value="dipinjam">Dipinjam</option>
                     <option value="dikembalikan">Dikembalikan</option>
                     </select>
         </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-8">
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
            <button type="reset" class="btn btn-secondary">reset</button>
            <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
          </div>
        </div>
      </div>
  </form> 
    </div>
</div>
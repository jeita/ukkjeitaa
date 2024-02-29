<div class="card bg-white">
    <div class="card-body">
        <h1 class="mt-4 text-center">Data peminjam</h1>
<div class="row">
<div class ="col_md_12">

    <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <th>id</th>
            <th>username</th>
            <th>email</th>
            <th>namalengkap</th>
            <th>alamat</th>
        </tr>
        <?php
        $i = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE level = 'petugas'");
        while($data = mysqli_fetch_array($query)){
          ?>
              <tr>
              <td><?php echo $data['user_id']; ?></td>
              <td><?php echo $data['username']; ?></td>
              <td><?php echo $data['email']; ?></td>
              <td><?php echo $data['namalengkap']; ?></td>
              <td><?php echo $data['alamat']; ?></td>
              </tr>
              <?php
        }
        ?>
    </table>
</div>
</div>
    </div>
</div>
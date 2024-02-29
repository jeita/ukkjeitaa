<h2 align="center">Laporan Peminjaman Buku</h2>
<table border="1" cellspacing="0" cellspadding="5" width="100%">
        <tr>
            <th>No</th>
            <th>user</th>
            <th>buku</th>
            <th>tanggal peminjaman</th>
            <th>tanggal pengembalian</th>
            <th>status peminjaman</th>
        </tr>
        <?php
        include "koneksi.php";
        $i = 1;
        $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN   user on user.user_id = peminjaman.user_id LEFT JOIN buku on buku.buku_id = peminjaman   .buku_id");
        while($data = mysqli_fetch_array($query)){
          ?>
              <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $data['namalengkap']; ?></td>
              <td><?php echo $data['Judul']; ?></td>
              <td><?php echo $data['Tanggal_peminjaman']; ?></td>
              <td><?php echo $data['Tanggal_pengembalian']; ?></td>
              <td><?php echo $data['Status_peminjaman']; ?></td>
              </tr>
              <?php
        }
        ?>
    </table>
    <script>
        window.print();
        setTimeout(function(){
            window.close();
        },100);
    </script>
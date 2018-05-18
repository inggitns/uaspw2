<html>
    <head>
        <title>Master Jabatan</title>
        <link href='<?php echo base_url(); ?>resources/css/style.css' rel='stylesheet' type='text/css' />
        <script>
            function jsTambah() {
            document.location = 'jabatan/tambah';
            }
        </script>
    </head>
    <body>
        <h1>Master Jabatan (View List)</h1>
        <a href='<?php echo site_url(); ?>/pegawai'>PEGAWAI</a>
        <br /><br />
        <input type='button' name='btnTambah' value='Tambah' onClick='javascript: jsTambah();' />
        <br /><br />
        <table width='100%' align='center' cellspacing='0' cellpadding='0'>
            <tr>
                <th width='1%'>Kode</th>
                <th>Nama Jabatan</th>
                <th>Gaji Pokok</th>
                <th width='100'><i>perintah</i></th>
            </tr>
            <?php
                foreach($data as $row) {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nama_jabatan']; ?></td>
                    <td><?php echo $row['gaji_pokok']; ?></td>
                    <td align='center'>
                        <a href='<?php echo site_url(); ?>/jabatan/edit/<?php echo $row['id']; ?>'>Edit</a> |
                        <a href='<?php echo site_url(); ?>/jabatan/hapus/<?php echo $row['id']; ?>'>Hapus</a>
                    </td>
                </tr>
            <?php
                }
            ?>
        </table>
    </body>
</html>
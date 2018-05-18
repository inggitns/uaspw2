<html>
    <head>
        <title>Master Pegawai</title>
        <link href='<?php echo base_url(); ?>resources/css/style.css' rel='stylesheet' type='text/css' />
        <script>
            function jsTambah() {
                document.location = 'pegawai/tambah';
            }
        </script>
    </head>
    <body>
        <h1>Master Pegawai (View List)</h1>
        <a href='<?php echo site_url(); ?>/jabatan'>JABATAN</a>
        <br /><br />
        <input type='button' name='btnTambah' value='Tambah' onClick='javascript: jsTambah();' />
        <br /><br />
        <table width='100%' align='center' cellspacing='0' cellpadding='0'>
            <tr>
                <th width='1%'>Kode</th>
                <th width='15%'>Jabatan</th>
                <th width='25%'>Nama</th>
                <th width>Alamat</th>
                <th width='100'><i>perintah</i></th>
            </tr>
            <?php foreach($data as $row) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nama_jabatan']; ?></td>
                    <td><?php echo $row['nama_pegawai']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td align='center'>
                        <a href='<?php echo site_url(); ?>/pegawai/edit/<?php echo $row['id']; ?>'>Edit</a> |
                        <a href='<?php echo site_url(); ?>/pegawai/hapus/<?php echo $row['id']; ?>'>Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>

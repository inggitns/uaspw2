<html>
    <head>
        <title>Master Pegawai</title>
        <link href='<?php echo base_url(); ?>resources/css/style.css' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href='<?php echo base_url(); ?>resources/jquery-ui/jquery-ui.theme.css'>
        <link rel="stylesheet" href='<?php echo base_url(); ?>resources/jquery-ui/jquery-ui.css'>
        <script src='<?php echo base_url(); ?>resources/jquery/jquery-3.3.1.min.js'></script>
        <script src='<?php echo base_url(); ?>resources/jquery-ui/jquery-ui.js'></script>
        <script>
            $( function() {
                $( "#datepicker" ).datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
                });
            });
            function jsView() {
                document.location = '<?php echo site_url(); ?>/pegawai';
            }
        </script>
    </head>
    <body>
        <h1>Master Pegawai (Form)</h1>
        <br />
        <input type='button' name='btn_view' value='Kembali ke View' onClick='javascript: jsView();' />
        <br /><br />
        <?php echo form_open('pegawai/simpan'); ?>
        <table width='800' align='center' cellspacing='0' cellpadding='0'>
            <tr>
                <th align='right' width='25%'>Kode<br/><small><i>(auto)</i></small></th>
                <td>
                    <?php echo form_error('txt_id'); ?>
                    <input type='text' name='txt_id' size='3' maxlength='3' readOnly='readOnly' class='read_only' value='<?php if(isset($data)) echo $data[0]['id']; else echo set_value('txt_id'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Jabatan*</th>
                <td>
                    <?php echo form_error('cmb_jabatan'); ?>
                    <select name='cmb_jabatan'>
                        <?php 
                            if(isset($data))                            {
                                foreach ( $jabatan_combo as $rows ) { 
                                    if($rows['id'] == $data[0]['jabatan_id']){
                                        echo '<option value="'.$rows['id'].'" selected>'. $rows['nama_jabatan'].'</option>'; 
                                    }else{
                                        echo '<option value="'.$rows['id'].'">'. $rows['nama_jabatan'].'</option>'; 
                                    }                                    
                                } 
                            }else{
                                foreach ( $jabatan_combo as $rows ) { 
                                    echo '<option value="'.$rows['id'].'">'. $rows['nama_jabatan'].'</option>'; 
                                } 
                            }                            
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th align='right'>Nama*</th>
                <td>
                    <?php echo form_error('txt_nama_pegawai'); ?>
                    <input type='text' name='txt_nama_pegawai' size='30' maxlength='200' value='<?php if(isset($data)) echo $data[0]['nama_pegawai']; else echo set_value('txt_nama_pegawai'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Alamat</th>
                <td>
                    <?php echo form_error('txt_alamat'); ?>
                    <input type='text' name='txt_alamat' size='90' maxlength='90' value='<?php if(isset($data)) echo $data[0]['alamat']; else echo set_value('txt_alamat'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Tempat Lahir</th>
                <td>
                    <?php echo form_error('txt_tempat_lahir'); ?>
                    <input type='text' name='txt_tempat_lahir' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0]['tempat_lahir']; else echo set_value('txt_tempat_lahir'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Tanggal Lahir</th>
                <td>
                    <?php echo form_error('txt_tgl_lahir'); ?>
                    <input readonly id='datepicker' type='text' name='txt_tgl_lahir' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0]['tgl_lahir']; else echo set_value('txt_tgl_lahir'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>E-mail</th>
                <td>
                    <?php echo form_error('txt_email'); ?>
                    <input type='text' name='txt_email' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0]['email']; else echo set_value('txt_email'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Telepon </th>
                <td>
                    <?php echo form_error('txt_telepon'); ?>
                    <input type='text' name='txt_telepon' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0]['telepon']; else echo set_value('txt_telepon'); ?>' />
                </td>
            </tr>
            <tr>
                <td colspan='2'>
                    <i>* - Wajib isi</i>
                    <div align='right'>
                    <input type='submit' name='cmd_simpan' value='Simpan'/>
                    </div>
                </td>
            </tr>
        </table>
        </form>
    </body>
</html>
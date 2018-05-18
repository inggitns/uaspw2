<html>
    <head>
        <title>Master Jabatan</title>
        <link href='<?php echo base_url(); ?>resources/css/style.css' rel='stylesheet' type='text/css' />
        <script>
            function jsView() {
                document.location = '<?php echo site_url(); ?>/jabatan';
            }

            function hanyaAngka(evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
            }
        </script>
    </head>
    <body>
        <h1>Master Jabatan (Form)</h1>
        <br />
        <input type='button' name='btn_view' value='Kembali ke View' onClick='javascript: jsView();' />
        <br /><br />
        <?php echo form_open('jabatan/simpan'); ?>
        <table width='700' align='center' cellspacing='0' cellpadding='0'>
            <tr>
                <th align='right' width='25%'>ID</th>
                <td>
                    <?php echo form_error('txt_id'); ?>
                    <input type='text' name='txt_id' size='3' maxlength='3' readOnly='readOnly' class='read_only' value='<?php if(isset($data)) echo $data[0]['id']; else echo set_value('txt_id'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Jabatan*</th>
                <td>
                    <?php echo form_error('txt_nama_jabatan'); ?>
                    <input type='text' name='txt_nama_jabatan' size='30' maxlength='30' value='<?php if(isset($data)) echo $data[0] ['nama_jabatan']; else echo set_value('txt_nama_jabatan'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Gaji Pokok*</th>
                <td>
                    <?php echo form_error('txt_gaji_pokok'); ?>
                    <input onkeypress="return hanyaAngka(event)" type='text' name='txt_gaji_pokok' size='15' maxlength='15' value='<?php if(isset($data)) echo $data[0] ['gaji_pokok']; else echo set_value('txt_gaji_pokok'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Tunjangan*</th>
                <td>
                    <?php echo form_error('txt_tunjangan'); ?>
                    <input onkeypress="return hanyaAngka(event)" type='text' name='txt_tunjangan' size='15' maxlength='15' value='<?php if(isset($data)) echo $data[0] ['tunjangan']; else echo set_value('txt_tunjangan'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Uang Transport*</th>
                <td>
                    <?php echo form_error('txt_uang_transport'); ?>
                    <input onkeypress="return hanyaAngka(event)" type='text' name='txt_uang_transport' size='15' maxlength='30' value='<?php if(isset($data)) echo $data[0] ['uang_transport']; else echo set_value('txt_uang_transport'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Uang Makan*</th>
                <td>
                    <?php echo form_error('txt_uang_makan'); ?>
                    <input onkeypress="return hanyaAngka(event)" type='text' name='txt_uang_makan' size='15' maxlength='30' value='<?php if(isset($data)) echo $data[0] ['uang_makan']; else echo set_value('txt_uang_makan'); ?>' />
                </td>
            </tr>
            <tr>
                <th align='right'>Lembur*</th>
                <td>
                    <?php echo form_error('txt_lembur'); ?>
                    <input onkeypress="return hanyaAngka(event)" type='text' name='txt_lembur' size='15' maxlength='30' value='<?php if(isset($data)) echo $data[0] ['lembur']; else echo set_value('txt_lembur'); ?>' />
                </td>
            </tr>
            <tr>
                <td colspan='2'>
                    <i>* - Wajib isi</i>
                    <div align='right'>
                        <input type='submit' name='cmd_simpan' value='Simpan' />
                    </div>
                </td>
            </tr>
        </table>
        </form>
    </body>
</html>
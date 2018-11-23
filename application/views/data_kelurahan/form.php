<!-- START KEYBOARD FILTERING -->
<script language="javascript">
    $(document).ready(function() {
        $(".keyboard").keydown(function(e) {
            // Allow: backspace, delete, tab, escape, enter and 
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A
                            (e.keyCode == 65 && e.ctrlKey === true) ||
                            // Allow: home, end, left, right, down, up
                                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                        // let it happen, don't do anything
                        return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                        // $(".keyboard").focus();
                        $("#validasi").html('<font color="#eb3a28"><i class="fa fa-close(alias)">&nbsp;</i><strong>Hanya Boleh Mengisi Angka dan Tanda (.)</strong></font>');
                        return false();
                    } else {
                        $("#validasi").html('');
                    }
                });
    });
</script>
<!-- END KEYBOARD FILTERING -->

<input id="id_kel" type="hidden" value="<?= ((isset($data)) ? MD5($data->id_kel) : "") ?>">
<div class="form-item">
    <div class="col-md-12">
        <label>KODE KELURAHAN *</label>
        <input id="kode_kel" type="text" class="keydown form-control text-uppercase" value="<?= ((isset($data)) ? $data->kode_kel : "") ?>">
    </div>
</div>
<div class="form-item">
    <div class="col-md-12">
        <label>NAMA KELURAHAN *</label>
        <input id="nama_kel" type="text" class="form-control text-uppercase" value="<?= ((isset($data)) ? $data->nama_kel : "") ?>">
    </div>
</div>
<div class="form-item">
    <div class="col-md-12">
        <label>NAMA LURAH *</label>
        <input id="lurah" type="text" class="form-control text-uppercase" value="<?= ((isset($data)) ? $data->lurah : "") ?>">
    </div>
</div>
<div class="form-item">
    <div class="col-md-12">
        <label>NIP *</label>
        <input id="nip" type="text" class="form-control text-uppercase" value="<?= ((isset($data)) ? $data->nip : "") ?>">
    </div>
</div>
<div class="form-item">
    <div class="col-md-12">
        <label>JABATAN *</label>
        <input id="jabatan" type="text" class="form-control text-uppercase" value="<?= ((isset($data)) ? $data->jabatan : "") ?>">
    </div>
</div>


<html>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#upload').click(function(event) {

                event.preventDefault();

                if ($('#file_upload').val() == '') {
                    alert('Harap pilih file');
                    return false;
                }

                var form = $('#form')[0];
                var data = new FormData(form);
                $.ajax({
                    url: '<?= site_url('data_pelayanan/import_datang') ?>',
                    type: "POST",
                    data: data,
                    enctype: 'multipart/form-data',
                    contentType: false,
                    processData: false,
                    dataType: "JSON",
//            error: function() {
//                alert('Gagal Upload File CSV');
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert(jqXHR.responseText);
                    },
                    success: function(respon) {
                        if (respon.status == 'berhasil') {
                            alert(respon.alert);
                            location.href = '<?= site_url('data-pelayanan/').$layanan ?>';
                        } else {
                            alert(respon.alert);
                        }
                    }
                });

            });
        });
    </script>
    <style type="text/css">
        #hidden {display:none}
        #progress-bar {position:fixed;z-index:9999;top:0;left:0;width:0;height:2px;background-color:#4aa6e7}
        #loading {position:fixed;z-index:999;top:0;left:0;width:100%;height:100%;opacity: 0.5; 
                  background:#fff url(<?php echo base_url('assets/loading-image.gif'); ?>) center no-repeat}
        .style1 {
            color: #FF0000;
            font-size: 10px;
        }
    </style>
    <body>
        <form id="form">    
            <h3>Import Data</h3><br/>

            <label for="after">Upload File XLS, XLSX atau CSV <br /> </label>      

            <input name="file" id="file_upload" type="file" required=""
                   accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
            <br /> <br /> 
<!--            <input type="checkbox" name="update" value ="update"/> Update Data Order Sebelumnya <br />-->
            <br /> 
            <button type="submit" id="upload" class="btn btn-primary btn-lg tombolea">Upload</button>
<!--                    <input type="submit" value="Upload" id="upload" class="btn btn-primary btn-lg tombolea">&nbsp;&nbsp;  -->
        </form>
    </body>
</html>

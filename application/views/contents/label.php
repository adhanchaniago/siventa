<div id="page-wrapper">
    
    <!-- ISI KONTEN MULAI DARI BAWAH SINI -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="margin-top:15px">
                <div class="panel-heading">
                    <h4><i class="fa fa-tag"></i> Label</h4>
                </div>
                <!-- /.panel-heading -->

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Custom Label -->
                            <h4 class="page-header" style="margin-top: 15px;"> <b>Custom Label</b></h4>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5>Hanya satu label <i class="fa fa-tag fw"></i></h5>
                                        </div>
                                        <div class="panel-body">
                                            <form role="form" method="post" target="blank" action="<?= base_url('c_label/generatelabel') ?>">
                                                <div class="form-group">
                                                    <label>Pilih Inventaris:</label>
                                                    <div class="input-group">
                                                        <input type="hidden" name="filter" value="kd">
                                                        <input name="kd" id="cari" type="text" onclick="refreshItem()" class="form-control" placeholder="Kode Inventaris" required>
                                                        <span class="input-group-addon" onclick="refreshItem()" >
                                                            <i class="fa fa-search"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-print"></i> Print!</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.panel 1 -->
                                </div>
                                <!-- /.panel 1 -->

                                <div class="col-lg-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5>Per Tipe Item <i class="fa fa-cubes fw"></i></h5>
                                        </div>
                                        <div class="panel-body">
                                            <form role="form" method="post" target="blank" action="<?= base_url('c_label/generatelabel') ?>">
                                                <div class="form-group">
                                                    <label>Pilih Tipe:</label>
                                                    <input type="hidden" name="filter" value="tipe">
                                                    <select class="form-control" name="kd">
                                                    <?php foreach ($ktg_brg as $ktg) { ?>
                                                        <option value="<?= $ktg->kd_kategori; ?>"><?= $ktg->nm_kategori; ?></option>
                                                    <?php }?>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-print"></i> Print!</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.panel 1 -->
                                </div>
                                <!-- /.panel 2 -->

                                <div class="col-lg-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5>Per Lokasi <i class="fa fa-map-marker-alt fw"></i></h5>
                                        </div>
                                        <div class="panel-body">
                                            <form role="form" method="post" target="blank" action="<?= base_url('c_label/generatelabel') ?>">
                                                <div class="form-group">
                                                    <label>Pilih Lokasi:</label>
                                                    <input type="hidden" name="filter" value="lokasi">
                                                    <select class="form-control" name="kd">
                                                    <?php foreach ($lokasi as $lok) { ?>
                                                        <option value="<?= $lok->kd_lokasi; ?>"><?= $lok->nm_lokasi; ?></option>
                                                    <?php } ?>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-print"></i> Print!</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.panel 1 -->
                                </div>
                                <!-- /.panel 3-->

                            </div>
                            <!-- /.row -->

                            <!-- Complete Label -->
                            <h4 class="page-header" style="margin-top: 15px;"> <b>Complete Label</b></h4>
                            <p>Print semua label inventaris.</p>
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-lg-6 col-lg-offset-3">
                                        <a taget="blank" href="<?= base_url('c_label/generatelabel') ?>" class="btn btn-primary btn-block btn-lg" role="button"><i class="fa fa-print"></i> Print!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <!-- MODAL BARANG -->
    <div class="modal fade" id="modal-barang">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Pilih Barang</h3>
                </div>
                <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="table-barang">
                                    <thead >
                                        <tr>
                                            <th>Kode Barang</th>
                                            <th>Type</th>
                                            <th>Merk</th>
                                            <th>Model</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- /.table-responsive -->
                            </div>
                        </div>
                    </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <!-- <button type="submit" class="btn btn-success">OK</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- BATAS KONTEN -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets');?>/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets');?>/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- bootstrap datepicker -->
<script src="<?php echo base_url('assets');?>/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url('assets');?>/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url('assets');?>/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url('assets');?>/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#table-barang').DataTable({
        responsive: true
    });
    //Date picker
    $('#datepicker').datepicker({
        format: "dd/mm/yyyy",
        todayBtn: "linked",
        autoclose: true
    })

});

function refreshItem() {
    $.ajax({
        url:"<?php echo base_url('c_label/getAll');?>",
        success: function(response) {
            myJsonData = response;
            table = $('#table-barang').DataTable();
            table.destroy();
            table = $('#table-barang').DataTable({
                columnDefs: [
                        { class: "text-center", targets: 4 },
                ],
                responsive: true,
                "lengthMenu": [ 5 ], 
                "pageLength": 5
            });
            populateTableItem(myJsonData);  
            $('#modal-barang').modal('show');
        }, error: function(e) {
            console.log(e);
        }
    });
}

function populateTableItem(data) {
    // clear the table before populating it with more data
    $("#table-barang").DataTable().clear();
    var length = Object.keys(data.labels).length;
    for(var i = 0; i < length; i++) {
    var aa = data.labels[i];

    // You could also use an ajax property on the data table initialization
    $('#table-barang').dataTable().fnAddData( [
        aa.kd_inventaris,
        aa.nm_kategori,
        aa.merk,
        aa.model,
        "<a class='btn btn-primary' onclick=pilih(\"" + aa.kd_inventaris + "\")><i class='fa fa-check'></i> Pilih</a>"
    ]);
    }

}
function pilih(kd) { 
    $('#cari').val(kd);
    $('#modal-barang').modal('hide');
}


</script>
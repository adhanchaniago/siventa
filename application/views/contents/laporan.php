<div id="page-wrapper">
    
    <!-- ISI KONTEN MULAI DARI BAWAH SINI -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="margin-top:15px">
                <div class="panel-heading">
                    <h4><i class="fa fa-file-alt"></i> Laporan</h4>
                </div>
                <!-- /.panel-heading -->
                
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#penempatan">Penempatan <i class="fa fa-share-square"></i></a></li>
                        <li><a href="#mutasi">Mutasi <i class="fa fa-retweet"></i></a></li>
                        <li><a href="#inventaris">Inventaris <i class="fa fa-laptop"></i></a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="penempatan" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- Custom report -->
                                    <h4 class="page-header" style="margin-top: 15px;"> <b>Laporan Penempatan</b></h4>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5>Per Tahun Anggaran <i class="fa fa-file fw"></i></h5>
                                                </div>
                                                <div class="panel-body">
                                                    <form role="form" method="post" target="blank" action="<?= base_url('c_laporan/penempatanta')?>">
                                                        <div class="form-group">
                                                            <label>Pilih T.A. :</label>
                                                            <div class="form-group">
                                                                <select class="form-control" name="ta">
                                                                    <?php foreach ($TA as $ta) { ?>
                                                                    <option value="<?= $ta->TA; ?>"><?= $ta->TA; ?></option>
                                                                    <?php }?>
                                                                </select>
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
                                                    <form role="form" method="post" target="blank" action="<?php echo base_url('c_laporan/penempatanTaTipe');?>" id="form-tipe">
                                                        <div class="row">
                                                            <div class="col-lg-7" style="padding-right: 7px;">
                                                                <div class="form-group">
                                                                    <label>Pilih Tipe:</label>
                                                                    <select class="form-control" name="tipe">
                                                                        <?php foreach ($ktg_brg as $ktg) { ?>
                                                                        <option value="<?= $ktg->kd_kategori; ?>"><?= $ktg->nm_kategori; ?></option>
                                                                        <?php }?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-5" style="padding-left: 7px;">
                                                                <div class="form-group">
                                                                    <label>Pilih T.A. :</label>
                                                                    <select class="form-control" name="ta">
                                                                        <?php foreach ($TA as $ta) { ?>
                                                                        <option value="<?= $ta->TA; ?>"><?= $ta->TA; ?></option>
                                                                        <?php }?>
                                                                    </select>
                                                                </div>
                                                            </div>                                                    
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
                                                    <form role="form" method="post" target="#" action="<?php echo base_url('c_laporan/penempatanTaLok');?>" id="form-lokasi">
                                                        <div class="row">
                                                            <div class="col-lg-7" style="padding-right: 7px;">
                                                                <div class="form-group">
                                                                    <label>Pilih Lokasi:</label>
                                                                    <input type="hidden" name="lok">
                                                                    <select class="form-control lokasi" name="lokasi">
                                                                        <?php foreach ($lokasi as $lok) { ?>
                                                                        <option value="<?= $lok->kd_lokasi; ?>"><?= $lok->nm_lokasi; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-5" style="padding-left: 7px;">
                                                                <div class="form-group">
                                                                    <label>Pilih T.A. :</label>
                                                                    <select class="form-control" name="ta">
                                                                        <?php foreach ($TA as $ta) { ?>
                                                                        <option value="<?= $ta->TA; ?>"><?= $ta->TA; ?></option>
                                                                        <?php }?>
                                                                    </select>
                                                                </div>
                                                            </div>
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

                                    <!-- Complete report -->
                                    <h4 class="page-header" style="margin-top: 15px;"> <b>Complete Report</b></h4>
                                    <p>Print semua Laporan Penempatan.</p>
                                    <div class="text-center">
                                        <div class="row">
                                            <div class="col-lg-6 col-lg-offset-3">
                                                <a target="blank" href="<?php echo base_url('c_laporan/penempatanAll');?>" class="btn btn-primary btn-block btn-lg" role="button"><i class="fa fa-print"></i> Print!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-lg-12 -->
                            </div>
                        </div>
                        <div id="mutasi" class="tab-pane fade">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- Custom report -->
                                    <h4 class="page-header" style="margin-top: 15px;"> <b>Laporan Mutasi</b></h4>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5>Hanya satu report <i class="fa fa-file fw"></i></h5>
                                                </div>
                                                <div class="panel-body">
                                                    <form role="form" method="post" target="blank" action="<?= base_url('c_laporan/mutasita')?>">
                                                        <div class="form-group">
                                                            <label>Pilih T.A. :</label>
                                                            <div class="form-group">
                                                                <select class="form-control" name="ta">
                                                                    <?php foreach ($TA as $ta) { ?>
                                                                    <option value="<?= $ta->TA; ?>"><?= $ta->TA; ?></option>
                                                                    <?php }?>
                                                                </select>
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
                                                    <form role="form" method="post" target="blank" action="<?php echo base_url('c_laporan/mutasitatipe');?>" id="formtipe">
                                                        <div class="row">
                                                            <div class="col-lg-7" style="padding-right: 7px;">
                                                                <div class="form-group">
                                                                    <label>Pilih Tipe:</label>
                                                                    <select class="form-control" name="tipe">
                                                                        <?php foreach ($ktg_brg as $ktg) { ?>
                                                                        <option value="<?= $ktg->kd_kategori; ?>"><?= $ktg->nm_kategori; ?></option>
                                                                        <?php }?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-5" style="padding-left: 7px;">
                                                                <div class="form-group">
                                                                    <label>Pilih T.A.:</label>
                                                                    <select class="form-control" name="ta">
                                                                        <?php foreach ($TA as $ta) { ?>
                                                                        <option value="<?= $ta->TA; ?>"><?= $ta->TA; ?></option>
                                                                        <?php }?>
                                                                    </select>
                                                                </div>
                                                            </div>                                                    
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
                                                    <h5>Per Lokasi Asal <i class="fa fa-map-marker-alt fw"></i></h5>
                                                </div>
                                                <div class="panel-body">
                                                    <form role="form" method="post" target="blank" action="<?php echo base_url('c_laporan/mutasitalok');?>" id="form-lokasi">
                                                        <div class="row">
                                                            <div class="col-lg-7" style="padding-right: 7px;">
                                                                <div class="form-group">
                                                                    <label>Pilih Lokasi:</label>
                                                                    <input type="hidden" name="mut">
                                                                    <select class="form-control mutasi" name="lokasi">
                                                                        <?php foreach ($lokasi as $lok) { ?>
                                                                        <option value="<?= $lok->kd_lokasi; ?>"><?= $lok->nm_lokasi; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-5" style="padding-left: 7px;">
                                                                <div class="form-group">
                                                                    <label>Pilih T.A.:</label>
                                                                    <select class="form-control" name="ta">
                                                                        <?php foreach ($TA as $ta) { ?>
                                                                        <option value="<?= $ta->TA; ?>"><?= $ta->TA; ?></option>
                                                                        <?php }?>
                                                                    </select>
                                                                </div>
                                                            </div>
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

                                    <!-- Complete report -->
                                    <h4 class="page-header" style="margin-top: 15px;"> <b>Complete Report</b></h4>
                                    <p>Print semua Laporan Mutasi.</p>
                                    <div class="text-center">
                                        <div class="row">
                                            <div class="col-lg-6 col-lg-offset-3">
                                                <a target="blank" href="<?php echo base_url('c_laporan/mutasiAll');?>" class="btn btn-primary btn-block btn-lg" role="button"><i class="fa fa-print"></i> Print!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-lg-12 -->
                            </div>
                        </div>
                        <div id="inventaris" class="tab-pane fade">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- Custom report -->
                                    <h4 class="page-header" style="margin-top: 15px;"> <b>Laporan Inventaris</b></h4>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5>Hanya satu report <i class="fa fa-file fw"></i></h5>
                                                </div>
                                                <div class="panel-body">
                                                    <form role="form" method="post" target="blank" action="<?= base_url('c_laporan/laporanInv')?>">
                                                        <div class="form-group">
                                                            <label>Pilih Inventaris:</label>
                                                            <div class="input-group">
                                                            <input type="hidden" name="filter" value="kd">
                                                                <input name="val" type="text" onclick="refreshItem()" class="form-control" placeholder="Kode Inventaris" required>
                                                                <span class="input-group-addon" onclick="refreshItem()" id="cari">
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
                                                    <form role="form" method="post" target="blank" action="<?php echo base_url('c_laporan/laporanInv');?>" id="form-tipe">
                                                        <div class="form-group">
                                                            <label>Pilih Tipe:</label>
                                                            <input type="hidden" name="filter" value="tipe">
                                                            <select class="form-control" name="val">
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
                                                    <form role="form" method="post" target="blank" action="<?php echo base_url('c_laporan/laporanInv');?>" id="form-lokasi">
                                                        <div class="form-group">
                                                            <label>Pilih Lokasi:</label>
                                                            <input type="hidden" name="filter" value="lokasi">
                                                            <select class="form-control" name="val">
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

                                    <!-- Complete report -->
                                    <h4 class="page-header" style="margin-top: 15px;"> <b>Complete Report</b></h4>
                                    <p>Print semua Laporan Inventaris.</p>
                                    <div class="text-center">
                                        <div class="row">
                                            <div class="col-lg-6 col-lg-offset-3">
                                                <a  target="blank" href="<?php echo base_url('c_laporan/inventarisAll');?>" class="btn btn-primary btn-block btn-lg" role="button"><i class="fa fa-print"></i> Print!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-lg-12 -->
                            </div>
                        </div>
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
    $('#dataTables-item').DataTable({
        responsive: true
    });
    //Date picker
    $('#datepicker').datepicker({
        format: "dd/mm/yyyy",
        todayBtn: "linked",
        autoclose: true
    })

    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });

    $('input[name="lok"]').val($('.lokasi option:selected').text());

    $('.lokasi').focusout(function (e) { 
        e.preventDefault();
        $('input[name="lok"]').val($('.lokasi option:selected').text());
    });

    $('input[name="mut"]').val($('.mutasi option:selected').text());

    $('.mutasi').focusout(function (e) { 
        e.preventDefault();
        $('input[name="mut"]').val($('.mutasi option:selected').text());
    });

    $('input[name="val"]').val('');

});

function refreshItem() {
    $.ajax({
        url:"<?php echo base_url('c_laporan/getAll');?>",
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
    $('input[name="val"]').val(kd);
    $('#modal-barang').modal('hide');
}
</script>
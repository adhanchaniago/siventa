<div id="page-wrapper">
    
    <!-- ISI KONTEN MULAI DARI BAWAH SINI -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="margin-top:15px">
                <div class="panel-heading">
                    <h4><i class="fa fa-retweet"></i> Mutasi</h4>
                </div>
                <!-- /.panel-heading -->

                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#input">Input <i class="fa fa-pencil-square"></i></a></li>
                        <li><a href="#list" onclick="refreshMutasi()">List <i class="fa fa-list-alt"></i></a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="input" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-lg-12">
                                <h4 class="page-header" style="margin-top: 15px;"> <b>Input Mutasi</b></h4>
                                    <form role="form" method="post" action="#" id="form-mutasi">
                                        <!-- A. DETAIL -->
                                        <!-- detil_mutasi -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">  
                                                    <div class="col-lg-4">
                                                        <!-- Tahun Anggaran -->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                <label>Tahun Anggaran</label>
                                                                    <select class="form-control" name="ta">
                                                                        <option value="<?php echo date("Y").'1'; ?>"><?php echo date("Y").'1'; ?></option>
                                                                        <option value="<?php echo date("Y").'2'; ?>"><?php echo date("Y").'2'; ?></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- KOde Inventaris -->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label>Kode Inventaris</label>
                                                                    <div class="input-group">
                                                                        <input name="kode-inventaris" type="text" onclick="refreshItem()" class="form-control" required>
                                                                        <span class="input-group-addon" id="cari" onclick="refreshItem()">
                                                                            <i class="fa fa-search"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- tanggal_mutasi -->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label>Tanggal Mutasi</label>
                                                                    <div class="input-group">
                                                                        <input name="tgl-mutasi" type="text" class="form-control" id="datepicker" required>
                                                                        <span class="input-group-addon">
                                                                            <i class="fa fa-calendar-alt"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <!-- /.col-lg-4 -->

                                                    <div class="col-lg-4">
                                                        
                                                        <!-- lokasi_asal -->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                <label>Lokasi Asal</label>
                                                                <input type="text" name="lokasi-asal" hidden>
                                                                <select class="form-control" id="asal" data-validation="required" disabled>
                                                                    <option selected>-- Pilih --</option>
                                                                    <?php foreach ($lokasi as $lok) { ?>
                                                                        <option value="<?= $lok->kd_lokasi; ?>"><?= $lok->nm_lokasi; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- lokasi_tujuan -->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                <label>Lokasi tujuan</label>
                                                                    <select class="form-control" name="lokasi-tujuan" data-validation="required">
                                                                    <option selected>-- Pilih --</option>
                                                                    <?php foreach ($lokasi as $lok) { ?>
                                                                        <option value="<?= $lok->kd_lokasi; ?>"><?= $lok->nm_lokasi; ?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.col-lg-4 -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <textarea name="keterangan" class="form-control" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- BUTTON -->
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- /.form -->
                                </div>
                            </div>
                        </div>
                        <div id="list" class="tab-pane fade" style="margin-top: 16px;">
                            <!-- Tabel List -->
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-mutasi">
                                <thead>
                                    <tr>
                                        <th>TA</th>
                                        <th>Tanggal Mutasi</th>
                                        <th>Kode</th>
                                        <th>Jenis Barang</th>
                                        <th>Kondisi</th>
                                        <th>Lokasi Lama</th>
                                        <th>Lokasi Baru</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        </tr>
                                </tbody>
                            </table>
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
                                            <th>Lokasi</th>
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

<!-- Sweet ALert 2 -->
<script src="<?php echo base_url('assets');?>/vendor/sweetalert2/sweetalert2.all.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/sweetalert2/promise.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets');?>/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- bootstrap datepicker -->
<script src="<?php echo base_url('assets');?>/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url('assets');?>/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Form Validator JavaScript -->
<script src="<?php echo base_url('assets');?>/vendor/formvalidator/jquery.form-validator.min.js"></script> 

<!-- DataTables JavaScript -->
<script src="<?php echo base_url('assets');?>/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url('assets');?>/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#datepicker').val(DateNow());

    $('#dataTables-mutasi').DataTable({
        responsive: true
    });

    $('#table-barang').DataTable({
        responsive: true
    });

    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });

    //Date picker
    $('#datepicker').datepicker({
        format: "dd/mm/yyyy",
        todayBtn: "linked",
        autoclose: true
    })

    $('#form-mutasi').submit(function (e) { 
        e.preventDefault();
        swal({
            title: "Simpan Mutasi?",   
            text: "Data akan tersimpan",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#e69a2a",
            confirmButtonText: "Ya, selesai!",   
            cancelButtonText: "Tidak!"  
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type : "POST",
                    url : "<?php echo base_url('c_mutasi/add');?>",
                    cache : false,
                    data : $(this).serialize(),
                    success : function(response){
                        swal({
                            title: "Data tersimpan!",   
                            type: "success",   
                            confirmButtonText: "OK",   
                        }).then((result) => {
                            if (result.value) {
                                location.reload();
                            }
                        });
                    },
                    error : function(){
                        swal({
                            type: 'error',
                            title: 'Oopps!',
                            text: 'Terjadi Kesalahan.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            } else {
                swal("Batalkan", "", "error");   
            }
        });
        
    });
});

//fomr validator
$.validate();

function DateNow() { 
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10) {
        dd = '0'+dd
    } 
    if(mm<10) {
        mm = '0'+mm
    } 
    today = yyyy + '-' + mm + '-' + dd;
    return today;
}

function refreshItem() {
    $.ajax({
        url:"<?php echo base_url('c_mutasi/getItem');?>",
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
    var length = Object.keys(data.mutasi).length;
    for(var i = 0; i < length; i++) {
    var mut = data.mutasi[i];

    // You could also use an ajax property on the data table initialization
    $('#table-barang').dataTable().fnAddData( [
        mut.kd_inventaris,
        mut.nm_kategori,
        mut.merk,
        mut.nm_lokasi,
        "<a class='btn btn-primary' onclick=pilih(\"" + mut.kd_inventaris + "\",\"" + mut.kd_lokasi + "\")><i class='fa fa-check'></i> Pilih</a>"
    ]);
    }
}

function pilih(kd,lok) { 
    $('input[name="kode-inventaris"]').val(kd);
    $('input[name="lokasi-asal"]').val(lok);
    $('#asal').val(lok);
    $('#modal-barang').modal('hide');
}

function refreshMutasi() { 
    $.ajax({
        url:"<?php echo base_url('c_mutasi/getAll');?>",
        success: function(response) {
            myJsonData = response;
            table = $('#dataTables-mutasi').DataTable();
            table.destroy();
            table = $('#dataTables-mutasi').DataTable({
                columnDefs: [
                        { class:"text-center" ,targets: 0 },
                        { class:"text-center" ,targets: 1 },
                        { class:"text-center" ,targets: 2 },
                        { class:"text-center" ,targets: 3 },
                        { class:"text-center" ,targets: 4 },
                        { class:"text-center" ,targets: 5 },
                        { class:"text-center" ,targets: 6 },
                ]
            });
            populateTableList(myJsonData);  
        }, error: function(e) {
            console.log(e);
        }
    });
}

function populateTableList(data) { 
    // clear the table before populating it with more data
    $("#dataTables-mutasi").DataTable().clear();
    var length = Object.keys(data.mutasi).length;
    for(var i = 0; i < length; i++) {
    var aa = data.mutasi[i];

    // You could also use an ajax property on the data table initialization
    $('#dataTables-mutasi').dataTable().fnAddData( [
        aa.TA,
        aa.tanggal,
        aa.kd_inventaris,
        aa.nm_kategori,
        aa.persentase,
        aa.lokasi_asal,
        aa.lokasi_tujuan,
    ]);
    }
}

</script>
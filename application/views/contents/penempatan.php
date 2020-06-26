<div id="page-wrapper">
    
    <!-- ISI KONTEN MULAI DARI BAWAH SINI -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="margin-top:15px">
                <div class="panel-heading">
                    <h4><i class="fa fa-share-square"></i> Penempatan</h4>
                </div>
                <!-- /.panel-heading -->

                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#input">Input <i class="fa fa-pencil-square"></i></a></li>
                        <li><a href="#list" onclick="refreshPenempatan()">List <i class="fa fa-list-alt"></i></a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="input" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-lg-12">
                                <h4 class="page-header" style="margin-top: 15px;"> <b>A. Detil Penempatan</b></h4>
                                    <form role="form" method="post" action="#" id="form-penempatan">
                                        <!-- detil_penempatan -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">  
                                                    <div class="col-lg-4">
                                                        <!-- tanggal_penempatan -->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <input name="kd_penempatan" type="hidden" class="form-control" value="<?= $last=$last+1; ?>">
                                                            
                                                                <div class="form-group">
                                                                    <label>Tanggal Penempatan</label>
                                                                    <div class="input-group">
                                                                        <input name="tgl-penempatan" type="text" class="form-control" id="datepicker" data-date-format="yyyy-mm-dd" required>
                                                                        <span class="input-group-addon">
                                                                            <i class="fa fa-calendar-alt"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- lokasi_penempatan -->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                <label>Lokasi Penempatan</label>
                                                                    <select class="form-control" name="lokasi">
                                                                    <?php foreach ($lokasi as $lok) { ?>
                                                                        <option value="<?= $lok->kd_lokasi; ?>"><?= $lok->nm_lokasi; ?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.col-lg-4 -->

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
                                                        <!-- Keterangan -->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label>Keterangan</label>
                                                                    <textarea name="keterangan" class="form-control" rows="3" style="resize:none;"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.col-lg-4 -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- input_item -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h4 class="page-header" style="margin-top: 15px;"> <b>B. Input Item</b></h4>
                                                <div class="row">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label>Kode Inventaris</label>
                                                            <div class="input-group">
                                                                <input name="kode-inventaris" type="text" class="form-control kd-inv" onclick="refreshItem()" required>
                                                                <span class="input-group-addon" id="cari" onclick="refreshItem()">
                                                                    <i class="fa fa-search"></i>
                                                                </span>
                                                                <input type="hidden" type="text" name="jenis">
                                                                <input type="hidden" type="text" name="merk">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.row (nested) -->
                                            </div>
                                        </div>
                                        <!-- BUTTON -->
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <!-- <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-plus-square"></i> Tambahkan</button> -->
                                                        <button type="button" class="btn btn-primary btn-block" onclick="array()"><i class="fa fa-plus-square"></i> Tambah</button>
                                                        <button type="button" class="btn btn-success btn-block" onclick="simpan_array()"><i class="fa fa-save"></i> Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- /.form -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <hr style="border:0; height:0; border-top:1px solid #083972">
                                            <h3>Daftar Item</h3>
                                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-penempatanitem">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>Kode Inventaris</th>
                                                        <th>Jenis Inventaris</th>
                                                        <th>Merk</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Isi Table -->
                                                </tbody>
                                            </table>
                                            <!-- /.table-responsive -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="list" class="tab-pane fade" style="margin-top: 16px;">
                            <!-- Tabel List -->
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-penempatan">
                                <thead>
                                    <tr>
                                        <th>TA</th>
                                        <th>Kode</th>
                                        <th>Jenis Barang</th>
                                        <th>Kondisi</th>
                                        <th>Lokasi</th>
                                        <th>Tanggal Penempatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($penempatan as $pen) { ?>
                                        <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        
                        <!-- /.row (nested) -->
                    </div>
                    
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
    //Display date now
    $('#datepicker').val(DateNow());

    $('#dataTables-penempatan').DataTable({
        responsive: true
    });
    $('#dataTables-penempatanitem').DataTable({
        responsive: true
    });
    $('#table-barang').DataTable({
        responsive: true,
        // Sets the row-num-selection "Show %n entries" for the user
        "lengthMenu": [ 5 ], 
        // Set the default no. of rows to display
        "pageLength": 5 
    });
    //Date picker
    $('#datepicker').datepicker({
        todayBtn: "linked",
        autoclose: true
    })
        
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });

    $('#cari').click(function (e) { 
        e.preventDefault();
        $('#modal-barang').modal('show');
    });

});

//form validator
$.validate();

var jsonObj = {};
var addressArray = [];
//array sementara untuk menampung list item 
function array() { 
    
    var kd = $('input[name="kode-inventaris"]').val();
    var jns = $('input[name="jenis"]').val();
    var mrk = $('input[name="merk"]').val();


    if (kd.length > 0) {
        var address = {};
        address.kode = kd; 
        address.jenis = jns; 
        address.merk = mrk;
        addressArray.push(address);

        jsonObj.Address = addressArray;

        console.log(jsonObj);
        populateTablePenempatan(jsonObj);
    }

    $('input[name="kode-inventaris"]').val('');
    $('input[name="jenis"]').val('');
    $('input[name="merk"]').val('');
}

//fungsi menghapus list item yang sudah dimasukkan ke aray dan dataTables
function hapusItem(pos) {
    var length = Object.keys(jsonObj.Address).length;   
    if (length == 1 && pos == 0) {
        console.log(length); 
        console.log(true);
        // $('#dataTables-penempatanitem').DataTable().destroy();
        $("#dataTables-penempatanitem").DataTable().clear().draw();
        var deletedItem = jsonObj.Address.splice(pos,1);
        console.log(jsonObj);
    } else {
        console.log(length); 
        var deletedItem = jsonObj.Address.splice(pos,1);
        console.log(jsonObj);
        populateTablePenempatan(jsonObj);
    } 
}

//fungsi untuk memanggil ajax penempatan
function simpan_array() { 
    swal({
        title: "Selesai Input?",   
        text: "Data akan tersimpan",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#e69a2a",
        confirmButtonText: "Ya, selesai!",   
        cancelButtonText: "Tidak!"  
    }).then((result) => {
        if (result.value) {
            var length = Object.keys(jsonObj.Address).length;
            
            var penempatan = $('input[name="kd_penempatan"]').val();
            var tgl = $('input[name="tgl-penempatan"]').val();
            var lokasi = $('select[name="lokasi"]').val();
            var ta = $('select[name="ta"]').val();
            var keterangan = $('textarea[name="keterangan"]').val();

            var kode = penempatan;
            var tanggal = tgl;
            var lokasi = lokasi;
            var TA = ta;
            var ket = keterangan;
            
            for(var i = 0; i < length; i++) {
                var aa = jsonObj.Address[i];
            
                var inventaris = aa.kode
                var data = { kd_penempatan : kode, tgl_penempatan : tanggal, 
                                    lokasi : lokasi, ta : TA, keterangan : ket, kode_inventaris : inventaris}

                ajax_penempatan(data);
            }

            swal({
                title: "Data tersimpan!",   
                type: "success",   
                confirmButtonText: "OK",   
            }).then((result) => {
                if (result.value) {
                    location.reload();
                }
            });
        } else {
            swal("Dibatalkan", "", "error");   
        }
    });
}

//ajax untuk menyimpan array list item
function ajax_penempatan(data) { 
    $.ajax({
        type : "POST",
        url : "<?php echo base_url('c_penempatan/add');?>",
        cache : false,
        data : data,
        success : function(response){
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
}

function refreshItem() {
    $.ajax({
        url:"<?php echo base_url('c_penempatan/getItem');?>",
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

function refreshPenempatan() { 
    $.ajax({
        url:"<?php echo base_url('c_penempatan/getAll');?>",
        success: function(response) {
            myJsonData = response;
            table = $('#dataTables-penempatan').DataTable();
            table.destroy();
            table = $('#dataTables-penempatan').DataTable({
                columnDefs: [
                        { class:"text-center" ,targets: 3 },
                        { class:"text-center" ,targets: 0 },
                        { class: "text-center", targets: 4 },
                        { class: "text-center", targets: 5 },
                        { class: "text-center", targets: 2 },
                        { class: "text-center", targets: 2 },
                        { width: "10%", class: "text-center", targets: 1 },
                ]
            });
            populateTableList(myJsonData);  
        }, error: function(e) {
            console.log(e);
        }
    });
}

function pilih(kd,jns,mrk) { 
    $('input[name="kode-inventaris"]').val(kd);
    $('input[name="jenis"]').val(jns);
    $('input[name="merk"]').val(mrk);
    $('#modal-barang').modal('hide');
}

function populateTableItem(data) {
    // clear the table before populating it with more data
    $("#table-barang").DataTable().clear();
    var length = Object.keys(data.penempatan).length;
    for(var i = 0; i < length; i++) {
    var pen = data.penempatan[i];

    // You could also use an ajax property on the data table initialization
    $('#table-barang').dataTable().fnAddData( [
        pen.kd_inventaris,
        pen.nm_kategori,
        pen.merk,
        pen.model,
        "<a class='btn btn-primary' onclick=pilih(\"" + pen.kd_inventaris + "\",\"" + pen.nm_kategori + "\",\"" + pen.merk + "\")><i class='fa fa-check'></i> Pilih</a>"
    ]);
    }
}

function populateTablePenempatan(data) {
    // clear the table before populating it with more data
    var length = Object.keys(data.Address).length;
    // alert(length);
    $("#dataTables-penempatanitem").DataTable().clear();
    var length = Object.keys(data.Address).length;
    for(var i = 0; i < length; i++) {
        var aa = data.Address[i];

        // You could also use an ajax property on the data table initialization
        $('#dataTables-penempatanitem').dataTable().fnAddData( [
            aa.kode,
            aa.jenis,
            aa.merk,
            "<a class='btn btn-danger btnhapus' onclick=hapusItem(\""+ i +"\")><i class='fa fa-trash'></i> Hapus</a>"
        ]);
    }
}

function populateTableList(data) { 
    // clear the table before populating it with more data
    $("#dataTables-penempatan").DataTable().clear();
    var length = Object.keys(data.penempatan).length;
    for(var i = 0; i < length; i++) {
    var aa = data.penempatan[i];

    // You could also use an ajax property on the data table initialization
    $('#dataTables-penempatan').dataTable().fnAddData( [
        aa.TA,
        aa.kd_inventaris,
        aa.nm_kategori,
        aa.persentase,
        aa.nm_lokasi,
        aa.tanggal
    ]);
    }
}

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

</script>
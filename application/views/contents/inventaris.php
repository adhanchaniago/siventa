<div id="page-wrapper">

    <!-- ISI KONTEN MULAI DARI BAWAH SINI -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="margin-top:15px">
                <div class="panel-heading">
                    <h4><i class="fa fa-cubes"></i> 
                    Manajemen Inventaris</h4>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#items">Items <i class="fa fa-cubes"></i></a></li>
                        <li><a href="#item-type">Item Type <i class="fa fa-cube"></i></a></li>
                    </ul>
                    <!-- /.nav-tabs -->
                    <div class="tab-content">
                        <div id="items" class="tab-pane fade in active">
                            <!-- button tambah -->
                            <div class"row">
                                <p>
                                    <button id="btn-inventaris" type="button" class="btn btn-primary" style="margin-top:15px"><i class="fa fa-plus"></i> Tambah</button>
                                </p>
                            </div>
                            <!-- Tabel Inventaris -->
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-inventaris">
                                <thead>
                                    <tr>
                                        <th>Kode Inventaris</th>
                                        <th>Type</th>
                                        <th>Merk</th>
                                        <th>Model</th>
                                        <th>Warna</th>
                                        <th>Kondisi</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($barang as $brg) { ?>
                                        <tr>
                                        <td><?= $brg->kd_inventaris; ?></td>
                                        <td><?= $brg->nm_kategori; ?></td>
                                        <td><?= $brg->merk; ?></td>
                                        <td><?= $brg->model; ?></td>
                                        <td><?= $brg->warna; ?></td>
                                        <td class="text-center"><?= $brg->persentase; ?></td>
                                        <td style="text-align:center">
                                            <button type="button" class="btn btn-primary" onclick="editInventaris('<?= $brg->kd_inventaris; ?>')"><i class="fa fa-pencil-square"></i> Edit</button>
                                            <button type="button" class="btn btn-danger" onclick="hapusInventaris('<?= $brg->kd_inventaris; ?>')"><i class="fa fa-trash"></i> Hapus</button>
                                        </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.items -->

                        <div id="item-type" class="tab-pane fade">
                            <!-- button tambah -->
                            <div class"row">
                                <p>
                                    <button id="btn-kategori" type="button" class="btn btn-primary" style="margin-top:15px"><i class="fa fa-plus"></i> Tambah</button>
                                </p>
                            </div>
                            
                            <!-- /.button tambah -->
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-kategori">
                                <thead>
                                    <tr>
                                        <th>Kode Type</th>
                                        <th>Nama Type Barang</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ktg_brg as $ktg) { ?>
                                        <tr>
                                        <td><?= $ktg->kd_kategori; ?></td>
                                        <td><?= $ktg->nm_kategori; ?></td>
                                        <td style="text-align:center">
                                            <button type="button" class="btn btn-primary" onclick="editKategori('<?= $ktg->kd_kategori; ?>')"><i class="fa fa-pencil-square"></i> Edit</button>
                                            <button type="button" class="btn btn-danger" onclick="hapusKategori('<?= $ktg->kd_kategori; ?>')"><i class="fa fa-trash"></i> Hapus</button>
                                        </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.item-type -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <!-- MODAL Start -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Title</h3>
                </div>
                <!-- Modal body -->
                
                <!-- Form tambah Inventaris -->
                <form role="form" action="#" method="post" id="tambah-inventaris">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" name="kd_inventaris" class="form-control kd-baru" disable>
                                <input type="hidden" name="table" class="form-control">
                                <div class="form-group">
                                    <label>Type Item</label>
                                    <select name="kd_kategori" class="form-control tipe-edit" data-validation="required">
                                        <?php foreach ($ktg_brg as $ktg) { ?>
                                        <option value="<?= $ktg->kd_kategori; ?>" class="tipe"><?= $ktg->nm_kategori; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                
                                <div class="form-group">
                                    <label>Merk</label>
                                    <input type="text" name="merk" class="form-control merk-edit" data-validation="required">
                                </div>
                                <div class="form-group">
                                    <label>Model</label>
                                    <input type="text" name="model" class="form-control model-edit">
                                </div>
                                
                                <div class="form-group">
                                    <label>Persentase Kondisi</label>
                                    <input type="text" name="persentase" style="margin-bottom: 8px; width: 60px;padding-right: 10px;padding-left: 10px;" class="form-control" readonly></input>
                                    <div id="slider1"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Warna</label>
                                    <input type="text" name="warna" class="form-control warna-edit">
                                </div>
                                <div class="form-group">
                                    <label>Serial</label>
                                    <input type="text" name="serial" class="form-control serial-edit">
                                </div>
                                <div class="form-group">
                                    <label>Thn Pengadaan</label>
                                    <Select class="form-control" name="thn">
                                    <?php   for ($i=0; $i < 15; $i++) { ?>
                                        <option value="<?php echo intval(date("Y")) + $i; ?>"><?php echo intval(date("Y")) + $i; ?></option>
                                    <?php } ?>
                                    </Select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control vresize deskripsi-edit" row="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
                </form>

                <!-- Form Edit Inventaris -->
                <form role="form" action="#" method="post" id="edit-inventaris">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" name="kd_inventaris" class="form-control kd-baru">
                                <input type="hidden" name="table" class="form-control">
                                <div class="form-group">
                                    <label>Kode Inventaris</label>
                                    <input type="text" name="kd_inventaris" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Merk</label>
                                    <input type="text" name="merk" class="form-control merk-edit" data-validation="required">
                                </div>
                                <div class="form-group">
                                    <label>Model</label>
                                    <input type="text" name="model" class="form-control model-edit">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Warna</label>
                                    <input type="text" name="warna" class="form-control warna-edit">
                                </div>
                                <div class="form-group">
                                    <label>Serial</label>
                                    <input type="text" name="serial" class="form-control serial-edit">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Persentase Kondisi</label>
                                    <input type="text" name="persentase" style="margin-bottom: 8px; width: 60px;padding-right: 10px;padding-left: 10px;" class="form-control" readonly></input>
                                    <div id="slider"></div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control vresize deskripsi-edit" row="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
                </form>

                <!-- Form Tambah Kategori -->
                <form role="form" action="#" method="post" id="tambah-kategori">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <input type="hidden" name="table" class="form-control">
                                <div class="form-group">
                                    <label>Kode Type</label>
                                    <input type="text" name="kd_kategori" class="form-control kd-edit kapital" data-validation="length required" data-validation-length="3-3">
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label>Nama Type</label>
                                    <input type="text" name="nm_kategori" class="form-control nm-edit kapital" data-validation="length required" data-validation-length="min2">
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
                </form>

                <!-- Form Edit Kategori -->
                <form role="form" action="#" method="post" id="edit-kategori">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <input type="hidden" name="table" class="form-control">
                                    <input type="hidden" name="kd_kategori" class="form-control kd-edit kapital">
                                <div class="form-group">
                                    <label>Kode Kategori</label>
                                    <input type="text" class="form-control kd-edit" disabled>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label>Nama Kategori</label>
                                    <input type="text" name="nm_kategori" class="form-control nm-edit kapital" data-validation="length required" data-validation-length="min2">
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
                </form>

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

<!-- jQuery UI -->
<script src="<?php echo base_url('assets');?>/vendor/jqueryui/jquery-ui.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets');?>/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url('assets');?>/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url('assets');?>/vendor/bestupper/jquery.bestupper.min.js"></script>

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
        //kapital input
        $('.kapital').bestupper(); 

        $( "#slider" ).slider();

        $("#slider1").slider({
            min: 0,
            max: 100,
            step: 1,
            value: 100,
            slide: function( event, ui ) {
                $('input[name="persentase"]').val(ui.value + "%");
            }
        });
        $('input[name="persentase"]').val($("#slider1").slider("value") + "%");

        $('#dataTables-inventaris').DataTable({
            responsive: true
        });
        $('#dataTables-kategori').DataTable({
            responsive: true
        });
        $(".nav-tabs a").click(function(){
            $(this).tab('show');
        });
        //fungsi kd_inventaris otomatis
        $('.tipe-edit').focusout(function (e) { 
            e.preventDefault();
            var tp = $(this).find(':selected').val();
            $.ajax({
                type:"POST", //method Submit
                url:"<?php echo base_url('c_item/lastkey');?>",
                data: {tipe:tp}, 
                success: function(response){
                    var lama = response.key;
                    var slice = lama.slice(3);
                    var id = parseInt(slice) + 1;
                    var baru = tp + id;
                    $('.kd-baru').val(baru);
                },
                error: function(){
                    alert("kode baru gagal");
                }
            });
        });
        
        $('#myModal').on('hidden.bs.modal', function () {
            $('input[name="table"]').val('');
            $('input[name="kd_inventaris"]').val('');
            $('input[name="kd_kategori"]').val('');
            $('input[name="merk"]').val('');
            $('input[name="model"]').val('');
            $('input[name="warna"]').val('');
            $('input[name="serial"]').val('');
            $('input[name="deskripsi"]').val('');
            $('input[name="nm_kategori"]').val('');
            $('input[name="persentase"]').val($("#slider1").slider("value") + "%");
        });

        $('#btn-inventaris').click(function (e) { 
            e.preventDefault();
            $('input[name="table"]').val('inventaris');
            $('select[name="kd_kategori"]').val('');
            $('.modal-title').text('Tambah Inventaris');
            $('#tambah-inventaris').show();
            $('#edit-inventaris').hide();
            $('#tambah-kategori').hide();
            $('#edit-kategori').hide();
            $('#myModal').modal('show');
        });

        $('#btn-kategori').click(function (e) { 
            e.preventDefault();
            $('input[name="table"]').val('kategori');
            $('.modal-title').text('Tambah Kategori');
            $('#tambah-inventaris').hide();
            $('#edit-inventaris').hide();
            $('#tambah-kategori').show();
            $('#edit-kategori').hide();
            $('#myModal').modal('show');
        });
        
        //SUBMIT FORM
        $('#tambah-inventaris').submit(function (e) { 
            e.preventDefault();
            $.ajax({
                type : "POST",
                url : "<?php echo base_url('c_item/add');?>",
                cache : false,
                data : $(this).serialize(),
                success : function(response){
                    myJsonData = response;
                    table = $('#dataTables-inventaris').DataTable();
                    table.destroy();
                    table = $('#dataTables-inventaris').DataTable({
                        columnDefs: [
                            { class: "text-center", targets: 5 },
                        ]
                    });
                    populateTableInventaris(myJsonData);  
                    $('#myModal').modal('hide');
                    swal({
                        position: 'center',
                        type: 'success',
                        title: 'Berhasil disimpan!',
                        showConfirmButton: false,
                        timer: 1500
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
            
        });

        $('#tambah-kategori').submit(function (e) { 
            e.preventDefault();
            $.ajax({
                type : "POST",
                url : "<?php echo base_url('c_item/add');?>",
                cache : false,
                data : $(this).serialize(),
                success : function(response){
                    myJsonData = response;
                    table = $('#dataTables-kategori').DataTable();
                    table.destroy();
                    table = $('#dataTables-kategori').DataTable({
                        columnDefs: [
                            { class: "text-center", targets: 2 },
                        ]
                    });
                    populateTableKategori(myJsonData);  
                    $('#myModal').modal('hide');
                    swal({
                        position: 'center',
                        type: 'success',
                        title: 'Berhasil disimpan!',
                        showConfirmButton: false,
                        timer: 1500
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
        });

        $('#edit-inventaris').submit(function (e) { 
            e.preventDefault();
            $.ajax({
                type : "POST",
                url : "<?php echo base_url('c_item/edit');?>",
                cache : false,
                data : $(this).serialize(),
                success : function(response){
                    myJsonData = response;
                    table = $('#dataTables-inventaris').DataTable();
                    table.destroy();
                    table = $('#dataTables-inventaris').DataTable({
                        columnDefs: [
                            { class: "text-center", targets: 5 },
                            { class: "text-center", targets: 6 },
                            { width: "20%", targets: 0 },
                        ]
                    });
                    populateTableInventaris(myJsonData);  
                    $('#myModal').modal('hide');
                    swal({
                        position: 'center',
                        type: 'success',
                        title: 'Berhasil disimpan!',
                        showConfirmButton: false,
                        timer: 1500
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
            
        });

        $('#edit-kategori').submit(function (e) { 
            e.preventDefault();
            $.ajax({
                type : "POST",
                url : "<?php echo base_url('c_item/edit');?>",
                cache : false,
                data : $(this).serialize(),
                success : function(response){
                    myJsonData = response;
                    table = $('#dataTables-kategori').DataTable();
                    table.destroy();
                    table = $('#dataTables-kategori').DataTable({
                        columnDefs: [
                            { class: "text-center", targets: 2 },
                        ]
                    });
                    populateTableKategori(myJsonData);  
                    $('#myModal').modal('hide');
                    swal({
                        position: 'center',
                        type: 'success',
                        title: 'Berhasil disimpan!',
                        showConfirmButton: false,
                        timer: 1500
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
        });
    });

//fomr validator
$.validate();

function editInventaris(kd) { 
    var table = "inventaris";
    $.ajax({
        type : "POST",
        url : "<?php echo base_url('c_item/getby');?>",
        cache : false,
        data : "kode=" + kd + "&table=" + table,
        success : function(response){
            var item = response.items[0];
            $('input[name="kd_inventaris"]').val(item.kd_inventaris);
            $('input[name="model"]').val(item.model);
            $('input[name="merk"]').val(item.merk);
            $('input[name="warna"]').val(item.warna);
            $('input[name="serial"]').val(item.serial);
            $('input[name="persentase"]').val(item.persentase);
            $('input[name="deskripsi"]').val(item.deskripsi);
            slider(item.persentase);
        },
        error : function(){
            swal("Terjadi kesalahan!", "Ngga tau kenapa :(", "danger");
        }
    });
        
    $('input[name="table"]').val('inventaris');
    $('.modal-title').text('Edit Inventaris');
    $('#tambah-inventaris').hide();
    $('#edit-inventaris').show();
    $('#tambah-kategori').hide();
    $('#edit-kategori').hide();
    $('#myModal').modal('show');
}
function hapusInventaris(kd) { 
    var table = "inventaris"; 
    swal({
        title: "Apakah anda yakin?",   
        text: "Inventaris ini akan terhapus.",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#e69a2a",
        confirmButtonText: "Ya, hapus data!",   
        cancelButtonText: "Tidak, batalkan!"  
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type : "POST",
                url : "<?php echo base_url('c_item/del');?>",
                cache : false,
                data : "table="+table+"&kd="+kd,
                success : function(response){
                    
                    table = $('#dataTables-inventaris').DataTable();
                    table.destroy();
                    table = $('#dataTables-inventaris').DataTable({
                        columnDefs: [
                            { class: "text-center", targets: 5 }
                        ]
                    });
                    populateTableInventaris(response);
                    swal({
                        position: 'center',
                        type: 'success',
                        title: 'Berhasil dihapus!',
                        showConfirmButton: false,
                        timer: 1500
                    });  
                },
                error : function(){
                    swal("Terjadi kesalahan!", "Nggak tau", "danger");
                }
            });
        } else {
            swal("Batalkan", "", "error");   
        }
    });
}
function editKategori(kd) { 
    var table = "kategori";
    $.ajax({
        type : "POST",
        url : "<?php echo base_url('c_item/getby');?>",
        cache : false,
        data : "kode=" + kd + "&table=" + table,
        success : function(response){
            var item = response.items[0];
            $('input.kd-edit').val(item.kd_kategori);
            $('input[name="nm_kategori"]').val(item.nm_kategori);
        },
        error : function(){
            swal("Terjadi kesalahan!", "Ngga tau kenapa :(", "danger");
        }
    });
        
    $('input[name="table"]').val('kategori');
    $('.modal-title').text('Edit Kategori');
    $('#tambah-inventaris').hide();
    $('#edit-inventaris').hide();
    $('#tambah-kategori').hide();
    $('#edit-kategori').show();
    $('#myModal').modal('show');
}
function hapusKategori(kd) { 
    var table = "kategori"; 
    swal({
        title: "Apakah anda yakin?",   
        text: "Kategori ini akan terhapus.",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#e69a2a",
        confirmButtonText: "Ya, hapus data!",   
        cancelButtonText: "Tidak, batalkan!"  
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type : "POST",
                url : "<?php echo base_url('c_item/del');?>",
                cache : false,
                data : "table="+table+"&kd="+kd,
                success : function(response){
                    
                    table = $('#dataTables-kategori').DataTable();
                    table.destroy();
                    table = $('#dataTables-kategori').DataTable({
                        columnDefs: [
                            { class: "text-center", targets: 2 }
                        ]
                    });
                    populateTableKategori(response);
                    swal({
                        position: 'center',
                        type: 'success',
                        title: 'Berhasil dihapus!',
                        showConfirmButton: false,
                        timer: 1500
                    });  
                },
                error : function(){
                    swal("Terjadi kesalahan!", "Nggak tau", "danger");
                }
            });
        } else {
            swal("Batalkan", "", "error");   
        }
    });
}
function populateTableInventaris(data) {
    // clear the table before populating it with more data
    $("#dataTables-inventaris").DataTable().clear();
    var length = Object.keys(data.items).length;
    for(var i = 0; i < length; i++) {
    var inv = data.items[i];

    // You could also use an ajax property on the data table initialization
    $('#dataTables-inventaris').dataTable().fnAddData( [
        inv.kd_inventaris,
        inv.nm_kategori,
        inv.merk,
        inv.model,
        inv.warna,
        inv.persentase,
        "<a class='btn btn-primary btnedit' onclick=editInventaris(\"" + inv.kd_inventaris + "\")><i class='fa fa-pencil-square'></i> Edit</a> <a class='btn btn-danger btnhapus' onclick=hapusInventaris(\"" + inv.kd_inventaris + "\")><i class='fa fa-trash'></i> Hapus</a>"
    ]);
    }
} 

function populateTableKategori(data) {
    // clear the table before populating it with more data
    $("#dataTables-kategori").DataTable().clear();
    var length = Object.keys(data.items).length;
    for(var i = 0; i < length; i++) {
    var ktg = data.items[i];

    // You could also use an ajax property on the data table initialization
    $('#dataTables-kategori').dataTable().fnAddData( [
        ktg.kd_kategori,
        ktg.nm_kategori,
        "<a class='btn btn-primary btnedit' onclick=editKategori(\"" + ktg.kd_kategori + "\")><i class='fa fa-pencil-square'></i> Edit</a> <a class='btn btn-danger btnhapus' onclick=hapusKategori(\"" + ktg.kd_kategori + "\")><i class='fa fa-trash'></i> Hapus</a>"
    ]);
    }
}

function slider(value) { 
    var val = value.slice(0,2);
    // alert(val);
    $( "#slider" ).slider({
        min: 0,
        max: 100,
        step: 1,
        value: val,
        slide: function( event, ui ) {
            $('input[name="persentase"]').val(ui.value + "%");
        }
    });
    $('input[name="persentase"]').val($("#slider").slider("value") + "%");
}


</script>
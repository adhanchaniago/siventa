<div id="page-wrapper">

    <!-- ISI KONTEN MULAI DARI BAWAH SINI -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="margin-top:15px">
                <div class="panel-heading">
                    <h4><i class="fa fa-map-marker-alt"></i> 
                    Manajemen Lokasi </h4>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#lokasi">Lokasi <i class="fa fa-flag"></i></a></li>
                        <li><a href="#lantai">Lantai <i class="fa fa-list-alt"></i></a></li>
                        <li><a href="#gedung">Gedung <i class="fa fa-building"></i></a></li>
                    </ul>
                    <!-- /.nav-tabs -->
                    <div class="tab-content">
                        <!-- lokasi -->
                        <div id="lokasi" class="tab-pane fade in active">
                            <!-- button tambah -->
                            <div class"row">
                                <p>
                                    <button type="button" class="btn btn-primary" style="margin-top:15px" id="btntambahlokasi"><i class="fa fa-plus"></i> Tambah</button>
                                </p>
                            </div>
                            <!-- Tabel Lokasi -->
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-lokasi">
                                <thead>
                                    <tr>
                                        <th>Ruangan</th>
                                        <th>Lantai</th>
                                        <th>Gedung</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lokasi as $lok) { ?>
                                        <tr>
                                        <td><?= $lok->nm_lokasi; ?></td>
                                        <td><?= $lok->nm_lantai; ?></td>
                                        <td><?= $lok->nm_gedung; ?></td>
                                        <td><?= $lok->status_aktif; ?></td>
                                        <td style="text-align:center">
                                            <button type="button" class="btn btn-primary" onclick="editLokasi('<?= $lok->kd_lokasi; ?>')"><i class="fa fa-pencil-square"></i> Edit</button>
                                            <button type="button" class="btn btn-danger" onclick="hapusLokasi('<?= $lok->kd_lokasi; ?>')"><i class="fa fa-trash"></i> Hapus</button>
                                        </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- lantai -->
                        <div id="lantai" class="tab-pane fade">
                            <!-- button tambah -->
                            <div class"row">
                                <p>
                                    <button type="button" class="btn btn-primary tambah-lan" style="margin-top:15px" id="btntambahlantai"><i class="fa fa-plus"></i> Tambah</button>
                                </p>
                            </div>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-lantai">
                                <thead>
                                    <tr>
                                        <th>Nama Lantai</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lantai as $lan) { ?>
                                        <tr>
                                        <td><?= $lan->nm_lantai; ?></td>
                                        <td><?= $lan->status_aktif; ?></td>
                                        <td style="text-align:center">
                                            <button type="button" class="btn btn-primary" onclick="editLantai('<?= $lan->kd_lantai; ?>')"><i class="fa fa-pencil-square"></i> Edit</button>
                                            <button type="button" class="btn btn-danger" onclick="hapusLantai('<?= $lan->kd_lantai; ?>')"><i class="fa fa-trash"></i> Hapus</button>
                                        </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- gedung -->
                        <div id="gedung" class="tab-pane fade">
                            <!-- button tambah -->
                            <div class"row">
                                <p>
                                    <button type="button" class="btn btn-primary tambah-ged" style="margin-top:15px" id="btntambahgedung"><i class="fa fa-plus"></i> Tambah</button>
                                </p>
                            </div>
                            <!-- /.button tambah -->
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-gedung">
                                <thead>
                                    <tr>
                                        <th>Nama Gedung</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($gedung as $ged) { ?>
                                        <tr>
                                        <td><?= $ged->nm_gedung; ?></td>
                                        <td><?= $ged->status_aktif; ?></td>
                                        <td style="text-align:center">
                                            <button type="button" class="btn btn-primary" onclick="editGedung('<?= $ged->kd_gedung; ?>')"><i class="fa fa-pencil-square"></i> Edit</button>
                                            <button type="button" class="btn btn-danger" onclick="hapusGedung('<?= $ged->kd_gedung; ?>')"><i class="fa fa-trash"></i> Hapus</button>
                                        </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->

            <!-- MODAL -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title nm-title">Tambah</h3>
                        </div>
                        <!-- Modal body -->

                        <!-- Form Tambah Lokasi -->
                        <form role="form" action="#" method="post" class="" id="tambah-lokasi" >
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="table" class="form-control table">
                                        <input type="hidden" name="kd" class="form-control kd-edit">
                                        <div class="form-group">
                                            <label>Nama Lokasi</label>
                                            <input type="text" name="nm" class="form-control" data-validation="length required alphanumeric" data-validation-length="min3">
                                        </div>
                                        <div class="form-group">
                                            <label>Lantai</label>
                                            <select name="lantai" class="form-control">
                                                <?php foreach ($lan_aktif as $lan) { ?>
                                                <option value="<?= $lan->kd_lantai; ?>"><?= $lan->nm_lantai; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Gedung</label>
                                            <select name="gedung" class="form-control">
                                                <?php foreach ($ged_aktif as $ged) { ?>
                                                <option value="<?= $ged->kd_gedung; ?>"><?= $ged->nm_gedung; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="aktif">Aktif</option>
                                                <option value="tidak aktif">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        </form>

                        <!-- Form Edit Lokasi -->
                        <form role="form" action="#" method="post" class="" id="edit-lokasi" >
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="table" class="form-control table">
                                        <input type="hidden" name="kd" class="form-control kd-edit">
                                        <div class="form-group">
                                            <label>Nama Lokasi</label>
                                            <input type="text" name="nm" class="form-control" data-validation="length required alphanumeric" data-validation-length="min3">
                                        </div>
                                        <div class="form-group">
                                            <label>Lantai</label>
                                            <select name="lantai" class="form-control">
                                                <?php foreach ($lan_aktif as $lan) { ?>
                                                <option value="<?= $lan->kd_lantai; ?>"><?= $lan->nm_lantai; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Gedung</label>
                                            <select name="gedung" class="form-control">
                                                <?php foreach ($ged_aktif as $ged) { ?>
                                                <option value="<?= $ged->kd_gedung; ?>"><?= $ged->nm_gedung; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="aktif">Aktif</option>
                                                <option value="tidak aktif">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        </form>
        
                        <!-- Form Tambah Lantai -->
                        <form role="form" action="#" method="post" class="" id="tambah-lantai">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="table" class="form-control">
                                        <input type="hidden" name="kd" class="form-control kd-edit">
                                        <div class="form-group">
                                            <label class="nm-lbl">Nama</label>
                                            <input type="text" name="nm" class="form-control" data-validation="length required alphanumeric" data-validation-length="min3">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="aktif">Aktif</option>
                                                <option value="tidak aktif">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        </form>

                        <!-- Form Edit Lantai -->
                        <form role="form" action="#" method="post" class="" id="edit-lantai">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="table" class="form-control">
                                        <input type="hidden" name="kd" class="form-control kd-edit">
                                        <div class="form-group">
                                            <label class="nm-lbl">Nama</label>
                                            <input type="text" name="nm" class="form-control" data-validation="length required alphanumeric" data-validation-length="min3">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="aktif">Aktif</option>
                                                <option value="tidak aktif">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        </form>

                        <!-- Form Tambah Gedung -->
                        <form role="form" action="#" method="post" class="" id="tambah-gedung">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="table" class="form-control">
                                        <input type="hidden" name="kd" class="form-control kd-edit">
                                        <div class="form-group">
                                            <label class="nm-lbl">Nama</label>
                                            <input type="text" name="nm" class="form-control" data-validation="length required alphanumeric" data-validation-length="min3">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="aktif">Aktif</option>
                                                <option value="tidak aktif">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        </form>

                        <!-- Form Edit Gedung -->
                        <form role="form" action="#" method="post" class="" id="edit-gedung">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="table" class="form-control">
                                        <input type="hidden" name="kd" class="form-control kd-edit">
                                        <div class="form-group">
                                            <label class="nm-lbl">Nama</label>
                                            <input type="text" name="nm" class="form-control" data-validation="length required alphanumeric" data-validation-length="min3">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="aktif">Aktif</option>
                                                <option value="tidak aktif">Tidak Aktif</option>
                                            </select>
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

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
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

        $('#dataTables-lokasi').DataTable({
            responsive: true
        });

        $('#dataTables-lantai').DataTable({
            responsive: true
        });

        $('#dataTables-gedung').DataTable({
            responsive: true
        });

        $(".nav-tabs a").click(function(){
            $(this).tab('show');
        });

        $('#myModal').on('hidden.bs.modal', function () {
            $('input[name="table"]').val('');
            $('input[name="nm"]').val('');
            $('input[name="kd"]').val('');
            $('select[name="lantai"]').val('');
            $('select[name="gedung"]').val('');
            $('input[name="status"]').val('');
        });

        $('#btntambahlokasi').click(function (e) { 
            e.preventDefault();
            $('input[name="table"]').val('lokasi');
            $('.modal-title').text('Tambah Lokasi');
            $('#tambah-lokasi').show();
            $('#edit-lokasi').hide();
            $('#tambah-lantai').hide();
            $('#edit-lantai').hide();
            $('#tambah-gedung').hide();
            $('#edit-gedung').hide();
            $('#myModal').modal('show');
        });

        $('#btntambahlantai').click(function (e) { 
            e.preventDefault();
            $('input[name="table"]').val('lantai');
            $('.modal-title').text('Tambah Lantai');
            $('#tambah-lantai').show();
            $('#edit-lantai').hide();
            $('#tambah-lokasi').hide();
            $('#edit-lokasi').hide();
            $('#tambah-gedung').hide();
            $('#edit-gedung').hide();
            $('#myModal').modal('show');
        });

        $('#btntambahgedung').click(function (e) { 
            e.preventDefault();
            $('input[name="table"]').val('gedung');
            $('.modal-title').text('Tambah Gedung');
            $('#tambah-gedung').show();
            $('#edit-gedung').hide();
            $('#tambah-lantai').hide();
            $('#edit-lantai').hide();
            $('#tambah-lokasi').hide();
            $('#edit-lokasi').hide();
            $('#myModal').modal('show');
        });
        
        //submit Form Tambah Lokasi
        $('#tambah-lokasi').submit(function (e) { 
            e.preventDefault();
            $.ajax({
                type : "POST",
                url : "<?php echo base_url('c_lokasi/add');?>",
                cache : false,
                data : $(this).serialize(),
                success : function(response){
                    myJsonData = response;
                    table = $('#dataTables-lokasi').DataTable();
                    table.destroy();
                    table = $('#dataTables-lokasi').DataTable({
                        columnDefs: [
                            { class: "text-center", targets: 3 },
                        ]
                    });
                    populateTableLokasi(myJsonData);  
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
        
        //submit Form Tambah Lantai
        $('#tambah-lantai').submit(function (e) { 
            e.preventDefault();
            $.ajax({
                type : "POST",
                url : "<?php echo base_url('c_lokasi/add');?>",
                cache : false,
                data : $(this).serialize(),
                success : function(response){
                    myJsonData = response;
                    table = $('#dataTables-lantai').DataTable();
                    table.destroy();
                    table = $('#dataTables-lantai').DataTable({
                        columnDefs: [
                            { class: "text-center", targets: 2 },
                        ]
                    });
                    populateTableLantai(myJsonData);  
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

        //submit Form Tambah Gedung
        $('#tambah-gedung').submit(function (e) { 
            e.preventDefault();
            $.ajax({
                type : "POST",
                url : "<?php echo base_url('c_lokasi/add');?>",
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
                    populateTableGedung(myJsonData);  
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

        //submit Form Edit Lokasi
        $('#edit-lokasi').submit(function (e) { 
            e.preventDefault();
            $.ajax({
                type : "POST",
                url : "<?php echo base_url('c_lokasi/edit');?>",
                cache : false,
                data : $(this).serialize(),
                success : function(response){
                    myJsonData = response;
                    table = $('#dataTables-lokasi').DataTable();
                    table.destroy();
                    table = $('#dataTables-lokasi').DataTable({
                        columnDefs: [
                            { class: "text-center", targets: 3 },
                        ]
                    });
                    populateTableLokasi(myJsonData);  
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
        
        //submit Form Edit Lantai 
        $('#edit-lantai').submit(function (e) { 
            e.preventDefault();
            $.ajax({
                type : "POST",
                url : "<?php echo base_url('c_lokasi/edit');?>",
                cache : false,
                data : $(this).serialize(),
                success : function(response){
                    myJsonData = response;
                    table = $('#dataTables-lantai').DataTable();
                    table.destroy();
                    table = $('#dataTables-lantai').DataTable({
                        columnDefs: [
                            { class: "text-center", targets: 2 },
                        ]
                    });
                    populateTableLantai(myJsonData);  
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

        //submit Form Edit Gedung 
        $('#edit-gedung').submit(function (e) { 
            e.preventDefault();
            $.ajax({
                type : "POST",
                url : "<?php echo base_url('c_lokasi/edit');?>",
                cache : false,
                data : $(this).serialize(),
                success : function(response){
                    myJsonData = response;
                    table = $('#dataTables-gedung').DataTable();
                    table.destroy();
                    table = $('#dataTables-gedung').DataTable({
                        columnDefs: [
                            { class: "text-center", targets: 2 },
                        ]
                    });
                    populateTableGedung(myJsonData);  
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

    //Lokasi
    function editLokasi(kd) {
        var table = "lokasi";
        $.ajax({
            type : "POST",
            url : "<?php echo base_url('c_lokasi/getby');?>",
            cache : false,
            data : "kode=" + kd + "&tabel=" + table,
            success : function(response){
                var lokasi = response.datas[0];
                $('input[name="kd"]').val(lokasi.kd_lokasi);
                $('input[name="nm"]').val(lokasi.nm_lokasi);
                $('select[name="lantai"]').val(lokasi.kd_lantai);
                $('select[name="gedung"]').val(lokasi.kd_gedung);
                $('input[name="status"]').val(lokasi.status_aktif);
            },
            error : function(){
                swal("Terjadi kesalahan!", "Ngga tau kenapa :(", "danger");
            }
        });
        $('input[name="table"]').val('lokasi');
        $('.modal-title').text('Edit Lokasi');
        $('#edit-lokasi').show();
        $('#tambah-lokasi').hide();
        $('#tambah-lantai').hide();
        $('#edit-lantai').hide();
        $('#tambah-gedung').hide();
        $('#edit-gedung').hide();
        $('#myModal').modal('show');
        
    }
    function hapusLokasi(kd) {
        var table = "lokasi"; 
        swal({
            title: "Apakah anda yakin?",   
            text: "Lokasi akan terhapus.",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#e69a2a",
            confirmButtonText: "Ya, hapus data!",   
            cancelButtonText: "Tidak, batalkan!"  
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type : "POST",
                    url : "<?php echo base_url('c_lokasi/del');?>",
                    cache : false,
                    data : "table="+table+"&kd="+kd,
                    success : function(response){
                        
                        table = $('#dataTables-lokasi').DataTable();
                        table.destroy();
                        table = $('#dataTables-lokasi').DataTable({
                            columnDefs: [
                                { class: "text-center", targets: 4 }
                            ]
                        });
                        populateTableLokasi(response);
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
    //Lantai
    function editLantai(kd) {
        var table = "lantai";
        $.ajax({
            type : "POST",
            url : "<?php echo base_url('c_lokasi/getby');?>",
            cache : false,
            data : "kode=" + kd + "&tabel=" + table,
            success : function(response){
                var lokasi = response.datas[0];
                $('input[name="kd"]').val(lokasi.kd_lantai);
                $('input[name="nm"]').val(lokasi.nm_lantai);
                $('input[name="status"]').val(lokasi.status_aktif);
            },
            error : function(){
                swal("Terjadi kesalahan!", "Ngga tau kenapa :(", "danger");
            }
        });

        $('input[name="table"]').val(table);
        $('.modal-title').text('Edit Lantai');
        $('#edit-lantai').show();
        $('#tambah-lantai').hide();
        $('#tambah-lokasi').hide();
        $('#edit-lokasi').hide();
        $('#tambah-gedung').hide();
        $('#edit-gedung').hide();
        $('#myModal').modal('show');
    }
    function hapusLantai(kd) {
        var table = "lantai"; 
        swal({
            title: "Apakah anda yakin?",   
            text: "Lantai akan terhapus.",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#e69a2a",
            confirmButtonText: "Ya, hapus data!",   
            cancelButtonText: "Tidak, batalkan!"  
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type : "POST",
                    url : "<?php echo base_url('c_lokasi/del');?>",
                    cache : false,
                    data : "table=" + table + "&kd=" + kd,
                    success : function(response){
                        
                        table = $('#dataTables-lantai').DataTable();
                        table.destroy();
                        table = $('#dataTables-lantai').DataTable({
                            columnDefs: [
                                { class: "text-center", targets: 2 }
                            ]
                        });
                        populateTableLantai(response);
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
    //Gedung
    function editGedung(kd) { 
        var table = "gedung";
        $.ajax({
            type : "POST",
            url : "<?php echo base_url('c_lokasi/getby');?>",
            cache : false,
            data : "kode=" + kd + "&tabel=" + table,
            success : function(response){
                var lokasi = response.datas[0];
                $('input[name="kd"]').val(lokasi.kd_gedung);
                $('input[name="nm"]').val(lokasi.nm_gedung);
                $('input[name="status"]').val(lokasi.status_aktif);
            },
            error : function(){
                swal("Terjadi kesalahan!", "Ngga tau kenapa :(", "danger");
            }
        });

        $('input[name="table"]').val(table);
        $('.modal-title').text('Edit Gedung');
        $('#edit-gedung').show();
        $('#tambah-gedung').hide();
        $('#tambah-lokasi').hide();
        $('#edit-lokasi').hide();
        $('#tambah-lantai').hide();
        $('#edit-lantai').hide();
        $('#myModal').modal('show');
    }
    function hapusGedung(kd) { 
        var table = "gedung"; 
        swal({
            title: "Apakah anda yakin?",   
            text: "Gedung akan terhapus.",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#e69a2a",
            confirmButtonText: "Ya, hapus data!",   
            cancelButtonText: "Tidak, batalkan!"  
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type : "POST",
                    url : "<?php echo base_url('c_lokasi/del');?>",
                    cache : false,
                    data : "table=" + table + "&kd=" + kd,
                    success : function(response){
                        
                        table = $('#dataTables-gedung').DataTable();
                        table.destroy();
                        table = $('#dataTables-gedung').DataTable({
                            columnDefs: [
                                { class: "text-center", targets: 2 }
                            ]
                        });
                        populateTableGedung(response);
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
    //Populate Data Tables
    function populateTableLokasi(data) {
        // clear the table before populating it with more data
        $("#dataTables-lokasi").DataTable().clear();
        var length = Object.keys(data.datas).length;
        for(var i = 0; i < length; i++) {
        var lokasi = data.datas[i];

        // You could also use an ajax property on the data table initialization
        $('#dataTables-lokasi').dataTable().fnAddData( [
            lokasi.nm_lokasi,
            lokasi.nm_lantai,
            lokasi.nm_gedung,
            lokasi.status_aktif,
            "<a class='btn btn-primary btnedit' onclick=editLokasi(\"" + lokasi.kd_lokasi + "\")><i class='fa fa-pencil-square'></i> Edit</a> <a class='btn btn-danger btnhapus' onclick=hapusLokasi(\"" + lokasi.kd_lokasi + "\")><i class='fa fa-trash'></i> Hapus</a>"
        ]);
        }
    }

    function populateTableLantai(data) {
        // clear the table before populating it with more data
        $("#dataTables-lantai").DataTable().clear();
        var length = Object.keys(data.datas).length;
        for(var i = 0; i < length; i++) {
        var lantai = data.datas[i];

        // You could also use an ajax property on the data table initialization
        $('#dataTables-lantai').dataTable().fnAddData( [
            lantai.nm_lantai,
            lantai.status_aktif,
            "<a class='btn btn-primary btnedit' onclick=editLantai(\"" + lantai.kd_lantai + "\")><i class='fa fa-pencil-square'></i> Edit</a> <a class='btn btn-danger btnhapus' onclick=hapusLantai(\"" + lantai.kd_lantai + "\")><i class='fa fa-trash'></i> Hapus</a>"
        ]);
        }
    }

    function populateTableGedung(data) {
        // clear the table before populating it with more data
        $("#dataTables-gedung").DataTable().clear();
        var length = Object.keys(data.datas).length;
        for(var i = 0; i < length; i++) {
        var gedung = data.datas[i];

        // You could also use an ajax property on the data table initialization
        $('#dataTables-gedung').dataTable().fnAddData( [
            gedung.nm_gedung,
            gedung.status_aktif,
            "<a class='btn btn-primary btnedit' onclick=editGedung(\"" + gedung.kd_gedung + "\")><i class='fa fa-pencil-square'></i> Edit</a> <a class='btn btn-danger btnhapus' onclick=hapusGedung(\"" + gedung.kd_gedung + "\")><i class='fa fa-trash'></i> Hapus</a>"
        ]);
        }
    }
    
</script>
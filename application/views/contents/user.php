<div id="page-wrapper">
    
    <!-- ISI KONTEN MULAI DARI BAWAH SINI -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="margin-top:15px">
                <div class="panel-heading">
                    <h4><i class="fa fa-users"></i> Manajemen User</h4>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- button tambah -->
                    <div class"row">
                        <p>
                            <button type="button" class="btn btn-primary" id="btntambah"><i class="fa fa-plus"></i> Tambah</button>
                        </p>
                    </div>
                    <!-- MODAL Start -->
                    <div class="modal fade" id="modal-user">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h3 class="modal-title">Title</h3>
                                </div>
                                    <!-- Modal body -->
                                    <!-- Form tambah -->
                                    <form role="form" action="#" method="post" id="form-tambah">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" name="usr" class="form-control txtusername" data-validation="length required alphanumeric" data-validation-length="min4">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" name="pwd" class="form-control txtpass" data-validation="required" data-validation-length="min4">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Level</label>
                                                        <select name="level" class="form-control txtlevel">
                                                            <option value="Guest">Guest</option>
                                                            <option value="Kasubbag">Kasubbag</option>
                                                            <option value="Kalab">Kalab</option>
                                                            <option value="Administrator">Administrator</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select name="status" class="form-control txtstatus">
                                                            <option value="Aktif">Aktif</option>
                                                            <option value="Tidak Aktif">Tidak Aktif</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success btnsimpan">Simpan</button>
                                    </div>
                                    </form>
                                    <!-- Form edit -->
                                    <form role="form" action="#" method="post" id="form-edit" style="display: none;">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" class="form-control txtusername" disabled>
                                                        <input type="hidden" name="edit-usr" class="form-control txtusername" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" name="edit-pwd" class="form-control txtpass" data-validation="length required" data-validation-length="min4">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Level</label>
                                                        <select name="edit-level" class="form-control txtlevel">
                                                            <option value="Guest">Guest</option>
                                                            <option value="Kasubbag">Kasubbag</option>
                                                            <option value="Kalab">Kalab</option>
                                                            <option value="Administrator">Administrator</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select name="edit-status" class="form-control txtstatus">
                                                            <option value="Aktif">Aktif</option>
                                                            <option value="Tidak Aktif">Tidak Aktif</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success btnsimpan">Simpan</button>
                                    </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                    <!-- Tabel User-->
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-user">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $u) { ?>
                                <tr>
                                    <td><?= $u->username; ?></td>
                                    <td><?= $u->level; ?></td>
                                    <td><?= $u->status_aktif; ?></td>
                                    <td class="text-center">
                                    <button type="button" class="btn btn-primary btnedit" onclick="editUser('<?= $u->username; ?>')"><i class="fa fa-pencil-square"></i> Edit</button>
                                    <button type="button" class="btn btn-danger btnhapus" onclick="hapusUser('<?= $u->username; ?>')"><i class="fa fa-trash"></i> Hapus</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
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

<script>
$(document).ready(function() {
    $('#dataTables-user').DataTable({
        responsive: true
    });

    $('#btntambah').click(function (e) { 
        e.preventDefault();
        $('.modal-title').text('Tambah User');
        $('#form-tambah').show();
        $('#form-edit').hide();
        $('#modal-user').modal('show');
    });

    $('#modal-user').on('hidden.bs.modal', function () {
        $(".txtusername").val("");
        $(".txtpass").val("");
        $(".txtlevel").val("User");
        $(".status").val("Aktif");
    });

    $("#form-tambah").submit(function(e){
        e.preventDefault();
        $.ajax({
            type : "POST",
            url : "<?php echo base_url('c_users/add');?>",
            cache : false,
            data : $(this).serialize(),
            success : function(response){
                myJsonData = response;
                table = $('#dataTables-user').DataTable();
                table.destroy();
                table = $('#dataTables-user').DataTable({
                    columnDefs: [
                        { class: "text-center", targets: 3 },
                    ]
                });
                populateDataTable(myJsonData);  
                $('#modal-user').modal('hide');
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

    $("#form-edit").submit(function(e){
        e.preventDefault();
        $.ajax({
            type : "POST",
            url : "<?php echo base_url('c_users/edit');?>",
            cache : false,
            data : $(this).serialize(),
            success : function(response){
                myJsonData = response;
                table = $('#dataTables-user').DataTable();
                table.destroy();
                table = $('#dataTables-user').DataTable({
                    columnDefs: [
                        { class: "text-center", targets: 3 },
                    ]
                });
                populateDataTable(myJsonData);  
                $('#modal-user').modal('hide');
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

function hapusUser(id) {  
    swal({
        title: "Apakah anda yakin?",   
        text: "Username \""+ id +"\" akan terhapus.",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#e69a2a",
        confirmButtonText: "Ya, hapus data!",   
        cancelButtonText: "Tidak, batalkan!"  
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type : "POST",
                url : "<?php echo base_url('c_users/del');?>",
                cache : false,
                data : "username="+id,
                success : function(response){
                    myJsonData = response;
                    table = $('#dataTables-user').DataTable();
                    table.destroy();
                    table = $('#dataTables-user').DataTable({
                        columnDefs: [
                            { class: "text-center", targets: 3 }
                        ]
                    });
                    populateDataTable(myJsonData);
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

function editUser(id) { 
    $.ajax({
        type : "POST",
        url : "<?php echo base_url('c_users/getuserby');?>",
        cache : false,
        data : "username="+id,
        success : function(response){
            var user = response.users[0];
            $('.txtusername').val(user.username);
            $('.txtpass').val(user.password);
            $('.txtlevel').val(user.level);
            $('.txtstatus').val(user.status_aktif);
        },
        error : function(){
            swal("Terjadi kesalahan!", "Ngga tau kenapa :(", "danger");
        }
    });

    $('.modal-title').text('Edit User');
    $('#form-tambah').hide();
    $('#form-edit').show();
    $('#modal-user').modal('show');
}

function populateDataTable(data) {
    // clear the table before populating it with more data
    $("#dataTables-user").DataTable().clear();
    var length = Object.keys(data.users).length;
    for(var i = 0; i < length; i++) {
      var users = data.users[i];

    // You could also use an ajax property on the data table initialization
      $('#dataTables-user').dataTable().fnAddData( [
        users.username,
        users.level,
        users.status_aktif,
        "<a class='btn btn-primary btnedit' onclick=editUser(\"" + users.username + "\")><i class='fa fa-pencil-square'></i> Edit</a> <a class='btn btn-danger btnhapus' onclick=hapusUser(\"" + users.username + "\")><i class='fa fa-trash'></i> Hapus</a>"
      ]);
    }
}

function tambah() { 
    $.ajax({
        type : "POST",
        url : "<?php echo base_url('c_users/add');?>",
        cache : false,
        data : $('#form-tambah').serialize(),
        success : function(response){
            myJsonData = response;
            table = $('#dataTables-user').DataTable();
            table.destroy();
            table = $('#dataTables-user').DataTable({
                columnDefs: [
                    { class: "text-center", targets: 3 },
                ]
            });
            populateDataTable(myJsonData);  
            $('#modal-user').modal('hide');
            swal({
                position: 'center',
                type: 'success',
                title: 'Berhasil disimpan!',
                showConfirmButton: false,
                timer: 1500
            });
        },
        error : function(){
            swal("Terjadi kesalahan!", "Username tidak bisa digunakan.", "danger");
        }
    });
 }


</script>
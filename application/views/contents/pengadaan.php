<div id="page-wrapper">
    
    <!-- ISI KONTEN MULAI DARI BAWAH SINI -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="margin-top:15px">
                <div class="panel-heading">
                    <h4><i class="fa fa-cart-plus"></i> Pengadaan</h4>
                </div>
                <!-- /.panel-heading -->

                <div class="panel-body">
                    <!-- FORM INPUT -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="page-header" style="margin-top: 15px;"> <b>A. Detil Pengadaan</b></h4>
                            <form role="form" method="post">
                                <!-- detil_pengadaan -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">  
                                            <div class="col-lg-4">
                                                <!-- no_pengadaan -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <!-- disable input -->
                                                        <fieldset disabled="disabled"> 
                                                            <div class="form-group">
                                                                <label>No. Pengadaan</label>
                                                                <input name="kd_pengadaan" type="text" class="form-control" value="<?= intval($last)+1 ?>" id="kode">
                                                            </div>
                                                        </fieldset>
                                                        <!-- /.disable input -->
                                                    </div>
                                                </div>
                                                <!-- asal_pengadaan -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                        <label>Asal Pengadaan</label>
                                                            <select class="form-control" name="asal" id="asal">
                                                                <option value="Beli">Beli</option>
                                                                <option value="Sumbangan">Sumbangan</option>
                                                                <option value="Hibah">Hibah</option>
                                                                <option value="Lain-lain">Lain-lain</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- tanggal_pengadaan -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Tanggal Pengadaan</label>
                                                            <div class="input-group">
                                                                <input name="tgl_pengadaan" type="text" class="tgl form-control" id="datepicker" required>
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
                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <textarea name="keterangan" class="form-control" rows="3" id="keterangan"></textarea>
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
                                                    <label>Kode Item</label>
                                                    <div class="input-group">
                                                        <input name="kode_item" id="kode_item" type="text" class="form-control">
                                                        <span class="input-group-addon" data-toggle="modal" data-target="#modal-barang">
                                                            <i class="fa fa-search"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row (nested) -->
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label>Kondisi Barang</label>
                                                    <select class="form-control" name="kondisi" id="kondisi">
                                                        <option value="Baru">Baru</option>
                                                        <option value="Bekas">Bekas</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row (nested) -->
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Harga</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <b>Rp.</b>
                                                        </span>
                                                        <input name="harga" id="harga" class="form-control" style="text-align:right">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label>Jumlah</label>
                                                    <input name="jumlah" id="jumlah" class="form-control">
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
                                                <button type="button" class="btn btn-primary btn-block" id="tambah"><i class="fa fa-plus-square"></i> Tambahkan</button>
                                                <button type="button" class="btn btn-success btn-block" id="simpan"><i class="fa fa-save"></i> Simpan</button>
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
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-item">
                                        <thead>
                                            <tr>
                                                <th>Kode Item</th>
                                                <th>Nama Item</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
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
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
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
                                                <table width="100%" class="table table-striped table-bordered table-hover" id="table-modal">
                                                    <thead>
                                                        <tr>
                                                            <th>Kode Barang</th>
                                                            <th>Type</th>
                                                            <th>Merk</th>
                                                            <th>Model</th>
                                                            <th>Warna</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($barang as $brg) { ?>
                                                            <tr onclick="$('#kode_item').val('<?= $brg->kd_barang; ?>'); $('#modal-barang').modal('hide');">
                                                            <td><?= $brg->kd_barang; ?></td>
                                                            <td><?= $brg->nm_kategori; ?></td>
                                                            <td><?= $brg->merk; ?></td>
                                                            <td><?= $brg->model; ?></td>
                                                            <td><?= $brg->warna; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <!-- /.table-responsive -->
                                            </div>
                                        </div>
                                    </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
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

<!-- SweetAlert2 -->
<script src="<?php echo base_url('assets');?>/vendor/sweetalert2/sweetalert2.all.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/sweetalert2/promise.min.js"></script>

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

    $('#table-modal').DataTable({
        bLengthChange: false,
        pageLength: 5,
        responsive: true
    });
    //Date picker
    $('#datepicker').datepicker({
        format: "yyyy-mm-dd",
        todayBtn: "linked",
        autoclose: true
    })
    //alert box (nyoba)
    $("#cari").click(function(){
        alert("The search button was clicked.");
    });

    $('#simpan').click(function (e) { 
        e.preventDefault();
        swal({
            title: 'Are you sure?',
            text: "Simpan data pengadaan.",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            }).then((result) => {
            if (result.value) {
                location.reload(true);
            }
            })
    });

    $('#tambah').click(function (e) { 
        var kd1 = $('#kode').val();
        var asal = $('#asal').val();
        var tgl = $('input.tgl').val();
        var ket = $('#keterangan').val();
        var kd2 = $('#kode_item').val();
        var kond = $('#kondisi').val();
        var harga = $("#harga").val();
        var jumlah = $("#jumlah").val();
        var dataString = 'kd_pengadaan='+ kd1 + '&asal=' + asal + '&tgl=' + tgl + '&keterangan=' + ket + '&kd_barang=' + kd2 + '&kondisi=' + kond + '&harga=' + harga + '&jumlah=' + jumlah;
        e.preventDefault();
        $.ajax({
            type:"POST", //method Submit
            url:"<?php echo base_url('c_pengadaan/add');?>",
            data: dataString, 
            success: function(){
                swal({
                    title: 'Simpan data ?',
                    text: "",
                    type: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya!',
                    cancelButtonText: 'Tidak!'
                    }).then((result) => {
                    if (result.value) {
                        swal({
                            title: "Berhasil",
                            text: "Data berhasil disimpan.",
                            type: "success",
                            showCancelButton: false
                        });
                    }
                    });
            resetFormB();
            },
            error: function(){
                swal('Gagal',
                    'Input gagal tersimpan',
                    'error');
            }
        });
        
    });

    //reset FORM B
    function resetFormB() {
        $('#kode_item').val("");
        $('#kondisi').val("Baru");
        $("#harga").val("");
        $("#jumlah").val("");
    }
});

</script>
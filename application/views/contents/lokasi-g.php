<div id="page-wrapper">

    <!-- ISI KONTEN MULAI DARI BAWAH SINI -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="margin-top:15px">
                <div class="panel-heading">
                    <h4><i class="fa fa-map-marker-alt"></i> 
                    Locations </h4>
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
                        <div id="lokasi" class="tab-pane fade in active" style="margin-top: 14px;">
                            <!-- Tabel Lokasi -->
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-lokasi">
                                <thead>
                                    <tr>
                                        <th>Ruangan</th>
                                        <th>Lantai</th>
                                        <th>Gedung</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lokasi as $lok) { ?>
                                        <tr>
                                        <td class="text-center"><?= $lok->nm_lokasi; ?></td>
                                        <td class="text-center"><?= $lok->nm_lantai; ?></td>
                                        <td class="text-center"><?= $lok->nm_gedung; ?></td>
                                        <td class="text-center"><?= $lok->status_aktif; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- lantai -->
                        <div id="lantai" class="tab-pane fade" style="margin-top: 14px;">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-lantai">
                                <thead>
                                    <tr>
                                        <th>Nama Lantai</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lantai as $lan) { ?>
                                        <tr>
                                        <td class="text-center"><?= $lan->nm_lantai; ?></td>
                                        <td class="text-center"><?= $lan->status_aktif; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- gedung -->
                        <div id="gedung" class="tab-pane fade" style="margin-top: 14px;">
                            <!-- /.button tambah -->
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-gedung">
                                <thead>
                                    <tr>
                                        <th>Nama Gedung</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($gedung as $ged) { ?>
                                        <tr>
                                        <td class="text-center"><?= $ged->nm_gedung; ?></td>
                                        <td class="text-center"><?= $ged->status_aktif; ?></td>
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

    });

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
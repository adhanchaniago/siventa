<div id="page-wrapper">

    <!-- ISI KONTEN MULAI DARI BAWAH SINI -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="margin-top:15px">
                <div class="panel-heading">
                    <h4><i class="fa fa-cubes"></i> 
                    Inventory</h4>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#items">Items <i class="fa fa-cubes"></i></a></li>
                        <li><a href="#item-type">Item Type <i class="fa fa-cube"></i></a></li>
                    </ul>
                    <!-- /.nav-tabs -->
                    <div class="tab-content">
                        <div id="items" class="tab-pane fade in active" style="margin-top: 14px;">
                            <!-- Tabel Inventaris -->
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-inventaris">
                                <thead>
                                    <tr>
                                        <th class="text-center">Kode Inventaris</th>
                                        <th class="text-center">Type</th>
                                        <th class="text-center">Merk</th>
                                        <th class="text-center">Model</th>
                                        <th class="text-center">Warna</th>
                                        <th class="text-center">Kondisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($barang as $brg) { ?>
                                        <tr>
                                        <td class="text-center"><?= $brg->kd_inventaris; ?></td>
                                        <td class="text-center"><?= $brg->nm_kategori; ?></td>
                                        <td class="text-center"><?= $brg->merk; ?></td>
                                        <td class="text-center"><?= $brg->model; ?></td>
                                        <td class="text-center"><?= $brg->warna; ?></td>
                                        <td class="text-center"><?= $brg->persentase; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.items -->

                        <div id="item-type" class="tab-pane fade" style="margin-top: 14px;">
                            <!-- /.button tambah -->
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-kategori">
                                <thead>
                                    <tr>
                                        <th class="text-center">Kode Type</th>
                                        <th class="text-center">Nama Type Barang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ktg_brg as $ktg) { ?>
                                        <tr>
                                        <td class="text-center"><?= $ktg->kd_kategori; ?></td>
                                        <td class="text-center"><?= $ktg->nm_kategori; ?></td>
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

<!-- DataTables JavaScript -->
<script src="<?php echo base_url('assets');?>/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url('assets');?>/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {

        $('#dataTables-inventaris').DataTable({
            responsive: true
        });
        $('#dataTables-kategori').DataTable({
            responsive: true
        });
        $(".nav-tabs a").click(function(){
            $(this).tab('show');
        });
        
    });

</script>
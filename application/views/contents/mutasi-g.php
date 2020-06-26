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
                    <!-- /.row (nested) -->
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
    
    $('#dataTables-mutasi').DataTable({
        responsive: true
    });

    refreshMutasi();
});

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
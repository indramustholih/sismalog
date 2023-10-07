<?php $this->load->view('templates/header') ?>
<?php $this->load->view('templates/sidebar') ?>
<?php $this->load->view('templates/topbar') ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row" >
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pasien Tanggal <?= date('d-m-Y')?></h6>
                </div>
                <div class="card-body">
                    <button class="btn btn-info mb-3 btn-sm" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                    
                    <div class="table-responsive">
                        
                        <table id="table-pengkajian" class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="10%">Tanggal</th>
                                    <th>Poli</th>
                                    <th>No MR</th>
                                    <th width="25%">Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Status</th>
                                    <th width="9%">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/footer') ?>

<script type="text/javascript">
    var save_method; //for save method string
    var table;
 
    $(document).ready(function() {
    
        //datatables
        table = $('#table-pengkajian').DataTable({ 
    
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('pengkajian/ajax_list')?>",
                "type": "POST"
            },
            "pageLength": 50,
    
            //Set column definition initialisation properties.
            "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": true, //set not orderable
            },
            ],
    
        });
        
        //datepicker
        // $('.datepicker').datepicker({
        //     autoclose: true,
        //     format: "yyyy-mm-dd",
        //     todayHighlight: true,
        //     orientation: "top auto",
        //     todayBtn: true,
        //     todayHighlight: true,  
        // });
    });
    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax 
    }
</script>

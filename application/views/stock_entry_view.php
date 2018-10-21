<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blank Page - Vali Admin</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->load->view('common/css') ?>
    </head>
    <body class="app sidebar-mini rtl">
        <!-- Navbar-->
        <?php $this->load->view('common/header') ?>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <?php $this->load->view('common/sidebar') ?>
        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-dashboard"></i>Cities</h1>
                </div>
                <ul class="app-breadcrumb breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="col-lg-6">
                            <?= form_open('home/stock_entry') ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Medicine Name</label>
                                    <input class="form-control" name="medicine_name" type="text" autofocus>
                                    <span class="text-danger"><?= form_error('medicine_name') ? form_error('medicine_name') : "" ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Expiry Date</label>
                                    <input class="form-control" name="expiry_date" type="date" placeholder="Enter email" autofocus>
                                    <span class="text-danger"><?= form_error('expiry_date') ? form_error('expiry_date') : "" ?></span>                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Batch Id</label>
                                    <input class="form-control" name="batch_id" type="text" placeholder="Enter email" autofocus>
                                    <span class="text-danger"><?= form_error('batch_id') ? form_error('batch_id') : "" ?></span>                                  
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Batch Stage</label>
                                    <input class="form-control" name="batch_stage" type="text" placeholder="Enter email" autofocus>
                                    <span class="text-danger"><?= form_error('batch_stage') ? form_error('batch_stage') : "" ?></span>                                    
                                </div>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            <?= form_close() ?> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>Medicine Name</th>
                                        <th>Expiry Date</th>
                                        <th>Batch Id</th>
                                        <th>Batch Stage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($medicine_info_key as $key => $medicine_info_data) : ?>
                                    <tr>
                                        <td><?= $medicine_info_data->medicine_name ?></td>
                                        <td><?= $medicine_info_data->expiry_date ?></td>
                                        <td><?= $medicine_info_data->batch_id ?></td>
                                        <td><?= $medicine_info_data->batch_stage ?></td>
                                    </tr>
                                    <?php endforeach ; ?>    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
        </main>
        <?php $this->load->view('common/js') ?>
        <script type="text/javascript" src="<?= base_url('assets') ?>/js/plugins/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?= base_url('assets') ?>/js/plugins/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript">$('#sampleTable').DataTable();</script>
        <script type="text/javascript">
            var success = '<?= $this->session->flashdata('success') ? $this->session->flashdata('success') : "" ?>';
            var error = '<?= $this->session->flashdata('error') ? $this->session->flashdata('error_city') : "" ?>';

            if (success) {
                swal("Success", success, "success");
            }
            if (error) {
                swal("Opsss..!!", error, "error");
            }
        </script>
    </body>
</html>
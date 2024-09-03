<div class="wrapper">

    <?php $this->load->view('partials/left_sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">

                <?php if ($this->session->flashdata('msg') != null) { ?>
                    <div class="alert alert-success alert-dismissible">
                        <?php $msg = $this->session->flashdata('msg'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        <?php echo $msg['show_msg']; ?>
                    </div>
                <?php } ?>
                <div class="row  mb-2 my-3">
                    <div class="col-sm-6">
                        <h1>Farmers list</h1>
                    </div>
                    <div style="margin-left:550px;">
                        <a class="btn btn-success " href="#" id="print-button">Export</a>
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->

        <table id="datatable1" class="table table-striped table-hover">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Code</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Whatsapp Number</th>
                    <th>Action</th>

                </tr>

            </thead>
            <tbody>
                <?php
                $query = $this->db->get('reg_farmers');

                foreach ($query->result() as $row): ?>

                    <tr>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->email; ?></td>
                        <td><?php echo $row->code; ?></td>
                        <td><?php echo $row->contact_number; ?></td>
                        <td><?php echo $row->whatsapp_number; ?></td>
                        <td><?php echo $row->address; ?></td>

                        <td>
                            <a class="btn btn-success" href="<?php echo base_url('index.php/Home/RegFarmerList/edit_RegisterFarmer/' . $row->id) ?>">Edit</a>
                            <a href="<?php echo base_url('index.php/Home/RegFarmerList/delete_RegisterFarmer/' . $row->id) ?>" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>

                <?php
                endforeach;
                ?>

            </tbody>
        </table>





        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</div>

<!-- 
 <!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <title>Create PDF from View in CodeIgniter Example</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
</head>
<body>
<h1 class="text-center bg-info">Generate PDF from View using DomPDF</h1>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Book Name</th>
            <th>Author</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>PHP and MySQL for Dynamic Web Sites</td>
            <td>Larry Ullman</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Pro MEAN Stack Development</td>
            <td>Elad Elrom</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Restful API Design</td>
            <td>Matthias Biehl</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Pro PHP MVC</td>
            <td>Chris Pitt</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Mastering Spring MVC 4</td>
            <td>Geoffroy Warin</td>
        </tr>
        <tbody>
</table>
</body>
</html>  -->
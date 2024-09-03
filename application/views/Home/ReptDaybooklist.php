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
                <div class="row mb-2 my-3">
                    <div class="col-sm-6">
                        <h1>Daybook List</h1>
                    </div>
                    <div style="margin-left:550px;">
                        <a class="btn btn-success " id="print-button" href="#">Export</a>
                    </div>
                
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->

        <table id="datatable1" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Expense by</th>
                    <th>Amount</th>
                    <th>Company</th>
                    <th>Category</th>
                    <th>Expense Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                    $query = $this->db->get('reports_daybook');
                    foreach ($query->result() as $row): ?>

                        <td><?php echo $row->expenses_by; ?></td>
                        <td><?php echo $row->amount; ?></td>
                        <td><?php echo $row->companies; ?></td>
                        <td><?php echo $row->categories; ?></td>
                        <td><?php echo $row->expense_date; ?></td>
                       
                        <td>
                            <a class="btn btn-success" href="<?php echo base_url('index.php/Home/ReptDaybooklist/edit_ReportDaybook/' .$row->id)?>">Edit</a>
                            <a href="<?php echo base_url('index.php/Home/ReptDaybooklist/delete_ReportDaybook/' .$row->id)?>"class="btn btn-danger">Delete</a>
                        </td>

                </tr>

                <?php
                    endforeach;
            ?>


            </tbody>
        </table>


    </div>



    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

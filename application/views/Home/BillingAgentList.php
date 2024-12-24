<div class="wrapper">

    <?php $this->load->view('partials/left_sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row  mb-2 my-3">
                    <div class="col-sm-6">
                        <h1>AgentsBilling List</h1>
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
                    <th>Billing Number</th>
                    <th>Agents</th>
                    <th>Company</th>
                    <th>Commission</th>
                    <th>Grand Total</th>
                    <th>Final Total</th>
                    <th>Total Dues</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($billing_list)): ?>
                    <?php foreach ($billing_list as $row): ?>
                        <tr>
                            <td><?php echo $row->billing_number; ?></td>
                            <td><?php echo $row->agent; ?></td>
                            <td><?php echo $row->company; ?></td>
                            <td><?php echo $row->commission; ?></td>
                            <td><?php echo $row->grand_total; ?></td>
                            <td><?php echo $row->final_total; ?></td>
                            <td><?php echo $row->total_dues; ?></td>
                            <td><?php echo $row->payment_status; ?></td>
                            <td>
                            <a class="btn btn-success" href="http://localhost:8080/#/editAgentBilling/<?php echo $row->id; ?>">Edit</a>

                                <a href="<?php echo base_url('index.php/Home/delete_AgentBilling/' . $row->id) ?>"
                                    class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9">No records found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>



        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<div class="wrapper">

    <?php $this->load->view('partials/left_sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 my-3">
                    <div class="col-sm-6">
                        <h1>Retailers Billing List</h1>
                    </div>
                    <div style="margin-left:550px;">
                        <a class="btn btn-success" id="print-button" href="#">Export</a>
                    </div>
                    <div class="form-group mt-2" style="margin-left:995px;">
                        <div class="input-group input-group-lg">
                            <input type="search" class="form-control form-control-lg " style="width:200px;" placeholder="search for anything" value="">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
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
                    <th>Retailers</th>
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
                    <td><?php echo $row->retailer_billing_num; ?></td>
                    <td><?php echo $row->retailer; ?></td>
                    <td><?php echo $row->company; ?></td>
                    <td><?php echo $row->commission; ?></td>
                    <td><?php echo $row->grand_total; ?></td>
                    <td><?php echo $row->final_total; ?></td>
                    <td><?php echo $row->total_dues; ?></td>
                    <td><?php echo $row->payment_status; ?></td>
                    <td>
                        <a class="btn btn-success" href="http://localhost:8080/#/editRetailerBilling/<?php echo $row->id; ?>">Edit</a>
                        <a href="<?php echo base_url('index.php/Home/delete_BillingRetailer/' . $row->id) ?>"
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

            </tbody>
        </table>




        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
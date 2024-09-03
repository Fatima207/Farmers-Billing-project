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
                        <h1>List</h1>
                    </div>
                    <div style="margin-left:550px;">
                        <a class="btn btn-success " id="print-button" href="#">Export</a>
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
                    <th>Date</th>
                    <th>Purchase Amount</th>
                    <th>Retailers Amount</th>
                    <th>Agents Amount</th>
                    <th>Net Sales Amount</th>
                    <th>Expense Amount</th>
                    <th>Profit/Loss</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                    $query = $this->db->get('profit/loss');
                    foreach ($query->result() as $row): ?>

                        <td><?php echo $row->date; ?></td>
                        <td><?php echo $row->purchase_amount; ?></td>
                        <td><?php echo $row->retailers_amount; ?></td>
                        <td><?php echo $row->agents_amount; ?></td>
                        <td><?php echo $row->netsales_amount; ?></td>
                        <td><?php echo $row->expense_amount; ?></td>
                        <td><?php echo $row->profit_loss; ?></td>
                       

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

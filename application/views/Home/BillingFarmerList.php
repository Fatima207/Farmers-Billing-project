<div class="wrapper">

    <?php $this->load->view('partials/left_sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row  mb-2 my-3">
                    <div class="col-sm-6">
                        <h1>FarmersBilling List</h1>
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
                    <th>Farmer</th>
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
                <tr>
                    <?php
                  $query = $this->db->select('bfr.*, f.name AS farmer, c.name AS Company')
                  ->from('billing_farmer_records AS bfr')
                  ->join('reg_farmers AS f', 'bfr.farmer = f.id', 'left')
                  ->join('reg_companies AS c', 'bfr.Company = c.id', 'left')
                  ->get();

               
              foreach ($query->result() as $row): ?>
                  <tr>
                      <td><?php echo $row->farmer_billing_num; ?></td>
                      <td><?php echo $row->farmer; ?></td> <!-- Farmer's Name -->
                      <td><?php echo $row->Company; ?></td> <!-- Company's Name -->
                      <td><?php echo $row->commission; ?></td>
                      <td><?php echo $row->grand_total; ?></td>
                      <td><?php echo $row->final_total; ?></td>
                      <td><?php echo $row->total_dues; ?></td>
                      <td><?php echo $row->payment_status; ?></td>
                      <td>
                          <a class="btn btn-success" href="http://localhost:8080/#/editAgentBilling/<?php echo $row->id; ?>">Edit</a>
                          <a href="<?php echo site_url('index.php/Home/FarmersBillingList/delete_BillingFarmer/' . $row->id); ?>" 
                             class="btn btn-danger"
                             onclick="return confirm('Are you sure you want to delete this record?');">
                             Delete
                          </a>
                      </td>
                  </tr>
              <?php endforeach; 
               
                  ?>
            </tbody>
        </table>


        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<div class="wrapper">

    <?php $this->load->view('partials/left_sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                    </div>
                    <div class="col-sm-6">

                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE--->
                <div class="card card-default pt-4 mt-5">

                    <!-- /.card-header -->
                    <form action="<?= base_url('index.php/Home/AddAgent') ?>" method="post">

                        <div class="card-body">
                            <div class="row">
                                <!-- first field  -->
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>companies</label>
                                        <select name="Company" id="Company" class="form-control">

                                            <option value="" default hidden>Companies</option>
                                            <?php foreach ($RegCompanyList as $reg) {

                                            ?>
                                                <option value="<?php echo $reg->id ?>"><?php echo $reg->name ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                                <!-- second field -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Farmer</label>
                                        <select name="Farmer" id="Farmer" class="form-control">

                                            <option value="" default hidden>Farmers</option>
                                            <?php foreach ($RegFarmerList as $reg) {

                                            ?>
                                                <option value="<?php echo $reg->id ?>"><?php echo $reg->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- Date and time range -->
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend" style="height:55px;">
                                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                                            </div>
                                            <input type="text" class="form-control" style="height:55px;" id="reservationtime" required>
                                        </div>

                                    </div>


                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="text-center">
                                <button type="button" class="btn  px-4 py-2 btn-primary btn-sm">Search</button>
                            </div>
                        </div>
                        <!-- /.row -->



                        <div class="row mb-2 my-3 ">
                            <div class="col-sm-6 ml-2">
                                <h3>Farmers Ledgers Data</h3>
                            </div>
                            <div style="margin-left:510px; margin-right:35px; ">
                                <a class="btn btn-success "  id="print-button" href="#">Export</a>
                            </div>
                            <div class="form-group mt-2" style="margin-left:980px;margin-right:15px;">
                                <div class="input-group input-group-lg">
                                    <input type="search" class="form-control form-control-lg " style="width:180px; height:40px" placeholder="search for anything" value="">
                                    <div class="input-group-append" style=" height:40px">
                                        <button type="submit" class="btn btn-lg btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h6>There are no records to display</h6>
                        </div>
                        <table style="margin-left:800px; font-weight:bold">
                            <tr>
                                <td style="padding:8px;">Total</td>
                                <td style="padding:8px">Rs</td>
                                <td style="padding:8px">Rs</td>
                                <td style="padding:8px"></td>
                            </tr>
                            <tr>
                                <td style="padding:8px;">Credit Balance</td>
                                <td style="padding:8px;"></td>
                                <td style="padding:8px;"></td>
                                <td style="padding:8px;">RsNaN</td>
                            </tr>
                            <tr>
                                <td style="padding:8px;">Grand Total</td>
                                <td style="padding:8px;">Rs</td>
                                <td style="padding:8px;">Rs NaN</td>
                                <td style="padding:8px;"></td>
                            </tr>
                        </table>
                    </form>
                    <br>
                    <br>
                    <br>
                </div>
	
            </div>

    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


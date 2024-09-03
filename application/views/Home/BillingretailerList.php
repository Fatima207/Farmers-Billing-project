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
                <tr>
                    <td>
                        Yaa
                    </td>

                    <td>
                        ya@gmail.com
                    </td>

                    <td>
                        20
                    </td>

                    <td>
                        fsgg
                    </td>

                    <td>
                        2043561265
                    </td>

                    <td>
                        sf
                    </td>

                    <td>
                        er
                    </td>

                    <td>
                        completed
                    </td>

                    <td>
                        <a class="btn btn-success" href="#">Edit</a>
                        <a class="btn btn-danger" href="#">Delete</a>
                    </td>

                </tr>

                <tr>
                    <td>
                        sdf
                    </td>

                    <td>
                        sd@gmail.com
                    </td>

                    <td>
                        30
                    </td>

                    <td>
                        fwfg
                    </td>

                    <td>
                        3032456787
                    </td>

                    <td>
                        sh
                    </td>

                    <td>
                        dssh
                    </td>

                    <td>
                        completed
                    </td>


                    <td>
                        <a class="btn btn-success" href="#">Edit</a>
                        <a class="btn btn-danger" href="#">Delete</a>
                    </td>

                </tr>

            </tbody>
        </table>




        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

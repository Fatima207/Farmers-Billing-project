<div class="wrapper">

    <?php $this->load->view('partials/left_sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>New Farmer Billing</h1>
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
        </section>


        <!-- for first -->
        <div class="card-body" style='justify-content: space-between;'>
            <!-- Date -->
            <div class="form-group">
                <div class="row" style='justify-content: space-between;'>
                    <div class="col-md-2">
                        <label>Invoice Date:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <!-- select -->
                        <label>Select Farmers</label>

                        <select name="" class="form-control">
                            <option value="" default hidden>Farmers</option>
                            <?php foreach ($RegFarmerList as $reg) { ?>
                                <option value="<?php echo $reg->id ?>"><?php echo $reg->name ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="col-md-2">
                        <!-- select -->
                        <label>Select Companies</label>
                        <select name="" class="form-control">
                            <option value="" default hidden>companies</option>
                            <?php foreach ($RegCompaniesList as $reg) { ?>
                                <option value="<?php echo $reg->id ?>"><?php echo $reg->name ?></option>
                            <?php } ?>

                        </select>
                    </div>

                </div>

            </div>

        </div>

        <!-- // for farmer table -->


        <div class="row" style="padding-left:10px;">
            <div class="col-12">
                <div class="card" style="display:flex;flex-direction:row;">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 100px; border:1px solid black;margin-right: 7px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>Farmer Name</th>
                                    <th>Farmer code</th>
                                    <th>Address</th>
                                    <th>Contact Number</th>

                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <!-- find the name and id of farmers from the list that got matched with farmers options
                                     and then show that full row in the table...-->

                                    <?php
                                    // $id = 1;
                                    // $this->db->select('*')->from('reg_farmers')->where('id', $id);
                                    $query = $this->db->get('reg_farmers');
                                    foreach ($query->result() as $row): ?>
                                        <td><?php echo $row->name; ?></td>
                                        <td><?php echo $row->code; ?></td>
                                        <td><?php echo $row->address; ?></td>
                                        <td><?php echo $row->contact_number; ?></td>

                                </tr>

                            <?php
                                    endforeach;
                            ?>
                            </tbody>

                        </table>

                    </div>
                    <!-- /.card-body -->
                    <!-- previous -->
                    <div class="card-body  table-responsive p-0" style="flex-shrink:2;border:1px solid black;">
                        <label style='padding-right:100px;'>Previous Dues Amount</label>
                        <span>Rs</span>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- column -->
        </div>


        <!-- options -->

        <div class="row" style="padding-left:15px">
            <!-- first section  -->
            <div class="col-sm-1.5">
                <!-- Select multiple-->
                <div class="form-group">
                    <label>Select Products</label>

                    <select multiple class="form-control" >

                        <?php foreach ($ProductList as $reg) {

                        ?>
                            <option value="<?php echo $reg->id ?>"><?php echo $reg->name ?></option>
                        <?php } ?>

                    </select>
                </div>
            </div>
            <!-- second section -->
            <div class="card card-row card-primary mx-2 text-sm font-small" style="height:550px; width:725px; border:1px solid black;border-radius:8px;">

                <div class="card-body ">
                    <label for="">katla</label>
                    <a class="btn btn-success mr-5" href="#" id="add">+</a>
                    <label class="mx-5">Total Amount: Rs </label>
                    <label class="ml-5">Total Quantity: </label>

                    <div class="flex flex-row " style="column-gap:40px; " id="table_field">
                        <label for="qty" class="">Qty</label>
                        <input type="number" name="qty" id="1" required="" placeholder="Enter Qty" style="width: 100px;">
                        <label for="unit" class="">Unit</label>
                        <select name="unit" id="2" class=" " >
                            <option value="kg">kg</option>
                            <option value="g">g</option>
                            <option value="pound">pound</option>
                        </select>
                        <label for="price" class="">Price</label>
                        <input type="number" name="price" id="2" required="" placeholder="Enter Price" style="width: 100px;">
                        <label class="ml-2">Amount: Rs 0</label>
                        <a class=" btn btn-danger" style="margin-left: 200px;" href="#" >-</a>

                    </div>
                    <hr>
                </div>
            </div>



            <!-- third section -->
            <div class="card card-row card-primary font-small text-sm" style="border:1px solid black;border-radius:8px;">

                <div class="card-body">

                    <p class="text-center">Final total: Rs 0</p>
                    <label for="qty" class="">Comission in %</label>
                    <input type="number" name="qty" id="1" required="" class="w-25"><br>
                    <label class="font-small">Commission amount: Rs 0</label>
                    <p class="text-center mr-5">Charges</p>
                    <div class="text-center">
                        <span>
                            <label for="qty" class="">Arhat coolie :</label>
                            <label for="qty" class="pl-5">Britty</label><br>
                            <input type="number" name="qty" id="1" required="" placeholder="0" class="w-25 mx-3">
                            <input type="number" name="qty" id="1" required="" placeholder="0" class="w-25"><br>
                        </span>
                        <span>
                            <label for="qty" class="">dan :</label>
                            <label for="qty" class="pl-5">Jeep fair :</label><br>
                            <input type="number" name="qty" id="1" required="" placeholder="0" class="w-25 mx-3">
                            <input type="number" name="qty" id="1" required="" placeholder="0" class="w-25"><br>
                        </span>
                        <span>
                            <label for="qty" class="">rail coolie :</label>
                            <label for="qty" class="pl-5">Ice leaf</label><br>
                            <input type="number" name="qty" id="1" required="" placeholder="0" class="w-25 mx-3">
                            <input type="number" name="qty" id="1" required="" placeholder="0" class="w-25"><br>
                        </span>
                        <span>
                            <label for="qty" class="">Union :</label>
                            <label for="qty" class="pl-5">misc EXp.</label><br>
                            <input type="number" name="qty" id="1" required="" placeholder="0" class="w-25 mx-3">
                            <input type="number" name="qty" id="1" required="" placeholder="0" class="w-25"><br>

                        </span>
                        <span>
                            <label for="qty" class="">Market exp.</label><br>
                            <input type="number" name="qty" id="1" required="" placeholder="0" class="w-25">
                        </span>
                    </div>

                    <label for="qty" class="" style="font-size:20px;">Total charged amount : Rs 0</label><br>

                    <div class="text-center">

                        <button>
                            <label for="qty" class="">Grand Total: Rs 0</label><br>
                            <label for="qty" class="">Rounded off amount: Rs 0.00</label><br>
                        </button>
                    </div>
                </div>
            </div>



        </div>
        
        <!-- for main div section -->




        <label for="qty" class="font-small text-sm  ml-5 px-5">Total Quantity:0</label>
        <label for="qty" class="font-small text-sm px-3">Total Products: 1</label>

        <div class="flex flex-row ">
            <label for="qty" class="">Payment status</label>
            <label for="qty" class="pl-5">Payment mode</label><br>
            <select name="unit" id="2" class=" " style="width: 150px; height:40px;">
                <option value=" kg">completed</option>
                <option value="g">pending</option>

            </select>

            <label for="qty" class="">cash</label>
            <input type="number" name="qty" id="1" required="" placeholder="Enter Qty" style="width: 100px;">
            <label for="unit" class="">Cheque</label>
            <input type="number" name="price" id="2" required="" placeholder="Enter Price" style="width: 100px;">
            <label for="price" class="">Online</label>
            <input type="number" name="price" id="2" required="" placeholder="Enter Price" style="width: 100px;">

            <label for="qty" class="font-small text-sm  mx-5 px-5">Total Dues Rs0
            </label>
            <button type="button" class="btn btn-primary btn-sm ml-5" style="width: 100px;">Print & Save</button>
            <button type="button" class="btn btn-dark btn-sm ml-3" style="width: 60px;">Save</button>


        </div>



        <!-- /.content -->
    </div>
   
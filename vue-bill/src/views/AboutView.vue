<template>
  <div class="home">

    <!-- our new  code  -->
    <div class="container-fluid">
      <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
          <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
            <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
              <span class="fs-5 d-none d-sm-inline">Menu</span>
            </a>
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
              <li class="nav-item">
                <a href="#" class="nav-link align-middle px-0">
                  <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                </a>
              </li>
              <li>
                <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                  <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                  <li class="w-100">
                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1 </a>
                  </li>
                  <li>
                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2 </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#" class="nav-link px-0 align-middle">
                  <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Orders</span></a>
              </li>
              <li>
                <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                  <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Bootstrap</span></a>
                <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                  <li class="w-100">
                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1</a>
                  </li>
                  <li>
                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                  <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Products</span> </a>
                <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                  <li class="w-100">
                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 1</a>
                  </li>
                  <li>
                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 2</a>
                  </li>
                  <li>
                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 3</a>
                  </li>
                  <li>
                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 4</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#" class="nav-link px-0 align-middle">
                  <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Customers</span> </a>
              </li>
            </ul>
            <hr>
            <div class="dropdown pb-4">
              <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                <span class="d-none d-sm-inline mx-1">loser</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col py-3">



          <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                  <FIcons :icon="['fas', 'bars']" />
                </a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                <a href="http://localhost/dairy/index.php/Home/SuperAdminDashboard" class="nav-link">Home</a>
              </li>

            </ul>


          </nav>
          <br>
          <!-- main content of billing starts  -->

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

                  <select v-model="selectedFarmer">
                    <option v-for="farmer in RegFarmerList" :key="farmer.id" :value="farmer.id">
                      {{ farmer.name }}
                    </option>
                  </select>
                </div>

                <div class="col-md-2">
                  <!-- select -->
                  <label>Select Company</label>
                  <select v-model="selectedCompany">
                    <!-- <option value="" hidden>Companies</option> -->
                    <option v-for="company in RegFarmerList" :key="company.id" :value="company.id">
                      {{ company.name }}
                    </option>
                  </select>
                </div>
                <br>
                <br>
                <br>

                <div class="row" style="padding-left:10px;">
                  <div class="col-12">
                    <div class="card" style="display:flex;flex-direction:row;">
                      <!-- /.card-header -->
                      <div class="card-body table-responsive p-0"
                        style="height: 100px; border:1px solid black;margin-right: 7px;">
                        <table class="table table-head-fixed text-nowrap" id="recordListing">
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


                              <td id="name"></td>
                              <td id="code"></td>
                              <td id="address"></td>
                              <td id="contact_number"></td>

                            </tr>


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
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="row" style="padding-left:15px">

                  <!-- first section  -->
                  <div style="width:200px;">
                    <!-- Select multiple-->
                    <div class="form-group">
                      <label>Select Products</label>

                      <select v-model="selectedProducts" multiple class="form-control" id="ddselect">
                        <option v-for="product in RegFarmerList" :key="product.id" :value="product.id">
                          {{ product.name }}
                        </option>
                      </select>
                    </div>
                  </div>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>

                  <!-- second section -->
                  <div class="card card-row card-primary mx-2 text-sm font-small"
                    style="height:550px; width:800px; border:1px solid black;border-radius:8px;">

                    <div class="card-body ">
                      <label for="" id="txtvalue">katla</label>
                      <!-- <a class="btn btn-success mr-5" href="#" id="add">+</a> -->



                      <div>
                        <!-- Button to add more fields -->
                        <button @click="addField" id="add" class="btn btn-success mr-5">+</button>

                        <div v-for="(field, index) in fields" :key="index" class="flex flex-row"
                          style="column-gap:40px; margin-top:10px;">
                          <label for="qty">Qty</label>
                          <input type="number" v-model="field.qty" required placeholder="Enter Qty"
                            style="width: 100px;">

                          <label for="unit">Unit</label>
                          <select v-model="field.unit">
                            <option value="kg">kg</option>
                            <option value="g">g</option>
                            <option value="pound">pound</option>
                          </select>

                          <label for="price">Price</label>
                          <input type="number" v-model="field.price" required placeholder="Enter Price"
                            style="width: 100px;">

                          <label class="ml-2">Amount: Rs {{ calculateAmount(field.price, field.qty) }}</label>

                          <button @click="removeField(index)" class="btn btn-danger"
                            style="margin-left: 200px;">-</button>
                        </div>
                      </div>

                      <label class="mx-5">Total Amount: Rs </label>
                      <label class="ml-5">Total Quantity: </label>

                      <div class="flex flex-row " style="column-gap:40px; " id="table_field">
                        <label for="qty" class="">Qty</label>
                        <input type="number" name="qty" id="1" required="" placeholder="Enter Qty"
                          style="width: 100px;">
                        <label for="unit" class="">Unit</label>
                        <select name="unit" id="2" class=" ">
                          <option value="kg">kg</option>
                          <option value="g">g</option>
                          <option value="pound">pound</option>
                        </select>
                        <label for="price" class="">Price</label>
                        <input type="number" name="price" id="2" required="" placeholder="Enter Price"
                          style="width: 100px;">
                        <label class="ml-2">Amount: Rs 0</label>
                        <a class=" btn btn-danger" style="margin-left: 200px;" href="#">-</a>

                      </div>
                      <hr>
                    </div>
                  </div>
                  <!-- third section -->
                  <div class="card card-row card-primary font-small text-sm"
                    style="border:1px solid black;border-radius:8px;width:350px;">

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
                    <input type="number" name="price" id="2" required="" placeholder="Enter Price"
                      style="width: 100px;">
                    <label for="price" class="">Online</label>
                    <input type="number" name="price" id="2" required="" placeholder="Enter Price"
                      style="width: 100px;">

                    <label for="qty" class="font-small text-sm  mx-5 px-5">Total Dues Rs0
                    </label>
                    <button type="button" class="btn btn-primary btn-sm ml-5" style="width: 100px;">Print &
                      Save</button>
                    <button type="button" class="btn btn-dark btn-sm ml-3" style="width: 60px;">Save</button>


                  </div>




                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- our former code  -->
    <div class="container-fluid">
      <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
          <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
            <div>
              <b-dropdown text="Button text via Prop">
                <b-dropdown-item href="#">An item</b-dropdown-item>
                <b-dropdown-item href="#">Another item</b-dropdown-item>
              </b-dropdown>

              <b-dropdown>
                <template #button-content>
                  Custom <strong>Content</strong> with <em>HTML</em> via Slot
                </template>
                <b-dropdown-item href="#">An item</b-dropdown-item>
                <b-dropdown-item href="#">Another item</b-dropdown-item>
              </b-dropdown>
              <br>
            </div>
            <a href="http://localhost/dairy/index.php/Home/Document">
              <div class="image">
                <img src="/assets/dist/img/laravel3.png" class="img-circle elevation-2" alt="User Image" />
              </div>
            </a>
            <div class="info">
              <a href="#" class="d-block">
                Dashboard
              </a>
            </div>
            <!-- Sidebar Menu -->



            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

              <li class="nav-item">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <a href="http://localhost/dairy/index.php/Home/Document">
                    <div class="image">
                      <img src="/assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image" />
                    </div>
                  </a>
                  <a href="#" class="nav-link">
                    <p>
                      <FIcons :icon="['fas', 'angle-left']" />
                    </p>
                  </a>
                </div>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="http://localhost/dairy/index.php/Home/Document" class="nav-link">
                      <p>profile</p>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a href="http://localhost/dairy/index.php/Home/login" class="nav-link ">
                      <p>Log Out</p>
                    </a>
                  </li>

                </ul>

              </li>
              <!--registrations-->

              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registration
                    <FIcons :icon="['fas', 'angle-left']" />
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg-end">

                  <!--farmers -->
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>
                        farmers
                        <FIcons :icon="['fas', 'angle-left']" />
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li lass="nav nav-treeview" class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/AddFarmer" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Register Farmer</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/FarmerList" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>View All</p>
                        </a>
                      </li>

                    </ul>
                  </li>
                  <!--Agents -->
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>
                        Agents
                        <FIcons :icon="['fas', 'angle-left']" />
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/AddAgent" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Register Agent</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/AgentList" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p> View All</p>
                        </a>
                      </li>

                    </ul>
                  </li>

                  <!--Retailers -->
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>
                        Retailers
                        <FIcons :icon="['fas', 'angle-left']" />
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/AddRetailer" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Register Retailer</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/RetailerLis>" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>View All</p>
                        </a>
                      </li>

                    </ul>
                  </li>

                  <!--companies -->
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>
                        Companies
                        <FIcons :icon="['fas', 'angle-left']" />
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/AddCompany" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Register Company</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/CompanyList" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>View All</p>
                        </a>
                      </li>

                    </ul>
                  </li>

                </ul>
              </li>
              <!--Products -->
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Products
                    <FIcons :icon="['fas', 'angle-left']" />
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="http://localhost/dairy/index.php/Home/AddProduct" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Product</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="http://localhost/dairy/index.php/Home/ProductList" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View All</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- Billing -->
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Billing
                    <FIcons :icon="['fas', 'angle-left']" />
                  </p>
                </a>
                <!-- for billing farmers -->
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>
                        farmers
                        <FIcons :icon="['fas', 'angle-left']" />
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/NewFarmersBilling" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>New Billing</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/FarmersBillingList" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>View All</p>
                        </a>
                      </li>

                    </ul>
                  </li>
                  <!-- for agents -->
                </ul>
                <!-- for billing agent  -->
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>
                        Agents
                        <FIcons :icon="['fas', 'angle-left']" />
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/NewAgentsBilling" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>New Billing</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/AgentsBillingList" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>View All</p>
                        </a>
                      </li>

                    </ul>
                  </li>
                  <!-- for agents -->
                </ul>
                <!-- for billing retailers  -->
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>
                        Retailers
                        <FIcons :icon="['fas', 'angle-left']" />
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/RetBilling" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>New Billing</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/RetList" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>View All</p>
                        </a>
                      </li>

                    </ul>
                  </li>
                  <!-- for agents -->
                </ul>
              </li>
              <!-- expenses`   -->

              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expenses
                    <FIcons :icon="['fas', 'angle-left']" />
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>
                        Categories
                        <FIcons :icon="['fas', 'angle-left']" />
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/ExpCategories" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Create Category</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/ExpCatgList" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>View All</p>
                        </a>
                      </li>

                    </ul>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>
                        Daybook
                        <FIcons :icon="['fas', 'angle-left']" />
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/ExpDaybook" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>New Daybook</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/ExpDaybookList" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>View All</p>
                        </a>
                      </li>

                    </ul>
                  </li>
                </ul>
              </li>

              <!-- Reports -->

              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reports
                    <FIcons :icon="['fas', 'angle-left']" />
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="http://localhost/dairy/index.php/Home/ProfitLoss" class="nav-link">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>
                        Profit/Loss Account

                      </p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>
                        Ledgers
                        <FIcons :icon="['fas', 'angle-left']" />
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/FarmerLedger" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Farmer Ledger</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/AgentLedger" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Agent Ledger</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/RetailerLedger" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Retailer Ledger</p>
                        </a>
                      </li>

                    </ul>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="http://localhost/dairy/index.php/Home/PaymentData" class="nav-link">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>Payment Data
                      </p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>
                        Daybook
                        <FIcons :icon="['fas', 'angle-left']" />
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/ReptDaybook" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>New Daybook</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="http://localhost/dairy/index.php/Home/ReptDaybooklist" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>View All</p>
                        </a>
                      </li>

                    </ul>
                  </li>
                </ul>
              </li>


            </ul>

            <!-- /.sidebar-menu -->

            <!-- /.sidebar -->

          </div>
        </div>
      </div>
    </div>

  </div>

</template>

<script type="text/javascript">
export default {
  name: 'HomeView',
  data() {
    return {
      RegFarmerList: [
        { id: 1, name: 'Farmer 1' },
        { id: 2, name: 'Farmer 2' },
        { id: 3, name: 'Farmer 3' },
        // More farmers
      ],
      selectedFarmer: null,
      fields: [
        { qty: '', unit: 'kg', price: '' } // Initial field
      ],
      maxFields: 5
    };
  },
  methods: {
    // Add a new field, up to the max limit
    addField() {
      if (this.fields.length < this.maxFields) {
        this.fields.push({ qty: '', unit: 'kg', price: '' });
      }
    },
    // Remove a field at a given index
    removeField(index) {
      this.fields.splice(index, 1);
    },
    // Calculate amount as price * quantity
    calculateAmount(price, qty) {
      return price && qty ? price * qty : 0;
    }
  }
};

</script>

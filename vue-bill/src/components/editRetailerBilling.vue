<template>
  <div class="row flex-nowrap">
    <aside class="sidebar">

      <!-- dashboard  -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="image">
          <img :src="imageSrc1" class="img-circle elevation-2 img-fluid " alt="User Image"
            style="max-width: 35px; height: auto;" />
        </div>

        <div class="info pl-3">
          {{ dashboardText }}
        </div>

      </div>
      <hr>
      <!-- User Panel -->
      <ul class="nav flex-column">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <a href="/application/index.php/Home/Document">
            <div class="image">
              <img :src="imageSrc2" class="img-circle elevation-2 img-fluid" alt="User Image"
                style="max-width: 35px; height: auto;" />
            </div>
          </a>
          <li class="nav-item">
            <a href="#" @click.prevent="toggleDropdown('username')" class="nav-link">
              username &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i
                :class="menuState.products.open ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
            </a>
            <ul v-if="menuState.username.open" class="nav flex-column pl-3">
              <li class="nav-item">
                <a :href="profileSrc" class="nav-link">Profile</a>
              </li>
              <li class="nav-item">
                <a :href="loginsrc" class="nav-link">Log out</a>
              </li>
            </ul>
          </li>

        </div>

      </ul>


      <hr>
      <!-- all dropdowns  -->
      <ul class="nav flex-column">
        <!-- Level 1 for registration -->
        <li class="nav-item">
          <a href="#" @click.prevent="toggleDropdown('registration')" class="nav-link">
            <i class='far fa-circle'></i>Registration <i
              :class="menuState.registration.open ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
          </a>
          <ul v-if="menuState.registration.open" class="nav flex-column pl-3">
            <!-- Level 2 Farmers -->
            <li class="nav-item">
              <a href="" @click.prevent="toggleSubMenu('registration', 'farmers')" class="nav-link">
                Farmers <i
                  :class="menuState.registration.subMenu.farmers ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
              </a>
              <ul v-if="menuState.registration.subMenu.farmers" class="nav flex-column pl-3">
                <li class="nav-item">
                  <a :href="addFarmerSrc" class="nav-link">Add Farmer</a>
                </li>
                <li class="nav-item">
                  <a :href="farmerListSrc" class="nav-link">View All</a>
                </li>
              </ul>
            </li>

            <!-- Level 2 Agents -->
            <li class="nav-item">
              <a href="#" @click.prevent="toggleSubMenu('registration', 'agents')" class="nav-link">
                Agents <i
                  :class="menuState.registration.subMenu.agents ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
              </a>
              <ul v-if="menuState.registration.subMenu.agents" class="nav flex-column pl-3">
                <li class="nav-item">
                  <a :href="addAgentSrc" class="nav-link">Add Agent</a>
                </li>
                <li class="nav-item">
                  <a :href="agentsListsrc" class="nav-link">View All</a>
                </li>
              </ul>
            </li>
            <!-- Level 2 retailers -->
            <li class="nav-item">
              <a href="#" @click.prevent="toggleSubMenu('registration', 'retailer')" class="nav-link">
                Retailer <i
                  :class="menuState.registration.subMenu.retailer ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
              </a>
              <ul v-if="menuState.registration.subMenu.retailer" class="nav flex-column pl-3">
                <li class="nav-item">
                  <a :href="addRetailerSrc" class="nav-link">Add Retailer</a>
                </li>
                <li class="nav-item">
                  <a :href="retailerListSrc" class="nav-link">View All</a>
                </li>
              </ul>
            </li>
            <!-- Level 2 company -->
            <li class="nav-item">
              <a href="#" @click.prevent="toggleSubMenu('registration', 'company')" class="nav-link">
                company <i
                  :class="menuState.registration.subMenu.company ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
              </a>
              <ul v-if="menuState.registration.subMenu.company" class="nav flex-column pl-3">
                <li class="nav-item">
                  <a :href="addCompanySrc" class="nav-link">Add Company</a>
                </li>
                <li class="nav-item">
                  <a :href="companyListSrc" class="nav-link">View All</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>

        <!-- Products section -->
        <li class="nav-item">
          <a href="#" @click.prevent="toggleDropdown('products')" class="nav-link">
            <i class='far fa-circle'></i> Products <i
              :class="menuState.products.open ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
          </a>
          <ul v-if="menuState.products.open" class="nav flex-column pl-3">
            <li class="nav-item">
              <a :href="addProductSrc" class="nav-link">Add Products</a>
            </li>
            <li class="nav-item">
              <a :href="productListSrc" class="nav-link">View All</a>
            </li>
          </ul>
        </li>

        <!-- Billing section -->
        <li class="nav-item">
          <a href="#" @click.prevent="toggleDropdown('billing')" class="nav-link">
            <i class='far fa-circle'></i> Billing <i
              :class="menuState.registration.open ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
          </a>
          <ul v-if="menuState.billing.open" class="nav flex-column pl-3">
            <!-- Level 2 Farmers -->
            <li class="nav-item">
              <a href="#" @click.prevent="toggleSubMenu('billing', 'farmers')" class="nav-link">
                Farmers <i
                  :class="menuState.billing.subMenu.farmers ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
              </a>
              <ul v-if="menuState.billing.subMenu.farmers" class="nav flex-column pl-3">
                <li class="nav-item">
                  <!-- <a href="/BillingFarmer.vue" class="nav-link">New Billing</a> -->
                  <router-link to="/BillingFarmer" class="nav-link"> New Billing</router-link>
                </li>
                <li class="nav-item">
                  <a :href="BillingfarmerListSrc" class="nav-link">View All</a>
                </li>
              </ul>
            </li>

            <!-- Level 2 Agents -->
            <li class="nav-item">
              <a href="#" @click.prevent="toggleSubMenu('billing', 'agents')" class="nav-link">
                Agents <i
                  :class="menuState.billing.subMenu.agents ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
              </a>
              <ul v-if="menuState.billing.subMenu.agents" class="nav flex-column pl-3">
                <li class="nav-item">

                  <router-link to="/BillingAgent" class="nav-link"> New Billing</router-link>
                </li>
                <li class="nav-item">
                  <a :href="BillingAgentsListsrc" class="nav-link">View All</a>
                </li>
              </ul>
            </li>

              <!-- Level 2 retailer -->
              <li class="nav-item">
              <a href="#" @click.prevent="toggleSubMenu('billing', 'retailer')" class="nav-link">
                Retailer <i
                  :class="menuState.billing.subMenu.retailer ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
              </a>
              <ul v-if="menuState.billing.subMenu.retailer" class="nav flex-column pl-3">
                <li class="nav-item">
                  <router-link to="/BillingRetailer" class="nav-link"> New Billing</router-link>
                </li>
                <li class="nav-item">
                  <a :href="BillingretailerListSrc" class="nav-link">View All</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>


        <!-- Expenses section -->
        <li class="nav-item">
          <a href="#" @click.prevent="toggleDropdown('Expenses')" class="nav-link">
            <i class='far fa-circle'></i> Expenses <i
              :class="menuState.Expenses.open ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
          </a>
          <ul v-if="menuState.Expenses.open" class="nav flex-column pl-3">
            <!-- Level 2 category -->
            <li class="nav-item">
              <a href="#" @click.prevent="toggleSubMenu('Expenses', 'Categories')" class="nav-link">
                Categories <i
                  :class="menuState.Expenses.subMenu.Categories ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
              </a>
              <ul v-if="menuState.Expenses.subMenu.Categories" class="nav flex-column pl-3">
                <li class="nav-item">
                  <a :href="addCategorySrc" class="nav-link">Create Category</a>
                </li>
                <li class="nav-item">
                  <a :href="CategoryListSrc" class="nav-link">View All</a>
                </li>
              </ul>
            </li>

            <!-- Level 2 Daybook -->
            <li class="nav-item">
              <a href="#" @click.prevent="toggleSubMenu('Expenses', 'Daybook')" class="nav-link">
                Daybook <i
                  :class="menuState.Expenses.subMenu.Daybook ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
              </a>
              <ul v-if="menuState.Expenses.subMenu.Daybook" class="nav flex-column pl-3">
                <li class="nav-item">
                  <a :href="ExpenseDaybookSrc" class="nav-link">Create Daybook</a>
                </li>
                <li class="nav-item">
                  <a :href="ExpenseDaybookListSrc" class="nav-link">View All</a>
                </li>
              </ul>
            </li>

          </ul>
        </li>

        <!-- Reports section -->
        <li class="nav-item">
          <a href="#" @click.prevent="toggleDropdown('Reports')" class="nav-link">
            <i class='far fa-circle'></i>Reports <i
              :class="menuState.Reports.open ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
          </a>
          <ul v-if="menuState.Reports.open" class="nav flex-column pl-3">

            <!-- ProfitLossAccount  -->
            <li class="nav-item">
              <a :href="ProfitLossSrc" class="nav-link">
                Profit/Loss Account
              </a>

            </li>
            <!-- ledgers  -->
            <li class="nav-item">
              <a href="#" @click.prevent="toggleSubMenu('Reports', 'Ledgers')" class="nav-link">
                Ledgers <i
                  :class="menuState.Reports.subMenu.Ledgers ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
              </a>
              <ul v-if="menuState.Reports.subMenu.Ledgers" class="nav flex-column pl-3">
                <li class="nav-item">
                  <a :href="farmerLedgerSrc" class="nav-link">Farmer Ledger</a>
                </li>
                <li class="nav-item">
                  <a :href="agentLedgerSrc" class="nav-link">Agent Ledger</a>
                </li>
                <li class="nav-item">
                  <a :href="retailerLedgerSrc" class="nav-link">Retailer Ledger</a>
                </li>
              </ul>
            </li>


            <!-- payment data  -->
            <li class="nav-item">
              <a :href="paymentSrc" class="nav-link">
                Payment Data
              </a>
            </li>
            <!-- daybook  -->
            <li class="nav-item">
              <a href="#" @click.prevent="toggleSubMenu('Reports', 'Daybook')" class="nav-link">
                Daybook <i
                  :class="menuState.Reports.subMenu.Daybook ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
              </a>
              <ul v-if="menuState.Reports.subMenu.Daybook" class="nav flex-column pl-3">
                <li class="nav-item">
                  <a :href="reportDaybookSrc" class="nav-link">New Daybook</a>
                </li>
                <li class="nav-item">
                  <a :href="reportDaybookListSrc" class="nav-link">View All</a>
                </li>
              </ul>
            </li>

          </ul>
        </li>

      </ul>
    </aside>

    <div class="col py-3">

      <!-- header navbar  -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- upper  navbar links -->
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

      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Edit Retailer Billing</h1>
              </div>

            </div>
          </div>
          <!-- /.container-fluid -->
        </section>

        <form @submit.prevent="submitEditForm">
          <!-- billing page main content  -->
          <div class="card-body" style='justify-content: space-between;'>

            <!-- Date -->
            <div class="form-group">
              <div class="row" style='justify-content: space-between;'>
                <!-- for date  -->
                <div class="col-md-2">
                  <label><b>Invoice Date:</b></label>
                  <div class="input-group">
                    <!-- Calendar Icon as a trigger -->
                    <div class="input-group-append">
                      <div class="input-group">
                        <!-- Date Picker Input -->
                        <input type="text" class="form-control" ref="datepicker" name="created_at"
                          v-model="form.created_at" placeholder="Select Date" />
                        <!-- Calendar Icon that triggers the date picker -->
                        <div class="input-group-append" @click="openDatePicker">
                          <span class="input-group-text" style="cursor: pointer;">
                            <FIcons :icon="['fas', 'calendar']" style="height:23px;" />
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- for Agents  -->
                <!-- select -->
                <div class="col-md-2">
                  <!-- <input type="text" name="billing_number" v-model="billingNumber"> -->
                  <label for="Retailers">Select Retailer:</label>
                  <select id="Retailers" name="retailer" v-model="form.retailer" @change="fetchRetailerDetails" required>
                    <option v-for="Retailer in retailers" :key="Retailer.id" :value="Retailer.id">
                      {{ Retailer.name }}
                    </option>
                  </select>
                </div>

                <!-- select -->
                <!-- for company -->
                <div class="col-md-2">

                  <label for="companies">Select companies:</label>
                  <select id="companies" name="company" v-model="form.company" required>
                    <option v-for="companies in comp" :key="companies.id" :value="companies.id">
                      {{ companies.name }}
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
                              <th>Retailer Name</th>
                              <th>Retailer code</th>
                              <th>Address</th>
                              <th>Contact Number</th>

                            </tr>
                          </thead>
                          <tbody>

                            <!-- If a Agents is selected, display their details -->
                            <tr v-if="selectedRetailersDetails">
                              <td>{{ selectedRetailersDetails.name }}</td>
                              <td>{{ selectedRetailersDetails.code }}</td>
                              <td>{{ selectedRetailersDetails.address }}</td>
                              <td>{{ selectedRetailersDetails.contact_number }}</td>
                            </tr>
                            <tr v-else>
                              <td>{{ form.temp }}</td>
                              <td>{{ form.code }}</td>
                              <td>{{ form.address }}</td>
                              <td>{{ form.contact_number }}</td>
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
                <div class="row" style="padding-left: 5px; padding-right: 5px; margin-left: 0; margin-right: 0;">

                  <!-- First Section: Select Products -->
                  <div class="col-md-2"
                    style="display: flex; flex-direction: column; padding-right: 5px; height:250px;">
                    <div class="form-group">
                      <label>Select Products</label>
                      <select id="Products" v-model="selectedProductIds" @change="updateSelectedProducts" multiple
                        class="form-control">
                        <option v-for="product in prod" :key="product.id" :value="product.id"
                          @click="onProductSelect(product.id)">
                          {{ product.name }}
                        </option>
                      </select>
                    </div>
                  </div>


                  <!-- Second Section: Display selected product details -->
                  <div class="col-md-7"
                    style="display: flex; flex-direction: column; padding-left: 5px; padding-right: 5px;">
                    <div class="card card-row card-primary mx-2 text-sm font-small"
                      style="border: 1px solid black; border-radius: 8px; flex: 1;">
                      <div class="card-body">
                        <div v-for="product in fields" :key="product.id" class="mb-4">
                          <h5>{{ product.name }}</h5>
                          <button @click="addField(product)" class="btn btn-success">+</button>
                          <label class="mx-5">Total Amount: Rs {{ calculateTotalAmount(product) }}</label>
                          <label class="ml-5">Total Quantity: {{ calculateTotalQuantity(product) }}</label>

                          <!-- Fields for Quantity, Unit, and Price -->
                          <div v-for="(field, index) in product.fields || []" :key="index" class="d-flex flex-wrap"
                            style="gap: 20px;">
                            <input type="hidden" name="product_id[]" v-model="product.id" />

                            <!-- Quantity -->
                            <div class="d-flex flex-column" style="flex: 1; min-width: 120px;">
                              <label>Qty</label>
                              <input type="number" name="qty[]" v-model="field.qty" required placeholder="Enter Qty"
                                style="width: 100%; padding: 0px; box-sizing: border-box;" />
                            </div>

                            <!-- Unit -->
                            <div class="d-flex flex-column" style="flex: 1; min-width: 120px;">
                              <label>Unit</label>
                              <select v-model="field.unit" name="unit[]" style="width: 100%; padding: 0px;">
                                <option value="kg">kg</option>
                                <option value="g">g</option>
                                <option value="pound">pound</option>
                              </select>
                            </div>

                            <!-- Price -->
                            <div class="d-flex flex-column" style="flex: 1; min-width: 120px;">
                              <label>Price</label>
                              <input type="number" name="price[]" v-model="field.price" required
                                placeholder="Enter Price" style="width: 100%; padding: 0px; box-sizing: border-box;" />
                            </div>

                            <!-- Remove Field Button -->
                            <div class="d-flex flex-column" style="flex: 1; min-width: 120px;">
                              <label>Amount: Rs {{ calculateAmount(field.price, field.qty) }}</label>
                              <button @click="removeField(product, index)" class="btn btn-danger"
                                style="margin-top: 5px; width: 50px; font-size: 14px; padding: 0px;">-</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Third Section: Final totals and payment details -->
                  <div class="col-md-3" style="display: flex; flex-direction: column; padding-left: 5px;">
                    <div class="card card-row card-primary font-small text-sm"
                      style="border: 1px solid black; border-radius: 8px; flex: 1;">
                      <div class="card-body">
                        <p class="text-center">Final total: Rs {{ totalAmount }}</p>
                        <!-- Add a hidden input to include totalAmount in the form submission -->
                        <input type="hidden" v-model="form.final_total" name="final_total" />


                        <!-- Commission input -->
                        <label for="commission">Commission in %</label>
                        <input type="number" v-model.number="form.commission" placeholder="0" class="w-25"
                          name="commission" @input="updateCommission" /><br>

                        <label class="font-small">Commission amount: Rs {{ commissionAmount }}</label>

                        <p class="text-center mr-5">Charges</p>
                        <div class="text-center">
                          <!-- Charges fields -->
                          <span>
                            <label for="arhat">Arhat coolie :</label>
                            <label for="britty" class="pl-5">Britty</label><br>
                            <input type="number" v-model.number="form.arhat_coolie" name="arhat_coolie" placeholder="0"
                              class="w-25 mx-3" />
                            <input type="number" v-model.number="form.britty" placeholder="0" name="britty"
                              class="w-25" /><br>
                          </span>
                          <span>
                            <label for="dan">Dan :</label>
                            <label for="jeep_fair" class="pl-5">Jeep fair :</label><br>
                            <input type="number" v-model.number="form.dan" placeholder="0" name="dan"
                              class="w-25 mx-3" />
                            <input type="number" v-model.number="form.jeep_fair" placeholder="0" name="jeep_fair"
                              class="w-25" /><br>
                          </span>
                          <span>
                            <label for="rail_coolie">Rail Coolie :</label>
                            <label for="ice_Leaf" class="pl-5">Ice leaf :</label><br>
                            <input type="number" v-model.number="form.rail_coolie" placeholder="0" name="rail_coolie"
                              class="w-25 mx-3" />
                            <input type="number" v-model.number="form.ice_leaf" placeholder="0" name="ice_leaf"
                              class="w-25" /><br>
                          </span>

                          <span>
                            <label for="unio_n">unio_n :</label>
                            <label for="misc_exp" class="pl-5">Misc Exp. :</label><br>
                            <input type="number" v-model.number="form.unio_n" placeholder="0" name="unio_n"
                              class="w-25 mx-3" />
                            <input type="number" v-model.number="form.misc_exp" placeholder="0" name="misc_exp"
                              class="w-25" /><br>
                          </span>

                          <span>
                            <label for="market_exp">Market Exp. :</label><br>
                            <input type="number" v-model.number="form.market_exp" placeholder="0" name="market_exp"
                              class="w-25 mx-3" />
                          </span>
                        </div>
                        <!-- Total charged amount and Grand Total -->
                        <label for="totalCharged" style="font-size: 20px;">Total charged amount: Rs {{ totalCharged
                          }}</label><br>
                        <div class="text-center">
                          <button>
                            <label for="grandTotal">Grand Total: Rs
                              <span>{{ grandTotal }}</span>
                            </label>:value
                            <input type="hidden" name="grand_total" v-model="form.grand_total" />
                            <!-- Add a hidden input to send grand_total with the form -->
                            <label for="roundedOffAmount">Rounded off amount: Rs {{ roundedTotal }}</label><br>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <!-- Additional footer or total information -->
                <div class="d-flex align-items-center justify-content-start gap-3 mt-3" style="margin-left:150px;">
                  <label for="qty" class="font-small text-sm px-5">Total Quantity: {{ totalQuantity }}</label>
                  <label for="qty" class="font-small text-sm px-3">Total Products: {{ totalSelectedProducts }}</label>

                </div>
                <br><br>

                <br><br><br>

                <!-- Payment Status and Payment Fields -->
                <div style="display: flex; align-items: center;">
                  <!-- Payment Status -->
                  <div style="margin-right: 20px;">
                    <label for="paymentStatus" style="display: block;">Payment Status</label>
                    <select name="payment_status" id="paymentStatus" v-model="form.payment_status"
                      style="width: 150px; height: 40px;" required>
                      <option value="" disabled selected>Payment Status</option>
                      <option value="Completed">Completed</option>
                      <option value="Pending">Pending</option>
                    </select>
                  </div>

                  <!-- Payment Modes -->
                  <div>
                    <label style="display: block; font-weight: bold; margin-bottom: 5px;">Payment Modes</label>
                    <div style="display: flex; align-items: center; gap: 10px;">
                      <!-- Cash Payment Field -->
                      <div>
                        <label for="cash" style="display: block;">Cash</label>
                        <input type="number" v-model.number="form.cash" name="cash" id="cash"
                          placeholder="Enter Cash Amount" style="width: 100px;" />
                      </div>

                      <!-- Cheque Payment Field -->
                      <div>
                        <label for="cheque" style="display: block;">Cheque</label>
                        <input type="number" v-model.number="form.cheque" name="cheque" id="cheque"
                          placeholder="Enter Cheque Amount" style="width: 100px;" />
                      </div>

                      <!-- Online Payment Field -->
                      <div>
                        <label for="online" style="display: block;">Online</label>
                        <input type="number" v-model.number="form.online" name="online" id="online"
                          placeholder="Enter Online Payment" style="width: 100px;" />
                      </div>
                    </div>
                  </div>

                  <!-- Total Dues -->
                  <div style="margin-left: 20px;">
                    <label for="totalDues" style="display: block;">Total Dues : {{ totalDues }}</label>
                    <input type="hidden" v-model="form.total_dues" name="total_dues" />
                  </div>

                  <!-- Buttons -->
                  <div style="margin-left: 450px; display: flex; gap: 10px;">
                    <button type="button" class="btn btn-primary btn-sm" @click="printPage" style="width: 100px;">
                      Print & Save
                    </button>
                    <button type="submit" class="btn btn-dark btn-sm" id="editagent" style="width: 60px;">
                      Save
                    </button>
                  </div>
                </div>

              </div>

            </div>

          </div>
        </form>
      </div>
      <!-- content wrapper  -->
    </div>

  </div>

</template>
<script>

import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.css"; // Import Flatpickr CSS
import 'flatpickr/dist/flatpickr.css'; // Import flatpickr CSS

// import vSelect from 'vue-select';
// import 'vue-select/dist/vue-select.css';
import axios from 'axios';

export default {

  data() {

    return {
      isLoading: true,
      fields: [],
      // paymentStatus: "",
      retailers: [],              // This will store the list of Agentss from the backend
      billingList: [], // Array to store the billing list
      comp: [],
      product_id: [],
      prod: [
        { id: 1, name: "Goldfish", fields: [] },
        { id: 2, name: "Whales", fields: [] },
        { id: 3, name: "Katla", fields: [] },
        { id: 4, name: "Shark", fields: [] },
      ],
      // selectedAgentsDetails: [], // Store details of selected agent
      selectedProductIds: [],
      prefilledProducts: [1, 2], // Example prefilled product IDs

      selectedProducts: [],
      invoiceDate: null, // You can set a default date if needed
      config: {
        dateFormat: "Y-m-d", // Your desired date format
        allowInput: true
      },
      // Prefilled fields for the second section
      prefilledFields: [],
      form: {

        retailer: '',
        company: '',
        commission: '',
        grand_total: '',
        final_total: '',
        total_dues: '',
        payment_status: '',
        product_id: '',
        qty: '',
        unit: '',
        price: '',
        arhat_coolie: '',
        britty: '',
        dan: '',
        jeep_fair: '',
        rail_coolie: '',
        ice_leaf: '',
        unio_n: '',
        misc_exp: '',
        market_exp: '',
        cash: '',
        cheque: '',
        online: '',
        created_at: '',
        temp:'',
        code:'',
        address:'',
        contact_number:'',
        
      },
      // selectedAgents: null,
      menuState: {

username: {
  open: false
},
registration: {
  open: false,
  subMenu: {
    farmers: false,
    agents: false,
    retailer: false,
    company: false,
  }
},
products: {
  open: false
},
billing: {
  open: false,
  subMenu: {
    farmers: false,
    agents: false,
    retailer: false
  }
},
Expenses: {
  open: false,
  subMenu: {
    Categories: false,
    Daybook: false,
  }
},
Reports: {
  open: false,
  subMenu: {
    ProfitLossAccount: false,
    Ledgers: false,
    PaymentData: false,
    Daybook: false
  }
},
},


      // fields: [],// Ensuring fields is an array from the start

      documentLink: "http://localhost/dairy/index.php/Home/Document",
      imageSrc1: "/images/laravel3.png",
      imageSrc2: "/images/avatar5.png",
      dashboardText: "Dashboard",
      commission: 0, // Initialize as 0
      arhat_coolie: 0,
      britty: 0,
      dan: 0,
      jeep_fair: 0,
      rail_coolie: 0,
      ice_Leaf: 0,
      unio_n: 0,
      misc_exp: 0,
      market_exp: 0,
      cash: 0,
      cheque: 0,
      online: 0,
      total_dues: 0,
    };
  },
  computed: {
    selectedRetailersDetails() {
      // Find the Agents object that matches the selected Agents's ID
      return this.retailers.find(Retailers => Retailers.id === this.form.retailer);
    },
    totalSelectedProducts() {
      const allProducts = [...new Set([...this.prefilledProducts, ...this.selectedProducts])];
      console.log("All Products:", allProducts);
      return allProducts.length;
    },
    totalQuantity() {
      return this.fields.reduce((total, product) => {
        return total + this.calculateTotalQuantity(product);
      }, 0);
    },

    selectedProductNames() {
      return this.selectedProducts
        .map(productId => this.prod.find(product => product.id === productId)?.name)
        .filter(name => name);

    },
    // Calculate total amount
    totalAmount() {
      return this.fields.reduce((total, product) => {
        return total + this.calculateTotalAmount(product);
      }, 0);
    },
    commissionAmount() {
      const validTotal = isNaN(this.totalAmount) || this.totalAmount <= 0 ? 0 : this.totalAmount;
      const validPercentage = isNaN(this.form.commission) || this.form.commission <= 0 ? 0 : this.form.commission;
      return (validTotal * validPercentage) / 100;
    },
    totalCharged() {
      return (
        parseFloat(this.commissionAmount || 0) +
        parseFloat(this.form.arhat_coolie || 0) +
        parseFloat(this.form.britty || 0) +
        parseFloat(this.form.dan || 0) +
        parseFloat(this.form.jeep_fair || 0) +
        parseFloat(this.form.rail_coolie || 0) +
        parseFloat(this.form.ice_leaf || 0) +
        parseFloat(this.form.unio_n || 0) +
        parseFloat(this.form.misc_exp || 0) +
        parseFloat(this.form.market_exp || 0)
      );
    },
    grandTotal() {
      return this.totalAmount + this.totalCharged;
    },
    roundedTotal() {
      return Math.round(this.grandTotal);
    },   
    totalDues() {
    const payments = parseFloat(this.form.cash || 0) + parseFloat(this.form.cheque || 0) + parseFloat(this.form.online || 0);
    return this.roundedTotal - payments;
  },


    amount() {
      return this.qty * this.price;
    },
    profileSrc() {
      return `http://localhost/dairy/index.php/Home/Document`
    },
    loginsrc() {
      return `http://localhost/dairy/index.php/Home/Login`
    },
    addFarmerSrc() {
      return `http://localhost/dairy/index.php/Home/AddFarmer`
    },
    farmerListSrc() {
      return `http://localhost/dairy/index.php/Home/FarmerList`
    },
    addAgentSrc() {
      return `http://localhost/dairy/index.php/Home/AddAgent`
    },
    agentsListsrc() {
      return `http://localhost/dairy/index.php/Home/AgentList`
    },
    addRetailerSrc() {
      return `http://localhost/dairy/index.php/Home/AddRetailer`
    },
    retailerListSrc() {
      return `http://localhost/dairy/index.php/Home/RetailerList`
    },
    addCompanySrc() {
      return `http://localhost/dairy/index.php/Home/AddCompany`
    },
    companyListSrc() {
      return `http://localhost/dairy/index.php/Home/CompanyList`
    },
    addProductSrc() {
      return `http://localhost/dairy/index.php/Home/AddProduct`
    },
    productListSrc() {
      return `http://localhost/dairy/index.php/Home/ProductList`
    },

    addCategorySrc() {
      return `http://localhost/dairy/index.php/Home/ExpCategories`
    },
    CategoryListSrc() {
      return `http://localhost/dairy/index.php/Home/ExpCatgList`
    },
    ExpenseDaybookSrc() {
      return `http://localhost/dairy/index.php/Home/ExpDaybook`
    },
    ExpenseDaybookListSrc() {
      return `http://localhost/dairy/index.php/Home/ExpDaybookList`
    },
    farmerLedgerSrc() {
      return `http://localhost/dairy/index.php/Home/FarmerLedger`
    },
    agentLedgerSrc() {
      return `http://localhost/dairy/index.php/Home/AgentLedger`
    },
    retailerLedgerSrc() {
      return `http://localhost/dairy/index.php/Home/RetailerLedger`
    },
    reportDaybookSrc() {
      return `http://localhost/dairy/index.php/Home/ReptDaybook`
    },
    reportDaybookListSrc() {
      return `http://localhost/dairy/index.php/Home/ReptDaybooklist`
    },
    paymentSrc() {
      return `http://localhost/dairy/index.php/Home/PaymentData`
    },
    ProfitLossSrc() {
      return `http://localhost/dairy/index.php/Home/ProfitLoss`
    },
    BillingAgentsListsrc() {
      return `http://localhost/dairy/index.php/Home/AgentsBillingList`
    },
    BillingfarmerListSrc() {
      return `http://localhost/dairy/index.php/Home/FarmersBillingList`

    },
    BillingretailerListSrc() {
      return `http://localhost/dairy/index.php/Home/RetailersBillingList`

    }
  },

  mounted() {
    this.getRetailers();
    this.getCompanies();
    this.getProducts();
    // Safely initialize flatpickr when the component is mounted
    if (this.$refs.datepicker) {
      this.datepickerInstance = flatpickr(this.$refs.datepicker, {
        dateFormat: "Y-m-d", // Customize your date format
        allowInput: true,    // Allow manual input if needed
        onReady: (selectedDates, dateStr, instance) => {
          console.log("Flatpickr ready!", instance);
        },
        onError: (err) => {
          console.error("Flatpickr error:", err);
        },
      });
    } else {
      console.error("Datepicker ref not found");
    }
  },
  created() {
    const id = this.$route.params.id; // Fetch ID from route
    this.fetchBillingDetails(id);

  },
  methods: {
    onProductSelect(productId) {
      // Add only if the product is not already in the selectedProducts array
      if (!this.selectedProducts.includes(productId)) {
        this.selectedProducts.push(productId);
      }
    },
   
  fetchBillingDetails(id) {
    fetch(`http://localhost/dairy/index.php/Home/edit_BillingRetailer/${id}`)
      .then(response => response.json())
      .then(data => {
        if (data.status === 'success') {
          // Clear existing fields and reset
          this.fields = [];

          // Map grouped product data
          Object.values(data.data).forEach(product => {
            this.fields.push({
              id: product.id || null, // Use product ID if available
              name: product.name,
              fields: product.fields.map(field => ({
                qty: field.qty || 0,
                unit: field.unit || 'kg',
                price: field.price || 0,
              })),
            });
          });

          // Prefill other form fields if extra data exists
          if (data.extraFields) {
            this.form = {
              ...this.form,
              ...data.extraFields, // Add top-level fields (e.g., billing_id, agent, etc.)
            };
          }

          this.isLoading = false; // Data is fully loaded
        } else {
          alert(data.message || 'Failed to fetch details');
          this.isLoading = false;
        }
      })
      .catch(error => {
        console.error('Error:', error);
        this.isLoading = false;
      });
  },

  updateField(product) {
    const existingProduct = this.fields.find(field => field.name === product.name);

    if (!existingProduct) {
      // Add the product to the fields array
      this.fields.push({
        id: product.id || null,
        name: product.name,
        fields: [
          {
            qty: product.qty || 0,
            unit: product.unit || 'kg',
            price: product.price || 0,
          },
        ],
      });
    } else {
      // Add additional fields to an existing product
      existingProduct.fields.push({
        qty: product.qty || 0,
        unit: product.unit || 'kg',
        price: product.price || 0,
      });
    }
  },

  fetchRetailerDetails() {
    if (!this.form.retailer) {
      this.selectedRetailerDetails = null; // Clear details if no agent selected
      return;
    }
    axios
      .get(`http://localhost/dairy/index.php/Home/get_RetailerDetails/${this.form.retailer}`)
      .then(response => {
        this.selectedRetailerDetails = response.data; // Store selected agent's details
        console.log(response.data)
      })
      .catch(error => {
        console.error('Error fetching agent details:', error);
      });
  },

  submitEditForm() {
    const formData = {
      selectedProductIds: this.selectedProductIds,
      fields: this.fields,
      form: this.form,
    };

    // API call to save edited data
    axios
      .post("http://localhost/dairy/index.php/Home/update_BillingRetailer", formData, {
        headers: {
          "Content-Type": "application/json",
        },
        withCredentials: true,
      })
      .then(response => {
        if (response.data.status === "success") {
          alert("Billing record updated successfully!");
        } else {
          throw new Error(response.data.message || "Failed to update billing record.");
        }
      })
      .catch(error => {
        console.error("Error updating billing record:", error);
      });
  },

  updateSelectedProducts() {
    this.selectedProductIds.forEach(productId => {
      const existingProduct = this.fields.find(field => field.id === productId);

      if (!existingProduct) {
        const selectedProduct = this.prod.find(product => product.id === productId);
        if (selectedProduct) {
          this.fields.push({
            id: selectedProduct.id,
            name: selectedProduct.name,
            fields: selectedProduct.fields || [],
          });
        }
      }
    });
  },




    openDatePicker() {
      // Open the flatpickr calendar when the icon is clicked
      if (this.datepickerInstance) {
        this.datepickerInstance.open();
      } else {
        console.error("Flatpickr instance not initialized yet");
      }
    },
    toggleDropdown(menu) {
      // Toggle the main menu and close all other menus
      Object.keys(this.menuState).forEach(key => {
        if (key === menu) {
          this.menuState[key].open = !this.menuState[key].open;
        } else {
          this.menuState[key].open = false;
        }
      });
    },
    toggleSubMenu(menu, subMenu) {
      // Ensure the correct submenu within a specific menu is toggled
      Object.keys(this.menuState[menu].subMenu).forEach(key => {
        if (key === subMenu) {
          this.menuState[menu].subMenu[key] = !this.menuState[menu].subMenu[key];
        } else {
          this.menuState[menu].subMenu[key] = false;
        }
      });
    },
// Add a new field (for adding more rows for qty, price, etc.)
    addField(product) {
      product.fields.push({ qty: '', unit: 'kg', price: '' });
    },

    removeField(product, index) {
      product.fields.splice(index, 1);

    },
    calculateAmount(price, qty) {
      return price * qty || 0;
    },
    calculateTotalAmount(product) {
      if (!product.fields) return 0; // Prevent accessing undefined.
      return product.fields.reduce((sum, field) => sum + (field.qty * field.price), 0);
    },
    calculateTotalQuantity(product) {
      return product.fields.reduce((total, field) => total + (Number(field.qty) || 0), 0);
    },


    printPage() {
      // You can perform any necessary save actions here before printing, like saving to a database
      window.print(); // This opens the print dialog for the user
    },
    getRetailers() {
      axios.get('http://localhost/dairy/index.php/Home/get_Retailers')
        .then((response) => {
          console.log(response.data); // This will log the data fetched from the backend
          this.retailers = response.data;  // Assign the fetched data to the 'agents' array
        })
        .catch(error => {
          console.error(error); // Log errors if the request fails
        });
    },
    getCompanies() {
      axios.get('http://localhost/dairy/index.php/Home/get_companies')
        .then((response) => {
          console.log(response.data); // This will log the data fetched from the backend
          this.comp = response.data;  // Assign the fetched data to the 'frms' array
        })
        .catch(error => {
          console.error(error); // Log errors if the request fails
        });
    },

    getProducts() {
      axios.get('http://localhost/dairy/index.php/Home/get_products')
        .then((response) => {
          console.log(response.data); // This will log the data fetched from the backend
          this.prod = response.data;  // Assign the fetched data to the 'frms' array
        })
        .catch(error => {
          console.error(error); // Log errors if the request fails
        });
    }

  }
};




</script>
<style scoped>
.d-flex {
  display: flex;
}

.gap-3 {
  gap: 15px;
  /* Adjust the gap between labels as needed */
}

.nav-sidebar .nav-link {
  display: flex;
  align-items: center;
}

.nav-treeview {
  padding-left: 15px;
}

.user-panel .image {
  margin-right: 10px;
}

.user-panel .nav-link p {
  margin: 0;
}

.nav-item .nav-treeview .nav-link {
  padding-left: 30px;
}

.sidebar {
  width: 250px;
  background-color: #343a40;
  padding: 15px;
  color: #fff;
  height: auto;
}

.sidebar-header {
  padding: 10px;
  font-size: 1.2rem;
  border-bottom: 1px solid #444;
}

.nav-link {
  color: #adb5bd;
  cursor: pointer;
  display: flex;
  justify-content: space-between;
  padding: 10px 15px;
}

.nav-link:hover {
  background-color: #495057;
  color: #fff;
}

.pl-3 {
  padding-left: 20px;
}

ul {
  list-style: none;
  padding-left: 0;
}

.rotate-icon {
  transition: transform 0.3s ease;
}

.fas.fa-angle-down {
  transform: rotate(180deg);
}
</style>
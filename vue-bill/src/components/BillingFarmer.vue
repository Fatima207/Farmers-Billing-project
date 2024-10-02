<template>
  <component :is="BillingFarmer" />
  <div class="row flex-nowrap">
    <aside class="sidebar sidebar-dark-primary">
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
          <a href="#" @click.prevent="toggleDropdown('registration')" class="nav-link ">
            <i class='far fa-circle'></i>Registration
            <i :class="menuState.registration.open ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
          </a>
          <!-- Apply  class to the dropdown -->
          <ul v-if="menuState.registration.open" class="nav flex-column pl-3 ">
            <!-- Level 2 Farmers -->
            <li class="nav-item">
              <a href="" @click.prevent="toggleSubMenu('registration', 'farmers')" class="nav-link">
                Farmers
                <i
                  :class="menuState.registration.subMenu.farmers ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
              </a>
              <ul v-if="menuState.registration.subMenu.farmers" class="nav flex-column pl-3 ">
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
                Agents
                <i
                  :class="menuState.registration.subMenu.agents ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
              </a>
              <ul v-if="menuState.registration.subMenu.agents" class="nav flex-column pl-3 ">
                <li class="nav-item">
                  <a :href="addAgentSrc" class="nav-link">Add Agent</a>
                </li>
                <li class="nav-item">
                  <a :href="agentsListsrc" class="nav-link">View All</a>
                </li>
              </ul>
            </li>

            <!-- Level 2 Retailers -->
            <li class="nav-item">
              <a href="#" @click.prevent="toggleSubMenu('registration', 'retailer')" class="nav-link">
                Retailer
                <i
                  :class="menuState.registration.subMenu.retailer ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
              </a>
              <ul v-if="menuState.registration.subMenu.retailer" class="nav flex-column pl-3 ">
                <li class="nav-item">
                  <a :href="addRetailerSrc" class="nav-link">Add Retailer</a>
                </li>
                <li class="nav-item">
                  <a :href="retailerListSrc" class="nav-link">View All</a>
                </li>
              </ul>
            </li>

            <!-- Level 2 Company -->
            <li class="nav-item">
              <a href="#" @click.prevent="toggleSubMenu('registration', 'company')" class="nav-link">
                Company
                <i
                  :class="menuState.registration.subMenu.company ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
              </a>
              <ul v-if="menuState.registration.subMenu.company" class="nav flex-column pl-3 ">
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
          <a href="#" @click.prevent="toggleDropdown('products')" class="nav-link  ">
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
          <a href="#" @click.prevent="toggleDropdown('billing')" class="nav-link  ">
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
                  <router-link to="/BillingFarmer" class="nav-link"> New Billing</router-link>
                </li>
                <li class="nav-item">
                  <a :href="FarmerListSrc" class="nav-link">View All</a>
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
                  <a :href="agentsbillingListsrc" class="nav-link">View All</a>
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
                  <a :href="retailerListSrc" class="nav-link">View All</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>


        <!-- Expenses section -->
        <li class="nav-item">
          <a href="#" @click.prevent="toggleDropdown('Expenses')" class="nav-link  ">
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
          <a href="#" @click.prevent="toggleDropdown('Reports')" class="nav-link  ">
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

    <!-- example  -->
    <!-- <div>
      <h1>Farmers List</h1>
      <ul>
        <li v-for="farmer in farmers" :key="farmer.id">{{ farmer.name }} ({{ farmer.email }})</li>
      </ul>      
    </div> -->
    <!-- exapmle  -->

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
                <h1>New Farmer Billing</h1>
              </div>

            </div>
          </div>
          <!-- /.container-fluid -->
        </section>


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
                      <input type="text" class="form-control" ref="datepicker" placeholder="Select Date" />
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
              <div class="col-md-2">
                  <label>Select Farmers</label>
                  <select v-model="selectedFarmer">
                    <!-- <option value="" disabled>Select a Farmer</option> -->
                    <!-- Loop through RegFarmerList to display options -->
                    <option v-for="farmer in RegFarmerList" :key="farmer.id" :value="farmer.id">
                      {{ farmer.name }}
                    </option>
                  </select>
  
                </div>
  
                <!-- select -->
                <!-- for company -->
                <div class="col-md-2">
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
                  style="height:550px; width:855px; border:1px solid black;border-radius:8px;">

                  <div class="card-body ">
                    <label for="" id="txtvalue">katla</label>
                    <!-- <a class="btn btn-success mr-5" href="#" id="add">+</a> -->
                    <button @click="addField" id="add" class="btn btn-success mr-5">+</button>

                    <label class="mx-5">Total Amount: Rs {{ totalAmount }}</label>
                    <label class="ml-5">Total Quantity: {{ totalQuantity }}</label>

                    <div>
                      <!-- Button to add more fields -->

                      <div v-for="(field, index) in fields" :key="index" class="flex flex-row"
                        style="column-gap:40px; margin-top:10px;">
                        <label for="qty">Qty</label>
                        <input type="number" v-model="field.qty" required placeholder="Enter Qty" style="width: 100px;">

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



                    <hr>
                  </div>
                </div>
                <!-- third section -->
                <div class="card card-row card-primary font-small text-sm"
                  style="border:1px solid black;border-radius:8px;width:350px;">
                  <div class="card-body">
                    <p class="text-center">Final total: Rs {{ totalAmount }}</p>

                    <!-- Commission input -->
                    <label for="commission" class="">Commission in %</label>
                    <input type="number" v-model.number="commissionPercentage" placeholder="0" class="w-25" /><br>

                    <!-- Commission amount dynamically calculated -->
                    <label class="font-small">Commission amount: Rs {{ commissionAmount }}</label>

                    <p class="text-center mr-5">Charges</p>

                    <div class="text-center">
                      <!-- Charges fields -->
                      <span>
                        <label for="arhat" class="">Arhat coolie :</label>
                        <label for="britty" class="pl-5">Britty</label><br>
                        <input type="number" v-model.number="arhatCoolie" placeholder="0" class="w-25 mx-3" />
                        <input type="number" v-model.number="britty" placeholder="0" class="w-25" /><br>
                      </span>
                      <span>
                        <label for="dan" class="">Dan :</label>
                        <label for="jeepFair" class="pl-5">Jeep fair :</label><br>
                        <input type="number" v-model.number="dan" placeholder="0" class="w-25 mx-3" />
                        <input type="number" v-model.number="jeepFair" placeholder="0" class="w-25" /><br>
                      </span>
                      <span>
                        <label for="railCoolie" class="">Rail Coolie :</label>
                        <label for="iceLeaf" class="pl-5">Ice leaf :</label><br>
                        <input type="number" v-model.number="railCoolie" placeholder="0" class="w-25 mx-3" />
                        <input type="number" v-model.number="iceLeaf" placeholder="0" class="w-25" /><br>
                      </span>

                      <!-- Union and Misc Expenses -->
                      <span>
                        <label for="union" class="">Union :</label>
                        <label for="miscExp" class="pl-5">Misc Exp. :</label><br>
                        <input type="number" v-model.number="union" placeholder="0" class="w-25 mx-3" />
                        <input type="number" v-model.number="miscExp" placeholder="0" class="w-25" /><br>
                      </span>

                      <!-- Market Expenses -->
                      <span>
                        <label for="marketExp" class="">Market Exp. :</label><br>
                        <input type="number" v-model.number="marketExp" placeholder="0" class="w-25 mx-3" />
                      </span>


                      <!-- Additional charges fields go here -->
                    </div>

                    <!-- Total charged amount and Grand Total -->
                    <label for="totalCharged" style="font-size:20px;">Total charged amount: Rs {{ totalCharged
                      }}</label><br>

                    <div class="text-center">
                      <button>
                        <label for="grandTotal">Grand Total: Rs {{ grandTotal }}</label><br>
                        <label for="roundedOffAmount">Rounded off amount: Rs {{ roundedTotal }}</label><br>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="d-flex align-items-center justify-content-start gap-3 mt-3" style="margin-left:150px;">
                  <label for="qty" class="font-small text-sm px-5">Total Quantity: {{ totalQuantity }}</label>
                  <label for="qty" class="font-small text-sm px-3">Total Products: 0</label>
                </div>
                <div class="flex flex-row mt-4">
                  <div class="d-flex align-items-center justify-content-start gap-5">

                    <label for="qty" class="">Payment Status</label>
                    <label for="qty" class="pl-5"><b>Payment Modes </b></label><br>
                  </div>
                  <select name="unit" id="paymentStatus" class="" style="width: 150px; height:40px;">
                    <option value="completed">Completed</option>
                    <option value="pending">Pending</option>
                  </select>

                  <!-- Cash Payment Field -->
                  <label for="cash" class="pl-5 mr-3">Cash</label>
                  <input type="number" v-model.number="cash" id="cash" placeholder="Enter Cash Amount"
                    style="width: 100px;margin:10px;">

                  <!-- Cheque Payment Field -->
                  <label for="cheque" class="pl-5">Cheque</label>
                  <input type="number" v-model.number="cheque" id="cheque" placeholder="Enter Cheque Amount"
                    style="width: 100px;margin:10px;">

                  <!-- Online Payment Field -->
                  <label for="online" class="pl-5">Online</label>
                  <input type="number" v-model.number="online" id="online" placeholder="Enter Online Payment"
                    style="width: 100px;margin:10px;">

                  <!-- Total Dues Label -->
                  <label for="totalDues" class="font-small text-sm mx-5 px-5">
                    Total Dues Rs {{ totalDues }} <!-- Total Dues displayed here -->
                  </label>

                  <!-- Buttons for Saving and Printing -->

                  <button type="button" class="btn btn-primary btn-sm ml-5" @click="printPage"
                    style="width: 100px;margin-right:10px;">Print
                    & Save</button>
                  <button type="button" class="btn btn-dark btn-sm ml-3" style="width: 60px;">Save</button>

                </div>




              </div>

            </div>

          </div>

        </div>

      </div>
      <!-- content wrapper  -->
    </div>

  </div>

</template>

<script>

import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.css"; // Import Flatpickr CSS
import 'flatpickr/dist/flatpickr.css'; // Import flatpickr CSS
// import axios from 'axios';
// import BillingFarmer from "./BillingFarmer.vue";

export default {  
  data() {
    return {
    
      invoiceDate: null, // You can set a default date if needed
      config: {
        dateFormat: "Y-m-d", // Your desired date format
        allowInput: true
      },
      
        // Other charge fields can go here
        RegFarmerList: [
          { id: 1, name: 'Farmer 1' },
          { id: 2, name: 'Farmer 2' },
          { id: 3, name: 'Farmer 3' },
          // More farmers
        ],
        selectedFarmer: null,
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


        fields: [],// Ensuring fields is an array from the start

        documentLink: "http://localhost/dairy/index.php/Home/Document",
        imageSrc1: "/images/laravel3.png",
        imageSrc2: "/images/avatar5.png",
        dashboardText: "Dashboard",
        commissionPercentage: 0, // Initialize as 0
        arhatCoolie: 0,
        britty: 0,
        dan: 0,
        jeepFair: 0,
        railCoolie: 0,
        iceLeaf: 0,
        union: 0,
        miscExp: 0,
        marketExp: 0,
        cash: 0,
        cheque: 0,
        online: 0,
      }
  
  },
  computed: {
    totalAmount() {
      return (this.fields || []).reduce((total, field) => {
        return total + (field.qty * field.price || 0);
      }, 0);
    },
    // totalAmount() {
    //   return this.fields.reduce((total, field) => total + (field.qty * field.price || 0), 0);
    // },
    commissionAmount() {
      const validTotal = isNaN(this.totalAmount) || this.totalAmount <= 0 ? 0 : this.totalAmount;
      const validPercentage = isNaN(this.commissionPercentage) || this.commissionPercentage <= 0 ? 0 : this.commissionPercentage;
      return (validTotal * validPercentage) / 100;
    },
    totalCharged() {
      return this.arhatCoolie + this.britty + this.dan + this.jeepFair + this.railCoolie +
        this.iceLeaf +
        this.union +
        this.miscExp +
        this.marketExp
        ;
    },
    grandTotal() {
      return (this.totalAmount || 0) + this.totalCharged + this.commissionAmount; // Avoid NaN
    },
    roundedTotal() {
      return Math.round(this.grandTotal);
    },
    // Compute total quantity by summing up the qty of each field
    totalQuantity() {
      return this.fields.reduce((total, field) => total + (field.qty || 0), 0);
    },

    totalDues() {
      return this.grandTotal - (this.cash + this.cheque + this.online) || 0; // Avoid NaN by using || 0
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

  },
  mounted() {
    // this.BillingFarmer = true;
        
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
  methods: {
    
    // getFarmersList() {
    //   // Call the CodeIgniter API to get the farmers list
    //   axios.get('/index.php/Home/getFarmersList')
    //     .then(response => {
    //       this.farmers = response.data;
    //       console.log('hey i am')
    //     })
    //     .catch(error => {
    //       console.error('Error fetching farmers list:', error);
    //     });
    // },
  
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

    // Add a new field, up to the max limit
    addField() {
      // if (this.fields.length < this.maxFields) {
      this.fields.push({ qty: '', unit: 'kg', price: '' });
      // }
    },
    // Remove a field at a given index
    removeField(index) {
      this.fields.splice(index, 1);
    },
    // Calculate amount as price * quantity
    // calculateAmount(price, qty) {
    //   return price && qty ? price * qty : 0;
    // },
    calculateAmount(price, qty) {
      const priceNum = Number(price) || 0; // Ensure price is a number
      const qtyNum = Number(qty) || 0; // Ensure quantity is a number
      return priceNum * qtyNum; // Calculate amount
    },
    printPage() {
      // You can perform any necessary save actions here before printing, like saving to a database
      window.print(); // This opens the print dialog for the user
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
  height: 127vh;
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

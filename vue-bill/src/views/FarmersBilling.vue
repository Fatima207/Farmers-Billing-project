<template>
 <!-- billing page main content  -->
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

                      <button @click="removeField(index)" class="btn btn-danger" style="margin-left: 200px;">-</button>
                    </div>
                  </div>

                  <label class="mx-5">Total Amount: Rs </label>
                  <label class="ml-5">Total Quantity: </label>

                  <div class="flex flex-row " style="column-gap:40px; " id="table_field">
                    <label for="qty" class="">Qty</label>
                    <input type="number" name="qty" id="1" required="" placeholder="Enter Qty" style="width: 100px;">
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
                <input type="number" name="price" id="2" required="" placeholder="Enter Price" style="width: 100px;">
                <label for="price" class="">Online</label>
                <input type="number" name="price" id="2" required="" placeholder="Enter Price" style="width: 100px;">

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
</template>


<script type="text/javascript">
export default {
  name: 'FarmersBilling',
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


<style scoped>

</style>
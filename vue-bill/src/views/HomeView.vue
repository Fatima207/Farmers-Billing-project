<template>
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
        <a href="http://localhost/dairy/index.php/Home/Document">
          <div class="image">
            <img :src="imageSrc2" class="img-circle elevation-2 img-fluid" alt="User Image"
              style="max-width: 35px; height: auto;" />
          </div>
        </a>
        <li class="nav-item">
          <a href="#" @click.prevent="toggleDropdown('products')" class="nav-link">
            username &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i :class="menuState.products.open ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
          </a>
          <ul v-if="menuState.products.open" class="nav flex-column pl-3">
            <li class="nav-item">
              <router-link to="/add-product" class="nav-link">Profile</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/product-list" class="nav-link">Log out</router-link>
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
          Registration <i
            :class="menuState.registration.open ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
        </a>
        <ul v-if="menuState.registration.open" class="nav flex-column pl-3">
          <!-- Level 2 Farmers -->
          <li class="nav-item">
            <a href="#" @click.prevent="toggleSubMenu('registration', 'farmers')" class="nav-link">
              Farmers <i
                :class="menuState.registration.subMenu.farmers ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
            </a>
            <ul v-if="menuState.registration.subMenu.farmers" class="nav flex-column pl-3">
              <li class="nav-item">
                <router-link to="/add-farmer" class="nav-link">Add Farmer</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/farmer-list" class="nav-link">View All</router-link>
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
                <router-link to="/add-agent" class="nav-link">Add Agent</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/agent-list" class="nav-link">Agent List</router-link>
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
                <router-link to="/add-agent" class="nav-link">Add Retailer</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/agent-list" class="nav-link">Retailer List</router-link>
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
                <router-link to="/add-agent" class="nav-link">Add company</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/agent-list" class="nav-link">company List</router-link>
              </li>
            </ul>
          </li>
        </ul>
      </li>

      <!-- Products section -->
      <li class="nav-item">
        <a href="#" @click.prevent="toggleDropdown('products')" class="nav-link">
          Products <i :class="menuState.products.open ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
        </a>
        <ul v-if="menuState.products.open" class="nav flex-column pl-3">
          <li class="nav-item">
            <router-link to="/add-product" class="nav-link">Add Product</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/product-list" class="nav-link">View All</router-link>
          </li>
        </ul>
      </li>

      <!-- Billing section -->
      <li class="nav-item">
        <a href="#" @click.prevent="toggleDropdown('billing')" class="nav-link">
          Billing <i :class="menuState.registration.open ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
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
                <router-link to="/add-farmer" class="nav-link">Add Farmer</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/farmer-list" class="nav-link">View All</router-link>
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
                <router-link to="/add-agent" class="nav-link">Add Agent</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/agent-list" class="nav-link">Agent List</router-link>
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
                <router-link to="/add-agent" class="nav-link">Add Retailer</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/agent-list" class="nav-link">Retailer List</router-link>
              </li>
            </ul>
          </li>
        </ul>
      </li>

      <!-- Expenses section -->
      <li class="nav-item">
        <a href="#" @click.prevent="toggleDropdown('Expenses')" class="nav-link">
          Expenses <i :class="menuState.Expenses.open ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
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
                <router-link to="/farmer-list" class="nav-link">Create Category</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/farmer-list" class="nav-link">View All</router-link>
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
                <router-link to="/add-agent" class="nav-link">New daybook</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/agent-list" class="nav-link">View All</router-link>
              </li>
            </ul>
          </li>

        </ul>
      </li>

      <!-- Reports section -->
      <li class="nav-item">
        <a href="#" @click.prevent="toggleDropdown('Reports')" class="nav-link">
          Reports <i :class="menuState.Reports.open ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
        </a>
        <ul v-if="menuState.Reports.open" class="nav flex-column pl-3">

          <!-- ProfitLossAccount  -->
          <li class="nav-item">
            <a href="#" @click.prevent="toggleSubMenu('Reports', 'ProfitLossAccount')" class="nav-link">
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
                <router-link to="/add-farmer" class="nav-link">Farmer Ledger</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/farmer-list" class="nav-link">Agent Ledger</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/farmer-list" class="nav-link">Retailer Ledger</router-link>
              </li>
            </ul>
          </li>


          <!-- payment data  -->
          <li class="nav-item">
            <a href="#" @click.prevent="toggleSubMenu('Reports', 'ProfitLossAccount')" class="nav-link">
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
                <router-link to="/add-agent" class="nav-link">New daybook</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/agent-list" class="nav-link">View All</router-link>
              </li>
            </ul>
          </li>

        </ul>
      </li>

    </ul>
  </aside>
</template>
<script>
export default {
  data() {
    return {
      documentLink: "http://localhost/dairy/index.php/Home/Document",
      imageSrc1: "/images/laravel3.png",
      imageSrc2: "/images/avatar5.png",
      dashboardText: "Dashboard",
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
      }
    };
  },
  methods: {
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
    }
  }
};
</script>
<style scoped>
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
  height: 100vh;
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


      <!-- Reports section -->
      <li class="nav-item">
        <a href="#" @click.prevent="toggleDropdown('Reports')" class="nav-link">
          Reports <i :class="menuState.Reports.open ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
        </a>
        <ul v-if="menuState.Reports.open" class="nav flex-column pl-3">
          <!-- Level 2 Ledgers -->
          <li class="nav-item">
            <a href="#" @click.prevent="toggleSubMenu('Reports', 'Ledgers')" class="nav-link">
              Ledgers <i :class="menuState.Reports.subMenu.Ledgers ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
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

          <!-- Level 2 Agents -->
          <li class="nav-item">
            <a href="#" @click.prevent="toggleSubMenu('Reports', 'agents')" class="nav-link">
              Agents <i :class="menuState.Reports.subMenu.agents ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
            </a>
            <ul v-if="menuState.Reports.subMenu.agents" class="nav flex-column pl-3">
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
            <a href="#" @click.prevent="toggleSubMenu('Reports', 'retailer')" class="nav-link">
              Retailer <i :class="menuState.Reports.subMenu.retailer ? 'fas fa-angle-down rotate-icon' : 'fas fa-angle-left'"></i>
            </a>
            <ul v-if="menuState.Reports.subMenu.retailer" class="nav flex-column pl-3">
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
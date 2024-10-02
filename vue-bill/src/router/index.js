import { createRouter, createWebHashHistory } from 'vue-router'
import BillingFarmer from '../components/BillingFarmer.vue'
import BillingAgent from '../components/BillingAgent.vue'
import BillingRetailer from '@/components/BillingRetailer.vue'

const routes = [
  {
    path: '/BillingFarmer',
    component: BillingFarmer
  },
  {
    path: '/BillingAgent',
    component: BillingAgent
  },
  {
    path: '/BillingRetailer',
    component: BillingRetailer
  }
 ];

 const router = createRouter({
  history: createWebHashHistory(), // using hash mode to avoid conflicts
  routes
});

export default router


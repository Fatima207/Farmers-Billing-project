import { createRouter, createWebHistory } from 'vue-router'
import BillingFarmer from '../views/BillingFarmer.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: BillingFarmer
  }
 
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router


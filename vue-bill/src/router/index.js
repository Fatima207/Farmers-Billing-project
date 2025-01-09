import { createRouter, createWebHashHistory } from "vue-router";
import BillingFarmer from "../components/BillingFarmer.vue";
import BillingAgent from "../components/BillingAgent.vue";
import BillingRetailer from "@/components/BillingRetailer.vue";
import editAgentBilling from "@/components/editAgentBilling.vue";
import editFarmerBilling from "@/components/editFarmerBilling.vue";
import editRetailerBilling from "@/components/editRetailerBilling.vue";

const routes = [
	{
		path: "/BillingFarmer",
		component: BillingFarmer,
	},
	{
		path: "/BillingAgent",
		component: BillingAgent,
	},
	{
		path: "/BillingRetailer",
		component: BillingRetailer,
	},
	{
		path: "/editAgentBilling/:id",
		name: "EditAgentBilling",
		component: editAgentBilling, // Adjust the path as needed
		props: true,
	},
	{
		path: "/editFarmerBilling/:id",
		name: "EditFarmerBilling",
		component: editFarmerBilling, // Adjust the path as needed
		props: true,
	},
	{
		path: "/editRetailerBilling/:id",
		name: "EditRetailerBilling",
		component: editRetailerBilling, // Adjust the path as needed
		props: true,
	},
];

const router = createRouter({
	history: createWebHashHistory(), // using hash mode to avoid conflicts
	routes,
});

export default router;

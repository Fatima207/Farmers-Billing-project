<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



// $route['reg_farmer'] = 'frontend/Home/index';
// $route['Home/add'] = 'Home/edit/AddFarmer';
// $route['Home/store'] = 'Home/edit/FarmerList';
$route['Home/RegFarmerList/edit_RegisterFarmer/(:any)'] = 'Home/edit_RegisterFarmer/$1';
$route['Home/RegFarmerList/update_RegisterFarmer/(:any)'] = 'Home/update_RegisterFarmer/$1';
$route['Home/RegFarmerList/delete_RegisterFarmer/(:any)'] = 'Home/delete_RegisterFarmer/$1';
// agents section
$route['Home/RegAgentList/edit_RegisterAgent/(:any)'] = 'Home/edit_RegisterAgent/$1';
$route['Home/RegAgentList/update_RegisterAgent/(:any)'] = 'Home/update_RegisterAgent/$1';
$route['Home/RegAgentList/delete_RegisterAgent/(:any)'] = 'Home/delete_RegisterAgent/$1';

// retailers section
$route['Home/RegRetailerList/edit_RegisterRetailer/(:any)'] = 'Home/edit_RegisterRetailer/$1';
$route['Home/RegRetailerList/update_RegisterRetailer/(:any)'] = 'Home/update_RegisterRetailer/$1';
$route['Home/RegRetailerList/delete_RegisterRetailer/(:any)'] = 'Home/delete_RegisterRetailer/$1';

// company section
$route['Home/RegCompanyList/edit_RegisterCompany/(:any)'] = 'Home/edit_RegisterCompany/$1';
$route['Home/RegCompanyList/update_RegisterCompany/(:any)'] = 'Home/update_RegisterCompany/$1';
$route['Home/RegCompanyList/delete_RegisterCompany/(:any)'] = 'Home/delete_RegisterCompany/$1';

// Products section
$route['Home/ProductList/edit_Product/(:any)'] = 'Home/edit_Product/$1';
$route['Home/ProductList/update_Product/(:any)'] = 'Home/update_Product/$1';
$route['Home/ProductList/delete_Product/(:any)'] = 'Home/delete_Product/$1';

// categories section
$route['Home/ExpCatgList/edit_ExpenseCategories/(:any)'] = 'Home/edit_ExpenseCategories/$1';
$route['Home/ExpCatgList/update_ExpenseCategories/(:any)'] = 'Home/update_ExpenseCategories/$1';
$route['Home/ExpCatgList/delete_ExpenseCategories/(:any)'] = 'Home/delete_ExpenseCategories/$1';

// Expense Daybook section
$route['Home/ExpDaybookList/edit_ExpenseDaybook/(:any)'] = 'Home/edit_ExpenseDaybook/$1';
$route['Home/ExpDaybookList/update_ExpenseDaybook/(:any)'] = 'Home/update_ExpenseDaybook/$1';
$route['Home/ExpDaybookList/delete_ExpenseDaybook/(:any)'] = 'Home/delete_ExpenseDaybook/$1';

// Report Daybook section
$route['Home/ReptDaybooklist/edit_ReportDaybook/(:any)'] = 'Home/edit_ReportDaybook/$1';
$route['Home/ReptDaybooklist/delete_ReportDaybook/(:any)'] = 'Home/delete_ReportDaybook/$1';
$route['Home/ReptDaybooklist/update_ReportDaybook/(:any)'] = 'Home/update_ReportDaybook/$1';


// $route["(:any)"] = "Home/index/$1";

// $route["(:any)/(:any)"] = "Home/index/$1";

// $route["(:any)/(:any)/(:any)"] = "Home/index/$1";









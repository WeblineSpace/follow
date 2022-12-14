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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller']                    = 'home';
$route['404_override']                          = 'custom_page/page_404';
$route['translate_uri_dashes']                  = FALSE;
$route['set_language']                          = 'blocks/set_language';

// Settings page
$route['new_order']                             = 'order/new_order';
$route['tickets/(:num)'] = 'tickets/view/$1';

// client area
$route['faq']                     = 'client/faq';
$route['terms']                   = 'client/terms';
$route['cookie-policy']           = 'client/cookie_policy';
$route['news-annoucement']        = 'client/news_annoucement';
$route['set-language']            = 'client/set_language';
$route['back-to-admin']           = 'client/back_to_admin';
$route['ref/(:any)']              = 'client/referral/$1';
//$route['services']                 = 'client/service';


// Payment IPN
$route['unitpay_ipn'] 	    = 'add_funds/unitpay/unitpay_ipn/';
$route['cashmaal_ipn'] 		= 'add_funds/cashmaal/cashmaal_ipn/';
$route['ehot_ipn'] 			= 'add_funds/ehot/ipn/';
$route['gbprimepay_ipn']    = 'add_funds/gbprimepay/gbprimepay_ipn/';
$route['mercadopago_ipn']   = 'add_funds/mercadopago/ipn';
$route['payhere_ipn']       = 'add_funds/payhere/ipn/';
$route['mercadopago_ipn']   = 'add_funds/mercadopago/ipn/';
$route['payzah_ipn']        = 'add_funds/payzah/ipn/';
$route['payku_ipn']         = 'add_funds/payku/ipn/';
$route['coinpayments_ipn']  = 'add_funds/coinpayments/ipn/';
$route['coinbase_ipn']      = 'add_funds/coinbase/ipn/';
$route['cardlink_ipn']      = 'add_funds/cardlink/ipn/';
$route['flutterwave_ipn']   = 'add_funds/flutterwave/ipn/';
$route['razorpay_ipn']      = 'add_funds/razorpay/ipn/';
$route['epayco_ipn']        = 'add_funds/epayco/ipn/';
$route['webmoney_ipn']        = 'add_funds/webmoney/ipn/';

//$route['cron/pix']     					= 'add_funds/pix/list_pix';


// payment cron
$route['coinpayments/cron']             = 'add_funds/coinpayments/cron';
$route['coinbase/cron']                 = 'add_funds/coinbase/cron';
$route['payop/cron']                    = 'add_funds/payop/cron';
$route['midtrans/cron']                 = 'add_funds/midtrans/cron';
$route['paymongo/cron']                 = 'add_funds/paymongo/cron';
$route['payku/cron']                    = 'add_funds/payku/cron';


// API provider cron
$route['api_provider/cron/order']                    = 'cron/order';
$route['api_provider/cron/status']                   = 'cron/multiple_status';
$route['api_provider/cron/status_subscriptions']     = 'cron/status_subscriptions';
$route['cron/paypalStatus']                          = 'cron/paypalStatus';
$route['cron/limit']                                 = 'cron/limit';

// admin
$route['admin/settings/store']    = 'admin/settings/store';
$route['admin/settings/(:any)']   = 'admin/settings/index/$1';
$route['upload_files']            = 'admin/file_manager/upload_files';

$route['custom_paypal/success'] = 'custom_paypal/success';
$route['custom_paypal/unsuccess']    = 'custom_paypal/unsuccess';

$route['support/support_setting']    = 'cron/support_setting';

$route['support/paypal_daily_limit'] = 'cron/paypal_daily_limit';

$route['user/paypal_ignore']         = 'cron/paypal_ignore';

$route['support/paypal_transaction_limit'] = 'cron/paypal_transaction_limit';
$route['buy'] = 'cron/buy';
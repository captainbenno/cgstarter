<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once '../application/libraries/eway-rapid-php-master/include_eway.php'; 


/*
|--------------------------------------------------------------------------
| CGSTARTER Specific Settings
|--------------------------------------------------------------------------
|
| Migrations are disabled by default for security reasons.
| You should enable migrations whenever you intend to do a schema migration
| and disable it back when you're done.
|
*/
$config['order_ref_prefix'] = '1000000';

// eWAY Credentials

$config['paymentMode'] = 'test';

$config['testApiKey'] = 'F9802CrvCgLU3hdmWQMnay0puMGQTRLjZq7HWjl42cPCEAzNVDUP+Tl+nC7XxeqyeJ1xaS';
$config['testApiPassword'] = 'fvz1V656';
$config['testApiEndpoint'] = \Eway\Rapid\Client::MODE_SANDBOX;

$config['prodApiKey'] = 'F9802CrvCgLU3hdmWQMnay0puMGQTRLjZq7HWjl42cPCEAzNVDUP+Tl+nC7XxeqyeJ1xaS';
$config['prodApiPassword'] = 'fvz1V656';
$config['prodApiEndpoint'] = \Eway\Rapid\Client::MODE_SANDBOX;

$config['order_email_from'] = 'captainbenno73@gmail.com';
$config['order_email_bcc'] = 'captainbenno73@gmail.com';

$config['paypal_debug'] = false;
$config['paypal_sandbox'] = true;
$config['paypal_email'] = 'captainbenno73@gmail.com';
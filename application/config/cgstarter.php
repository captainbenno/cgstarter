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

$config['prodApiKey'] = "A1001AbJJiR9hBjQbC5eiUGYJKr93fi/D3Xk87S8RoYFZLgFf1GNorhHDyKYtQr8F7aExC";
$config['prodApiPassword'] = 'hME1m3vW';
$config['prodApiEndpoint'] = 'Production';

$config['order_email_from'] = 'sales@ballisticmedia.net';
$config['order_email_bcc'] = 'sales@ballisticmedia.net';

$config['paypal_debug'] = true;
$config['paypal_sandbox'] = false;
$config['paypal_email'] = 'sales@ballisticmedia.net';

$apiKey = "A1001AbJJiR9hBjQbC5eiUGYJKr93fi/D3Xk87S8RoYFZLgFf1GNorhHDyKYtQr8F7aExC";
$apiPassword = "hME1m3vW";
$apiEndpoint = "Production";

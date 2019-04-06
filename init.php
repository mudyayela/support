<?php
session_start();
error_reporting(1);
date_default_timezone_set('AFRICA/NAIROBI');
require_once  'vendor/autoload.php';

define('CURRENCY','$');
define('BUSINESS_NAME','Cosmetic and Beauty Shop');
define('BUSINESS_TEL','+1 87645324');
define('BUSINESS_EMAIL','admin@gmail.com');
define('COPYRIGHT',\Carbon\Carbon::now()->format('Y'));

define('MAILGUN_DOMAIN','');
define('MAILGUN_SECRET','');
define('EMAIL','');
define('PASSWORD','');
define('MAIL_TO','philnjugunah@gmail.com');


define('CONTROLLER_PATH','\\App\\Controller\\');

define('DB_NAME','shop');
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','root');

include_once 'database/index.php';






//morph maps


\Illuminate\Database\Eloquent\Relations\Relation::morphMap([
    'user' => \App\Model\User::class,
    'client'  => \App\Model\Client::class
]);



// observers


\App\Model\Ticket::observe(\App\Utilies\TicketObserver::class);



#routers
?>







<?php
try{

    session_start();
    error_reporting(1);
    date_default_timezone_set('EUROPE/LONDON');
    require_once  'vendor/autoload.php';

    define('CURRENCY','£');
    define('BUSINESS_NAME','Virgin Media');
    define('BUSINESS_TEL','+1 87645324');
    define('BUSINESS_EMAIL','mudy.ayela@gmail.com');
    define('COPYRIGHT', date('Y'));

    define('MAILGUN_DOMAIN','dotheessay.com');
    define('MAILGUN_SECRET','key-e0e32a4826c2dc49ac5529f2eca85810');
    define('GMAIL_USERNAME','philnjugunah@hmail.com');
    define('GMAIL_PASSWORD','kaguongo');
    define('MAIL_TO','philnjugunah@gmail.com');
    define('MAIL_FROM','philnjugunah@gmail.com');

    define('NEXMO_API_KEY','47600d77');
    define('NEXMO_SECRET','Gy5iuy4ymjTcSr8u');

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

    //\App\Model\User::observe(\App\Utilies\UserObserver::class);

    \App\Model\Client::observe(\App\Utilies\ClientObserver::class);


}catch (Exception $exception){

    error_log($exception->getMessage()."\ton [".date('Y-j-d H:i:s')."]\r\n", 3, "error.log");

}

#routers
?>







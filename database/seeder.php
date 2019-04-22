<?php

use Illuminate\Support\Str;


App\Model\User::create([
    'name' => "John Doe",
    "tell" => "234567789",
    "email" => 'admin@admin.com',
    'type' => 'admin',
    "password" => password_hash("12345", PASSWORD_BCRYPT),
    'confirmed_at' => \Carbon\Carbon::now()
]);

$agent = App\Model\User::create([
    'name' => "Agent Doe",
    "tell" => "294567789",
    "email" => 'agent@admin.com',
    'type' => 'agent',
    "password" => password_hash("12345", PASSWORD_BCRYPT),
    'confirmed_at' => \Carbon\Carbon::now()
]);

$department = \App\Model\Department::create([
    'name'  => 'Billing'
]);

$department->addUser($agent);

$department = \App\Model\Department::create([
    'name'  => 'Sales'
]);

$department->addUser($agent);

$department = \App\Model\Department::create([
    'name'  => 'Technical'
]);

$department->addUser($agent);


App\Model\Client::create([
    'name' => "Client Doe",
    "tell" => "294567789",
    "email" => 'client@admin.com',
    "password" => password_hash("12345", PASSWORD_BCRYPT),
    'confirmed_at' => \Carbon\Carbon::now()
]);

foreach (['high','medium','low'] as $name) {


    \App\Model\Priority::create([
        'name' => $name
    ]);

}

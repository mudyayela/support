<?php
require_once  '../vendor/autoload.php';
include_once '../init.php';
include_once 'index.php';


use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

try{
    $capsule::schema()->dropAllTables();

    Capsule::schema()->create('users', function ($table) {
        $table->increments('id');
        $table->string('name');
        $table->string('tell')->nullable()->unique();
        $table->string('email')->unique();
        $table->enum('type' ,['admin','agent']);
        $table->string('confirmation_code')->nullable();
        $table->timestamp('confirmed_at')->nullable();
        $table->string('password');
        $table->timestamps();
    });

    Capsule::schema()->create('clients', function ($table) {
        $table->increments('id');
        $table->string('name');
        $table->string('tell')->nullable()->unique();
        $table->string('email')->unique();
        $table->string('confirmation_code')->nullable();
        $table->timestamp('confirmed_at')->nullable();
        $table->string('password');
        $table->timestamps();
    });



    Capsule::schema()->create('departments', function ($table) {
        $table->increments('id');
        $table->string('name');
        $table->timestamps();
    });


    Capsule::schema()->create('department_users', function ($table) {
        $table->increments('id');
        $table->unsignedInteger('department_id');
        $table->unsignedInteger('user_id');
        $table->timestamps();



        $table->foreign('department_id')
            ->references('id')->on('departments')
            ->onDelete('cascade')->onUpdate('cascade');


        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');



    });



    Capsule::schema()->create('priorities', function ($table) {
        $table->increments('id');
        $table->string('name');
        $table->timestamps();
    });




    Capsule::schema()->create('tickets', function ($table) {
        $table->increments('id');
        $table->string('subject');
        $table->text('message');
        $table->integer('client_id')->unsigned();
        $table->string('status');
        $table->integer('department_id')->unsigned();
        $table->integer('priority_id')->unsigned();
        $table->timestamp('opened_at')->nullable();
        $table->timestamp('closed_at')->nullable();
        $table->timestamps();


        $table->foreign('department_id')
            ->references('id')->on('departments')
            ->onDelete('cascade')->onUpdate('cascade');

        $table->foreign('priority_id')
            ->references('id')->on('priorities')
            ->onDelete('cascade')->onUpdate('cascade');

        $table->foreign('client_id')
            ->references('id')->on('clients')
            ->onDelete('cascade')->onUpdate('cascade');

    });




    Capsule::schema()->create('ticket_discussions', function ($table) {
        $table->increments('id');
        $table->integer('ticket_id')->unsigned();
        $table->integer('userable_id')->nullable();
        $table->string('userable_type')->nullable();
        $table->text('message');
        $table->timestamps();



        $table->foreign('ticket_id')
            ->references('id')->on('tickets')
            ->onDelete('cascade')->onUpdate('cascade');

    });


    Capsule::schema()->create('escalation_rules', function ($table) {
        $table->increments('id');
        $table->string('name');
        $table->integer('department_id')->unsigned();
        $table->integer('priority_id')->unsigned();
        $table->string('status');
        $table->timestamps();



        $table->foreign('department_id')
            ->references('id')->on('departments')
            ->onDelete('cascade')->onUpdate('cascade');

        $table->foreign('priority_id')
            ->references('id')->on('priorities')
            ->onDelete('cascade')->onUpdate('cascade');

    });



    Capsule::schema()->create('escalation_actions', function ($table) {
        $table->increments('id');
        $table->integer('escalation_rule_id')->unsigned();
        $table->integer('department_id')->unsigned();
        $table->integer('priority_id')->unsigned();
        $table->integer('user_id')->unsigned();
        $table->string('status');
        $table->boolean('notify')->default(true);
        $table->text('message');
        $table->timestamps();



        $table->foreign('escalation_rule_id')
            ->references('id')->on('escalation_rules')
            ->onDelete('cascade')->onUpdate('cascade');

        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');


        $table->foreign('department_id')
            ->references('id')->on('departments')
            ->onDelete('cascade')->onUpdate('cascade');

        $table->foreign('priority_id')
            ->references('id')->on('priorities')
            ->onDelete('cascade')->onUpdate('cascade');

    });


    Capsule::schema()->create('escalation_tickets', function ($table) {
        $table->increments('id');
        $table->integer('ticket_id')->unsigned();
        $table->integer('user_id')->unsigned();
        $table->timestamps();



        $table->foreign('ticket_id')
            ->references('id')->on('tickets')
            ->onDelete('cascade')->onUpdate('cascade');

        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
    });

    Capsule::schema()->create('products', function ($table) {
        $table->increments('id');
        $table->string('name');
        $table->double('price' , 12 ,2);
        $table->string('image');
        $table->string('description');
        $table->string('slug');
        $table->timestamps();



    });


    include_once 'seeder.php';

    session_destroy();
    unset($_SESSION);

    echo "success";

}catch (Exception $exception){
    die($exception->getMessage());

}









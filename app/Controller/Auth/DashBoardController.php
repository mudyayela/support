<?php

namespace App\Controller\Auth;


use App\Model\Product;
use App\Model\User;
use Carbon\Carbon;

class DashBoardController
{

    public function __construct()
    {
        guest();
    }

    public function index()
    {

        if ($_SESSION['client']){

            return view('client/dashboard');
        }

        return view('admin/dashboard');

    }


    public function users()
    {


        $users = User::all();

        return view('admin/user/index', compact('users'));

    }

    public function addUser()
    {

        $user = new User();

        if (isset($_REQUEST['id'])) {
            $user = User::where('id', $_REQUEST['id'])->first();
        }

        return view('admin/user/create_edit', compact("user"));

    }

    public function store()
    {
        try {


            if (!empty($_POST['id'])) {


                $user = User::where('id', $_REQUEST['id'])->first();
                $user->name = $_REQUEST['name'];
                $user->email = $_REQUEST['email'];
                $user->confirmed_at = Carbon::now();
                $user->password = (! empty($_REQUEST['password'])) ? password_hash($_REQUEST['password'], PASSWORD_BCRYPT) : $user->password;
                $user->tell = $_REQUEST['tel'];
                $user->type = $_REQUEST['type'];

                $user->save();

                $success = "Updated successfully";


            } else {

                User::create([
                    'name' => $_REQUEST['name'],
                    "tell" => $_REQUEST['tel'],
                    "email" => $_REQUEST['email'],
                    'type' => $_REQUEST['type'],
                    "password" => password_hash($_REQUEST['password'], PASSWORD_BCRYPT),
                    'confirmed_at' => Carbon::now()
                ]);


                $success = "successfully created a new User";

            }


            $users = User::all();


            return header('Location:'. url('users'));
        } catch (\Exception $exception) {
            die($exception->getMessage());
        }

    }


}
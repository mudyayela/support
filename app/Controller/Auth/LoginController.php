<?php
/**
 * Created by PhpStorm.
 * User: philip
 * Date: 3/5/19
 * Time: 7:25 PM
 */

namespace App\Controller\Auth;


use App\Model\Client;
use App\Model\User;
use App\Utilies\SendSms;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class LoginController
{


    public function index()
    {

        if (isset($_SESSION['user']) || $_SESSION['client']) {


            return header('location:' . url('/'));
        }


        return view('auth/login');

    }

    public function login()
    {


        if (strtolower($_SERVER['REQUEST_METHOD']) != 'post') {

            throw  new \Exception("Method not Allowed");
        }


        if (is_null($_REQUEST['email']) || is_null($_REQUEST['password'])) {

            $error = "E-mail and password and required";

            header("Location:" . url('login?error=' . $error));
        }

        $user = \App\Model\User::where([
            'email' => $_REQUEST['email']
        ])->first();


        if ($user) {


            if (password_verify($_POST['password'], $user->password)) {


                $_SESSION['user'] = $user;
                $_SESSION['id'] = $user->id;
                $_SESSION['name'] = $user->name;
                $_SESSION['email'] = $user->email;
                $_SESSION['type'] = $user->type;
                $_SESSION['confirm'] = $user->type;

                return header("Location:" . url('dashboard'));
            }
        }

        $client = Client::where([
            'email' => $_REQUEST['email']
        ])->first();


        if ($client) {

            if (password_verify($_POST['password'], $client->password)) {


                $_SESSION['client'] = $client;
                $_SESSION['id'] = $client->id;
                $_SESSION['name'] = $client->name;
                $_SESSION['email'] = $client->email;
                $_SESSION['type'] = "client";

                return header("Location:" . url('dashboard'));
            }

            die($client->email);
        }


        $error = "wrong password";

        header("Location:" . url('login?error=' . $error));


    }


    public function logout()
    {


        session_destroy();


        return header('Location:' . url('/'));

    }

    public function register()
    {
        $client = new Client();

        if (isset($_GET['id'])) {
            $client = Client::where('id', $_GET['id'])->first();
        }

        return view('auth/register', compact('client'));

    }

    public function processRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            throw new \Exception("method not allowed");
        }

        try {
            if (isset($_POST['id']) && !is_null($_POST['id'])) {

                $client = Client::where('id', $_POST['id'])->first();

                $client->name = $_POST['name'];
                $client->email = $_POST['email'];
                $client->tell = $_POST['phone_number'];
                $client->confirmed_at = Carbon::now();
                $client->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $client->save();
            } else {

                $client = Client::create([
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'tell' => $_POST['phone_number'],
                    'confirmation_code' => (new Client())->generateConfirmationCode(),
                    'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                ]);

            }

            $_SESSION['client'] = $client;
            $_SESSION['type'] = "client";
            $_SESSION['id'] = $client->id;
            $_SESSION['name'] = $client->name;
            $_SESSION['email'] = $client->email;

            return header('Location:' . url('/confirm-phone?message=welcome'));

        } catch (\Exception $exception) {

        }
    }

    public function confirmPhone()
    {

        return view('auth/confirm');

    }

    public function verify()
    {

        if ($_SESSION['type'] == 'client') {


            $client = Client::where([
                'id' => $_SESSION['id'],
                'confirmation_code' => $_POST['code']
            ])->first();
            if ($client) {
                $client->confirmed_at = Carbon::now();

                $client->save();
                return header("Location:" . url('dashboard'));
            }
            return header("Location:" . url('confirm-phone?message= wrong code'));
        }

        if ($_SESSION['type'] == 'user') {

            $user = User::where([
                'id' => $_SESSION['id'],
                'confirmation_code' => $_POST['code']
            ])->first();
            if ($user) {
                $user->confirmed_at = Carbon::now();

                $user->save();
                return header("Location:" . url('dashboard'));
            }
            return header("Location:" . url('confirm-phone?message= wrong code'));
        }
        if (isset($_SESSION['id']))
        {

            return header("Location:" . url('confirm-phone?message= wrong code'));

        }

        return header("Location:" . url('login'));


    }
}

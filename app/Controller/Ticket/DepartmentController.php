<?php
/**
 * Created by PhpStorm.
 * User: philip
 * Date: 3/7/19
 * Time: 8:44 PM
 */

namespace App\Controller\Ticket;


use App\Model\Department;
use App\Model\DepartmentUsers;
use App\Model\User;

use Illuminate\Database\Capsule\Manager as Capsule;

class DepartmentController
{


    public function __construct()
    {
        guest();
    }


    public function index()
    {

        $departments = Department::all();



        return view('admin/department/index', compact('departments'));
    }

    public function create()
    {


        $department = new Department();


        if (isset($_GET['id']))
        {
            $department = Department::where('id', $_GET['id'])->first();
        }


        $users = User::where('type','agent')->get();

        return view('admin/department/create_edit',compact("department","users"));
    }

    public function store()
    {
        try {

            $capsule = new Capsule;


            if (!empty($_POST['id'])) {

                Capsule::connection()->beginTransaction();


                $department = Department::where('id', $_REQUEST['id'])->first();
                $department->name = $_REQUEST['name'];

                $department->save();


                foreach ($department->departmentUsers as $departmentUser) {

                    $department->removeUser($departmentUser->user);

                }




                if (isset($_POST['user']) && ! is_null($_POST['user']))
                {
                    foreach ($_POST['user'] as $userId) {

                        $user = User::where('id', $userId)->first();

                        $department->addUser($user);


                    }
                }
                $success = "Updated successfully";


            } else {

                $department = Department::create([
                    'name' => $_REQUEST['name'],

                ]);



                foreach ($_POST['user'] as $userId)
                {

                    $user = User::where('id', $userId)->first();





                    DepartmentUsers::create([
                        'user_id'  => $user->id,
                        'department_id' => $department->id
                    ]);

                }

                $success = "successfully created a new User";

            }


            Capsule::connection()->commit();
            return header('Location:'. url('departments'));

        } catch (\Exception $exception) {

            Capsule::connection()->commit();
            die($exception->getMessage());
        }


    }

    public function delete()
    {
        Department::where('id', $_REQUEST['id'])->forceDelete();


        return header('Location:'. url('departments'));
    }
}
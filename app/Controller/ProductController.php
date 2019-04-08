<?php
/**
 * Created by PhpStorm.
 * User: philip
 * Date: 3/10/19
 * Time: 1:19 PM
 */

namespace App\Controller;


use App\Model\Product;
use Exception;
use Illuminate\Support\Str;

class ProductController
{

    public function index()
    {
        $products = Product::all();


        return view('admin/products/index', compact('products'));


    }



    public function viewProducts()
    {

        $product = Product::where('id', $_GET['id'])->first();


        return view('single_product', compact("product"));

    }


    public function create()
    {
        $product = Product::where('id', $_GET['id'])->first();


        return view('admin/products/create_edit', compact('product'));


    }

    public function store()
    {


        $request = $_POST;
        try{



                $fileName = time() . basename($_FILES["image"]["name"]);

                $target_dir = "public".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR;
                $target_file = $target_dir . time() . basename($_FILES["image"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
// Check file size
                if ($_FILES["image"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
// Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
// Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {


                        $products = Product::updateOrCreate([
                            'id'  => $request['id']
                        ],[
                            'name' => $request['name'],
                            'slug' => Str::slug($request['name'], '-', 'en'),
                            'description' => $request['description'],
                            'image' => "public".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR.$fileName,
                            'price' => $request['price']
                        ]);




                        header('Location:'. url('products'));
                    }
                }

        }catch (Exception $exception){

            dd($exception->getMessage());

            header('Location:'. url('products/create'));

        }


    }

    public function delete()
    {
        $products = Product::where('id', $_GET['id'])->first()->delete();


        return  header('Location:'. url('products'));

    }

}
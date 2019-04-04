<?php

use App\Model\Ticket;
use Illuminate\Support\Str;


try{
    if (! Ticket::where('name', $_REQUEST['name'])->count()) {

        $fileName = time() . basename($_FILES["image"]["name"]);

        $target_dir = "public/";
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
                $products = Ticket::create([
                    'name' => $_REQUEST['name'],
                    'slug' => Str::slug($_REQUEST['name'], '-', 'en'),
                    'description' => $_REQUEST['description'],
                    'image' => $fileName,
                    'price' => 23
                ]);


                header('Location:products.php');
            }
        }
    }
}catch (Exception $exception){


}
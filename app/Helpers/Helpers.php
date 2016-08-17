<?php
namespace App\Helpers;

class Helpers {

    public static function getBase64FileType($base64file) {
        // '/data:image/(png)?(jpeg)?;base64,/'
        if(preg_match('/data:image\/png;/',$base64file)) {
           return ".png";
        } elseif(preg_match('/data:image\/(jpg)?(jpeg)?;/',$base64file)) {
            return ".jpg";
        } else {
            return false;
        }
    }


    public static function uploadBase64File( $img, $upload_dir, $fileName)
    {
        $img = preg_replace('#data:image/[^;]+;base64,#', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = $upload_dir.$fileName;
        $success = file_put_contents($file, $data);
        if($success)
            return true;
        return false;
    }

    public static function dp($data, $ex = false) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        if ($ex) {
            exit();
        }
    }

    public static function show_validation_errors($error) {
    }
}
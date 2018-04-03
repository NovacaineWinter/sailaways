<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stockBoatImage extends Model
{
    protected $table ='stockBoatPhotos';


    public function compressImage($source, $destination, $quality) {

        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg') 
            $image = imagecreatefromjpeg($source);

        elseif ($info['mime'] == 'image/gif') 
            $image = imagecreatefromgif($source);

        elseif ($info['mime'] == 'image/png') 
            $image = imagecreatefrompng($source);

        imagejpeg($image, $destination, $quality);

        return $destination;
    }



 /*    Usage Of the above function
    $source_img = 'source.jpg';
    $destination_img = 'destination .jpg';

    $d = compressImage($source_img, $destination_img, 90);    
*/


}

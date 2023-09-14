<?php namespace App\Models;
use CodeIgniter\Model;
use Imagick;
use ImagickPixel;
use ImagickDraw;

class ImageModel extends Model {

    // Crop image
    public function crop($path, $filename) {
        echo $path, $filename;
        $imagick = new \Imagick($path.$filename);
        $width = $imagick->getImageWidth();
        $height = $imagick->getImageHeight();
        $imagick->cropImage($width/2, $height/2, $width/4, $height/4);
        $imagick->writeImage($path.'crop_'.$filename);
        $imagick->clear();
        $imagick->destroy();
        return 'crop_'.$filename;
    }

    // Resize image
    public function resize($path,$filename, $width, $height) {
      // add your code here
        $imagick = new \Imagick($path.$filename);
        $imagick->scaleImage($width, $height, true);
        $imagick->writeImage($path.'resize_'.$filename);
        $imagick->clear();
        $imagick->destroy();
        return 'resize_'.$filename;

    }

    // Rotate image
    public function rotate($path,$filename, $degrees) {
        $imagick = new \Imagick($path.$filename);
        $imagick->rotateImage(new \ImagickPixel(), $degrees);
        $imagick->writeImage($path.'rot_'.$filename);
        $imagick->clear();
        $imagick->destroy();
        return 'rot_'.$filename;
    }

    // Flip image
    public function flip($filename, $flip) {
        // add your code here
    }

    // Add text watermark
    public function addTextWatermark($path, $filename,$username) {
        // add your code here
        $imagick = new \Imagick($path.$filename);
        $draw = new ImagickDraw();

        /* Black text */
        $draw->setFillColor('black');

        /* Font properties */
        $draw->setFont('Bookman-DemiItalic');
        $draw->setFontSize( 45 );
        $width = $imagick->getImageWidth();
        $height = $imagick->getImageHeight();
        $imagick ->annotateImage($draw, $width*0.7, $height*0.95, 0, $username);
        $imagick->writeImage($path.'text_'.$filename);
        $imagick->clear();
        $imagick->destroy();
        return 'text_'.$filename;
    }

}

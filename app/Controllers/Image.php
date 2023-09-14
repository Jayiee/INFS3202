<?php

namespace App\Controllers;

class Image extends BaseController
{
    public function index()
    {
        echo view("testImage");
    }

    public function upload()
    {
        helper(['form', 'url']);
        
        $rules = [
            'image' => 'uploaded[image]|max_size[image,5120]|ext_in[image,jpg,jpeg,png,gif]',
        ];
        
        if ($this->validate($rules)) {
            $image = $this->request->getFile('image');
            $newName = $image->getRandomName();
            $path = ROOTPATH.'writable/uploads_photo/';
            $image->move($path,$newName);
            // $width = $this->request->getPost('width');
            // $height = $this->request->getPost('height');
            $imageModel = new ImageModel();

            // // Crop the image
            // $cropImage = $imageModel->crop($path,$newName);

            // // Rotate the image
            // $rotImage = $imageModel->rotate($path, $newName,90);

            $width = 300;
            $height = 300;
            // Resize the image
            // $resizeImage = $imageModel->resize($path,$newName,$width,$height);

            // Add text watermark
            $textImage = $imageModel->addTextWatermark($path,$newName);
            
            $data['success'] = 'Image uploaded successfully.';
            $data['original'] = '/project/writable/uploads/'.$newName;
            $data['original_info'] = new File(ROOTPATH.'writable/uploads/'.$newName); 
            $data['crop'] = '/project/writable/uploads/'.$cropImage;
            $data['rot'] = '/project/writable/uploads/'.$rotImage;            

            return view('testImage', $data);
        } else {
            $data['validation'] = $this->validator;
            return view('testImage', $data);
        }
    }
    public function getFiles()
    {
        helper(['form', 'url']);
        $path = 'uploads/';
        $files = scandir(WRITEPATH.$path);
        $data['files'] = $files;
		return view('image_form', $data);
    }

}

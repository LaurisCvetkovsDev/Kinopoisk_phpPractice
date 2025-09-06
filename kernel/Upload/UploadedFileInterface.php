<?php
namespace App\Kernel\Upload;
interface UploadedFileInterface
{
    public function move($path, $fileName = null);
    public function getExtention();
}
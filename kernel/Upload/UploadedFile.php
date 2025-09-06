<?php

namespace App\Kernel\Upload;

class UploadedFile implements UploadedFileInterface
{
    public function __construct(
        public readonly string $name,
        public readonly string $type,
        public readonly string $tmpName,
        public readonly int $error,
        public readonly int $size,
    ) {

    }
    public function move($path, $fileName = null)
    {
        $storagePath = APP_PATH . "/storage/$path";

        if (!is_dir($storagePath)) {
            mkdir($storagePath, 0777, true);
        }
        $fileName = $fileName ?? $this->randomFileName();
        $filePath = "$storagePath/$fileName";
        if (move_uploaded_file($this->tmpName, $filePath)) {
            return "storage/$path/$fileName";
        } else {
            return false;
        }
    }

    private function randomFileName()
    {
        return md5(uniqid(rand(), true)) . $this->getExtention();
    }
    public function getExtention()
    {
        return pathinfo($this->name, PATHINFO_EXTENSION);
    }
}
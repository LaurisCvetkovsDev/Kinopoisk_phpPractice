<?php

namespace App\Kernel\Http;

use App\Kernel\Upload\UploadedFile;
use App\Kernel\Upload\UploadedFileInterface;
use App\Kernel\Validator\ValidatorInterface;


class Request implements RequestInterface
{
    private ValidatorInterface $validator;

    public function __construct(
        public readonly array $get,
        public readonly array $post,
        public readonly array $server,
        public readonly array $files,
        public readonly array $cookies
    ) {
    }


    public static function createFromGlobals()
    {

        return new static($_GET, $_POST, $_SERVER, $_FILES, $_COOKIE);
    }

    public function uri()
    {
        return strtok($this->server['REQUEST_URI'], '?');
    }
    public function method()
    {
        return $this->server['REQUEST_METHOD'];
    }

    public function input($name, $deafault = null)
    {
        return $this->post[$name] ?? $this->get[$name] ?? $deafault;

    }

    public function setValidator($validator)
    {
        $this->validator = $validator;
    }
    public function validate($rules)
    {
        $data = [];
        foreach ($rules as $field => $rule) {
            $data[$field] = $this->input($field);
        }

        return $this->validator->validate($data, $rules);
    }
    public function errors()
    {
        return $this->validator->errors();
    }
    public function file(string $key, $deafault = null): ?UploadedFileInterface
    {
        if (!isset($this->files[$key])) {
            return null;
        }


        return new UploadedFile(
            $this->files[$key]['name'],
            $this->files[$key]['type'],
            $this->files[$key]['tmp_name'],
            $this->files[$key]['error'],
            $this->files[$key]['size'],
        );
    }
}
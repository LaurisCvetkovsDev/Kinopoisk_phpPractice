<?php
namespace App\Kernel\Auth;

class User
{

    public function __construct(
        private int $id,
        private string $email,
        private string $password,
        private string $name,
    ) {
    }
    public function id()
    {
        return $this->id;
    }
    public function email()
    {
        return $this->email;
    }
    public function password()
    {
        return $this->password;
    }
    public function name()
    {
        return $this->name;
    }

}
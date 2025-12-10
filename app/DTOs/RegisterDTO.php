<?php
namespace App\DTOs;

class RegisterDTO
{
    public function __construct(
        public string $username,
        public string $password,
        public string $name
    ){}
}

?>
<?php
namespace App\DTOs;

class LoginDto
{
    public function __construct(
        public string $username,
        public string $password
    ){}
}
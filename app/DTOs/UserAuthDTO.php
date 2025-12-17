<?php
namespace App\DTOs;

class UserAuthDTO
{
    public function __construct(
        public int $id,
        public string $username,
        public string $name,
        public array $roles
    ){}
}
?>
<?php

declare(strict_types=1);

namespace App;

class UserEntity
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public int $age
    ) {}
}


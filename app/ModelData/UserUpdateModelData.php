<?php

namespace App\ModelData;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

final class UserUpdateModelData
{
    public function __construct(
        public ?string $email,
        public ?string $name,
        public ?UploadedFile $profilePicture,
        public ?string $password,
        public ?string $status,
    )
    {

    }

}

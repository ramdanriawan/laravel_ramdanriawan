<?php

namespace App\ModelData;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

final class UserSaveModelData
{
    public function __construct(
        public ?string $username,
        public ?string $email,
        public ?string $name,
        public ?UploadedFile $profilePicture,
        public ?string $password,
        public ?string $level,
    )
    {

    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     */
    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string|null
     */
    public function getLevel(): ?string
    {
        return $this->level;
    }

    /**
     * @param string|null $level
     */
    public function setLevel(?string $level): void
    {
        $this->level = $level;
    }

    /**
     * @return UploadedFile|null
     */
    public function getProfilePicture(): ?UploadedFile
    {
        return $this->profilePicture;
    }

    /**
     * @param UploadedFile|null $profilePicture
     */
    public function setProfilePicture(?UploadedFile $profilePicture): void
    {
        $this->profilePicture = $profilePicture;
    }
}

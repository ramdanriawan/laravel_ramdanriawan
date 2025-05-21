<?php

namespace App\ModelData;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

final class HospitalUpdateModelData
{
    /**
     * @return string|null
     */
    public function getHospitalName(): ?string
    {
        return $this->hospitalName;
    }

    /**
     * @param string|null $hospitalName
     * @return HospitalUpdateModelData
     */
    public function setHospitalName(?string $hospitalName): HospitalUpdateModelData
    {
        $this->hospitalName = $hospitalName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     * @return HospitalUpdateModelData
     */
    public function setAddress(?string $address): HospitalUpdateModelData
    {
        $this->address = $address;
        return $this;
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
     * @return HospitalUpdateModelData
     */
    public function setEmail(?string $email): HospitalUpdateModelData
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     * @return HospitalUpdateModelData
     */
    public function setPhone(?string $phone): HospitalUpdateModelData
    {
        $this->phone = $phone;
        return $this;
    }



    public function __construct(
        public ?string $hospitalName,
        public ?string $address,
        public ?string $email,
        public ?string $phone,
    )
    {

    }
}

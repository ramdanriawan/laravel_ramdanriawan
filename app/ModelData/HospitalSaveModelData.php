<?php

namespace App\ModelData;

final class HospitalSaveModelData
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
     * @return HospitalSaveModelData
     */
    public function setHospitalName(?string $hospitalName): HospitalSaveModelData
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
     * @return HospitalSaveModelData
     */
    public function setAddress(?string $address): HospitalSaveModelData
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
     * @return HospitalSaveModelData
     */
    public function setEmail(?string $email): HospitalSaveModelData
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
     * @return HospitalSaveModelData
     */
    public function setPhone(?string $phone): HospitalSaveModelData
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

<?php

namespace App\ModelData;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

final class PatientUpdateModelData
{
    /**
     * @return string|null
     */
    public function getHospitalId(): ?string
    {
        return $this->hospitalId;
    }

    /**
     * @param string|null $hospitalId
     * @return PatientUpdateModelData
     */
    public function setHospitalId(?string $hospitalId): PatientUpdateModelData
    {
        $this->hospitalId = $hospitalId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPatientName(): ?string
    {
        return $this->patientName;
    }

    /**
     * @param string|null $patientName
     * @return PatientUpdateModelData
     */
    public function setPatientName(?string $patientName): PatientUpdateModelData
    {
        $this->patientName = $patientName;
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
     * @return PatientUpdateModelData
     */
    public function setAddress(?string $address): PatientUpdateModelData
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
     * @return PatientUpdateModelData
     */
    public function setEmail(?string $email): PatientUpdateModelData
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
     * @return PatientUpdateModelData
     */
    public function setPhone(?string $phone): PatientUpdateModelData
    {
        $this->phone = $phone;
        return $this;
    }

    public function __construct(
        public ?string $hospitalId,
        public ?string $patientName,
        public ?string $address,
        public ?string $email,
        public ?string $phone,
    )
    {

    }
}

<?php

namespace App\ModelData;

final class PatientSaveModelData
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
     * @return PatientSaveModelData
     */
    public function setHospitalId(?string $hospitalId): PatientSaveModelData
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
     * @return PatientSaveModelData
     */
    public function setPatientName(?string $patientName): PatientSaveModelData
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
     * @return PatientSaveModelData
     */
    public function setAddress(?string $address): PatientSaveModelData
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
     * @return PatientSaveModelData
     */
    public function setEmail(?string $email): PatientSaveModelData
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
     * @return PatientSaveModelData
     */
    public function setPhone(?string $phone): PatientSaveModelData
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

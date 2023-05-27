<?php

namespace App\Models;

class PatientRequest extends Model {
    private $patient;
    private $conect;

    public function __construct($conect = null) {
        $this->conect = $conect;
    }
    public function where($field, $op, $value) {
        return mysqli_fetch_assoc($this->conect->get('patient_requests', "$field $op $value"));
    }
}
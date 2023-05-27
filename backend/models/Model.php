<?php

namespace App\Models;

class Model {
    protected $members = [];

    public function __set($name, $value) {
        $this->members[$name] = $value;
    }

    public function __get($name) {
        if (array_key_exists($name, $this->members)) {
            return $this->members[$name];
        }
        return null;
    }

    public function setAllMembers($row) {

        foreach ($row as $key => $value) {
            $this->members[$key] = $value;
        }

        // $_SESSION['patient_id'] = $row['id'];
        // $_SESSION['patient_name'] = $row['name'];
        // $_SESSION['patient_email'] = $row['email'];
        // $_SESSION['patient_address'] = $row['address'];
        // $_SESSION['patient_phone'] = $row['phone'];
        // $_SESSION['patient_blood_type'] = $row['blood_type'];
        // $_SESSION['patient_image'] = $row['image'];

        // $_SESSION['donor_id'] = $row['id'];
        // $_SESSION['donor_name'] = $row['name'];
        // $_SESSION['donor_email'] = $row['email'];
        // $_SESSION['donor_address'] = $row['address'];
        // $_SESSION['donor_phone'] = $row['phone'];
        // $_SESSION['donor_blood_type'] = $row['blood_type'];
        // $_SESSION['donor_image'] = $row['image'];

        // $_SESSION['admin_id'] = $row['id'];
        // $_SESSION['admin_name'] = $row['name'];
        // $_SESSION['admin_email'] = $row['email'];
        // $_SESSION['admin_image'] = $row['image'];
    }
}

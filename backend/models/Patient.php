<?php

namespace App\Models;
use App\Core\Request;

class Patient extends Model {
    private $patient;
    private $conect;

    public function __construct($conect = null) {
        $this->conect = $conect;
    }

    public function where($field, $op, $value) {
        return mysqli_fetch_assoc($this->conect->get('patients', "$field $op $value"));
    }

    public function prepare($conect) {
        $patient = new self;
        $patient->fname = $conect->escapeString(Request::get('fname'));
        $patient->lname = $conect->escapeString(Request::get('lname'));
        $patient->email = $conect->escapeString(Request::get('email'));
        $patient->blood = $conect->escapeString(Request::get('blood'));
        $patient->password = $conect->escapeString(Request::get('password'));
        $patient->password = crypt($patient->password, PASSWORD_DEFAULT);
        $patient->phone = $conect->escapeString(Request::get('phone'));
        $patient->address = $conect->escapeString(Request::get('address'));
        $patient->image = $conect->escapeString(Request::get('image'));

        $this->patient = $patient;
        $this->conect = $conect;
        return $patient;
    }

    public function save() {
        if (isset($this->conect))
            return $this->conect->insertInto('patients', "name='{$this->patient->fname} {$this->patient->lname}',email='{$this->patient->email}',password='{$this->patient->password}',address='{$this->patient->address}',phone='{$this->patient->phone}',blood_type='{$this->patient->blood}',image='{$this->patient->image}'");
        else
            return null;
    }

    public function get() {
        if (isset($this->conect)) {
            $result = $this->conect->get('patients', "email = '{$this->patient->email}'");
            if ($row = mysqli_fetch_assoc($result)) {
                $this->patient = new Patient;
                $this->patient->setAllMembers($row);
                return $this->patient;
            } else {
                throw new \Exception('Does not fetch!');
            }
        }
        else
            return null;
    }
}
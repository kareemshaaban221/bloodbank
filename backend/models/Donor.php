<?php

namespace App\Models;
use App\Core\Request;

class Donor extends Model {
    private $donor;
    private $conect;

    public function prepare($conect) {
        $donor = new Donor;
        $donor->fname = $conect->escapeString(Request::get('fname'));
        $donor->lname = $conect->escapeString(Request::get('lname'));
        $donor->email = $conect->escapeString(Request::get('email'));
        $donor->blood = $conect->escapeString(Request::get('blood'));
        $donor->password = $conect->escapeString(Request::get('password'));
        $donor->password = crypt($donor->password, PASSWORD_DEFAULT);
        $donor->phone = $conect->escapeString(Request::get('phone'));
        $donor->address = $conect->escapeString(Request::get('address'));
        $donor->image = $conect->escapeString(Request::get('image'));

        $this->donor = $donor;
        $this->conect = $conect;
        return $donor;
    }

    public function save() {
        if (isset($this->conect))
            return $this->conect->insertInto('donors', "name='{$this->donor->fname} {$this->donor->lname}',email='{$this->donor->email}',password='{$this->donor->password}',address='{$this->donor->address}',phone='{$this->donor->phone}',blood_type='{$this->donor->blood}',image='{$this->donor->image}'");
        else
            return null;
    }
}
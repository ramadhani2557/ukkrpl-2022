<?php

namespace App\Controllers;

use App\Models\User_model;
use App\Models\CatatanPerjalanan_model;
use Config\Services;

class CatatanPerjalanan extends BaseController
{
    function __construct()
    {
        Services::session();
    }

    public function index()
    {
        if (!Services::session()->get("nik")) {
            return redirect()->to(base_url('/login'));
        }

        $data = [
            "userdata" => user_model::findbyNIK(Services::session()->get("nik")),
            "catatan_perjalanan" => CatatanPerjalanan_model::get_byNIK(Services::session()->get("nik"))
        ];

        $userdata = user_model::findbyNIK(Services::session()->get("nik"));
        return view("catatan_perjalanan", $data);
    }
}
<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class CobaController extends Controller{

    protected $request;

    public function __construct(Request $request)
    {

        $this->request = $request;

    }

   public function gombal() {
        $Request1=$this->request->all();
        $Request2=$this->request->get("addres");

        dd($Request1,$Request2);
   }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ModificarMaterialesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show()
    {
    	return View('ModificarMateriales');
    }

    public function index()
    {

    	return View('ModificarMateriales');
    }

}

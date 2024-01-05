<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Services\Post\Service;

class BaseController extends Controller
{
    
    public $_service;

    public function __construct(Service $service){
        // $this->middleware('auth');
        $this->_service = $service;
    }
}
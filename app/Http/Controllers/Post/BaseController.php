<?php

namespace App\Http\Controllers\Post;

use App\Services\Post\Service;

class BaseController{

    public $_service;

    public function __construct(Service $service){
        $this->_service = $service;
    }
}
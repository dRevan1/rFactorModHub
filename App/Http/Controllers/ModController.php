<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;

class ModController extends AControllerBase
{

    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action)
    {
        return true;
    }

    public function index(): Response
    {
    }

    public function mod(): Response
    {
        return $this->html();
    }

    public function create(): Response {
        return $this->html();
    }

    public function edit(): Response
    {
        return $this->html();
    }

    public function delete(): Response
    {
        return $this->html();
    }

    public function save()
    {

    }
}
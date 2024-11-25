<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;

class VehiclesController extends AControllerBase
{

    /**
     * @inheritDoc
     */
    public function index(): Response
    {
    }

    public function authorize($action)
    {
        return true;
    }

    public function vehicles(): Response
    {
        return $this->html();
    }
}
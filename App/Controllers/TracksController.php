<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;

class TracksController extends AControllerBase
{
    public function index(): Response
    {
    }

    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action)
    {
        return true;
    }

    public function tracks(): Response
    {
        return $this->html();
    }
}
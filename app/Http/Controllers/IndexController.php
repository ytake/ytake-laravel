<?php

namespace App\Http\Controllers;

/**
 * Class IndexController
 * @Middleware("web")
 */
class IndexController extends Controller
{
    /**
     * @Get("/", as="index")
     */
    public function index()
    {
        return view('index');
    }
}

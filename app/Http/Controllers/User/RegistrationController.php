<?php

namespace App\Http\Controllers\User;

use App\Annotation\Valid;
use App\Services\UserRegister;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class RegistrationController
 * @Middleware("web")
 */
class RegistrationController extends Controller
{
    /**
     * @Get("/user/form", as="user.form")
     */
    public function form()
    {
        return view('user.form');
    }

    /**
     * @Post("/user/confirm", as="user.confirm")
     * @Valid(
     *     request=\App\Http\Requests\User\RegistrationRequest::class
     * )
     */
    public function confirm()
    {
        return view('user.confirm');
    }

    /**
     * @Post("/user/apply", as="user.apply")
     * @param \Illuminate\Http\Request   $request
     * @param \App\Services\UserRegister $service
     *
     * @return mixed
     */
    public function apply(Request $request, UserRegister $service)
    {
        if ($request->get('_return')) {
            return redirect()->route('user.form')->withInput();
        }
        $service->register($request->get('name'), $request->get('email'));
        // to redirect...
    }
}

<?php
declare (strict_types = 1);

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

/**
 * Class RegistrationRequest
 */
class RegistrationRequest extends Request
{
    /** @var string */
    protected $redirectRoute = 'user.form';

    /**
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules() : array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
        ];
    }
}

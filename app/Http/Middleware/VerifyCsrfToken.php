<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
       //'user/login',
       //'fems_admin/login',
       'api/user/register',
       'api/client/otp/validate',
       'api/client/resend/otp',
       'api/client/email/validate',
       'api/user/validate_email',
       'api/user/validate_phone'
    ];
}

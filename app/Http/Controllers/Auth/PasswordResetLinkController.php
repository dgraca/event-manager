<?php

namespace App\Http\Controllers\Auth;

use Laravel\Fortify\Contracts\FailedPasswordResetLinkRequestResponse;
use Laravel\Fortify\Contracts\SuccessfulPasswordResetLinkRequestResponse;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController as FortifyPasswordResetLinkController;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Responsable;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Password;

/**
 * TODO ISTO NÂO ESTÀ EM USO E PENSO QUE COM O MIDDLEWARE RESOLVI O ASSUNTO E NÂO PRECISO DESTE CONTROLLER PARA O RECAPTCHA
 * Override class to enable recaptcha for page to recover password
 */
class PasswordResetLinkController extends FortifyPasswordResetLinkController
{
    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Responsable
     */
    public function store(Request $request): Responsable
    {
        $request->validate([
            Fortify::email() => 'required|email',
            'g-recaptcha-response' => config('recaptchav3.enable') ? ['required', 'recaptchav3:forgotPassword,0.5'] : '',
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = $this->broker()->sendResetLink(
            $request->only(Fortify::email())
        );

        return $status == Password::RESET_LINK_SENT
            ? app(SuccessfulPasswordResetLinkRequestResponse::class, ['status' => $status])
            : app(FailedPasswordResetLinkRequestResponse::class, ['status' => $status]);
    }
}

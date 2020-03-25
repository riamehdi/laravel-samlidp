<?php

namespace CodeGreenCreative\SamlIdp\Listeners;

use CodeGreenCreative\SamlIdp\Jobs\SamlSso;
use CodeGreenCreative\SamlIdp\Traits\SamlParameters;
use Illuminate\Auth\Events\Login;

class SamlLogin
{
    use SamlParameters;

    /**
     * Listen for the Authenticated event
     *
     * @param  Authenticated $event [description]
     * @return [type]               [description]
     */
    public function handle(Login $event)
    {
        if ($this->hasSamlRequest() && !request()->is('saml/logout')) {
            abort(response(SamlSso::dispatchNow()), 302);
        }
    }
}

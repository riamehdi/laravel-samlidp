<?php

namespace CodeGreenCreative\SamlIdp\Listeners;

use CodeGreenCreative\SamlIdp\Jobs\SamlSso;
use CodeGreenCreative\SamlIdp\Traits\SamlParameters;
use Illuminate\Auth\Events\Authenticated;

class SamlAuthenticated
{
    use SamlParameters;

    /**
     * Listen for the Authenticated event
     *
     * @param  Authenticated $event [description]
     * @return [type]               [description]
     */
    public function handle(Authenticated $event)
    {
        if ($this->hasSamlRequest() && !request()->is('saml/logout') && request()->isMethod('get')) {
            abort(response(SamlSso::dispatchNow()), 302);
        }
    }
}

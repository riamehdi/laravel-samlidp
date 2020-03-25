<?php

namespace CodeGreenCreative\SamlIdp\Traits;

trait SamlParameters
{
    /**
     * Get SAML request
     * 
     * @return string
     */
    public function getSamlRequest()
    {
        return gzinflate(base64_decode(session()->get('protocol.parameters.SAMLRequest')));
        // return gzinflate(base64_decode(request('SAMLRequest')));
    }
 
     /**
     * Check if a SAML parameter has been received
     * 
     * @return boolean
     */
    public function hasSamlRequest()
    {
        return session()->has('protocol.parameters.SAMLRequest');
        // return request()->filled('SAMLRequest');
    }

    /**
     * Get SAML reponse
     * 
     * @return string
     */
    public function getSamlResponse()
    {
        return gzinflate(base64_decode(session()->get('protocol.parameters.SAMLResponse')));
        // return gzinflate(base64_decode(request('SAMLResponse')));
    }
 
     /**
     * Check if a SAML parameter has been received
     * 
     * @return boolean
     */
    public function hasSamlResponse()
    {
        return session()->has('protocol.parameters.SAMLResponse');
        // return request()->filled('SAMLResponse');
    }

    /**
     * Get SAML reponse
     * 
     * @return string
     */
    public function getSamlRelayState()
    {
        return session()->get('protocol.parameters.RelayState');
        // return request('RelayState');
    }
}

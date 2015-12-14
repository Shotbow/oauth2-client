<?php

namespace Shotbow\OAuth2;

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Token\AccessToken;
use Psr\Http\Message\ResponseInterface;

class Shotbow extends AbstractProvider
{
    /** Basic User Information - Required Scope */
    const SCOPE_BASIC = 'basic';

    /** User's Email Address */
    const SCOPE_EMAIL = 'email';

    /** User's ban status & reason */
    const SCOPE_BANNED = 'ban';

    /** Player's online status, current server, and coordinates */
    const SCOPE_LOCATION = 'location';

    /** Player's Permission Groups */
    const SCOPE_RANK = 'rank';

    /** Player Report API */
    const SCOPE_REPORT = 'report';

    private function getBaseOAuthUrl()
    {
        return 'https://shotbow.net/forum/oauth2';
    }

    /**
     * Returns the base URL for authorizing a client.
     *
     * Eg. https://oauth.service.com/authorize
     *
     * @return string
     */
    public function getBaseAuthorizationUrl()
    {
        return $this->getBaseOAuthUrl();
    }

    /**
     * Returns the base URL for requesting an access token.
     *
     * Eg. https://oauth.service.com/token
     *
     * @param array $params
     *
     * @return string
     */
    public function getBaseAccessTokenUrl(array $params)
    {
        return $this->getBaseOAuthUrl().'/access_token';
    }

    /**
     * Returns the URL for requesting the resource owner's details.
     *
     * @param AccessToken $token
     *
     * @return string
     */
    public function getResourceOwnerDetailsUrl(AccessToken $token)
    {
        return $this->getBaseOAuthUrl().'/me?access_token='.$token;
    }

    /**
     * Returns the default scopes used by this provider.
     *
     * This should only be the scopes that are required to request the details
     * of the resource owner, rather than all the available scopes.
     *
     * @return array
     */
    protected function getDefaultScopes()
    {
        return ['basic'];
    }

    /**
     * Checks a provider response for errors.
     *
     *
     * @param ResponseInterface $response
     * @param array|string      $data     Parsed response data
     *
     * @throws IdentityProviderException
     *
     * @return void
     */
    protected function checkResponse(ResponseInterface $response, $data)
    {
        if (!empty($data['error'])) {
            $message = $data['message'];
            throw new IdentityProviderException($message, -1, $data);
        }
    }

    /**
     * Generates a resource owner object from a successful resource owner
     * details request.
     *
     * @param array       $response
     * @param AccessToken $token
     *
     * @return ResourceOwnerInterface
     */
    protected function createResourceOwner(array $response, AccessToken $token)
    {
        return new ShotbowPlayer($response);
    }

    /** {@inheritdoc} */
    public function getScopeSeparator()
    {
        return ' ';
    }
}

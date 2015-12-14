<?php

require_once '../vendor/autoload.php';

session_start();

$provider = new \Shotbow\OAuth2\Shotbow(
    [
        'clientId'     => 'REQUIRED',
        'clientSecret' => 'REQUIRED',
        'redirectUri'  => 'REQUIRED',
    ]
);

if (!isset($_GET['code'])) {
    $authUrl = $provider->getAuthorizationUrl();

    $_SESSION['oauth2state'] = $provider->getState();
    session_write_close();

    header('Location: '.$authUrl);
} elseif (empty($_GET['state']) || $_GET['state'] !== $_SESSION['oauth2state']) {
    unset($_SESSION['oauth2state']);
    exit('Invalid State');
} else {
    header('Content-Type: text/plain');
    $accessToken = $provider->getAccessToken('authorization_code', ['code' => $_GET['code']]);

    var_dump($accessToken);

    $resourceOwner = $provider->getResourceOwner($accessToken);

    var_export($resourceOwner->toArray());
}

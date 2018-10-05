<?php

namespace App;


use PragmaRX\Google2FA\Google2FA;

class TwoFactorAuth
{
    private $secretKey;

    private $keySize = 32;

    private $keyPrefix = '';

    private $user;

    public $google2fa;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->google2fa = new Google2FA();
        $this->secretKey = $this->google2fa->generateSecretKey($this->keySize, $this->keyPrefix);
    }

    public function getSecretKey()
    {
        return $this->secretKey;
    }

    /**
     * @param $key
     * @return mixed
     * @throws \PragmaRX\Google2FA\Exceptions\InsecureCallException
     */
    public function getGoogleUrl()
    {
        $this->google2fa->setAllowInsecureCallToGoogleApis(true);

        return $this->google2fa->getQRCodeGoogleUrl(
            $this->user->company ?: $this->user->username,
            $this->user->email,
            $this->secretKey
        );
    }

    public function getInlineUrl()
    {
        return $this->google2fa->getQRCodeUrl(
            $this->user->company ?: $this->user->username,
            $this->user->email,
            $this->secretKey
        );
    }

}
<?php

namespace Shotbow\OAuth2;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;

class ShotbowPlayer implements ResourceOwnerInterface
{
    const RANK_STAFF_ADMINISTRATOR = '3';
    const RANK_APPEARANCE_ADMINISTRATOR = '172';
    const RANK_PRIVILEGE_ANNIHILATION = '133';
    const RANK_STAFF_BAC = '34';
    const RANK_REVOCATION_BANNED = '166';
    const RANK_REVOCATION_APPEAL = '40';
    const RANK_BIG_SPENDER = '37';
    const RANK_REVOCATION_CHAT = '127';
    const RANK_STAFF_CHATBOT = '67';
    const RANK_PREMIUM_EMERALD = '22';
    const RANK_PRIVILEGE_GG = '160';
    const RANK_PREMIUM_GOLD = '10';
    const RANK_PRIVILEGE_GOLDRUSH = '187';
    const RANK_STAFF_GRAPHIC_ARTIST = '154';
    const RANK_STAFF_HCFADMIN = '43';
    const RANK_STAFF_HCFWATCHER = '130';
    const RANK_MEDIA = '181';
    const RANK_PRIVILEGE_MINEZ2 = '142';
    const RANK_PRIVILEGE_MINEZ = '139';
    const RANK_STAFF_MINI = '64';
    const RANK_STAFF_MODERATOR = '4';
    const RANK_PRIVILEGE_MINETHEFTAUTO = '184';
    const RANK_PREMIUM_OBSIDIAN = '25';
    const RANK_PREMIUM_PLATINUM = '7';
    const RANK_STAFF_PRP = '58';
    const RANK_STAFF_QUBIONBT = '175';
    const RANK_PRIVILEGE_QUBION = '178';
    const RANK_REGISTERED = '2';
    const RANK_STAFF_RETIRED = '148';
    const RANK_PREMIUM_SILVER = '19';
    const RANK_PRIVILEGE_SMASH = '136';
    const RANK_VERIFICATION_NONE = '1';
    const RANK_VERIFICATION_EMAIL = '31';
    const RANK_PRIVILEGE_WASTED = '169';
    const RANK_STAFF_WIKIADMIN = '52';

    /** @var array */
    private $attributes;

    public function __construct($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Returns the identifier of the authorized resource owner.
     *
     * @return int
     */
    public function getId()
    {
        return $this->getShotbowId();
    }

    /** @return int */
    public function getShotbowId()
    {
        return $this->attributes['shotbow_id'];
    }

    /** @return int */
    public function getXenforoId()
    {
        return $this->attributes['owner_id'];
    }

    /** @return string */
    public function getUsername()
    {
        return $this->attributes['name'];
    }

    /** @return string Dashless UUID */
    public function getMinecraftId()
    {
        return $this->attributes['minecraftId'];
    }

    /**
     * Requires email scope.
     *
     * @return string|null Returns null if you do not have the email scope
     */
    public function getEmail()
    {
        return $this->hasScope('email') ? $this->attributes['email'] : null;
    }

    /**
     * @param $scope
     *
     * @return bool
     */
    protected function hasScope($scope)
    {
        return array_key_exists($scope, $this->attributes['scopes']);
    }

    /**
     * @param string $rank One of the RANK_ constants
     *
     * @throws \RuntimeException When requested without having a rank scope
     *
     * @return bool
     */
    public function hasRank($rank)
    {
        if (!$this->hasScope('rank')) {
            throw new \RuntimeException('RANK Scope Required');
        }

        return in_array($rank, $this->attributes['ranks']);
    }

    /**
     * Return all of the owner details available as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->attributes;
    }
}

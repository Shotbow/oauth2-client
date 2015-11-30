<?php
namespace Shotbow\OAuth2;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;

class ShotbowPlayer implements ResourceOwnerInterface
{
    private $attributes;

    public function __construct($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Returns the identifier of the authorized resource owner.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->attributes['shotbow_id'];
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

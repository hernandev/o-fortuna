<?php

namespace O\Fortuna\Common;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Class BillingAddress.
 *
 * Common address implementation.
 *
 * @property string $country    ISO 3166-1 alfa-2 or alfa-2 country code.
 * @property string $street     Address street / venue.
 * @property string $number     Address number.
 * @property string $complement Address complement.
 * @property string $district   Address district / neighborhood.
 * @property string $city       Address city name.
 * @property string $state      Address State, if applicable.
 * @property string $zip        Address zip code.
 * @property string $cityCode   Address city, for countries where cities have numeric codes (like Brazil's IBGE).)
 */
class BillingAddress implements Arrayable
{
    /**
     * @var array Values on the billing address bag.
     */
    protected $values = [
        'country'      => null,
        'street'       => null,
        'number'       => null,
        'complement'   => null,
        'district'     => null,
        'city'         => null,
        'state'        => null,
        'zip'          => null,
        'cityCode'     => null,
    ];

    /**
     * Address attribute setter.
     *
     * @param string $attribute Attribute to set.
     * @param string $value     Value to set.
     */
    public function __set(string $attribute, $value)
    {
        if (array_key_exists($attribute, $this->values)) {
            $this->values[$attribute] = $value;
        }
    }

    /**
     * Address attribute getter.
     *
     * @param string $name attribute being retrieved.
     *
     * @return mixed
     */
    public function __get(string $name)
    {
        return array_get($this->values, $name, null);
    }

    /**
     * @return array Array representation of the address.
     */
    public function toArray()
    {
        return $this->values;
    }
}
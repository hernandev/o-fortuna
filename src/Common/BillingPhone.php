<?php

namespace O\Fortuna\Common;

use Illuminate\Support\Str;

/**
 * Class BillingPhone.
 *
 * Common/base phone number implementation (billing phone).
 */
class BillingPhone
{
    /**
     * @var string Phone country code.
     */
    protected $countryCode = null;

    /**
     * @var string|null Phone area code.
     */
    protected $areaCode = null;

    /**
     * @var string|null The phone number itself.
     */
    protected $number = null;

    /**
     * BillingPhone constructor.
     *
     * @param string|null $number      Phone number, may include area code.
     * @param string|null $areaCode    Phone area code, optional.
     * @param string|null $countryCode Country code, optional.
     */
    public function __construct(string $number, string $areaCode = null, string $countryCode = null)
    {
        // set number on class scope.
        $this->number = $number;

        // set number area code.
        $this->areaCode = $areaCode;

        // set number area code.
        $this->countryCode = $countryCode;
    }

    /**
     * @return string Phone number concatenated with the area code.
     */
    protected function numberWithAreaCode()
    {
        return ($this->areaCode ?? '').($this->number ?? '');
    }

    /**
     * Format the number into a E164 valid string, when possible.
     *
     * @return null|string E164 formatted number string.
     */
    public function E164() : ?string
    {
        // get the number with the area code.
        $number = $this->numberWithAreaCode();

        // return null if not present or empty string.
        if (!$number) {
            return null;
        }

        // remove special characters from the phone number.
        $number = preg_replace('/\D/', '', (string) ($number ?? null));

        // when there is a country code present.
        if ($this->countryCode && (Str::length($this->countryCode) <= 4)) {
            // include the country prefix.
            return ($this->countryCode ?? '').($number ?? '');
        }

        // return the number as it is.
        return $number;
    }

    /**
     * Serialize the number as string.
     *
     * @return null|string E164 serialized number.
     */
    public function __toString()
    {
        return $this->E164() ?? '';
    }
}
<?php

namespace O\Fortuna\Common;

use O\Fortuna\Contracts\Merchants\Merchant;

/**
 * Abstract Class MerchantValidator.
 *
 * Validates a given merchant's data for a issuer requirements.
 */
abstract class MerchantValidator
{
    /**
     * @var Merchant Merchant instance to validate.
     */
    protected $merchant;

    /**
     * MerchantValidator constructor.
     *
     * @param Merchant $merchant Merchant instance.
     */
    public function __construct(Merchant $merchant)
    {
        $this->merchant = $merchant;
    }

    /**
     * Abstract validation method to be implemented on a issue basis.
     *
     * @return bool Is the merchant data valid or not for an issuer.
     */
    abstract public function isValid() : bool;
}
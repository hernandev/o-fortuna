<?php

namespace O\Fortuna\Contracts\BankSlips;

use Illuminate\Contracts\Validation\Validator;
use O\Fortuna\Contracts\Merchants\Merchant;

/**
 * Interface GenericMethodIssuer.
 *
 * Base interface with common methods for accreditation on most invoice issuers.
 */
interface GenericMethodIssuer
{
    /**
     * BankSlipIssuer constructor.
     *
     * @param Merchant $merchant
     */
    public function __construct(Merchant $merchant);

    /**
     * @return string Issuer alias.
     */
    public function getAlias() : string;

    /**
     * Validates a given merchant data against the issuer rules for accreditation.
     *
     * @return Validator The validator instance which will return errors and validation status.
     */
    public function merchantValidator() : Validator;

    /**
     * @return bool Returns true if a given merchant is accredited on the current provider.
     */
    public function isMerchantAccredited() : bool;

    /**
     * Accredit a given merchant on the issuer.
     *
     * @return bool Accreditation process status.
     */
    public function accreditMerchant() : bool;

    /**
     * @return Merchant Merchant instance on the issuer.
     */
    public function getMerchant() : Merchant;
}
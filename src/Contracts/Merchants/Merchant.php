<?php

namespace O\Fortuna\Contracts\Merchants;

use O\Fortuna\Common\BankAccount;
use O\Fortuna\Common\BillingPhone;

/**
 * Interface Merchant.
 *
 * Interface which all entities who may issue invoices and/or receive payments must adhere.
 */
interface Merchant
{
    /**
     * @return string|null Merchant's legal name (legal name)
     */
    public function getMerchantName() : ?string;

    /**
     * @return string|null Merchant's country register (incorporation number, or other legal company id).
     */
    public function getMerchantDocument() : ?string;

    /**
     * @return string|null Merchant's email.
     */
    public function getMerchantEmail() : ?string;

    /**
     * @return BillingPhone|null Merchant's phone number instance.
     */
    public function getMerchantPhone() : ?BillingPhone;

    /**
     * @return BankAccount|null Merchant's bank account instance.
     */
    public function getMerchantBankAccount() : ?BankAccount;

    /**
     * Set additional information on the merchant object.
     *
     * Notice the issuer being required, since metadata is intended to hold a given issuer specific information.
     *
     * @param string $issuer
     * @param string $attribute
     * @param string $value
     *
     * @return mixed
     */
    public function setMerchantMetadata(string $issuer, string $attribute, string $value) : bool;

    /**
     * Gets metadata from the merchant instance.
     *
     * Notice the issuer being required, since metadata is intended to hold a given issuer specific information.
     *
     * @param string $issuer
     * @param string $attribute
     *
     * @return string|null
     */
    public function getMerchantMetadata(string $issuer, string $attribute) : ?string;
}
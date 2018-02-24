<?php

namespace O\Fortuna\Contracts\Customers;

use O\Fortuna\Common\BillingAddress;
use O\Fortuna\Common\BillingPhone;

/**
 * Interface Formatter
 *
 * Simple interface to format a billable information into a normalized format.
 *
 * This interface provides the minimal set of methods required by must invoice issuers.
 */
interface Formatter
{
    /**
     * @return null|string Internal type (class).
     */
    public function getInternalType() : ?string;

    /**
     * @return null|string Internal friendly name for the type.
     */
    public function getInternalTypeLabel() : ?string;

    /**
     * @return null|string Internal / public id for the billable.
     */
    public function getInternalId() : ?string;

    /**
     * @return null|string Friendly label, most of the times will be the name itself.
     */
    public function getInternalLabel() : ?string;

    /**
     * @return null|string Billing unique code, for easily manage integrations (internal code, not gateway provided).
     */
    public function getCode() : ?string;

    /**
     * @return null|string Billable name (legal name).
     */
    public function getName() : ?string;

    /**
     * @return null|string Billable legal document.
     */
    public function getDocument() : ?string;

    /**
     * @return null|string Billable email (this will be used mainly for gateway notifications).
     */
    public function getEmail() : ?string;

    /**
     * @return null|BillingPhone The customer home number instance.
     */
    public function getHomePhone() : ?BillingPhone;

    /**
     * @return null|BillingPhone The Customer mobile number instance.
     */
    public function getMobilePhone() : ?BillingPhone;

    /**
     * @return null|BillingAddress Customer address instance.
     */
    public function getBillingAddress() : ?BillingAddress;
}
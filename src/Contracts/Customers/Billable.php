<?php

namespace O\Fortuna\Contracts\Customers;

/**
 * Interface Billable
 *
 * Define a simple contract that an entity which invoices will be issued to.
 */
interface Billable
{
    /**
     * @return int|null Internal ID may hold database identification of a given billable.
     */
    public function getBillingInternalId(): ?int;

    /**
     * @return string|null Internal type may be used for local class mapping / discovery.
     */
    public function getBillingInternalType(): ?string;

    /**
     * @return string|null Same as Internal ID, but a public ID that may be used on invoices and integrations.
     */
    public function getBillingInternalPublicId(): ?string;

    /**
     * Returns the integration ID for a given billing provider.
     *
     * The integration id is created by the invoice issuer, not internally.
     *
     * @return string
     */
    public function getBillingIdentifier() : ?string;

    /**
     * Does the billable has a billing identifier?
     *
     * @return bool
     */
    public function hasBillingIdentifier() : bool;

    /**
     * Store on the billable, it's identifier for a given billing provider.
     *
     * @param string $identifier The identifier itself.
     *
     * @return bool Either the operation was successful or not.
     */
    public function setBillingIdentifier(string $identifier) : bool;

    /**
     * @return string The preferred payment method of the billable.
     */
    public function getBillingMethod() : string;

    /**
     * Set a preferred payment method on a billable.
     *
     * @param string $method The method to set as preferred.
     *
     * @return bool If setting it was successfully or not.
     */
    public function setBillingMethod($method = 'bank_slip') : bool;

    /**
     * @return string An alias type of the billable, to help identify a billable.
     */
    public function getBillableType() : string;
}
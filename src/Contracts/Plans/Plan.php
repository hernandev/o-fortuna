<?php

namespace O\Fortuna\Contracts\Plans;

use Illuminate\Contracts\Support\Arrayable;
use O\Fortuna\Features\FeatureSchema;
use O\Fortuna\Items\Generic;

/**
 * Interface Plan.
 */
interface Plan extends Arrayable
{
    /**
     * @return null|string Special taxing options a plan may use or require.
     */
    public function taxOptions() : ?string;

    /**
     * @return string Plan's integration code (for reference only).
     */
    public function getCode() : string;

    /**
     * @return string Plan's descriptive name.
     */
    public function getName() : string;

    /**
     * The plan wight is used to calculate if a plan change is a upgrade or a downgrade.
     *
     * Prefer multiples of 10 so there's room between current plans for new/future intermediate plans.
     *
     * @return int The plan weight.
     */
    public function getWeight() : int;

    /**
     * @return Generic[] Plan's items for monthly subscriptions.
     */
    public function monthlyItems() : array;

    /**
     * @return Generic[] Plan's items for quarterly subscriptions.
     */
    public function quarterlyItems() : array;

    /**
     * @return Generic[] Plan's items for yearly subscriptions.
     */
    public function yearlyItems() : array;

    /**
     * @param string $interval Desired interval to retrieve items. Defaults to monthly.
     *
     * @return Generic[] List of items for the given interval.
     */
    public function items(string $interval = 'monthly') : array;

    /**
     * Calculates a period total amount for a given plan.
     *
     * @param string $interval The interval that will be used to calculate the total.
     *
     * @return float The sum of all items and discounts.
     */
    public function total(string $interval = 'monthly') : float;

    /**
     * Map a plan's items into a payment gateway compatible array format.
     *
     * @param string $interval The desired interval.
     * @param string $append   Appends some information into the description.
     *
     * @return array The formatted items array.
     */
    public function itemsArray(string $interval = 'monthly', string $append = null) : array;

    /**
     * Retrieves the plan feature schema. This is intended to be used on ACL and addon purchases.
     *
     * @return FeatureSchema Plan's feature schema instance.
     */
    public function getFeatures() : FeatureSchema;

    /**
     * Array representation of the plan's feature schema.
     *
     * @return array Plan's feature schema in array format.
     */
    public function featuresArray() : array;
}
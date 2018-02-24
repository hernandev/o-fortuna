<?php

namespace O\Fortuna\Common;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Class BankAccount.
 *
 * Base/common bank account implementation.
 */
class BankAccount implements Arrayable
{
    /**
     * @var string|null Alias, or description of the account.
     */
    protected $name = null;

    /**
     * @var string|null Bank code, if applicable.
     */
    protected $bankCode = null;

    /**
     * @var string|null Bank name, if applicable.
     */
    protected $bankName = null;

    /**
     * @var string|null Account's bank branch number, if applicable.
     */
    protected $branch = null;

    /**
     * @var string|null Account's number, if applicable.
     */
    protected $number = null;

    /**
     * @var string|null Account type, like savings or checking, if applicable.
     */
    protected $type = null;

    /**
     * Name attribute setter.
     *
     * @param null|string $name
     *
     * @return $this
     */
    public function setName(?string $name): BankAccount
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Bank code attribute setter.
     *
     * @param null|string $bankCode
     *
     * @return $this
     */
    public function setBankCode(?string $bankCode): BankAccount
    {
        $this->bankCode = $bankCode;

        return $this;
    }

    /**
     * Bank name attribute setter.
     *
     * @param null|string $bankName
     *
     * @return $this
     */
    public function setBankName(?string $bankName): BankAccount
    {
        $this->bankName = $bankName;

        return $this;
    }

    /**
     * Branch attribute setter.
     *
     * @param null|string $branch
     *
     * @return $this
     */
    public function setBranch(?string $branch): BankAccount
    {
        $this->branch = $branch;

        return $this;
    }

    /**
     * Account number attribute setter.
     *
     * @param null|string $number
     *
     * @return $this
     */
    public function setNumber(?string $number): BankAccount
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Account type attribute setter.
     *
     * @param null|string $type
     *
     * @return $this
     */
    public function setType(?string $type): BankAccount
    {
        $this->type = $type;

        return $this;
    }


    /**
     * Serialize the bank account as array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'name'      => $this->name,
            'bank_code' => $this->bankCode,
            'bank_name' => $this->bankName,
            'branch'    => $this->branch,
            'number'    => $this->number,
            'type'      => $this->type,
        ];
    }
}
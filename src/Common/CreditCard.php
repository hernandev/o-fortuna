<?php

namespace O\Fortuna\Common;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;
use O\Fortuna\Helpers\Formatter;

/**
 * Class CreditCard.
 *
 * Base/common credit card information / bag implementation.
 */
class CreditCard implements Arrayable
{
    /**
     * @var string|null Credit card issuer short code (lower case name like 'visa' or 'mastercard')
     */
    protected $issuer = null;

    /**
     * @var string|null Card's holder name.
     */
    protected $name = null;

    /**
     * @var string|null Card's number.
     */
    protected $number = null;

    /**
     * @var string|null Card's security code.
     */
    protected $cvc = null;

    /**
     * @var string|null Card's expiration month.
     */
    protected $expirationMonth = null;

    /**
     * @var string|null Card's expiration year.
     */
    protected $expirationYear = null;

    /**
     * Set the card issuer.
     *
     * @param string $issuer
     *
     * @return $this
     */
    public function setIssuer(string $issuer)
    {
        // set the issuer.
        $this->issuer = Str::snake(trim($issuer));

        // fluent return.
        return $this;
    }

    /**
     * Card's holder name setter.
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name)
    {
        // trim and set the name.
        $this->name = trim($name);

        // fluent return.
        return $this;
    }

    /**
     * Card's number setter.
     *
     * @param string $number
     *
     * @return $this
     */
    public function setNumber(string $number)
    {
        // strip all white spaces and other non numeric values.
        $this->number = str_slug($number, '');

        // fluent return.
        return $this;
    }

    /**
     * Card's security code setter.
     *
     * @param string $cvc
     *
     * @return $this
     */
    public function setCVC(string $cvc)
    {
        // set a trimmed security code on the instance.
        $this->cvc = trim($cvc);

        // fluent return.
        return $this;
    }

    /**
     * Card's expiration month setter.
     *
     * @param string $month
     *
     * @return $this
     */
    public function setMonth(string $month)
    {
        // trim spaces.
        $month = trim($month);

        // ensure the month is a string with two digits, filled with left side zero if needed.
        if (strlen($month) == 1) {
            $month = str_pad($month, 2, 0, STR_PAD_LEFT);
        }

        // set the expiration month on the instance.
        $this->expirationMonth = $month;

        // fluent return.
        return $this;
    }

    /**
     * Card's expiration year setter.
     *
     * @param string $year
     *
     * @return $this
     */
    public function setYear(string $year)
    {
        // trim spaces.
        $year = trim($year);

        // ensure it's a 4 digit year.
        if (strlen($year) == 2) {
            $year = "20{$year}";
        }

        // set the expiration year on the instance
        $this->expirationYear = $year;

        // fluent return.
        return $this;
    }

    /**
     * Card's expiration (formatted) setter.
     *
     * @param string $date
     *
     * @return $this
     */
    public function setExpiration(string $date)
    {
        // remove any special character from the expiration.
        $expiration = Formatter::numbersOnly($date);

        // ensure it has a valid format.
        if (strlen($expiration) >= 4) {
            // set the month.
            $this->setMonth(Str::substr($expiration, 0, 2));
            // set the year.
            $this->setYear(Str::substr($expiration, 2, 4));
        }

        // fluent return.
        return $this;
    }

    /**
     * @return string|null The issuer of the credit card / getter.
     */
    public function issuer()
    {
        return $this->issuer;
    }

    /**
     * @return null|string Name getter.
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return null|string Number getter.
     */
    public function number()
    {
        return $this->number;
    }

    /**
     * @return null|string CVC getter.
     */
    public function cvc()
    {
        return $this->cvc;
    }

    /**
     * @return null|string Expiration month getter.
     */
    public function month()
    {
        return $this->expirationMonth;
    }

    /**
     * @param bool $short Indicates if the year will be in a 4 or 2 digits format.
     *
     * @return null|string Expiration year getter.
     */
    public function year($short = false)
    {
        return $short ? Str::substr($this->expirationYear, 2, 2) : $this->expirationYear;
    }

    /**
     * Getter for the formatter expiration date.
     *
     * @param bool $short Short year mode.
     * @param string $separator Separator on the month/year.
     *
     * @return string The formatted expiration.
     */
    public function expiration(bool $short = false, string $separator = '/')
    {
        return "{$this->month()}{$separator}{$this->year($short)}";
    }

    /**
     * @return array An array representation of the card.
     */
    public function toArray()
    {
        return [
            'issuer' => $this->issuer,
            'name'   => $this->name,
            'number' => $this->number,
            'cvc'    => $this->cvc,
            'month'  => $this->expirationMonth,
            'year'   => $this->expirationYear,
        ];
    }
}
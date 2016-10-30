<?php
/**
 * Résumé Writer
 *
 * @copyright 2016 doublecompile
 * @license   http://opensource.org/licenses/MIT MIT License
 */
namespace Doublecompile\Resume;

use League\Period\Period;

/**
 * Writes an event.
 *
 * @copyright 2016 doublecompile
 * @license   http://opensource.org/licenses/MIT MIT License
 */
class JobBuilder
{
    private $name;
    private $title;
    private $adr;
    private $url;
    private $dates;
    private $description;

    /**
     * Gets a new Builder.
     *
     * @return self A new builder
     */
    public static function get()
    {
        return new self();
    }

    /**
     * Adds the company name.
     *
     * @param string $name
     * @return $this provides a fluent interface
     */
    public function company($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Adds the job title.
     *
     * @param string $title
     * @return $this provides a fluent interface
     */
    public function title($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Adds the URL.
     *
     * @param string $url
     * @return $this provides a fluent interface
     */
    public function url($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Adds the address.
     *
     * @param string $locality
     * @param string $region
     * @param string $country
     * @return $this provides a fluent interface
     */
    public function address($locality, $region, $country)
    {
        $this->adr = new \Libreworks\Microformats\Address(null, null, null, $locality, $region, null, $country);
        return $this;
    }

    /**
     * Adds the dates.
     *
     * @param \DateTimeInterface|string $from The from date
     * @param \DateTimeInterface|string $to The to date
     * @return $this provides a fluent interface
     */
    public function dates($from, $to)
    {
        $this->dates = new Period($this->toDate($from), $this->toDate($to));
        return $this;
    }

    /**
     * @return $this provides a fluent interface
     */
    public function description()
    {
        $this->description = implode("\n", func_get_args());
        return $this;
    }

    /**
     * Generates the event.
     *
     * @return \Libreworks\Microformats\Event The event
     */
    public function build()
    {
        $cardProps = [];
        if ($this->name !== null) {
            $cardProps['p-name'] = $this->name;
        }
        if ($this->title !== null) {
            $cardProps['p-job-title'] = $this->title;
        }
        if ($this->adr !== null) {
            $cardProps['p-adr'] = $this->adr;
        }
        if ($this->url !== null) {
            $cardProps['u-url'] = $this->url;
        }
        return new \Libreworks\Microformats\Event(
            null,
            null,
            $this->dates,
            $this->description,
            null,
            null,
            new \Libreworks\Microformats\Card($cardProps)
        );
    }

    /**
     * @param \DateTimeInterface $a
     * @return \DateTimeInterface
     */
    private function toDate($a)
    {
        return $a instanceof \DateTimeInterface ? $a : new \DateTimeImmutable($a);
    }
}

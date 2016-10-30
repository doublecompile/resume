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
class SkillBuilder
{
    private $name;
    private $url;
    private $rating;
    private $dates = [];

    /**
     * Gets a new builder.
     *
     * @return SkillBuilder a new builder
     */
    public static function get()
    {
        return new self();
    }

    /**
     * Adds a name (and optionally URL).
     *
     * @param string $name The name
     * @param string $url The URL
     * @return $this provides a fluent interface
     */
    public function name($name, $url = null)
    {
        $this->name = $name;
        $this->url = $url;
        return $this;
    }

    /**
     * Adds a rating.
     *
     * @param int $rating The rating
     * @returns $this provides a fluent interface
     */
    public function rating($rating)
    {
        $this->rating = (int)$rating;
        return $this;
    }

    /**
     * Adds a set of dates. You can call this method multiple times.
     *
     * @param \DateTimeInterface|string $from
     * @param \DateTimeInterface|string $to
     * @returns $this provides a fluent interface
     */
    public function dates($from, $to)
    {
        $this->dates[] = new Period($this->toDate($from), $this->toDate($to));
        return $this;
    }

    /**
     * Builds the skill.
     *
     * @return \Libreworks\Microformats\Skill the skill
     */
    public function build()
    {
        return new \Libreworks\Microformats\Skill(
            ($this->url !== null ?
                new \Libreworks\Microformats\Tag($this->url, $this->name) :
                $this->name),
            $this->rating,
            $this->dates
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

<?php
/**
 * Résumé Writer
 *
 * @copyright 2016 doublecompile
 * @license   http://opensource.org/licenses/MIT MIT License
 */
namespace Doublecompile\Resume;

/**
 * Writes skills as a table.
 *
 * @copyright 2016 doublecompile
 * @license   http://opensource.org/licenses/MIT MIT License
 */
class SkillTableWriter
{
    /**
     * Writes skills as a table.
     *
     * @param \Libreworks\Microformats\Skill[] $skills The skills to write
     * @return string The HTML markup
     */
    public function write(array $skills)
    {
        $out = [];
        foreach ($skills as $v) {
            $total = $this->getTotal($v->getDates());
            $out[] = '<tr class="p-skill h-skill"><th scope="col" class="p-name">' .
                ($v->getTag() instanceof \Libreworks\Microformats\Tag ? '<a href="' . $v->getTag()->getUrl() . '" rel="tag">' . htmlspecialchars($v->getTag()->getName()) . '</a>' : htmlspecialchars($v->getName()))
                . '</th><td><data class="p-rating" value="'
                . $v->getRating() . '">' . $this->getLevel($v->getRating())
                . '</data></td><td><time class="dt-duration" datetime="P' . ($total < 1 ? (round($total * 12) . 'M') : $total . 'Y') . '">'
                . $total
                . '</time></td></tr>';
            $max = $this->getMax($v->getDates());
            if (time() - $max->getTimestamp() > 31536000) {
                $out[] = '<tr><td colspan="3" class="skill-note">Not used in ' .  round((time() - $max->getTimestamp()) / 31536000, 1) . ' years</td></tr>';
            }
        }
        return '<table><thead><tr><th scope="col">Name</th><th scope="col">Level</th><th scope="col">Years</th></tr></thead><tbody>'
            . implode("\n", $out) . "</tbody></table>";
    }

    /**
     * Gets the max date.
     *
     * @param \League\Period\Period[] $dates The dates
     * @return \DateTimeImmutable The max date or null
     */
    protected function getMax(array $dates)
    {
        $max = null;
        foreach ($dates as $dr) {
            $max = max($dr->getEndDate(), $max);
        }
        return $max;
    }

    /**
     * Gets the total years of date ranges.
     *
     * @param \League\Period\Period[] $dates The date ranges
     * @return string The formatted date interval
     */
    protected function getTotal(array $dates)
    {
        if (count($dates) == 0) {
            return '0';
        } elseif (count($dates) == 1) {
            $di = $dates[0]->getDateInterval();
            if ($di->y < 1) {
                return number_format($di->m / 12, 1);
            } else {
                return ($di->m > 5) ? $di->y + 1 : $di->y;
            }
        } else {
            $months = 0;
            $days = 0;
            foreach ($dates as $daterange) {
                $v = $daterange->getDateInterval();
                $months += (($v->y * 12) + $v->m);
                $days += $v->d;
            }
            if ($days > 30) {
                $months += ($days / 30);
                $days = $days % 30;
            }
            return $months < 1 ? number_format($months / 12, 1) : round($months / 12);
        }
    }

    /**
     * Gets the text level.
     *
     * @param int $level The level
     * @return string The level name
     */
    protected function getLevel($level)
    {
        switch ($level) {
            case 1:
                return "Beginner";
            case 2:
                return "Intermediate";
            case 3:
                return "Advanced";
            case 4:
                return "Expert";
        }
    }
}

<?php
/**
 * Résumé Writer
 *
 * @copyright 2016 doublecompile
 * @license   http://opensource.org/licenses/MIT MIT License
 */
namespace Doublecompile\Resume;

/**
 * Writes skills as a list.
 *
 * @copyright 2016 doublecompile
 * @license   http://opensource.org/licenses/MIT MIT License
 */
class SkillListWriter
{
    /**
     * Writes skills as a comma-separated list.
     *
     * @param \Libreworks\Microformats\Skill[] $skills The skills to write
     * @return string The HTML markup
     */
    public function write(array $skills)
    {
        $out = [];
        foreach ($skills as $v) {
            $out[] = '<span class="p-skill">'
                . ($v->getTag() instanceof \Libreworks\Microformats\Tag ? '<a href="' . $v->getTag()->getUrl() . '" rel="tag">' . htmlspecialchars($v->getTag()->getName()) . '</a>' : htmlspecialchars($v->getName()))
                . '</span>';
        }
        return '<p>' . implode(",\n", $out) . ".</p>";
    }
}

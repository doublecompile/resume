<?php
/**
 * Résumé Writer
 *
 * @copyright 2016 doublecompile
 * @license   http://opensource.org/licenses/MIT MIT License
 */
namespace Doublecompile\Resume;

/**
 * Writes Cards.
 *
 * @copyright 2016 doublecompile
 * @license   http://opensource.org/licenses/MIT MIT License
 */
class CardWriter
{
    /**
     * Writes a Card.
     *
     * @param \Libreworks\Microformats\Card $card The card to write
     * @return string The HTML markup
     */
    public function write(\Libreworks\Microformats\Card $card)
    {
        $tel = $card->getTel();
        $email = $card->getEmail();
        $out = [
            '<h1 class="p-name">' . $this->writeName($card->getName()) . '</h1>',
            strlen($card->getPhoto()) > 0 ? '<div class="avatar-container"><img src="' . $card->getPhoto() . '" alt="User avatar" class="u-photo" /></div>' : '',
            '<div class="p-adr h-adr">' . $this->writeAddress($card->getAddress()) . '</div>',
            '<div class="p-tel"><a href="tel:' . preg_replace('/[^0-9\+]/', '', $tel) . '">' . htmlspecialchars($tel) .  '</a></div>',
            '<div class="url-container"><a class="u-email" href="mailto:' . htmlspecialchars($email) . '">' . htmlspecialchars($email) . '</a></div>',
            '<div class="url-container"><a class="u-url" href="' . htmlspecialchars($card->getUrl()) . '">Homepage</a></div>'
        ];
        return '<div>' . implode("\n", $out) . '</div>';
    }
    
    /**
     * Writes a name.
     *
     * @param \Libreworks\Microformats\Name $name The name to write
     * @return string The HTML markup
     */
    protected function writeName(\Libreworks\Microformats\Name $name)
    {
        $names = [
            'p-honorific-prefix' => $name->getPrefix(),
            'p-given-name' => $name->getGiven(),
            'p-additional-name' => $name->getMiddle(),
            'p-family-name' => $name->getSurname(),
            'p-honorific-suffix' => $name->getSuffix()
        ];
        $tags = [];
        foreach ($names as $k => $v) {
            if (strlen($v) > 0) {
                $tags[] = '<span class="' . $k . '">' . htmlspecialchars($v) . '</span>';
            }
        }
        return '<span class="p-name">' . implode(' ', $tags) . '</span>';
    }

    /**
     * Formats an address.
     *
     * @param \Libreworks\Microformats\Address $address The address to write
     * @return string The HTML markup
     */
    public function writeAddress(\Libreworks\Microformats\Address $address)
    {
        return (new AddressWriter())->write($address);
    }
}

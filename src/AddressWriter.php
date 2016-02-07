<?php
/**
 * Résumé Writer
 *
 * @copyright 2016 doublecompile
 * @license   http://opensource.org/licenses/MIT MIT License
 */
namespace Doublecompile\Resume;

/**
 * Writes addresses.
 *
 * @copyright 2016 doublecompile
 * @license   http://opensource.org/licenses/MIT MIT License
 */
class AddressWriter
{
    /**
     * Formats an address.
     *
     * @param \Libreworks\Microformats\Address $address
     * @return string The HTML markup
     */
    public function write(\Libreworks\Microformats\Address $address)
    {
        $fields = [
            'p-street-address' => $address->getStreet(),
            'p-extended-address' => $address->getExtended(),
            'p-post-office-box' => $address->getPobox(),
            'p-locality' => $address->getLocality(),
            'p-region' => $address->getRegion(),
            'p-postal-code' => $address->getPostal(),
            'p-country' => $address->getCountry()
        ];
        $tags = [];
        foreach ($fields as $k => $v) {
            if (strlen($v) > 0) {
                $tags[] = '<span class="' . $k . '">' . htmlspecialchars($v) . '</span>';
            }
        }
        return '<span>' . implode(' ', $tags) . '</span>';
    }
}

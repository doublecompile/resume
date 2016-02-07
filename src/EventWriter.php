<?php
/**
 * Résumé Writer
 *
 * @copyright 2016 doublecompile
 * @license   http://opensource.org/licenses/MIT MIT License
 */
namespace Doublecompile\Resume;

/**
 * Writes an event.
 *
 * @copyright 2016 doublecompile
 * @license   http://opensource.org/licenses/MIT MIT License
 */
class EventWriter
{
    /**
     * @var \DateTimeInterface
     */
    private $present;
    /**
     * @var \Doublecompile\Resume\AddressWriter
     */
    private $addressWriter;
    
    /**
     * Creates a new EventWriter.
     *
     * @param \DateTimeInterface $present The current time
     */
    public function __construct(\DateTimeInterface $present = null)
    {
        $this->present = $present;
        $this->addressWriter = new AddressWriter();
    }

    /**
     * Writes an event.
     *
     * @param \Libreworks\Microformats\Event $event The event to write
     * @return string The HTML markup
     */
    public function write(\Libreworks\Microformats\Event $event)
    {
        $dates = $event->getDate();
        $card = $event->getLocation();
        $out = [
            '<div class="hidden p-name">' . htmlspecialchars($card->getFullName()) . '</div>',
            '<div class="p-location h-card">' . $this->writeCard($card) . '</div>'
        ];
        if ($dates !== null) {
            $out[] = '<p class="date-range"><time class="dt-start" datetime="' . $dates->getFrom()->format('Y-m-d') . '">' . $dates->getFrom()->format('M Y') . '</time>–<time class="dt-end" datetime="' . $dates->getTo()->format('Y-m-d') . '">' . ($dates->getTo() === $this->present ? 'Present' : $dates->getTo()->format('M Y')) . '</time></p>';
        }
        $out[] = '<div class="p-description">' . $this->formatText($event->getDescription()) . '</div>';
        return '<div>' . implode("\n", $out) . '</div>';
    }
    
    /**
     * Converts text to P tags and UL tags.
     *
     * @param string $text The text to write
     * @return string The HTML markup
     */
    protected function formatText($text)
    {
        $lines = explode("\n", $text);
        $out = [];
        $inList = false;
        foreach ($lines as $line) {
            if (substr($line, 0, 2) == '* ') {
                if (!$inList) {
                    $out[] = '<ul>';
                }
                $inList = true;
                $out[] = '<li>' . htmlspecialchars(substr($line, 2)) . '</li>';
            } else {
                if ($inList) {
                    $out[] = '</ul>';
                }
                $inList = false;
                $out[] = '<p>' . htmlspecialchars($line) . '</p>';
            }
        }
        if ($inList) {
            $out[] = '</ul>';
        }
        return implode("\n", $out);
    }
    
    /**
     * Writes a Card.
     *
     * @param \Libreworks\Microformats\Card $card The card to write
     * @return string The HTML markup
     */
    protected function writeCard(\Libreworks\Microformats\Card $card)
    {
        $out = [
            '<h3 class="p-name">' . htmlspecialchars($card->getFullName()) . '</h3>'
        ];
        $address = $card->getAddress();
        if ($address !== null) {
            $out[] = '<p class="p-adr h-adr">' . $this->addressWriter->write($card->getAddress()) . '</p>';
        }
        $url = $card->getUrl();
        if ($url !== null) {
            $out[] = '<p class="url-container"><a class="u-url" href="' . htmlspecialchars($card->getUrl()) . '">Project Homepage</a></p>';
        }
        if ($card->getTitle()) {
            $out[] = '<p class="p-job-title">' . htmlspecialchars($card->getTitle()) . '</p>';
        }
        return '<div>' . implode("\n", $out) . '</div>';
    }
}

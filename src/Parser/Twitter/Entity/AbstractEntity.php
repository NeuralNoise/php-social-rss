<?php
declare(strict_types=1);


namespace SocialRss\Parser\Twitter\Entity;

/**
 * Class AbstractEntity
 * @package SocialRss\Parser\Twitter\Entity
 */
abstract class AbstractEntity
{
    protected $item;
    protected $text;

    /**
     * AbstractEntity constructor.
     * @param $item
     * @param $text
     */
    public function __construct($item, $text)
    {
        $this->item = $item;
        $this->text = $text;
    }

    /**
     * @param $text
     * @param $search
     * @param $replace
     * @return string
     */
    protected function replaceContent(string $text, string $search, string $replace): string
    {
        $quotedSearch = preg_quote($search, '/');
        // replace text except already replaced inside HTML tags
        return preg_replace("/({$quotedSearch})(?=[^>]*(<|$))/i", $replace, $text, 1);
    }
}

<?php

/**
 * This file is part of the eZ Platform XmlText Field Type package.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 *
 * @version //autogentag//
 */
namespace eZ\Publish\Core\FieldType\XmlText;

use eZ\Publish\Core\FieldType\Value as BaseValue;
use DOMDocument;

/**
 * Value for XmlText field type.
 */
class Value extends BaseValue
{
    const EMPTY_VALUE = <<<EOT
<?xml version="1.0" encoding="utf-8"?>
<section/>
EOT;

    /**
     * XML content as DOMDocument.
     *
     * @var \DOMDocument
     */
    public $xml;

    /**
     * Initializes a new XmlText Value object with $xmlDoc in.
     *
     * @param \DOMDocument|string $xmlDoc
     */
    public function __construct($xmlDoc = null)
    {
        if ($xmlDoc instanceof DOMDocument) {
            $this->xml = $xmlDoc;
        } else {
            $this->xml = new DOMDocument();
            $this->xml->loadXML($xmlDoc === null ? self::EMPTY_VALUE : $xmlDoc);
        }
    }

    /**
     * @see \eZ\Publish\Core\FieldType\Value
     */
    public function __toString()
    {
        return isset($this->xml) ? (string)$this->xml->saveXML() : self::EMPTY_VALUE;
    }
}

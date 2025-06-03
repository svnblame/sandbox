<?php

namespace App\Models\AdvancedFeatures;

use App\Models\AdvancedFeatures\Exceptions\ConfException;
use App\Models\AdvancedFeatures\Exceptions\FileException;
use App\Models\AdvancedFeatures\Exceptions\XmlException;
use Exception;

class Conf
{
    private \SimpleXMLElement $xml;
    private \SimpleXMLElement $lastMatch;

    /**
     * @throws FileException|XmlException
     */
    public function __construct(private string $file)
    {
        if (!file_exists($file)) {
            throw new FileException("File $file not found");
        }

        $this->xml = simplexml_load_file($this->file, null, LIBXML_NOERROR);

        if (!is_object($this->xml)) {
            throw new XmlException(libxml_get_last_error());
        }

        $matches = $this->xml->xpath('/conf');

        if (!count($matches)) {
            throw new ConfException("Root element 'conf' not found.");
        }
    }

    /**
     * @throws FileException
     */
    public function write(): void
    {
        if (!is_writeable($this->file)) {
            throw new FileException("File '$this->file' is not writeable");
        }

        file_put_contents($this->file, $this->xml->asXML());
    }

    public function get(string $str): ?string
    {
        $matches = $this->xml->xpath('/conf/item[@name="' . $str . '"]');

        if (!count($matches)) {
            return null;
        }

        $this->lastMatch = $matches[0];
        return (string)$matches[0];
    }

    public function set(string $key, string $value): void
    {
        if (! is_null($this->get($key))) {
            $this->lastMatch[$key] = $value;
            return;
        }

        $this->xml->addChild('item', $value)->addAttribute('name', $key);
    }
}

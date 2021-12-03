<?php
namespace App\Services;

use App\Interfaces\SilenceXmlParserInterface;

class SilenceXmlParserService implements SilenceXmlParserInterface
{
    /**
     * Parsing xml document from path
     *
     * @param string $path
     *
     * @return array
     *
     * @throws \Exception
     */
    public function parseFile(string $path) {
        try {
            $parsed_data = [];

            if(!file_exists($path)) {
                throw new \Exception('File not found');
            }

            $xmlstring = file_get_contents($path);
            $xml = simplexml_load_string($xmlstring, "SimpleXMLElement", LIBXML_NOCDATA);
            $parsed_data = json_decode(json_encode($xml),TRUE);

            return $parsed_data['silence'];
        } catch (\Exception $e) {
            throw $e;
        }
    }
}

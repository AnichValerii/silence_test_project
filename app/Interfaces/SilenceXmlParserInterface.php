<?php
namespace App\Interfaces;

interface SilenceXmlParserInterface
{
    /**
     * Parsing file from path
     *
     * @param string $path
     *
     * @return array
     *
     * @throws \Exception
     */
    public function parseFile(string $path);
}

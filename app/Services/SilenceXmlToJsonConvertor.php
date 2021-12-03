<?php
namespace App\Services;

use App\Interfaces\BookGeneratorInterface;
use \App\Interfaces\SilenceXmlConvertor;
use App\Interfaces\SilenceXmlParserInterface;

class SilenceXmlToJsonConvertor implements SilenceXmlConvertor {

    private $parser;
    private $book_generator;

    public function __construct(SilenceXmlParserInterface $parser, BookGeneratorInterface $generator)
    {
        $this->parser = $parser;
        $this->book_generator = $generator;
    }

    /**
     * @param string $path
     * @param int $transition_interval
     * @param int $maximum_duration
     * @param int $split_interval
     *
     * @return \App\Interfaces\json|string
     *
     */
    public function generateJson($path, $transition_interval, $maximum_duration, $split_interval) {
        $response = [];
        try {
            $parsed_xml_data = $this->parser->parseFile($path);

            $book = $this->book_generator->generateBook($parsed_xml_data, $transition_interval, $maximum_duration, $split_interval);

            $response = $book->generateSegments();
        } catch (\Exception $e) {
            $response['error'] = $e->getMessage();
        }

        return json_encode($response);
    }

}

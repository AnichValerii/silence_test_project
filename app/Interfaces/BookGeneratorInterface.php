<?php
namespace App\Interfaces;

interface BookGeneratorInterface
{
    /**
     * Generating BookInterface object from xml segments
     *
     * @param array $xmlSegments
     * @param int $transition_interval
     * @param int $maximum_duration
     * @param int $split_interval
     *
     * @return BookInterface
     */
    public function generateBook(array $xmlSegments, $transition_interval, $maximum_duration, $split_interval);
}

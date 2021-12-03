<?php
namespace App\Interfaces;

interface SilenceXmlConvertor
{
    /**
     * Setting up main converting information
     *
     * @param string $path
     * @param integer $transition_interval
     * @param integer $maximum_duration
     * @param integer $split_interval
     *
     * @return json
     */
    public function generateJson($path, $transition_interval, $maximum_duration, $split_interval);
}

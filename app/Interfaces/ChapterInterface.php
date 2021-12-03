<?php

namespace App\Interfaces;

interface ChapterInterface extends ChapterPartTitleInterface
{
    /**
     * Getting list of Chapter parts
     *
     * @return array
     */
    public function getPartsList();

    /**
     * Adding new parts list
     *
     * @param ChapterPartInterface $part
     */
    public function addPart(ChapterPartInterface $part);

    /**
     * Generation "segments" array from list of book chapters
     *
     * @param integer $index
     *
     * @return array
     */
    public function generateSegments($index);

}

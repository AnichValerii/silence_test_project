<?php

namespace App\Interfaces;

interface ChapterPartInterface extends ChapterPartTitleInterface
{
    /**
     * Setting offset of the chapter
     *
     * @param string $offset
     */
    public function setOffset(string $offset);

    /**
     * Getting offset of the chapter part
     *
     * @return string
     */
    public function getOffset();

    /*
    * @param string $offset
    *
    * @return ChapterPart
    */
    public static function generatePart(string $offset);
}

<?php

namespace App\Interfaces;

interface ChapterPartTitleInterface
{
    /**
     * Returning part title with index
     *
     * @param integer $index
     *
     * @return string
     */
    public function getTitle($index);
}

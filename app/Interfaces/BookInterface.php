<?php
namespace App\Interfaces;

interface BookInterface
{
    /**
     * Pushing chapter to book
     *
     * @param ChapterInterface $chapter
     *
     */
    public function addChapter(ChapterInterface $chapter);


    /**
     * Generation "segments" array from list of book chapters
     *
     * @return array
     */
    public function generateSegments();
}

<?php
namespace App\Models;

use App\Interfaces\BookInterface;
use App\Interfaces\ChapterInterface;

class Book implements BookInterface
{
    /*
     * list of book chapters of type ChapterInterface
     */
    private $chapters = [];


    /**
     * Pushing chapter to book
     *
     * @param ChapterInterface $chapter
     *
     */
    public function addChapter(ChapterInterface $chapter){
        $this->chapters[] = $chapter;
    }


    /**
     * Generation "segments" array from list of book chapters
     *
     * @return array
     */
    public function generateSegments(){
        $segments = [];

        $chaptersIndex = 1;
        foreach ($this->chapters as $chapter) {
            array_push(
                $segments,
                $chapter->generateSegments($chaptersIndex++)
            );
        }

        return ['segments' => $segments];
    }
}

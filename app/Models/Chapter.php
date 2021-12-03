<?php
namespace App\Models;

use App\Interfaces\BookInterface;
use App\Interfaces\ChapterInterface;
use App\Interfaces\ChapterPartInterface;

class Chapter extends ChapterPart implements ChapterInterface
{
    /*
     * list of chapter parts
     */
    private $parts = [];


    /**
     * Getting list of Chapter parts
     *
     * @return array
     */
    public function getPartsList() {
        return $this->parts;
    }

    /**
     * Adding new parts list
     *
     * @param ChapterPartInterface $part
     */
    public function addPart(ChapterPartInterface $part) {
        $this->parts[] = $part;
    }


    /**
     * Generation "segments" array from list of book chapters
     *
     * @param integer $index
     *
     * @return array
     */
    public function generateSegments($index){
        $segments = [];


        $parts_list = $this->getPartsList();

        if(count($parts_list) == 1) {
            $segments[] = [
                'title' => $this->getTitle($index),
                'offset' => $parts_list[0]->getOffset()
            ];
        } else {
            $parts_index = 1;

            foreach ($parts_list as $part) {
                $next_segment = [
                    'title' => $this->getTitle($index) . ', ' . $part->getTitle($parts_index++),
                    'offset' => $part->getOffset()
                ];

                array_push(
                    $segments,
                    $next_segment
                );
            }
        }


        return $segments;
    }

    /**
     * Returning chapter title with index
     *
     * @param integer $index
     *
     * @return string
     */
    public function getTitle($index) {
        return 'Chapter ' . $index;
    }
}

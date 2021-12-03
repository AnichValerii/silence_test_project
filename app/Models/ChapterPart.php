<?php
namespace App\Models;

use App\Interfaces\BookInterface;
use App\Interfaces\ChapterInterface;
use App\Interfaces\ChapterPartInterface;

class ChapterPart implements ChapterPartInterface
{
    private $offset = '';

    /**
     * Setting offset of the chapter part
     *
     * @param string $offset
     */
    public function setOffset(string $offset) {
        $this->offset = $offset;
    }

    /**
     * Getting offset of the chapter part
     *
     * @return string
     */
    public function getOffset() {
        return $this->offset;
    }

    /**
     * Returning part title with index
     *
     * @param integer $index
     *
     * @return string
     */
    public function getTitle($index) {
        return 'part ' . $index;
    }

    /*
     * @param string $offset
     *
     * @return ChapterPart
     */
    public static function generatePart(string $offset) {
        $part = new ChapterPart();
        $part->setOffset($offset);
        return $part;
    }
}

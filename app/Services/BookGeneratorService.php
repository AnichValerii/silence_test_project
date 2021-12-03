<?php
namespace App\Services;

use App\Interfaces\BookGeneratorInterface;
use App\Interfaces\BookInterface;
use App\Models\Book;
use App\Helpers\IntervalFormatter;
use App\Models\Chapter;
use App\Models\ChapterPart;

class BookGeneratorService implements BookGeneratorInterface
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
    public function generateBook(array $xmlSegments, $transition_interval, $maximum_duration, $split_interval) {
        $book = new Book();

        $previous_part_start = 0;

        $chapter = new Chapter();

        foreach ($xmlSegments as $xmlSegment) {
            $from = IntervalFormatter::ISO8601ToSeconds($xmlSegment['@attributes']['from']);
            $until = IntervalFormatter::ISO8601ToSeconds($xmlSegment['@attributes']['until']);


            if($this->differenceMoreThanInterval($previous_part_start, $from, $maximum_duration)) {
                $part_start = $previous_part_start;

                do {
                    $chapter->addPart(Chapter::generatePart(IntervalFormatter::secondsToIso8601($part_start)));
                    $part_start += $maximum_duration;
                } while ($part_start < $from);
            } else {
                $chapter->addPart(Chapter::generatePart(IntervalFormatter::secondsToIso8601($previous_part_start)));
            }

            if($this->differenceMoreThanInterval($from, $until, $transition_interval)) {
                $book->addChapter($chapter);

                $chapter = new Chapter();
            }

            $previous_part_start = $until;
        }

        $chapter->addPart(Chapter::generatePart(IntervalFormatter::secondsToIso8601($previous_part_start)));
        $book->addChapter($chapter);

        return $book;
    }


    public function differenceMoreThanInterval($from, $to, $interval) {
        return ($to - $from) > $interval;
    }
}

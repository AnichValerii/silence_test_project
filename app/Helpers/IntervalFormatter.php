<?php

namespace App\Helpers;

use DateInterval;

class IntervalFormatter
{
    /**
     * Convert ISO 8601 values like P2DT15M33S
     * to a total value of seconds.
     *
     * @param string $ISO8601
     * @return float
     */
    public static function ISO8601ToSeconds(string $ISO8601)
    {
        $seconds = 0;
        try {
            $milliseconds = static::get_string_between($ISO8601, '.', 'S');

            if ($milliseconds) {
                $ISO8601 = str_replace('.' . $milliseconds, '', $ISO8601);
            }

            $interval = new DateInterval($ISO8601);
            $seconds = ($interval->d * 24 * 60 * 60) +
                ($interval->h * 60 * 60) +
                ($interval->i * 60) +
                $interval->s;

            if ($milliseconds) {
                $seconds .= '.' . $milliseconds;
            }
        } catch (\Exception $e) {
        }

        return $seconds;
    }

    /**
     * Convert seconds to ISO 8601 time format.
     *
     * @param float $seconds
     * @return string
     */
    public static function secondsToIso8601($seconds)
    {
        try {
            $milliseconds = number_format($seconds - floor($seconds), 3);
            if($milliseconds) {
                $seconds -= $milliseconds;
            }
            $units = array(
                "Y" => 365 * 24 * 3600,
                "D" => 24 * 3600,
                "H" => 3600,
                "M" => 60,
                "S" => 1,
            );

            $str = "P";
            $istime = false;

            foreach ($units as $unitName => &$unit) {
                $quot = intval($seconds / $unit);
                $seconds -= $quot * $unit;
                $unit = $quot;

                if($milliseconds AND $unitName == 'S') {
                    $unit += $milliseconds;
                }

                if ($unit > 0 OR $unitName == 'S') {
                    if (!$istime && in_array($unitName, array("H", "M", "S"))) { // There may be a better way to do this
                        $str .= "T";
                        $istime = true;
                    }
                    $str .= strval($unit) . $unitName;
                }
            }
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
        }

        return $str;
    }


    public static function get_string_between($string, $start, $end)
    {
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }
}

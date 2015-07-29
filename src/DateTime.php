<?php

namespace Valey\Components;

/**
 * Class DateTime
 * @author: Gabriel Malaquias <gemalaquias@gmail.com>
 * @package Valey\Components
 */
class DateTime {
    /**
     * @var int
     */
    public $day;
    /**
     * @var int
     */
    public $month;
    /**
     * @var year
     */
    public $year;
    /**
     * @var int
     */
    public $hour;
    /**
     * @var int
     */
    public $minute;
    /**
     * @var int
     */
    public $second;
    /**
     * @var int
     */
    public $millisecond;
    /**
     * @var string
     */
    public $date;
    /**
     * @var \DateTime
     */
    public $datetime;
    /**
     * http://php.net/manual/pt_BR/function.date.php
     */
    CONST format = "d/m/Y";
    CONST dateTimeZone = 'America/Sao_Paulo';

    /**
     * @return string
     */
    public function __toString(){
        return $this->ToString();
    }

    /**
     * @param $days
     * @return $this
     */
    public function addDay($days = 1){
        $this->datetime->modify("$days days");
        $this->replicateDate();
        return $this;
    }
    /**
     * @param $month
     * @return $this
     */
    public function addMonth($month = 1){
        $this->datetime->modify("$month month");
        $this->replicateDate();
        return $this;
    }
    /**
     * @param $year
     * @return $this
     */
    public function addYear($year = 1){
        $this->datetime->modify("$year year");
        $this->replicateDate();
        return $this;
    }
    /**
     * @param $hour
     * @return $this
     */
    public function addHour($hour = 1){
        $this->datetime->modify("$hour hour");
        $this->replicateDate();
        return $this;
    }
    /**
     * @param $minute
     * @return $this
     */
    public function addMinute($minute = 1){
        $this->datetime->modify("$minute minute");
        $this->replicateDate();
        return $this;
    }
    /**
     * @param $minute
     * @return $this
     */
    public function addSecond($second = 1){
        $this->datetime->modify("$second second");
        $this->replicateDate();
        return $this;
    }
    /**
     * @param string $format
     * @return string
     */
    public function ToString($format = null){
        if($format == null)
            $format = DateTime::format;
        return $this->datetime->format($format);
    }
    /**
     * @return int
     */
    public function getTimestamp(){
        return $this->datetime->getTimestamp();
    }
    /**
     * @return null
     */
    private function replicateDate(){
        if($this->datetime instanceof \DateTime) {
            $this->day = $this->datetime->format("d");
            $this->month = $this->datetime->format("m");
            $this->year = $this->datetime->format("Y");
            $this->hour = $this->datetime->format("H");
            $this->minute = $this->datetime->format("i");
            $this->second = $this->datetime->format("s");
            $this->millisecond = $this->datetime->format("u");
            $this->date = $this->datetime->format("d/m/Y");
        }
    }
    /**
     * @return DateTime
     */
    public static function now(){
        $datetime = new static();
        $datetime->datetime = new \DateTime("now", new \DateTimeZone(DateTime::dateTimeZone));;
        $datetime->replicateDate();
        return $datetime;
    }

    /**
     * @param $date
     * @param null $format
     * @return DateTime
     */
    public static function parse($date, $format = null){
        if($format == null) $format = DateTime::format;
        $datetime = new static();
        $datetime->datetime = \DateTime::createFromFormat($format, $date,  new \DateTimeZone(DateTime::dateTimeZone));
        $datetime->replicateDate();
        return $datetime;
    }
}
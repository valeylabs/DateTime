<?php
/**
 * @author: Gabriel Malaquias
 * @site: github.com/gmalaquias
 * @email: gemalaquias@gmail.com
 */
namespace Valey\Components;
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
     * @var string
     */
    CONST format = "d/m/Y";
    /**
     * @var string
     */
    CONST dateTimeZone = 'America/Sao_Paulo';

    /**
     * @param $days
     * @return $this
     */
    public function addDay($days){
        $this->datetime->modify("$days days");
        $this->replicateDate();
        return $this;
    }
    /**
     * @param $month
     * @return $this
     */
    public function addMonth($month){
        if($month > 0)
            $month++;
        else if($month < 0)
            $month--;
        $this->datetime->modify("$month month");
        $this->replicateDate();
        return $this;
    }
    /**
     * @param $year
     * @return $this
     */
    public function addYear($year){
        $this->datetime->modify("$year year");
        $this->replicateDate();
        return $this;
    }
    /**
     * @param $hour
     * @return $this
     */
    public function addHour($hour){
        $this->datetime->modify("$hour hour");
        $this->replicateDate();
        return $this;
    }
    /**
     * @param $minute
     * @return $this
     */
    public function addMinute($minute){
        $this->datetime->modify("$minute minute");
        $this->replicateDate();
        return $this;
    }
    /**
     * @param $minute
     * @return $this
     */
    public function addSecond($second){
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
     * @return null
     */
    private function replicateDate(){
        $this->day = $this->datetime->format("d");
        $this->month = $this->datetime->format("m");
        $this->year = $this->datetime->format("Y");
        $this->hour = $this->datetime->format("H");
        $this->minute = $this->datetime->format("i");
        $this->second = $this->datetime->format("s");
        $this->millisecond = $this->datetime->format("u");
        $this->date = $this->datetime->format("d/m/Y");
    }
    /**
     * @return DateTime
     */
    public static function now(){
        $datetime = new DateTime();
        $datetime->datetime = new \DateTime("now", new \DateTimeZone(DateTime::dateTimeZone));;
        $datetime->replicateDate();
        return $datetime;
    }
}
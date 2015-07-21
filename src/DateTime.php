<?php
/**
 * Created by PhpStorm.
 * User: gabriel.malaquias
 * Date: 21/07/2015
 * Time: 15:43
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
     * @param $days
     * @return $this
     */
    public function addDay($days){
        $this->datetime->modify("$days days");
        $this->replicateDate($this->datetime);
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
        $this->replicateDate($this->datetime);
        return $this;
    }

    /**
     * @param $year
     * @return $this
     */
    public function addYear($year){
        $this->datetime->modify("$year year");
        $this->replicateDate($this->datetime);
        return $this;
    }

    /**
     * @param $hour
     * @return $this
     */
    public function addHour($hour){
        $this->datetime->modify("$hour hour");
        $this->replicateDate($this->datetime);
        return $this;
    }

    /**
     * @param $minute
     * @return $this
     */
    public function addMinute($minute){
        $this->datetime->modify("$minute minute");
        $this->replicateDate($this->datetime);
        return $this;
    }

    /**
     * @param $minute
     * @return $this
     */
    public function addSecond($second){
        $this->datetime->modify("$second second");
        $this->replicateDate($this->datetime);
        return $this;
    }



    /**
     * @param string $format
     * @return string
     */
    public function ToString($format = "d/m/Y"){
        return $this->datetime->format($format);
    }

    /**
     * @param \DateTime $date
     */
    private function replicateDate(\DateTime $date){
        $this->day = $date->format("d");
        $this->month = $date->format("m");
        $this->year = $date->format("Y");
        $this->hour = $date->format("H");
        $this->minute = $date->format("i");
        $this->second = $date->format("s");
        $this->millisecond = $date->format("u");
        $this->date = $date->format("d/m/Y");
    }

    /**
     * @return DateTime
     */
    public static function now(){
        $date = new \DateTime("now",new \DateTimeZone( 'America/Sao_Paulo'));
        $datetime = new DateTime();
        $datetime->datetime = $date;
        $datetime->day = $date->format("d");
        $datetime->month = $date->format("m");
        $datetime->year = $date->format("Y");
        $datetime->hour = $date->format("H");
        $datetime->minute = $date->format("i");
        $datetime->second = $date->format("s");
        $datetime->millisecond = $date->format("u");
        $datetime->date = $date->format("d/m/Y");

        return $datetime;
    }
}
<?php


class DateTimeToolComponent extends Component
{
    public $dateFormat = 'Y-m-d';
    public $dateTimeFormat = 'Y-m-d H:i:s';

    public function getDefaultTZ(): DateTimeZone {
        return new DateTimeZone( 'UTC' );
    }

    public function isValidDate($date, $format = 'Y-m-d'): bool
    {

        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }

    public function getDaysNumber($dateInterval): int
    {
        $days = 0;
        if (!empty($dateInterval->y)) {
            $days = $days + $dateInterval->y * 365.25;
        }
        if (!empty($dateInterval->m)) {
            $days = $days + $dateInterval->m * 30;
        }
        if (!empty($dateInterval->d)) {
            $days = $days + $dateInterval->d;
        }
        return $days;
    }

    public function getValidDateTime($date, $timezone = null, $format = 'Y-m-d') {
        if (!$timezone) {
            $timezone = $this->getDefaultTZ();
        }
        $d = DateTime::createFromFormat($format, $date, $timezone);
        return ($d && $d->format($format) === $date) ? $d : null;
    }
}
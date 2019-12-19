<?php

/**
 * Class XcDateTimes
 * @author XcutionSociety : https://github.com/XcutionSociety
 * @version 0.1
 */

namespace XcS;

class XcDateTimes
{


    /**
     * This function is for converting date types to Long Indonesian date formats
     * @param string $date
     * @param bool $day
     * @return string
     *
     */
    public static function indoDate($date = "", $day = false)
    {
        $listDays = array(1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );

        $listMonth = array(1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split = explode('-', date("Y-m-d",strtotime($date)));
        $indoDate = $split[2] . ' ' . $listMonth[(int)$split[1]] . ' ' . $split[0];

        if ($day) {
            $num = date('N', strtotime($date));
            $indoDate = $listDays[$num] . ', ' . $indoDate;
        }
        return $indoDate;
    }

    /**
     * This function is for converting date types to Medium Indonesian date formats
     * @param string $date
     * @param bool $day
     * @return string
     */
    public static function indoDateMedium($date = "", $day = false)
    {
        $listDays = array(1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );

        $listMonth = array(1 => 'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Ags',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        );
        $split = explode('-', date("Y-m-d",strtotime($date)));
        $indoDate = $split[2] . ' ' . $listMonth[(int)$split[1]] . ' ' . $split[0];

        if ($day) {
            $num = date('N', strtotime($date));
            $indoDate = $listDays[$num] . ', ' . $indoDate;
        }
        return $indoDate;
    }

    /**
     * This function is for converting time 24 hours to 12 hours formats
     * @param string $time
     * @return string
     */
    public static function time24to12($time)
    {
        $result = date("h:i A", strtotime($time));
        return $result;
    }

    /**
     * This function is for converting time 12 hours to 24 hours formats
     * @param string $time
     * @param string $suffix
     * @return string
     */
    public static function time12to24($time, $suffix = "")
    {
        $result = date("H:i", strtotime($time)) . " " . $suffix;
        return $result;
    }

    /**
     * This function is for converting datetime format to long or medium format date
     * @param string $date
     * @param bool $day
     * @param bool $time
     * @param string $suffixTime
     * @param string $type
     * @return string
     */
    public static function indoDateTime($date = "", $day = false, $time = false, $suffixTime = "", $type = "M")
    {
        $listDays = array(1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );
        $listMonth = array(1 => 'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Ags',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        );
        if (strtoupper($type) == "L") {
            $listMonth = array(1 => 'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
        }
        $split = explode('-', date("Y-m-d", strtotime($date)));
        $indoDate = $split[2] . ' ' . $listMonth[(int)$split[1]] . ' ' . $split[0];

        if ($day) {
            $num = date('N', strtotime($date));
            $indoDate = $listDays[$num] . ', ' . $indoDate;
        }

        if ($time) {
            $result = date("H:i", strtotime($date)) . " " . $suffixTime;
            $indoDate = $indoDate . ' ' . $result;
        }
        return $indoDate;
    }


}
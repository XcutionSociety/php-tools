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
        $split = explode('-', $date);
        $indoDate = $split[2] . ' ' . $listMonth[(int)$split[1]] . ' ' . $split[0];

        if ($day) {
            $num = date('N', strtotime($date));
            return $listDays[$num] . ', ' . $indoDate;
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
        $split = explode('-', $date);
        $indoDate = $split[2] . ' ' . $listMonth[(int)$split[1]] . ' ' . $split[0];

        if ($day) {
            $num = date('N', strtotime($date));
            return $listDays[$num] . ', ' . $indoDate;
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
     * @param string $time
     * @param string $suffix
     * @return string
     */
    public static function time12to24($time, $suffix = "")
    {
        $result = date("H:i", strtotime($time)) . " " . $suffix;
        return $result;
    }


}
<?php
/**
 * Class Utils
 * @author XcutionSociety : https://github.com/XcutionSociety
 * @version 0.1
 */

namespace XcutionSociety;

class XcTools
{

    /**
     * This function is to make numbers and capital letters randomly
     * @param int $lenght
     * @return string
     */
    public static function stringCapitalAndNumber($lenght)
    {
        $input = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($input);
        $random_string = '';
        for ($i = 0; $i < $lenght; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }

    /**
     * This function is to make numbers and letters randomly
     * @param int $lenght
     * @return string
     * @see stringCapitalAndNumber
     */
    public static function stringAndNumber($lenght)
    {
        $input = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $input_length = strlen($input);
        $random_string = '';
        for ($i = 0; $i < $lenght; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }

    /**
     * @param string $value
     * @return string
     */
    public static function encrypt($value)
    {
        $strength = 4;
        $input = '*#0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ@$_abcdefghijklmnopqrstuvwxyz';
        $input_length = strlen($input);
        $awal = '';
        $akhir = '';
        for ($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $awal .= $random_character;
        }
        for ($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $akhir .= $random_character;
        }
        $result = base64_encode($awal . $value . $akhir);
        return $result;
    }

    /**
     * @param string $value
     * @return false|string
     */
    public static function decrypt($value)
    {
        $result = substr(substr(base64_decode($value), 4), 0, -4);
        return $result;
    }

    /**
     * This function is to format rupiah at numbers
     * @param string $value
     * @return string
     */
    public static function rupiah($value)
    {
        return "Rp. " . number_format($value, 0, ',', '.');
    }

    /**
     * This function is to delete the rupiah format of numbers
     * @param $value
     * @return string|string[]|null
     */
    public static function removeRupiah($value)
    {
        return preg_replace('/[Rp. ]/', '', $value);
    }


    /**
     * This function is for converting date types to Long Indonesian date formats
     * @param string $date
     * @param bool $day
     * @return string
     *
     */
    public static function indoDate($date = "", $day = false){
        $listDays = array ( 1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );

        $listMonth = array (1 =>   'Januari',
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
        $split 	  = explode('-', $date);
        $indoDate = $split[2] . ' ' . $listMonth[ (int)$split[1] ] . ' ' . $split[0];

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
    public static function indoDateMedium($date = "", $day = false){
        $listDays = array ( 1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );

        $listMonth = array (1 =>   'Jan',
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
        $split 	  = explode('-', $date);
        $indoDate = $split[2] . ' ' . $listMonth[ (int)$split[1] ] . ' ' . $split[0];

        if ($day) {
            $num = date('N', strtotime($date));
            return $listDays[$num] . ', ' . $indoDate;
        }
        return $indoDate;
    }


}
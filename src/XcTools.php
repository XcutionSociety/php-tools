<?php
/**
 * Class XcTools
 * @author XcutionSociety : https://github.com/XcutionSociety
 * @version 0.1
 */

namespace XcS;

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
     * @param int $decimal
     * @return string
     */
    public static function rupiah($value, $decimal = 0)
    {
        return "Rp. " . number_format($value, $decimal, ',', '.');
    }

    /**
     * This function is to delete the rupiah format of numbers
     * @param $value
     * @return string|string[]|null
     */
    public static function removeRupiah($value)
    {
        return round(preg_replace('/[Rp. ]/', '', $value));
    }

    /**
     * @param $nilai
     * @return bool|string
     */
    public static function terbilangEn($nilai)
    {
        if ($nilai < 0) return 'minus ' . self::terbilangEn(-$nilai);
        else if ($nilai < 10) {
            switch ($nilai) {
                case 0:
                    return 'zero';
                case 1:
                    return 'one';
                case 2:
                    return 'two';
                case 3:
                    return 'three';
                case 4:
                    return 'four';
                case 5:
                    return 'five';
                case 6:
                    return 'six';
                case 7:
                    return 'seven';
                case 8:
                    return 'eight';
                case 9:
                    return 'nine';
            }
        } else if ($nilai < 100) {
            $kepala = floor($nilai / 10);
            $sisa = $nilai % 10;
            if ($kepala == 1) {
                if ($sisa == 0) return 'ten';
                else if ($sisa == 1) return 'eleven';
                else if ($sisa == 2) return 'twelve';
                else if ($sisa == 3) return 'thirteen';
                else if ($sisa == 5) return 'fifteen';
                else if ($sisa == 8) return 'eighteen';
                else return self::terbilangEn($sisa) . 'teen';
            } else if ($kepala == 2) $hasil = 'twenty';
            else if ($kepala == 3) $hasil = 'thirty';
            else if ($kepala == 5) $hasil = 'fifty';
            else if ($kepala == 8) $hasil = 'eighty';
            else $hasil = self::terbilangEn($kepala) . 'ty';
        } else if ($nilai < 1000) {
            $kepala = floor($nilai / 100);
            $sisa = $nilai % 100;
            $hasil = self::terbilangEn($kepala) . ' hundred';
        } else if ($nilai < 1000000) {
            $kepala = floor($nilai / 1000);
            $sisa = $nilai % 1000;
            $hasil = self::terbilangEn($kepala) . ' thousand';
        } else if ($nilai < 1000000000) {
            $kepala = floor($nilai / 1000000);
            $sisa = $nilai % 1000000;
            $hasil = self::terbilangEn($kepala) . ' million';
        } else return false;

        if ($sisa > 0) $hasil .= ' ' . self::terbilangEn($sisa);
        return $hasil;
    }

    function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = penyebut($nilai - 10) . " belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }

    /**
     * @param $nilai
     * @return string
     */
    public static function terbilangId($nilai)
    {
        if ($nilai < 0) {
            $hasil = "minus " . trim(self::penyebut($nilai));
        } else {
            $hasil = trim(self::penyebut($nilai));
        }
        return $hasil;
    }

    /**
     * @param $bln
     * @return string
     */
    public static function bulanRomawi($bln)
    {
        switch ($bln) {
            case 1:
                return "I";
                break;
            case 2:
                return "II";
                break;
            case 3:
                return "III";
                break;
            case 4:
                return "IV";
                break;
            case 5:
                return "V";
                break;
            case 6:
                return "VI";
                break;
            case 7:
                return "VII";
                break;
            case 8:
                return "VIII";
                break;
            case 9:
                return "IX";
                break;
            case 10:
                return "X";
                break;
            case 11:
                return "XI";
                break;
            case 12:
                return "XII";
                break;
        }
    }


}
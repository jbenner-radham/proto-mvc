<?php

namespace RadHam;

class String
{
    public static function getFirstChar($string)
    {
        return substr($string, 0, 1);
    }

    public static function getLastChar($string)
    {
        return substr($string, -1);
    }

    public static function removeFirstChar($string, $char = false)
    {
        $char = self::validateChar($char);

        /**
         * If no character filter is defined or a char was supplied
         * and it matches the first char in the str then remove the
         * first char and return the string.
         */
        if (!$char || self::getFirstChar($string) == $char) {
            return substr($string, 1);
        }

        /**
         * ...otherwise the first character doesn't match the char filter
         * so return the original string.
         */
        return $string;
    }

    public static function removeLastChar($string, $char = false)
    {
        $char = self::validateChar($char);

        /**
         * If no character filter is defined or a char was supplied
         * and it matches the last char in the str then remove the
         * last char and return the string.
         */
        if (!$char || self::getLastChar($string) == $char) {
            return substr($string, 0, -1);
        }

        /**
         * ...otherwise the last character doesn't match the char filter
         * so return the original string.
         */
        return $string;
    }

    public static function split($string, $delim = false)
    {
        return $delim ? explode($delim, $string)
                      : str_split($string);
    }

    public static function validateChar($char = false)
    {
        if ($char) {

            if (is_numeric($char)) {
                $char = sprintf('%s', $char);
            }

            if (is_string($char)) {

                if (strlen($char) > 1) {
                    $char = self::getFirstChar($char);
                }

            }

        }

        return $char ?: false;
    }
}

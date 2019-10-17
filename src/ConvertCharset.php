<?php

namespace Germania\ConvertCharset;


/**
 * Provides a callable to convert a string into a certain charset.
 *
 * Usage:
 *
 *     <?php
 *     $cc = new ConvertCharset('UTF-8');
 *
 *     $some_differently_encoded_var = 'foo';
 *     echo $cc( $some_differently_encoded_var );
 *     ?>
 */
class ConvertCharset
{

    /**
     * @var string
     */
    public $target_charset;


    /**
     * @param string $target_charset The charset to convert into, default: "UTF-8"
     */
    public function __construct($target_charset = 'UTF-8')
    {
        $this->target_charset = $target_charset;
    }


    /**
     * @see    http://stackoverflow.com/questions/13377812/getting-data-with-utf-8-charset-from-mssql-server-using-php-freetds-extension
     * @param  string $text Text to convert
     * @return string       Converted string
     */
    public function __invoke($text)
    {
        if (!is_string($text))
            return $text;

        $current_encoding = mb_detect_encoding($text, mb_detect_order(), 'strict') ?: "ASCII";

        return ( $current_encoding === $this->target_charset)
        ? $text
        : mb_convert_encoding($text, $this->target_charset, [ $current_encoding ]);

    }

}

<?php

if (! function_exists('slugify')) {
    /**
     * Slugify given text
     *
     * @param string $text
     * @return string
     */
    function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        // trim
        $text = trim($text, '-');
        // transliterate
        $cyr = ['а','б','в','г','д','е','ж','з','и','ѝ','й','к','л','м','н','о',
                'п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ь','ю','я',
                'А','Б','В','Г','Д','Е','Ж','З','И','Ѝ','Й','К','Л','М','Н','О',
                'П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ь','Ю','Я'];
        $lat = ['a','b','v','g','d','e','zh','z','i','i','y','k','l','m','n','o',
                'p','r','s','t','u','f','h','ts','ch','sh','sht','a','y','yu','ya',
                'A','B','V','G','D','E','Zh','Z','I','I','Y','K','L','M','N','O',
                'P','R','S','T','U','F','H','Ts','Ch','Sh','Sht','A','Y','Yu','Ya'];
        $text = str_replace($cyr, $lat, $text);
        // lowercase
        $text = strtolower($text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }
}
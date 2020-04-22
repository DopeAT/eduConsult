<?php

if (! function_exists('slug')) {
    function slug($string){

        //remove all characters not in list: underscore | letters | numbers | whitespace
        $string = preg_replace('![^'.preg_quote('_').'\pL\pN\s]+!u','',mb_strtolower($string));
        //replace underscore and whitespace with dash -
        $string = preg_replace('!['.preg_quote('-').'\s]+!u','-',$string);
        //remove whitespace
        return trim($string, '-');

    }
}

if (! function_exists('successMsg')) {
    function successMsg($message)
    {
        return '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>' . $message . '</strong>
                </div>';
    }
}


if (! function_exists('errorMsg')) {
    function errorMsg($message)
    {

        return '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>' . $message . '</strong>
            </div>';

    }
}

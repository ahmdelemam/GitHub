<?php

/*
 * @param 1- the function that will handel the error
 * @param 2- type of error handling ex:- E_ALL 
 * set_error_handeler();
 * 
 */
set_error_handler('errorHandler', E_ALL);
/*
 * @param1 $number of errors
 * @param2 $text of error ex:- you have error in ....
 * @param3 $theFile that has the error
 * @param4 $theLine where the error found 
 */
function errorHandler($number, $text, $theFile, $theLine){
    /*
     * get the length of out put Buffer if found any Buffer then clear
     * chr(10) meaan new line
     */
    if(ob_get_length()) ob_clean ();
    $errorMessaage = 'Error: ' . $number . chr(10).
                     'Error: ' . $text . chr(10).
                     'Error: ' . $theFile . chr(10).
                     'Error: ' . $theLine ;
    echo $errorMessaage;
    exit;
}
?>

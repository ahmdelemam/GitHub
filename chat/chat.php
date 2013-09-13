<?php

require_once ('chat.class.php');
$mode = $_POST['mode'];
$id = 0;
$chat = new chat();

if($mode == 'SendAndRetrieveNew'){
    $name = $_POST['name'];
    $message = $_POST['message'];
    $color = $_POST['color'];
    $id = $_POST['id'];
    
    if($name != '' || $message != '' || $color != ''){
        $chat->postNewMessage($name, $message, $color);
    }
}elseif ($mode == 'DeleteAndRetrieveNew') {
    $chat->deleteAllMessage();
}elseif ($mode == 'RetrieveNew') {
    $id = $_POST['id'];
}
if (ob_get_length())
    ob_clean();
/*
 * header are sent to prevent browsers from caching
 */
header('Cache-Control: no-caache, must-revalidate');
header('Pragma: no-cache');
header('Content-Type: text/xml');
/*
 * $id = this is the last message i have seen please, get all the message after that
 */
echo $chat->getNewMessages($id);
?>

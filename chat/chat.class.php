<?php

require_once('config.php');
require_once('error_handler.php');
class chat {
    private $mysqli;
    /*
     * constructor to open database connection
     */
    function __construct() {
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    }
    /*
     * destructor to close database connection
     */
    function __destruct() {
        $this->mysqli->close();
    }
    /*
     * empty the table chat
     */
    function deleteAllMessage() {
        $query = 'TRUNCATE TABLE chat';
        $result = $this->mysqli->query($query);
    }
    /*
     * destructor to close database connection
     */
    function postNewMessage($user_name, $message, $color) {
        $user_name = $this->mysqli->real_escape_string($user_name);
        $message = $this->mysqli->real_escape_string($message);
        $color = $this->mysqli->real_escape_string($color);
        $query = 'INSERT INTO chat (posted_on, user_name, message, color) VALUES (NOW(),"'.$user_name.'","'.$message.'","'. $color .'")';
        $result = $this->mysqli->query($query);
    }
    function getNewMessages($id=0){
        $id = $this->mysqli->real_escape_string($id);
        if($id>0){
            $query = 'SELECT message_id, user_name, message, color, DATE_FORMATE(posted_on, "%H:%i:%s") AS posted_on FROM chat WHERE message_id = '. $id .' ORDER BY message_id ASC';
        }  else {
            $query = 'SELECT message_id, user_name, message, color, posted_on FROM (SELECT message_id, user_name, message, color, DATE_FORMATE(posted_on, "%H:%i:%s") AS posted_on FROM chat ORDER BY message_id DESC LIMIT 50) AS last50 WHERE message_id = '. $id .' ORDER BY message_id ASC';
        }
        $result = $this->mysqli->query($query);
        
        /*
         *  XML Ressponse  
         */
        $response = '<?xml version="1.0" encoding="utf-8" standalone="yes" ?>';
        $response .= '<response>';
        $response .= $this->isDatabaseCleared($id);
        if($result->num_rows){
            while ($row = $result->fetch_array(MYSQLI_ASSOC)){
                $id = $row['message_id'];
                $color = $row['color'];
                $userName = $row['user_name'];
                $time = $row['posted_on'];
                $message = $row['message'];
                
                $response .= '<id>'. $id .'</id>'.
                             '<color>'. $color .'</color>'.
                             '<time>'. $time .'</time>'.
                             '<name>'. $userName .'</name>'.
                             '<message>'. $message .'</message>';
            }
            $result->close();
        }
        $response .= '';
        $response .= '</response>';
        return $response;
    }
    
    private function isDatabaseCleared($id){
        if($id>0){
            $check_clear = 'SELECT count(*) old FROM chat WHERE message_id = '.$id;
            $result = $this->mysqli->query($check_clear);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if($row['old']==0)
                return '<clear>true</clear>';
        }
        return '<clear>false</clear>';
    }
}

?>
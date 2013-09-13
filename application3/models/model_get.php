<?php

class Model_get extends CI_Model {
    /*
      @param page name
      @return result from DataBase
     */

    function getData($page) {
        /*
          @param1 table name
          @param2 where condition
         */
        $query = $this->db->where(array("page" => $page));
        return $this->db->get('pagedata')->result();
    }

}
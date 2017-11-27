<?php

class Tasks{

    public static $task = "";

    private $_db,
            $_data;

    public function __construct(){
        $this->_db = DB::getInstance();
    }

    public function displayTask(){
        return $this->_db->displayAll();
    }

    public function addTask($item){
        $this->_db->insert('tasks', array(
            'item' => $item,
            'joined' => date('Y-m-d H:i:s')
        ));
    }

    public function deleteTask($id){
        $this->_db->remove($id);
    }


}
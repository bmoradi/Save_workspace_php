<?php
/*
 * This class save workspace variable
 */
Class Save_workspace_php {

    //save destination
    private $file_name = "save_workspace.txt";

    //default key that doesnt save
    private $ignore_array_key_list = array(
        "_GET", "_POST", "_COOKIE", "_FILES", "_SERVER", "argv", "argc" //windows or linux simulation default key
    );

    /*
     * Change location of save files
     * Return void
     */
    public function set_file_name($file_des){
        //change file default save path
        $this->file_name = $file_des;

    }

    public function save_workspace(){

    }

    public function restore_workspace(){

    }

}
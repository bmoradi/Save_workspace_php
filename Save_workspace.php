<?php
/*
 * This class save workspace variable
 */
Class Save_workspace_php {

    //name save file
    private $workspace_name = "workspace.db";

    //this is about location of the save data
    public $info = "This is for section ...";

    //default key that does not save
    private $ignore_array_key_list = array(
        "_GET", "_POST", "_COOKIE", "_FILES", "_SERVER", "argv", "argc" //windows or linux simulation default key
    );

    public function save_workspace(){

    }

    public function restore_workspace(){

    }

    /*
     * Change location of file save
     * Return void
     */
    public function set_file_name($file_des){

        $this->workspace_name = $file_des;
    }

    /*
     * Check workspace file is exist
     * Return TRUE|FALSE
     */
    public function exist_workspace(){

        //Delete cache files
        clearstatcache();

        if( file_exists($this->workspace_name)){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    /*
     * Delete workspace file
     * Return TRUE|FALSE
     */
    public function delete_workspace(){

        if($this->exist_workspace()){
            unlink($this->workspace_name);
            return TRUE;
        }else{
            return FALSE;
        }

    }

}

<?php
/*
 * This class save workspace variable
 */
Class Php_state_freeze {

    //workspace file name location
    private $workspace_name = "workspace.db";

    //This is info about workspace data that saves
    public $_info = "This is for section ...";

    //This is new array for save cross platform data
    public $data = [];

    //default key that does not save
    private $ignore_array_key_list = array(
        "_GET", "_POST", "_COOKIE", "_FILES", "_SERVER", "argv", "argc" //windows or linux simulation default key
    );

    public function save_workspace(array $input_data){

        //extract data portion
        foreach($input_data as $key => $val){
            if( ! in_array($key,$this->ignore_array_key_list)){
                $this->data[$key] = $val ;
            }
        }

        //add info data to array
        $this->data["_info"] = $this->_info;

        //final state save in file
        file_put_contents($this->workspace_name, serialize($this->data));
    }

    public function restore_workspace(){
        //code
    }

    /*
     * Change the location of workspace file
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

//var_export
//$b = var_export($a, true);
//var_dump($b);
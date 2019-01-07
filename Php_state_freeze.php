<?php
/*
 * This class save workspace variable
 */
Class Php_state_freeze {

    //workspace file name location
    private $workspace_name = "workspace.db";

    //This is info about workspace data that saves
    private $_info = "This is for section ...";

    //This is new array for save cross platform data
    private $data = [];

    //default key that does not save
    private $ignore_array_key_list = array(
        "_GET", "_POST", "_COOKIE", "_FILES", "_SERVER", "argv", "argc" //windows or linux simulation default key
    );

    /*
     * This method gather data save data in db format
     * Return void
     */
    public function save_workspace(array $input_data){

        //extract data portion
        foreach($input_data as $key => $val){
            if( ! in_array($key,$this->ignore_array_key_list)){
                $this->data[$key] = serialize($val) ;
            }
        }

        //add info data to array
        $this->data["_info"] = serialize($this->_info);

        //final state save in file
        file_put_contents($this->workspace_name, serialize($this->data));
    }

    public function restore_workspace(){
        //code

        //return a function to convert db to variable
    }
	/*
	 *	This method to set a short informatin  of the workspace
	 *  Return void
	 */
	public function set_info(string $str){
		
		$this->_info = $str;
		
	}
	
	/*
	 * This method is to get info property of class
	 * Return _info
	 */
	public function get_info(){
		
		return $this->_info;
		
	}

    /*
     * Change the location of workspace file
     * Return void
     */
    public function set_file_name(string $file_des){

        $this->workspace_name = $file_des;
    }
	
	 /*
     * This method is to get location of the workspace file
     * Return workspace_name
     */
    public function get_file_name(){

        return $this->workspace_name;
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
<?php
class DB_CONNECT {
 
    // constructor
    function __construct() {
        // connecting to database
        $this->connect();
    }
 
    // destructor
    function __destruct() {
        // closing db connection
        $this->close();
    }
 
    /**
     * Function to connect with database
     */
    function connect() {
        // import database connection variables
        require_once __DIR__ . '/db_config.php';
 
        // Connecting to mysql database
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysqli_connect_error());
 
        // Selecing database
        $db = mysqli_select_db($con, DB_DATABASE) or die(mysqli_connect_error()) or die(mysqli_connect_error());
 
        // returing connection cursor
        return $con;
    }
 
    /**
     * Function to close db connection
     */
    function close() {
        // closing db connection
        mysqli_close($this->connect());
    }
 
    function uploadFile($name) {
        $file = $_FILES;
        $result = array();
        $path = 'upload/';
        // checks if the file is empty
        if (empty($file[$name]['name']))
        {
            $result['isUpload'] = 0;
            $result['filename'] = 0;
            $result['realname'] = 0;
            return $result;
        } else {
            $fileName = time().$file[$name]['name'];
            $realName = $file[$name]['name'];
            $uploadFile = $path.$fileName;
            if (move_uploaded_file($file[$name]['tmp_name'], $uploadFile)) // uploads file into folder
            {
                $result['isUpload'] = true;
                $result['filename'] = $fileName;
                $result['realname'] = $realName;
                return $result;
            }
        }
    }
}
 
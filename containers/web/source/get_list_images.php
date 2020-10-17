<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    get_list_image();

    function get_list_image() {
        $folder = 'images/';
        $files = scandir($folder);
        $data = [];

        foreach ($files as $file) {
            $regex = '/[0-9a-zA-Z]+(.png|.jpg|.jpeg|.gif)/';
            if (preg_match($regex, $file)) {
                $data[] = $file;
            }
        }
        
        echo json_encode($data);
    }
?>
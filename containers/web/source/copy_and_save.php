<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    grab_image($_POST['txtLink']);

    function grab_image($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        $raw = curl_exec($ch);
        curl_close($ch);
        
        $extend = getExtension($url);
        $imgName = "IMG_" . date('Ymd_His') . '.' . $extend;
        $saveto = 'images/' . $imgName;
        $fp = fopen($saveto, 'x');
        fwrite($fp, $raw);
        fclose($fp);

        $data = [
            'new_img' => $imgName,
        ];
        echo json_encode($data);
    }

    function getExtension($url) {
        $aryLink = explode('/', $url);
        $imageLink = $aryLink[(count($aryLink) - 1)];
        $ary = explode('.', $imageLink);
        $extend = $ary[(count($ary) - 1)];
        return $extend;
    }
?>
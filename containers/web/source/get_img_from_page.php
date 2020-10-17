<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    getAllImage($_POST['txtLink']); 

    function getAllImage($url) {
        // Get domain
        $domain = getDomain($url);

        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTMLFile($url);
        $aryImg = $dom->getElementsByTagName('img');
        $data = [];
        foreach ($aryImg as $key => $elImg) {
            $regex = '/^(?:https?:\/\/)?(?:[^@\/\n]+@)?(?:www\.)?([^:\/?\n]+)/';
            $imgSrc = $elImg->getAttribute('src');
            preg_match($regex, $imgSrc, $ary);
            if (empty($ary)) {
                $imgSrc = $domain . '/' . $imgSrc;
            }
            $data[] = $imgSrc;
        }

        echo json_encode($data);
    }

    function getDomain($url) {
        $regex = '/^(?:https?:\/\/)?(?:[^@\/\n]+@)?(?:www\.)?([^:\/?\n]+)/';
        preg_match($regex, $url, $matches);
        $domain = $matches[0];

        return $domain;
    }

    function showArr($ary) {
        echo '<pre>';
        print_r($ary);
        echo '</pre>';
        die;
    }
?>
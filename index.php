<?php 
    function GetElemnt($URL,$STRING,$ElEMENT_VALUE = null){
        $elementChar = array();
        $url = file_get_contents($URL);
        $strpos = strpos($url, $STRING);
        $str_split = str_split($url);
        foreach ($str_split as $key => $value) {
            if ($key > $strpos) {
                $elementChar[] = $value;
                if ($value == '>') {
                    $elementChar[] = $ElEMENT_VALUE;
                    break;
                }
            }
        }
        $i = $strpos;
        while($i > 0) {
            array_unshift($elementChar,$str_split[$i]);
            if ($str_split[$i] == '<') {
                break;
            }
            $i--;
        }
        return implode('',$elementChar);
    }

    echo GetElemnt('https://utorrent.ar.uptodown.com/windows/download','alt="uTorrent icon"');
?>


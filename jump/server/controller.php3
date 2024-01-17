<?

function chkVersion($version) {
    $testSplit = explode ('.', $version);
    $currentSplit = explode ('.', phpversion ());

    if ($testSplit[0] < $currentSplit[0]) {
        return True;
    }
    if ($testSplit[0] == $currentSplit[0]) {
        if ($testSplit[1] < $currentSplit[1]) {
            return True;
        }
        if ($testSplit[1] == $currentSplit[1]) {
        if ($testSplit[2] <= $currentSplit[2])
            return True;
        }
    }
    return False;
}

function  tbAff($tab){
    $tmp="\n"; 
    foreach($tab AS $clé => $val){ 
        if( !is_array($val) ){ 
            $tmp.="[$clé] => $val\n"; 
        }else{ 
            $tmp.="[$clé] =>\n"; 
            $tmp.=tbAff($val); 
        } 
    } 
    return $tmp.="\n";
}


$op=fopen('./test.txt','a');
fwrite($op,tbAff(chkVersion('4.1.0') ? $_POST : $HTTP_POST_VARS)."\n--------------\n".tbAff(chkVersion('4.1.0') ? $_GET : $HTTP_GET_VARS));


?>

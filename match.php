<?php


$dir   = $argv[1];
$exta  = $argv[2];
$extb  = $argv[3];

$files = scandir($dir);

$a = $b = array();

printf("checking dir %s for mismatches between extensions %s and %s\n", $dir, $exta, $extb);

foreach($files as $key => $file){
    if(is_dir($file)){
        unset($files[$key]);
    }
    $file = new SplFileInfo($file);

    if($file->getExtension() == $exta){
        $a[$file->getBasename(sprintf(".%s",$exta))] = true; 

    }elseif($file->getExtension() == $extb){
        $b[$file->getBasename(sprintf(".%s",$extb))] = true;

    }else{
        continue;
    }
}


$singles = array($exta => array(), $extb => array());

foreach($a as $file => $not_used){
    if(!array_key_exists($file, $b)){
        $singles[$exta][] = $file;
    }
    unset($b[$file]);
}

foreach($b as $file => $not_used){
    
    if(!array_key_exists($file, $a)){
        $singles[$extb][] = $file;
    }
}


foreach($singles as $ext => $files){
    printf(".%s files without mates:\n",$ext);
    foreach($files as $file){
        printf("%s.%s\n", $file, $ext);
    }
}


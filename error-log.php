<?php
try {
        // your code here 
    }
    catch (Exception $e) {
      return  errorInfoFun($e,$inputData='');
    }

function errorInfoFun($e,$inputData){
    $timeStamp = date('d-M-Y H:i:s');
    $request = $e->getMessage();
    if($inputData !=''){
        $myfile = fopen("errorFile.txt", "a") or die();
        $errorMsg = 'Error on line '.$e->getLine().' in '. end(explode("/",$e->getFile()))."\n".' Message : '.$e->getMessage()."\n";
        fwrite($myfile, 'Date : '.$timeStamp."\n".'Report : '.$errorMsg."\n");
        foreach($inputData as $key => $d){
            $newData =  $key." => ". $d."\n";
            fwrite($myfile, $newData);
        }
        fwrite($myfile,"\n"."-----------------------------------------------------------------------------\n");
        fclose($myfile);
    }
    return $request;
}
?>
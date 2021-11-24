<?php require('converter.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-size: 10px;
    }
    .two_columns-elem {
        width: 50%; 
        border: 1px solid green;
    }
    td {
        border-color: red;
    }
    form {
        text-align: center;
        padding: 20px;
        font-size: 20px!important;
    }
</style>
<body>
    <form action="" method="POST">
            <input type="text" name="out_text" value="ul. Twarda 18">
            <input type="submit" name="for_submit" value="Замінити" >
    </form>
    
    <section class="two_columns" style="display: flex;">
        
        <?php 
        $data = $_POST;
        var_dump($data['out_text']);
        if(isset($data['for_submit'])){ 
            
            
            ?>
        <div class="two_columns-elem">
                <?php
                    $out_text = $data['out_text'];
                    $file1 = new Files();
                    $file1->$filename = 'Itsmiladress_inventory.csv';
                    $arr1 = $file1->inArr();
                    var_dump($arr1);
                    $position = $file1->findPos($arr1, $out_text);
                    //print_r($position);
                    $pos = explode(' ', $position);
                    print_r($pos);
                ?>  
            
        </div>
        <div class="two_columns-elem">
                <?php
                    $file2 = new Files();
                    $file2->$filename = 'itsmilla_all_inventory.csv';
                    //$file2->showText();
                    $arr2 = $file2->inArr();
                    //var_dump($arr2);
                    $arr2[$pos[0]][$pos[1]] =  $out_text;
                    var_dump($arr2);
                    $file2->toCSVFile($arr2);
                ?>
        </div>
        <?php };?>
    </section>
    
    
    
 
   
    
</body>
</html>
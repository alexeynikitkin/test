<?php


class Files {
    public $filename = '';
    //public $text;
    public function inArr(){
        echo '<pre>';
        $res = [];
        if(($handler = fopen($this->$filename, 'r')) !== false){
            while(($data = fgetcsv($handler, 1000, ',')) !== false){
                $res[] = $data;
            }
            fclose($handler);
        } 
        $log = date('Y-m-d H:i:s') . ' Закинуто файл '. $this->$filename.' в масив '. $res;
        file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
        return $res;
    }
    public function showText(){
        echo '<pre>';
        if(($handler = fopen($this->$filename, 'r')) !== false){
            while(($data = fgetcsv($handler, 1000, ',')) !== false){
                //print_r($data);
                $out = '';
                
                for ($i=0; $i < count($data); $i++){ 
                    $out .= ' '.$data[$i]. ' ';
                }
                echo $out;
                echo '<hr>';
            }
            fclose($handler);
        }
    }
    public function findPos($array, $text){
        echo '<br>Позиція заміняючого тексту: <hr>';
        for($i = 0; $i < count($array); $i++){
            for ($j = 0; $j < count($array); $j++) { 
                if($array[$i][$j] == $text){
                    $log = date('Y-m-d H:i:s') .' Позиція строки' .$text. ' знайдена - '.$i.' '.$j;
                    file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
                    return "$i $j";
                }
            }            
        }    
    } 

    public function toCSVFile($array){    
        $handler = fopen($this->$filename, "w");
        foreach($array as $line){
            fputcsv($handler, $line, ',');
        }
        fclose($handler);
        $log = date('Y-m-d H:i:s') . ' Замінено строку в масиві, вcтавлено масив в файл '.$this->$filename;
        file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
    }  
}
?>
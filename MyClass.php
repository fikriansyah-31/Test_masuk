<?php

class MyClass {
    protected $filename;
    protected $str;
    protected $alternateStr;
    protected $csvStr;


    public function __construct($str)
    {
        $this->str = $str;
    }


    public function getStr()
    {
        return $this->str;
    }


    public function getAlternateStr()
    {
        return $this->alternateStr;
    }


    public function setFilename($filename)
    {
        $this->filename = $filename;
    }


    public function setLowerCase(){
        $this->str = strtolower($this->str);
    }


    public function setAlternateCase(){
        $chars = str_split($this->str);
        $num = 1;
        $alternateStr = '';
        foreach($chars as $char){
            if ($num % 2 == 0){
                $alternateStr .= strtoupper($char);
            } else {
                $alternateStr .= $char;
            }
            $num++;
        }
        $this->alternateStr = $alternateStr;
    }


    public function setCSV()
    {
        $chars = str_split($this->str);
        $num = 1;
        $csvStr = '';
        foreach($chars as $char){
            $csvStr .= $char . ',';
            $num++;
        }

        $this->csvStr = substr($csvStr, 0, strlen($csvStr)-1);
    }


    public function getCSV()
    {
        return $this->csvStr;
    }



    public function writeContent($format='csv')
    {
        $filename = $this->filename;
        $content  = $this->getCSV();

        $fp = fopen($filename, 'a');
        fwrite($fp, $content);
        
        echo "CSV created \n";
        fclose($fp);
    }

}
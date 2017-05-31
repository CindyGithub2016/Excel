<?php


require_once('Excel/PHPExcel.php');
require_once('Excel/PHPExcel/IOFactory.php');
require_once('Excel/PHPExcel/Reader/Excel2007.php');

$path 	     = 'd:\\';
$filename	 = "test2.xlsx";

$objReader   = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load($path . $filename); 
$sheet         = $objPHPExcel->getSheet(0);    
$highestRow    = $sheet->getHighestRow(); // 取得总行数    
$highestColumn = $sheet->getHighestColumn(); // 取得总列数   

$data = array();
//循环读取excel文件
for($i = 4;$i <= $highestRow;$i++) {    
    for($j='A';$j <= $highestColumn;$j++)   
     {    
        $data[$i][] = $objPHPExcel->getActiveSheet()->getCell("$j$i")->getValue(); 
    }
}

var_dump("<pre>", $data);die;
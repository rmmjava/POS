<?php
    
    $report = isset($_POST['report']) ? $_POST['report']:'';
    
    $datareport = new Report_data();
    $from = isset($_POST['datefrom']) ? $_POST['datefrom'] : null;
    $to = isset($_POST['dateto']) ? $_POST['dateto'] : null;
    
    if($to == ''){
        $to = date('m/d/y',strtotime($to . "+1 days"));
    }
    if($report == 'Chemicals'){
        $datareport->getchemicals($from,$to); 
        
    }else if($report == 'Items'){
        $datareport->getitems($from,$to);
        
    }else if($report == 'Suppliers'){
        $datareport->getsuppliers($from,$to);  
        
    }else if($report == 'Logs'){
        $datareport->getlogs($from,$to);   
    }
       
    class Report_data {
        
        function getchemicals($from,$to){
            include('../reports/chemical_report.php'); 
        }
        
        function getitems($from,$to){
            include('../reports/item_report.php'); 
        }
        
        function getsuppliers($from,$to){
            include('../reports/supplier_report.php');   
        }
        
        function getlogs($from,$to){
            include('../reports/log_report.php');    
        }
    }
?>
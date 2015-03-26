<?php
require_once "praveenlib.php";
require_once "datas.php";

$keys=array('id','name','role','license','expiry','status','verification');
if(checkPOST($keys)){
    $dbconnection = connectSQL($dbdetails);

    if(mysqli_connect_errno()) //Check if any error occurred on connection
    {
        echo "db_connection_fail";
    }
    else
    {

        $id=safeString($dbconnection,$_POST['id']);
        $name=safeString($dbconnection,$_POST['name']);
        $role=safeString($dbconnection,$_POST['role']);
        $license=safeString($dbconnection,$_POST['license']);
        $expiry=safeString($dbconnection,$_POST['expiry']);
        $status=safeString($dbconnection,$_POST['status']);
        $verification=safeString($dbconnection,$_POST['verification']);

        $query= "insert into tm_employee(id,role,name,license_number ,expiry,employee_status,verification)values("
            .$id.",'".$role."','".$name."','".$license."','".$expiry."','".$status."','".$verification."')";
        $result=mysqli_query($dbconnection,$query);
        if($result){
            echo "success";
        }else{
            echo "bd_error_1 ".mysqli_error($dbconnection);
        }
    }
}else{
    echo "not_enough_data";
}


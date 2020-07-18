<?php
//Class for datasbe connectivity and othetr fiuntionlity such as user validation,
// new user registration storw to dataabse
//check thelogin detailsetc..
//first we define the datasbe settings here
define("db_server","localhost");
define("db_user","root");
define("db_pass","");
define("db_name","school_test"); // now defining databsae as our new dtaabase name

//private $host = "localhost";
  //  private $db_name = "id11952819_api_db";
    //private $username = "id11952819_dolapo";
    //private $password = "Indomie&Egg1";

//ok 
//here we create class

Class db_con {   // class  name deined as db_con
private $dbh=null;
    function __construct()  //builing a constructor for generate connection string
    {
$con=mysqli_connect(db_server,db_user,db_pass,db_name);  // creating mysql connection
$this->dbh=$con;
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
}

 
public function InsertTableName($MyTableName){  
    //thi sis the function to process the user name and password and send result from here
$result=mysqli_query($this->dbh,"insert into formlist(formname) values('".$MyTableName."')");

return $result;
 
}
     public function find($query){
$result = $this->dbh->query($query);
        
        if ($result == false) {
            return false;
        } 
         
        
        return $result;
    }

           
    public function execute($query)
    {
        $result = $this->dbh->query($query);
        
        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        } else {
            return true;
        }        
    }

public function GetTableList(){  
    //thi sis the function to process the user name and password and send result from here
    $result=mysqli_query($this->dbh,"select * from FormList ");
//checking the user name nad password from usr table and getting full name of the user 
return $result;   //// this is the resultent value sening from this function.

}
public function GetTableListReport(){  
    //thi sis the function to process the user name and password and send result from here
    $result=mysqli_query($this->dbh,"select * from FormList");
//checking the user name nad password from usr table and getting full name of the user 
return $result;   //// this is the resultent value sening from this function.

}

public function GetTableField($MyTableName){  
    //thi sis the function to process the user name and password and send result from here
    $result=mysqli_query($this->dbh,"SHOW COLUMNS FROM $MyTableName WHERE field != 'id'");
//checking the user name nad password from usr table and getting full name of the user 
return $result;   //// this is the resultent value sening from this function.

}

public function InssertRecordField($InsertTableName,$InsertFields,$InsertValues){  
    //thi sis the function to process the user name and password and send result from here
$result=mysqli_query($this->dbh,"insert into $InsertTableName($InsertFields) values($InsertValues)");

return $result;
 
}


public function GetAllColumns($MyTableName){  
    //thi sis the function to process the user name and password and send result from here
    $result=mysqli_query($this->dbh,"SHOW COLUMNS FROM $MyTableName");
//checking the user name nad password from usr table and getting full name of the user 
return $result;   //// this is the resultent value sening from this function.

}

public function GetAllMyFields($MyTableName){  
    //thi sis the function to process the user name and password and send result from here
    $result=mysqli_query($this->dbh,"select * from $MyTableName");
//checking the user name nad password from usr table and getting full name of the user 
return $result;   //// this is the resultent value sening from this function.

}


 


}

 


?>

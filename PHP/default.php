<?php
$query = $_GET['username'];
$server = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'cheapoU';

if (isset($_POST["AddUser"]))
{
    $dbConn=mysqli_connect($erver,$username,$password);
    if(!$dbConn){
        die('Not connected :'.mysqli_connect_error());
    }
    else{
        mysqli_select_db($dbname,$dbConn);
        $password=$_POST['password'];
        $securepassword=password_hash($_POST['password'],PASSWORD_DEFAULT);
        //$_POST['password']=$securepassword;
        $sql="INSERT INTO User (id, firstname, lastname, username,password)
        VALUES ('$_POST[firstname]', '$_POST[lastname]', '$_POST[username]','$securepassword')";
        mysqli_query($sql,$dbConn);
        mysqli_close($dbConn);
    } 
}
if (isset($_GET["username"]))
{
    $DBconn = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
    $query1 = $DBconn->query("SELECT * FROM User WHERE username LIKE '%$query%'");
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($results as $line)
    {
       $rowid=$line['id'];
    }
    echo($rowid);
    $query2 = $DBconn->query("SELECT * FROM message WHERE recipient_id LIKE '%$rowid%'");
    $results2 = $query2->fetchAll(PDO::FETCH_ASSOC);
    $mergeQueryRes=array_merge($results,$results2);
    foreach ($mergeQueryRes as $row)
    {
    
        echo ($row['id']  . " " .$row['firstname'] ." ". $row['lastname'] ." ". $row['username'] ." ". $row['password']." ".$row['id1']." ".$row['recipient_id']." ".$row['user_id']." ".$row['subject']." ".$row['body']." ".$row['date_sent']);
    }


}
if(isset($_POST["Send"]))
{
        $dbConn=mysqli_connect($host,$username,$password);
    if(!$dbConn){
        die('Not connected :'.mysqli_connect_error());
    }
    else{
        mysqli_select_db($dbname,$dbConn);
        $_POST['user_id']=$userid;
        $date = date(m-d-y);
        $sql2="INSERT INTO message (recipient_id, user_id, subject,body,date_sent)
        VALUES ('$_POST[recipient_id]', '$_POST[user_id]', '$_POST[subject]','$_POST[message]','$date')";
        mysqli_query($sql2,$dbConn);
        mysqli_close($dbConn);
        echo("please".$userid);
    }
}

?>
<?php
	
	include('conn.php');
	
	if(isset($_REQUEST['login']))
	{
		$unm=$_REQUEST['nm'];
		$pass=$_REQUEST['pass'];
	
		$sq="select * from reg where name='$unm' AND
		pass='$pass'";
		$res=$conn->query($sq);
		$ans=$res->num_rows;
		if($ans>0)
		{
			echo "success full login";
			header('location:design.php');
		}
		else
		{
			echo "not success";
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
	<form action="" method="POST">
    
        <table border="2" align="center">
    	<caption>Registration Form</caption>    
        <tr>
        	<td>Username</td><td><input type="text" 
            name="nm" /></td>
        </tr>
        
        <tr>
        	<td>password</td><td><input type="password" 
            name="pass" /></td>
        </tr>
        
        
        <tr>
    <td colspan="2" align="center"><input type="submit" 
           value="login" name="login" /></td>
        </tr>
        </table>
       </form>
      </body>
     </html>
<?php
include('conn.php');
	if(isset($_REQUEST['insert']))
	{
		$unm=$_REQUEST['nm'];
		$pass=$_REQUEST['pass'];
		$con=$_REQUEST['country'];
		
		$sql="insert into reg (name,pass,country)
		 values('$unm','$pass','$con')";
		 
		$res=$conn->query($sql);
		if($res)
		{
			echo "success inserted";
			header('location:show.php');
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
        	<td>country</td>
            <td><select name="country"/>
            
            <?php
				$sq="select * from country";
				$s=$conn->query($sq);
				while($row=$s->fetch_object())
				{
			?>
            
            <option value="<?php echo $row->cid;?>">
            <?php echo $row->cnm;?>
            </option>
            <?php
				}
			?>
            </select>
            </td>
        </tr>
        
        <tr>
    <td colspan="2" align="center"><input type="submit" 
           value="insert" name="insert" /></td>
        </tr>
        </table>
    </form>
</body>
</html>
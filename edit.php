<?php
include('conn.php');

	if(isset($_REQUEST['eid']))
	{
		$id=$_REQUEST['eid'];
		
		$sq="select * from reg where id=$id";
		$res=$conn->query($sq);
		$r=$res->fetch_object();
	
	if(isset($_REQUEST['update']))
	{
		$unm=$_REQUEST['nm'];
		$pass=$_REQUEST['pass'];
		$con=$_REQUEST['country'];
		
		$sq="update reg set name='$unm',pass='$pass'
		,country='$con' where id=$id";
		
		$res=$conn->query($sq);
		if($res)
		{
			echo "updated";
			header('location:show.php');
		}
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
            name="nm" value="<?php echo $r->name;?>"/></td>
        </tr>
        
        <tr>
        	<td>password</td><td><input type="password" 
            name="pass" value="<?php echo $r->pass;?>"/></td>
        </tr>
        
        <tr>
        	<td>country</td>
            <td><select name="country"/>
            
            <?php
				$sq="select * from country";
				$s=$conn->query($sq);
				while($row=$s->fetch_object())
				{
					if($r->country==$row->cid)
					{
			?>
            
            <option value="<?php echo $row->cid;?>" selected="selected">
            <?php echo $row->cnm;?>
            </option>
            <?php
					}
					else
					{
				?>
            
            <option value="<?php echo $row->cid;?>">
            <?php echo $row->cnm;?>
            </option>
            <?php		
						
					}
				}
			?>
            </select>
            </td>
        </tr>
        
        <tr>
    <td colspan="2" align="center"><input type="submit" 
           value="EDIT" name="update" /></td>
        </tr>
        </table>
    </form>
</body>
</html>
<?php
	include('conn.php');
	
	if(isset($_REQUEST['did']))
	{
		$id=$_REQUEST['did'];
		
		$sq="delete from reg where id=$id";
		$res=$conn->query($sq);
		if($res)
		{
			?>
            <script>
			alert('your record is successfully deleted');
			window.location="show.php";
            </script>
            <?php
		}
		else
		{
			echo "not success deleted";
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

<table border="2" align="center">
<caption>All Reg Data</caption>

	<tr>
    <td>ID</td>
    <td>NAME</td>
    <td>PASSWORD</td>
    <td>COUNTRY</td>
    <td colspan="2" align="center">ACTION</td>
    </tr>
    
    <?php
		$sq="select * from reg join country on country.cid=reg.country";
		$s=$conn->query($sq);
		while($row=$s->fetch_object())
		{
	?>
    	<tr>
    <td><?php echo $row->id;?></td>
    <td><?php echo $row->name;?></td>
    <td><?php echo $row->pass;?></td>
    <td><?php echo $row->cnm;?></td>
    <td  align="center">
    <a href="edit.php?eid=<?php echo $row->id;?>">EDIT</a></td>
        <td  align="center">
    <a href="show.php?did=<?php echo $row->id;?>">DELETE</a></td>
    
    </tr>
    <?php
		}
	?>
</table>
</body>
</html>

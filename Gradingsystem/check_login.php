<?php
function check_loginAdmin()
{
if(($_SESSION['type'])=="Admin")
	{
	}
else{
    header("Location: user.php");
    }
}
function check_loginUser()
{
if(($_SESSION['type'])=="admin")
	{
    header("Location: admin.php");

	}
else{
    }
}
function check_login()
{
if(($_SESSION['type'])=="admin")
	{
    header("Location: admin.php");
	}
else{
    header("Location: user.php");
    }
}
?>

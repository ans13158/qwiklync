<?php

	$mysql_host='localhost';
	$mysql_user='root';
	$mysql_pass='ans';

	$connection_error='Couldn\'t connect to the database.Please Enter valid details.';

	$mysql_db='qwiklync';
	$conn=mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);
						
	if(!$conn)
	{
		die($connection_error);
	}
	
	function removeFolder($folder)
	{
		if(is_dir($folder)=== true)
		{
			$folderContents= scandir($folder);
			unset($folderContents[0],$folderContents[1]);
			
			foreach($folderContents as $content=> $contentName)
			{
				$currentPath=$folder."/".$contentName;
				$filetype= filetype($currentPath);
				if($filetype=='dir')
				{
					removeFolder($currentPath);
				}
				else
				{
					unlink($currentPath);
				}
				
				unset($folderContents[$content]);
			}
			
			rmdir($folder);
		}
	}
	
?>
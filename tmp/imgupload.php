<?php
define('ROOT',dirname(__FILE__).'/');

if ((($_FILES["imgOne"]["type"] == "image/gif")
|| ($_FILES["imgOne"]["type"] == "image/jpeg")
|| ($_FILES["imgOne"]["type"] == "image/png")
|| ($_FILES["imgOne"]["type"] == "image/pjpeg"))
&& ($_FILES["imgOne"]["size"] < 1000000))
  {
  if ($_FILES["imgOne"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["imgOne"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["imgOne"]["name"] . "<br />";
    echo "Type: " . $_FILES["imgOne"]["type"] . "<br />";
    echo "Size: " . ($_FILES["imgOne"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["imgOne"]["tmp_name"] . "<br />";
    echo "Return Code: " . $_FILES["imgOne"]["error"] . "<br />";
    if (file_exists("userimg/" . $_FILES["imgOne"]["name"]))
      {
      echo $_FILES["imgOne"]["name"] . " already exists. ";
      }
    else
      {
	    if(is_uploaded_file($_FILES['imgOne']['tmp_name'])){  
                $stored_path = ROOT.'userimg/'.basename($_FILES['imgOne']['name']);  
		
		if(move_uploaded_file($_FILES['imgOne']['tmp_name'],$stored_path)){
                    echo "Stored in: " . $stored_path;
		}else{  
                    echo 'Stored failed:file save error:' .  $stored_path;  
                }
		$test = "aws s3 cp ".$stored_path." s3://data.aiit-cdp-10.work";
		//$test = "ls";
		$last = shell_exec($test); 
		echo "<br />Result: " . $last;
                echo "<br />test: " . $test; 
            }else{  
                echo 'Stored failed:no post ';  
            }
      }
    }
  }
else
  {
  echo "Invalid file";
  }
?>

<?php

function no_check($data)
{    
   
    return $data;
        
}



function sqli_check_1($data)
{
   $input = str_replace("'", "''", $data);
   
    return $input;
       
}


function file_upload_check_1($file, $file_extensions  = array("asp", "aspx", "dll", "exe", "jsp", "php"), $directory = "images")
{
    
    $file_error = "";

    if($file["name"] == "")
    {
        
        $file_error = "Please select a file...";
        
        return $file_error;
        
    }
    


    if(is_file("$directory/" . $file["name"]))
    {
        
        $file_error = "Sorry, the file already exists. Please rename the file...";      
        
    }
    
    return $file_error;
    
}

function file_upload_check_2($file, $file_extensions  = array("jpeg", "jpg", "png", "gif"), $directory = "images")
{
    
    $file_error = "";
    

    if($file["name"] == "")
    {
        
        $file_error = "Please select a file...";
        
        return $file_error;
        
    }

    if(is_file("$directory/" . $file["name"]))
    {
        
        $file_error = "Sorry, the file already exists. Please rename the file...";      
        
    }
    
    return $file_error;
    
}


function random_string()
{
	foreach($character_set_array as $character_set)
    {
        
        for($i=0; $i<$character_set["count"]; $i++)
        {
            
            $temp_array[] = $character_set["characters"][rand(0, strlen($character_set["characters"]) - 1)];
            
        }
        
    }
    
    shuffle($temp_array);
    
    return implode('', $temp_array);
}
?>
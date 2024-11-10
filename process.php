<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['name']) && !empty($_POST['email']) && isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
            $fName = $_FILES['file']['name'];
            $upDir = 'uploads/';
            if (!is_dir($upDir)) {
                mkdir($upDir, 0777, true);
            }
            $d_path = $upDir . $fName;
            
            if (move_uploaded_file($fileTmpPath, $d_path)) {
                http_response_code(200); 
                echo "File uploaded successfully!";
            } else {
                http_response_code(400); 
                echo "File upload failed!";
            }
        
    } else {
        
        http_response_code(400); 
        echo "Error: All fields are required, and a valid file must be uploaded.";
    }
} else {
    http_response_code(405); 
    echo "Error: Only POST requests are allowed.";
}



?>

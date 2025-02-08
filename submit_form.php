<?php
include 'connection.php';
if (!$conn) {
    echo json_encode(["status" => "error", "message" => "Database connection failed."]);
    exit;
}
$errors = [];
$certificate_number = mysqli_real_escape_string($conn, $_POST['certificate_number']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$father_name = mysqli_real_escape_string($conn, $_POST['father_name']);
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$level = mysqli_real_escape_string($conn, $_POST['level']);
$games = mysqli_real_escape_string($conn, $_POST['games']);
$position = mysqli_real_escape_string($conn, $_POST['position']);
$age = mysqli_real_escape_string($conn, $_POST['age']);
$aadhaar = mysqli_real_escape_string($conn, $_POST['aadhaar']);
$participate = mysqli_real_escape_string($conn, $_POST['participate']);
$profile_image = mysqli_real_escape_string($conn, $_FILES['profile_image']['name']);


if (empty($certificate_number)) $errors['certificate_number'] = "Certificate Number is required.";
if (empty($name)) $errors['name'] = "Name is required.";
if (empty($father_name)) $errors['father_name'] = "Father name is required.";
if (empty($dob)) $errors['dob'] = "Date of birth is required.";
if (empty($level)) $errors['level'] = "Level is required.";
if (empty($games)) $errors['games'] = "Games is required.";
if (empty($position)) $errors['position'] = "Position is required.";
if (empty($age)) $errors['age'] = "Age is required.";
if (empty($aadhaar)) $errors['aadhaar'] = "Adhaar is required.";
if (empty($participate)) $errors['participate'] = "Participate Championship is required.";
if (empty($profile_image)) $errors['profile_image'] = "Profile image is required.";
if(!empty($profile_image)){
    $tmp_name = $_FILES['profile_image']['tmp_name'];
    move_uploaded_file($tmp_name,"profile/$profile_image");
}
if (!empty($errors)) {
    echo json_encode(["status" => "error", "errors" => $errors]);
    exit;
}

$sql = "INSERT INTO certificate (certificate_number,name,father_name,dob,level,games,
position,age,aadhaar,participate,profile_image,status) 
        VALUES ('$certificate_number','$name','$father_name','$dob','$level','$games',
        '$position','$age','$aadhaar','$participate','$profile_image',
        'pending')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["status" => "success", "message" => "Certificate Apply successful!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Database error: " . mysqli_error($conn)]);
}
mysqli_close($conn);
?>
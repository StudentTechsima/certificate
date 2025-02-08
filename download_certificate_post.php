<?php
include 'connection.php';
session_start();
if (!$conn) {
    echo json_encode(["status" => "error", "message" => "Database connection failed."]);
    exit;
}
$certificate_number = mysqli_real_escape_string($conn, $_POST['certificate_number']);
if (empty($certificate_number)) {
    echo json_encode(["status" => "error", "message" => "Certificate Number fields are required."]);
    exit;
}
$sql = "SELECT * FROM certificate WHERE certificate_number = '$certificate_number'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    if ($user['status']=='approved') {
        $_SESSION['user_id'] = $user['id'];
        echo json_encode(["status" => "success", "message" => "Certificate Generate successful!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Incorrect Certificate number or Your Certificate Not Approved."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Certificate not found."]);
}
mysqli_close($conn);
?>

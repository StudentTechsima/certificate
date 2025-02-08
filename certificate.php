<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location:download_certificate.php");
    // exit;
}
include 'connection.php';
$id = $_SESSION['user_id'];
$sql = "Select * from certificate where id=$id";
$data = mysqli_query($conn,$sql);
if(mysqli_num_rows($data)>0){
    $result = mysqli_fetch_assoc($data);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Certificate</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="certificate" id="pdf-content">
        <div class="profile-pic">
            <img src="profile/<?= $result['profile_image']?>">
        </div>
        <div class="certificate-content">
            <div class="name"><?= $result['name']?></div>
             <div class="fname"><?= $result['father_name']?></div>
             <div class="dob"><?= $result['dob']?></div>,
             <div class="event"><?= $result['games']?></div>
               <div class="level"><?= $result['level']?></div>
                <div class="age"><?= $result['age']?></div>
            <div class="position"><?= $result['position']?></div>
            <div class="certi"><?= $result['certificate_number']?></div> 
        </div>
    </div>
    <button id="btn-generate" onclick="Convert_HTML_To_PDF()">Download</button>
    <script
	src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        window.jsPDF = window.jspdf.jsPDF;
        function Convert_HTML_To_PDF() {
            var elementHTML = document.querySelector("#pdf-content");
            html2canvas(elementHTML).then(function(canvas) {
                var imgData = canvas.toDataURL('image/png');
                var doc = new jsPDF();
                doc.addImage(imgData, 'PNG', 15, 18, 180, 0); // Adjust the position and size as needed
                doc.save('sports-certificate.pdf');
            });
        }
    </script>
</body>
</html>
<?php
// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: certificate.php");
//     exit;
// }
    // include 'connection.php';
    // $id = $_SESSION['user_id'];
    // $sql = "Select * from id_card where id=$id";
    // $data = mysqli_query($conn,$sql);
    // if(mysqli_num_rows($data)>0){
    //     $result = mysqli_fetch_assoc($data);
    // }
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
    <div class="certificate" style="background-image:url('images/certificate.jpg')" id="pdf-content">
        <div class="certificate-content">
            <br><br><br><br> <br><br><br><br>  <br><br><br><br>  
            <p>This is to certify that <strong>[Name]</strong>, son/daughter of <strong>[Father's Name]</strong>, born on <strong>[Date of Birth]</strong>, has participated in the <strong>[Games / Event Name]</strong> at the <strong>[District / State / National / International]</strong> level, held on <strong>[Event Dates]</strong>.</p>
            <p><strong>Position Awarded:</strong> [Position / Gold 🥇 / Silver 🥈 / Bronze 🥉]</p>
            <p><strong>Age Category:</strong> [Age Category]</p>
            <p><strong>Aadhar Number:</strong> [Aadhar Number]</p>
            <p><strong>Certificate Number:</strong> [Certificate Number]</p>
            <p>This certificate is issued to recognize the athlete's active participation and achievement in the <strong>[Participate Championship]</strong> and the spirit of sportsmanship.</p>
        </div>

        <div class="footer">
            <p><strong>Issued By:</strong> [Authorized Person’s Name]</p>
            <p>[Designation]</p>
            <p>[Organization Name]</p>
            <p>Date of Issue: [Date]</p>
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
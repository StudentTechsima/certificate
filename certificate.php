<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: certificate.php");
    exit;
}
?>
<?php
include 'layout/header.php';
?>
    <?php
    include 'connection.php';
    $id = $_SESSION['user_id'];
    $sql = "Select * from id_card where id=$id";
    $data = mysqli_query($conn,$sql);
    if(mysqli_num_rows($data)>0){
        $result = mysqli_fetch_assoc($data);
    }
    ?>
    <div class="d-flex justify-content-center mb-2 ">
        <button id="btn-generate"onclick="Convert_HTML_To_PDF();" class=" px-2 rounded"> Print</button>
    </div>
    <section class="certificate-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 certificate"></div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
    var buttonElement = document.querySelector("#btn-generate");
    buttonElement.addEventListener('click', function() {
        var pdfContent = document.querySelector("#pdf-content");
        html2pdf().from(pdfContent).save('Id-Card');
    });
    </script>
</body>

</html>
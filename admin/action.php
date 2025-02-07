<?php
include 'layout/header.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    if($_GET['type']=="certdel"){
        $sql = "Delete from certificate where id=$id";
        if(mysqli_query($conn,$sql)){
            echo "<script>
                alert('Certificate Deleted.');
                window.location.href='certificate.php';
            </script>";
        }
    }elseif($_GET['type']=="certapp"){
        $sql = "Update certificate set status='approved' where id=$id";
        if(mysqli_query($conn,$sql)){
            // $to = "gondtilak158@gmail.com";
            // $subject = "Test Mail";
            // $msg = "<h1>Your Id Card Approved</h1>";
            // $header = 'From: vishalgond235@gmail.com' . "\r\n" .
            //     'Content-type:text/html;charset=UTF-8'. "\r\n".
            //     'X-Mailer: PHP/' . phpversion();
            //     // mail(to,subject,message,header)
            // if(mail($to,$subject,$msg,$header)){
            //     echo "send";
            // }else{
            //     print_r( 'Mailer error: ' . error_get_last());
            // }
            echo "<script>
                alert('Certificate Approved.');
                window.location.href='certificate.php';
            </script>";
        }
    }elseif($_GET['type']=="certrej"){
        $sql = "Update certificate set status='rejected' where id=$id";
        if(mysqli_query($conn,$sql)){
            // $to = "$email";
            // $subject = "Test Mail";
            // $msg = "<h1>Your Id Card Rejected</h1>";
            // $header = 'From: vishalgond235@gmail.com' . "\r\n" .
            //     'Content-type:text/html;charset=UTF-8'. "\r\n".
            //     'X-Mailer: PHP/' . phpversion();
            //     // mail(to,subject,message,header)
            // if(mail($to,$subject,$msg,$header)){
            //     echo "send";
            // }else{
            //     print_r( 'Mailer error: ' . error_get_last());
            // }
            echo "<script>
                alert('Certificate Rejected.');
                window.location.href='certificate.php';
            </script>";
        }
    }
}
?>
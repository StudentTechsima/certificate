<?php
include 'layout/header.php';
?>
<body>
    <div class="container d-flex justify-content-center align-items-center py-5">
        <div class="card p-4 shadow-lg" style="max-width: 400px; width: 100%;">
            <h6 class="mb-0 text-center fs-3">Download  Certificate</h6>
                <hr>
            <form id="idCardForm">
                <div class="mb-3">
                    <label for="certificate" class="form-label">Certificate No:</label>
                    <input type="text" id="certificate_number" name="certificate_number" class="form-control" placeholder="Certificate number">
                </div>                
                <div class="d-grid">
                    <button type="submit" class="btn btn-success  text-uppercase">Download Now</button>
                </div>
            </form>
            <div id="message" class="mt-3"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
    <script>
        $(document).ready(function () {
            $('#idCardForm').submit(function (event) {
                event.preventDefault();
                $('#message').html('');
                $.ajax({
                    url: 'download_certificate_post.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        try {
                            let result = JSON.parse(response);
                            if (result.status === "success") {
                                $('#message').html('<div class="alert alert-success">' + result.message + '</div>');
                                window.location.href = 'certificate.php';
                            } else {
                                $('#message').html('<div class="alert alert-danger">' + result.message + '</div>');
                            }
                        } catch (e) {
                            $('#message').html('<div class="alert alert-danger">Invalid server response.</div>');
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>

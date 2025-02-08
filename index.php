<?php
include 'layout/header.php';
?>
    <div class="container p-5 bg-light rounded-4"> 
        <h2 class="text-center text-uppercase bg-danger rounded-pill py-2 mb-3"><span class="text-white">Apply</span><span  class="text-info"> Certificate</span></h2>
        <form class="row" enctype="multipart/form-data">
            <div class="col-lg-12 form">
                <div class="row">
                <div class="col-md-6 mb-3">
                        <label for="c_number" class="form-label">Certificate Number *</label>
                        <input type="text" id="certificate_number" name="certificate_number" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Name*</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="f_name" class="form-label">Father's Name*</label>
                        <input type="text" id="father_name" name="father_name" class="form-control" >
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="dob" class="form-label">Date Of Birth*</label>
                        <input type="date" id="dob" name="dob" class="form-control" >
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="level" class="form-label">Level*</label>
                        <select id="level" name="level" class="form-select form-control " >
                            <option value="District Level">District Lavel</option>
                            <option value="State Level">State Lavel</option>
                            <option value="National Lavel">National Lavel</option>
                            <option value="International Lavel">International Lavel</option>
                        </select>
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="game" class="form-label">Games*</label>
                        <input type="text" id="games" name="games" class="form-control">
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="position" class="form-label">Position*</label>
                        <select id="position" name="position" class="form-select form-control " >
                            <option value="Gold">Gold</option>
                            <option value="Silver">Silver</option>
                            <option value="Bronze">Bronze</option>
                        </select>
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="age" class="form-label">Age*</label>
                        <input type="text" id="age" name="age" class="form-control" >
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="aadhar" class="form-label">Aadhar Number*</label>
                        <input type="text" id="aadhaar" name="aadhaar" class="form-control" >
                    </div>
                    
                    <div class="col-md-6  mb-3">
                        <label for="participate" class="form-label">Participate Championship *</label>
                        <input type="text" id="participate" name="participate" class="form-control"  >
                    </div>                                 
                <div class="col-md-6  mb-3">
                    <label for="profile-image" class="form-label">Profile Picture* </label>
                    <input type="file" id="profile_image" name="profile_image" class="form-control" accept=".jpg"
                        >
                </div>
                <div class="col-12">
                        <button type="submit" class="btn btn-outline-success btn-lg">Apply Now</button>
                    </div>
                    
                </div>
                </div>
                </div>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
    <script>
    $(document).ready(function () {
        $('form').submit(function (event) {
            event.preventDefault();
            $('.error-message').remove();
            $('input, select, textarea').removeClass('is-invalid');
            let formData = new FormData(this);
            $.ajax({
                url: 'submit_form.php', 
                type: 'POST',
                data: formData,
                contentType: false, 
                processData: false, 
                success: function (response) {
                    try {
                        let result = JSON.parse(response);
                        if (result.status == "error") {
                            Object.keys(result.errors).forEach(function (key) {
                                $('#' + key).addClass('is-invalid');
                                $('#' + key).after('<div class="error-message text-danger">' + result.errors[key] + '</div>');
                            });
                        } else if (result.status == "success") {
                            alert(result.message);
                            $('form')[0].reset();
                        }
                    } catch (e) {
                        alert(response)
                        alert('Unexpected response from server.');
                    }
                },
                error: function () {
                    alert('Something went wrong!');
                }
            });
        });
    });
    </script>
</body>
</html>
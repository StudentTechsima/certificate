<?php
include 'layout/header.php';
?>
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Dashboard</h4>
            <div class="row">
                <div class="col-md-3">
                <a href="idcard.php">
                    <div class="card card-stats card-warning">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-id-card" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="col-7 d-flex align-items-center">
                                    
                                    <div class="numbers">
                                        <?php
                                        $sql = "select count(*) as idcard from certificate";
                                        $count = mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($count)>0){
                                            $idcard = mysqli_fetch_assoc($count);
                                            echo $idcard['idcard'];
                                        }
                                        ?>
                                        <p class="card-category">Approved Certificate</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </a>
                </div>                           
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container-fluid">
		<div class="copyright ml-auto">
        © 2023 Reserved Jagriti News <a
                href="https://jagritinews.com/">Techsima Solution Private Limited Ayodhya </a>
        </div>
    </div>
</footer>
</div>
</div>
</div>
<?php
include('layout/footer.php');
?>
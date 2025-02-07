<?php
include 'layout/header.php';
?>
<div class="main-panel"   style="overflow:auto">
    <div class="content">
        <div class="container-fluid" >
            <h4 class="page-title">Id Cards</h4>
                <table class="table  table-striped border border-4">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Certificate Number</th>
                        <th scope="col">Name</th>
                        <th scope="col">Father Name</th>
                        <th scope="col">Date Of Birth</th>
                        <th scope="col">Level</th>
                        <th scope="col">Games</th>
                        <th scope="col">Age</th>
                        <th scope="col">Adhaar</th>
                        <th scope="col">Participate Championship</th>
                        <th scope="col">Profile</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "Select * from certificate";
                        $data = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($data)>0){
                            while($row=mysqli_fetch_assoc($data)){
                        ?>
                        <tr>
                            <th scope="row"><?= $row['id']?></th>
                            <td><?= $row['certificate_number']?></td>
                            <td><?= $row['name']?></td>
                            <td><?= $row['father_name']?></td>
                            <td><?= $row['dob']?></td>
                            <td><?= $row['level']?></td>
                            <td><?= $row['games']?></td>
                            <td><?= $row['age']?></td>
                            <td><?= $row['aadhaar']?></td>
                            <td><?= $row['participate']?></td>
                            <td><img width="50px" height="50px" src="../profile/<?= $row['profile_image']?>" alt=""></td>
                            <td><?= $row['status']?></td>
                            <td><?= $row['created_at']?></td>
                            <td class="d-flex">
                                <a href="action.php?type=certdel&id=<?= $row['id']?>">
                                    <i class="fa fa-trash text-danger p-1" style="font-size:20px"></i>
                                </a>
                                <?php if($row['status']=='pending'){?>
                                <a href="action.php?type=certapp&id=<?= $row['id']?>">
                                    <i class="fa fa-check-circle text-success p-1" style="font-size:20px"></i>
                                </a>
                                <a href="action.php?type=certrej&id=<?= $row['id']?>">
                                    <i class="fa fa-times-circle text-danger p-1" style="font-size:20px"></i>
                                </a>
                                <?php }?>
                            </td>
                        </tr>
                        <?php   
                            }
                        }
                        ?>
                    </tbody>
                </table>              
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
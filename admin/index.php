<?php
require '../processor/processor.php';

if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true) {
    redirect_to(url_for('login.php'));
    exit;

}

$sql = "SELECT * FROM membership   ORDER BY id DESC";

$results = mysqli_query($db, $sql);
$rowcount=mysqli_num_rows($results);
$counter = 0;



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'header.php'; ?>
</head>

<body>
    <?php require './navbar.php'; ?>
    <div class="container ">
        <div class="row admin-top-padding ">
            <div class="col-12">
                <span class="riti-admin-header">RITI Administration</span>
                <div class="admin-underline"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <h1>Applications</h1>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-md-10 mx-auto">
                <?php if($rowcount<1):?>
                <h1 class="h5 my-4">No applications yet<h1>
                        <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">FullName</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">CV</th>
                                        <th scope="col">Membership Form</th>
                                        <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php while($applicant = mysqli_fetch_assoc($results)):?>
                                    <?php $counter +=1?>
                                    <tr>
                                        <th scope="row"><?php echo $counter?></th>
                                        <td><?php echo $applicant['fullName']?></td>
                                        <td><?php echo $applicant['email']?></td>
                                        <td><a target="_blank" href="<?php echo $applicant['cv']?>">View CV</a></td>
                                        <td><a target="_blank" href="<?php echo $applicant['membershipForm']?>">View
                                                Membership Form</a>
                                        </td>
                                        <td>reply</td>

                                    </tr>

                                    <?php endwhile?>
                                </tbody>
                            </table>
                        </div>

                        <?php endif?>



            </div>
        </div>
    </div>


    <?php require '../main/footer.php'; ?>
</body>

</html>
<?php
include('includes/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
  $adminid=$_SESSION['odmsaid'];
  $AName=$_POST['username'];
  $fName=$_POST['firstname'];
  $lName=$_POST['lastname'];
  $mobno=$_POST['mobilenumber'];
  $email=$_POST['email'];
  $sql="update tbladmin set UserName=:adminname,FirstName=:firstname,LastName=:lastname,MobileNumber=:mobilenumber,Email=:email where ID=:aid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':adminname',$AName,PDO::PARAM_STR);
  $query->bindParam(':firstname',$fName,PDO::PARAM_STR);
  $query->bindParam(':lastname',$lName,PDO::PARAM_STR);
  $query->bindParam(':email',$email,PDO::PARAM_STR);
  $query->bindParam(':mobilenumber',$mobno,PDO::PARAM_STR);
  $query->bindParam(':aid',$adminid,PDO::PARAM_STR);
  $query->execute();
  echo '<script>alert("Profile has been updated")</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php @include("includes/header.php");?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <?php @include("includes/sidebar.php");?>
      <!-- partial -->
      <!-- /*!
* Author Name: MH RONY.
* GigHub Link: https://github.com/dev-mhrony
* Facebook Link:https://www.facebook.com/dev.mhrony
* Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com
* Visit My Website : developerrony.com
*/ -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <form method="post">
                    <?php
                    $adminid=$_SESSION['odmsaid'];
                    $sql="SELECT * from  tbladmin where ID=:aid";
                    $query = $dbh -> prepare($sql);
                    $query->bindParam(':aid',$adminid,PDO::PARAM_STR);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                      foreach($results as $row)
                      {  
                        ?>
                        <div class="container rounded bg-white mt-5">
                          <div class="row">
                            <div class="col-md-4 border-right">
                              <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                               <?php 
                               if($row->Photo=="avatar15.jpg"){ ?>
                                <img class="rounded-circle mt-5" src="assets/img/avatars/avatar15.jpg"  width="90">
                                <?php 
                              } else { ?>
                                <img class="rounded-circle mt-5"  src="profileimages/<?php  echo $row->Photo;?>" width="90">
                                <?php 
                              } ?><span class="font-weight-bold"><?php  echo $row->FirstName;?> <?php  echo $row->LastName;?></span><span class="text-black-50"><?php  echo $row->Email;?></span><span>+1&nbsp;<?php  echo $row->MobileNumber;?></span>
                              <div class="mt-3">
                                <a href="update_image.php?id=<?php echo $adminid;?>">Edit Image</a>
                              </div>
                            </div>
                          </div>
                          <!-- /*!
* Author Name: MH RONY.
* GigHub Link: https://github.com/dev-mhrony
* Facebook Link:https://www.facebook.com/dev.mhrony
* Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com
* Visit My Website : developerrony.com
*/ -->
                          <div class="col-md-8">
                            <div class="p-3 py-5">
                              <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                </div>
                                <h6 class="text-right">Edit Profile</h6>
                              </div>
                              <div class="row mt-2">
                                <div class="col-md-6"><input type="text" class="form-control" name="firstname" value="<?php  echo $row->FirstName;?>" required='true'></div>
                                <div class="col-md-6"><input type="text" class="form-control" value="<?php  echo $row->LastName;?> " name="lastname" required></div>
                              </div>
                              <div class="row mt-3">
                                <div class="col-md-6"><input type="text" class="form-control" name="email" value="<?php  echo $row->Email;?>" required></div>
                                <div class="col-md-6"><input type="text" class="form-control" value="0<?php  echo $row->MobileNumber;?>" name="mobilenumber" required></div>
                              </div>
                              <!-- /*!
* Author Name: MH RONY.
* GigHub Link: https://github.com/dev-mhrony
* Facebook Link:https://www.facebook.com/dev.mhrony
* Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com
* Visit My Website : developerrony.com
*/ -->
                              <div class="row mt-3">
                                <div class="col-md-6">
                                  <label class="form-group">User Name</label>
                                  <input type="text" class="form-control" name="username" value="<?php  echo $row->UserName;?>" required></div>
                                  <div class="col-md-6">
                                    <label class="form-group">Permission</label>
                                    <input type="text" class="form-control"name="adminname" value="<?php  echo $row->AdminName;?>" readonly="true"></div>
                                  </div>
                                  <div class="row mt-3">
                                    <div class="col-md-6">
                                     <label class="form-group">Reg Date</label>
                                     <input type="text" class="form-control"  value="<?php  echo $row->AdminRegdate;?>" readonly="true">
                                   </div>
                                 </div>
                                 <!-- /*!
* Author Name: MH RONY.
* GigHub Link: https://github.com/dev-mhrony
* Facebook Link:https://www.facebook.com/dev.mhrony
* Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com
* Visit My Website : developerrony.com
*/ -->
                                 <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit" name="submit">Update Profile</button></div>
                               </div>
                             </div>
                           </div>
                         </div>
                         <?php 
                       }
                     } ?>
                   </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php @include("includes/footer.php");?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- /*!
* Author Name: MH RONY.
* GigHub Link: https://github.com/dev-mhrony
* Facebook Link:https://www.facebook.com/dev.mhrony
* Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com
* Visit My Website : developerrony.com
*/ -->
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <?php @include("includes/foot.php");?>
</body>
</html>
<?php
include('includes/checklogin.php');
check_login();
if(isset($_POST['submit']))
{

    
    $companyemail=$_POST['companyemail'];
    $companyname=$_POST['companyname'];
    $companyaddress=$_POST['companyaddress'];
    $regno=$_POST['regno'];
    $mobno=$_POST['mobilenumber'];
    $sql="update tblcompany set companyaddress=:companyaddress,companyname=:companyname,companyemail=:companyemail,regno=:regno,companyphone=:mobilenumber where developer='gerald'";
    $query = $dbh->prepare($sql);
    $query->bindParam(':companyaddress',$companyaddress,PDO::PARAM_STR);
    $query->bindParam(':companyemail',$companyemail,PDO::PARAM_STR);
    $query->bindParam(':regno',$regno,PDO::PARAM_STR);
    $query->bindParam(':mobilenumber',$mobno,PDO::PARAM_STR);
    $query->bindParam(':companyname',$companyname,PDO::PARAM_STR);
    $query->execute();
    if ($query->execute()){
        echo '<script>alert("Profile has been updated")</script>';
    }else{
        echo '<script>alert("update failed! try again later")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body>
    <!-- /*!
* Author Name: MH RONY.
* GigHub Link: https://github.com/dev-mhrony
* Facebook Link:https://www.facebook.com/dev.mhrony
* Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com
* Visit My Website : developerrony.com
*/ -->
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <?php @include("includes/header.php");?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            <?php @include("includes/sidebar.php");?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="float: left;">Company details</h5>
                                </div>
<!-- /*!
* Author Name: MH RONY.
* GigHub Link: https://github.com/dev-mhrony
* Facebook Link:https://www.facebook.com/dev.mhrony
* Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com
* Visit My Website : developerrony.com
*/ -->
                                <div class="card-body">
                                    <?php
                                    $sql="SELECT * from  tblcompany where developer='gerald'";
                                    $query = $dbh -> prepare($sql);
                                    $query->bindParam(':aid',$companyname,PDO::PARAM_STR);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0)
                                    {
                                        foreach($results as $row)
                                        {  
                                            ?>
                                            <form method="post">
                                                <div class="control-group">
                                                    <label class="control-label" for="basicinput">Logo</label>
                                                    <div class="controls">
                                                        <?php 
                                                        if($row->companylogo=="avatar15.jpg")
                                                        { 
                                                            ?>
                                                            <img class=""  src="assets/img/avatars/avatar15.jpg" alt="" width="100" height="100">
                                                            <?php 
                                                        } else { ?>
                                                            <img style="height: 100px; width: 100px;" src="companyimages/<?php  echo $row->companylogo;?>" width="150" height="100">
                                                            <?php 
                                                        }
                                                        if($_SESSION['permission'] =="Admin"){

                                                            ?>  
                                                            <a href="update_logo.php?id=<?php echo $companyname;?>">Change logo</a>
                                                            <?php
                                                        } ?>
                                                    </div>
                                                </div>  
                                                <div>&nbsp;</div>
                                                <div class="row">
                                                    <div class="form-group row col-md-6">
                                                        <label class="col-12" for="register1-username">Company name:</label>
                                                        <div class="col-12">
                                                            <input type="text" class="form-control" name="companyname" value="<?php  echo $row->companyname;?>" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row col-md-6">
                                                        <label class="col-12" for="register1-email">Company reg no.:</label>
                                                        <div class="col-12">
                                                            <input type="text" class="form-control" name="regno" value="<?php  echo $row->regno;?>" required='true'  >
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
                                                <div class="row">
                                                    <div class="form-group row col-md-6">
                                                      <label class="col-12" for="register1-email">physical address:
                                                      </label>
                                                      <div class="col-12">
                                                        <input type="text" class="form-control" name="companyaddress" value="<?php  echo $row->companyaddress;?>" placeholder="Enter company address" required='true'  >
                                                    </div>
                                                </div>
                                                <div class="form-group row col-md-6">
                                                    <label class="col-12" for="register1-email">Company email:</label>
                                                    <div class="col-12">
                                                        <input type="text" class="form-control" name="companyemail" value="<?php  echo $row->companyemail;?>" required='true' >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row"> 
                                                <div class="form-group row col-md-6">
                                                    <label class="col-12" for="register1-password">country:</label>
                                                    <div class="col-12">
                                                        <input type="text" class="form-control" name="country" value="<?php  echo $row->country;?>" required='true' >
                                                    </div>
                                                </div>
                                                <div class="form-group row col-md-6">
                                                    <label class="col-12" for="register1-password">Contact Number:</label>
                                                    <div class="col-12">
                                                        <input type="text" class="form-control" name="mobilenumber" value="<?php  echo $row->companyphone;?>" required='true' placeholder="Enter company contact no" maxlength='10'>
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
                                            <?php 
                                        }
                                    } ?>
                                    <br>
                                    <button type="submit" name="submit" class="btn btn-primary btn-fw mr-2" style="float: left;">update</button>
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
    <!-- page-body-wrapper ends -->
</div>
<!-- /*!
* Author Name: MH RONY.
* GigHub Link: https://github.com/dev-mhrony
* Facebook Link:https://www.facebook.com/dev.mhrony
* Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com
* Visit My Website : developerrony.com
*/ -->
<!-- container-scroller -->
<?php @include("includes/foot.php");?>
</body>
</html>
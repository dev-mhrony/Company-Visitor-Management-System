<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/checklogin.php');
check_login();
if (strlen($_SESSION['odmsaid']==0)) 
{
  header('location:logout.php');
} else{
$pid=intval($_GET['id']);// product id
if(isset($_POST['submit']))
{
  $companyname=$_SESSION['companyname'];
  //$productimage1=$_FILES["productimage1"]["name"];
  //move_uploaded_file($_FILES["productimage1"]["tmp_name"],"companyimages/".$_FILES["productimage1"]["name"]);
  $filename = $_FILES['note']['name'];

    // destination of the file on the server
  $destination = 'companyimages/' . $filename;

    // get the file extension
  $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
  $file = $_FILES['note']['tmp_name'];
  $size = $_FILES['note']['size'];

  if (!in_array($extension, ['jpg']))
  {
    echo "<script>alert('You file extension must be jpg ');</script>";
  } 
  else {

        // move the uploaded (temporary) file to the specified destination
    if (move_uploaded_file($file, $destination)) {
        //$note=$_FILES["note"]["name"];
        //move_uploaded_file($_FILES["note"]["tmp_name"],"productimages/".$_FILES["note"]["name"]);
      $sql="update  tblcompany set companylogo=:filename where developer='gerald'";
      $query = $dbh->prepare($sql);
      $query->bindParam(':filename',$filename,PDO::PARAM_STR);
      $query->execute();
      if ($query->execute()){
        echo '<script>alert("Company logo updated successfully")</script>';
      }else{
        echo '<script>alert("update failed! try again later")</script>';
      }
    }
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
               <div class="card-body">
                  <!-- /*!
* Author Name: MH RONY.
* GigHub Link: https://github.com/dev-mhrony
* Facebook Link:https://www.facebook.com/dev.mhrony
* Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com
* Visit My Website : developerrony.com
*/ -->
                    <br/>
                    <form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">
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
                          <div class="control-group">
                            <label class="control-label" for="basicinput">Company Name</label>
                            <div  class="col-6">
                              <input type="text"   class="form-control" name="companyname"  readonly value="<?php  echo $row->companyname;?>" class="span6 tip" readonly>
                            </div>
                          </div>
                          <br>
                          <div class="control-group"> 
                            <label class="control-label" for="basicinput">Current logo</label>
                            <div class="controls">
                              <?php if($row->companylogo=="avatar15.jpg"){ ?>
                                <img class="" src="assets/img/avatars/avatar15.jpg" alt="" width="100" height="100">
                              <?php } else { ?>
                                <img style="height: 100px; width: 100px;" src="companyimages/<?php  echo $row->companylogo;?>" width="180" height="130"> 
                              <?php } ?> 
                            </div>
                          </div><!--  -->
                          <div class="form-group col-md-6">
                            <label>New logo</label>
                            <input type="file" name="note" id="productimage1" class="file-upload-default">
                            <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Logo">
                              <span class="input-group-append">
                                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                              </span>
                            </div>
                          </div>
                        <?php }} ?>
                        <br>
                        <div class="form-group row">
                          <div class="col-12">
                            <button type="submit" class="btn btn-gradient-primary "  name="submit">
                              <i class="fa fa-plus"></i> Update
                            </button>
                          </div>
                        </div>
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
          <!-- /*!
* Author Name: MH RONY.
* GigHub Link: https://github.com/dev-mhrony
* Facebook Link:https://www.facebook.com/dev.mhrony
* Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com
* Visit My Website : developerrony.com
*/ -->
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <?php @include("includes/foot.php");?>
    </body>
    </html>
    <?php }  ?>
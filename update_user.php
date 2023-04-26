<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['saveupdates']))
{
  $adminid=$_SESSION['editid2'];
  $fName2=$_POST['firstname2'];
  $lName2=$_POST['lastname2'];
  $mobno2=$_POST['phone2'];
  $email2=$_POST['email2'];
  $sql4="update tbladmin set FirstName=:firstname2,LastName=:lastname2,MobileNumber=:mobilenumber2,Email=:email2 where ID=:aid";
  $query4 = $dbh->prepare($sql4);
  $query4->bindParam(':firstname2',$fName2,PDO::PARAM_STR);
  $query4->bindParam(':lastname2',$lName2,PDO::PARAM_STR);
  $query4->bindParam(':email2',$email2,PDO::PARAM_STR);
  $query4->bindParam(':mobilenumber2',$mobno2,PDO::PARAM_STR);
  $query4->bindParam(':aid',$adminid,PDO::PARAM_STR);
  $query4->execute();
  if ($query4->execute()){
    echo '<script>alert("Profile has been updated")</script>';
  }else{
    echo '<script>alert("update failed! try again later")</script>';
  }
}
?>
<!-- /*!
* Author Name: MH RONY.
* GigHub Link: https://github.com/dev-mhrony
* Facebook Link:https://www.facebook.com/dev.mhrony
* Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com
* Visit My Website : developerrony.com
*/ -->
<div class="card-body">
  <h4 class="card-title">Update User Form </h4>
  <form class="forms-sample" method="post" enctype="multipart/form-data" class="form-horizontal">
    <?php
    $eid=$_POST['edit_id'];
    $sql="SELECT * from  tbladmin where tbladmin.ID=:eid";
    $query = $dbh -> prepare($sql);
    $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
      foreach($results as $row)
      { 
        $_SESSION['editid2']=$row->ID;
        ?>        
        <div class="form-group">
          <label for="exampleInputName1">First Name</label>
          <input type="text" name="firstname2" class="form-control" id="firstname2" value="<?php  echo $row->FirstName;?>" required>
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Last Name</label>
          <input type="text" name="lastname2" class="form-control" id="lastname2" value="<?php  echo $row->LastName;?>" required>
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Phone No.</label>
          <input type="text" name="phone2" class="form-control" id="phone2" value="<?php  echo $row->MobileNumber;?>"  required>
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Email</label>
          <input type="text" name="email2" class="form-control" id="email2" value="<?php  echo $row->Email;?>"  required>
        </div>
        <?php $cnt=$cnt+1;
      }
    } ?>
    <button type="submit" name="saveupdates" class="btn btn-primary btn-fw mr-2">Update</button>
    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
  </form>
</div>
<!-- /*!
* Author Name: MH RONY.
* GigHub Link: https://github.com/dev-mhrony
* Facebook Link:https://www.facebook.com/dev.mhrony
* Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com
* Visit My Website : developerrony.com
*/ -->
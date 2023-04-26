<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
{
  $eid=$_SESSION['edid'];
  $createuser=$_POST['createuser'];
  $deleteuser=$_POST['deleteuser'];
  $createbid=$_POST['createbid'];
  $updatebid=$_POST['updatebid'];
  $sql="update permissions set createuser =:createuser,deleteuser=:deleteuser,createbid=:createbid,updatebid=:updatebid  where permissions.id=:eid";
  $query=$dbh->prepare($sql);
  $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
  $query->bindParam(':createuser',$createuser,PDO::PARAM_STR);
  $query->bindParam(':deleteuser',$deleteuser,PDO::PARAM_STR);
  $query->bindParam(':createbid',$createbid,PDO::PARAM_STR);
  $query->bindParam(':updatebid',$updatebid,PDO::PARAM_STR);
  $query->execute();
  $LastInsertId=$dbh->lastInsertId();
  echo '<script>alert("permission has been updated")</script>';
}
?>
<div class="card-body">
  <form class="forms-sample" method="post" enctype="multipart/form-data" class="form-horizontal">
    <?php
    $eid=$_POST['edit_id'];
    $sql="SELECT * from  permissions where permissions.id=:eid";
    $query = $dbh -> prepare($sql);
    $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
      foreach($results as $row)
      { 
        $_SESSION['edid']=$row->id;
        ?>        
        <div class="form-group">
          <label for="exampleInputName1" value=""><?php  echo $row->permission;?></label>
          <div class="row">
            <div class="col-sm-3">
              <?php if($row->createuser==1)
              {?>
                <div class="checkbox form-check">
                  <label class="">
                   <input type="checkbox" class="form-check-input" id="inlineCheckbox1" name="createuser" checked value="1"> Create user</label>
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
               } else { ?>
                <div class="checkbox  form-check">
                  <label class="">
                   <input type="checkbox" class="form-check-input" id="inlineCheckbox1" name="createuser"  value="1"> Create user</label>
                </div>
                <?php 
              } ?>
            </div>
            <div class="col-sm-3">
              <?php if($row->deleteuser==1)
              {?>
                <div class="checkbox form-check">
                  <label class="">
                   <input type="checkbox" class="form-check-input" id="inlineCheckbox1" name="deleteuser" checked value="1"> Delete user</label>
                </div>
                <?php 
              } else {?>
                <div class="checkbox form-check">
                  <label class="">
                   <input type="checkbox" class="form-check-input" id="inlineCheckbox1" name="deleteuser"  value="1"> Delete user</label>
                </div>
                <?php 
              }?>
            </div>
            <div class="col-sm-3">
              <?php if($row->createbid==1)
              {?>
                <div class="checkbox form-check">
                  <label class="">
                   <input type="checkbox" class="form-check-input" id="inlineCheckbox1" name="createbid" checked value="1"> Register Visitor</label>
                </div>
                <?php 
              } else {?>
                <div class="checkbox form-check">
                  <label class="">
                   <input type="checkbox" class="form-check-input" id="inlineCheckbox1" name="createbid"  value="1"> Register Visitor</label>
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
              } ?>
            </div>
            <div class="col-sm-3">
              <?php if($row->updatebid==1)
              {?>
                <div class="checkbox form-check">
                   <label class="">
                   <input type="checkbox" class="form-check-input" id="inlineCheckbox1" name="updatebid" checked value="1"> Update Visitor's Info</label>
                </div>
                <?php 
              } else {?>
                <div class="checkbox form-check">
                  <label class="">
                   <input type="checkbox" class="form-check-input" id="inlineCheckbox1" name="updatebid"  value="1">  Update Visitor's Info</label>
                </div>
                <?php 
              } ?>
            </div>
          </div>
        </div>
        <?php $cnt=$cnt+1;}} ?>
        <button type="submit" name="submit" class="btn btn-primary btn-fw mr-2">Update</button>
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
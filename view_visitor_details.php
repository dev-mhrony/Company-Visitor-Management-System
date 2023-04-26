<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['update']))
{
  $eid=$_SESSION['editid'];
  $remark=$_POST['remark'];
  $query=mysqli_query($con,"update tblvisitor set remark='$remark' where  ID='$eid'");
  if ($query) {
    echo '<script>alert("Visitors Remark has been Updated.")</script>';
    echo "<script>window.location.href ='manage_visitor.php'</script>";
  }
  else{
    echo '<script>alert("Something Went Wrong. Please try again")</script>';
  }
}
?>
<div class="card-body">
  <?php
  $eid=$_POST['edit_id5'];
  $sql="SELECT * from tblvisitor  where ID=:eid";
  $query = $dbh -> prepare($sql);
  $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0)
  {
    foreach($results as $row)
    {
     $_SESSION['editid']=$row->ID;?>

     <h4 style="color: blue">Visitor Information</h4>
     <table border="1" class="table table-bordered">
      <tr>
        <th>Full Names</th>
        <td><?php  echo $row->FullName;?></td>
      </tr>
      <tr>
        <!-- /*!
* Author Name: MH RONY.
* GigHub Link: https://github.com/dev-mhrony
* Facebook Link:https://www.facebook.com/dev.mhrony
* Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com
* Visit My Website : developerrony.com
*/ -->
        <th>Email</th>
        <td><?php  echo $row->Email;?></td>
      </tr>
      <tr>
        <th>Mobile Number</th>
        <td><?php  echo $row->MobileNumber;?></td>
      </tr>
      <tr>
        <th>Address</th>
        <td><?php  echo $row->Address;?></td>
      </tr>
      <tr>
        <th>  <wbr> Whom To Meet</th>
          <td><?php  echo $row->WhomtoMeet;?></td>
        </tr>
        <tr>
          <th>Department</th>
          <td><?php  echo $row->Deptartment;?></td>
        </tr>
        <tr>
          <th>  <wbr> Reason To Meet</th>
            <td><?php  echo $row->ReasontoMeet;?></td>
          </tr>
          <tr>
            <th>Visitor Entering Time</th>
            <td><?php  echo $row->EnterDate;?></td>
          </tr>
          <?php if($row->remark!=""){ ?>
           <tr>
            <th>Outing Remark </th>
            <td><?php echo $row->remark; ?></td>
          </tr>


          <tr>
            <th>Out Time</th>
            <td><?php echo $row->outtime; ?>  </td> 
          </tr>
          <?php 
        } ?>
      </table> 
      <?php if($row->remark==""){ ?>
        <div class="card pt-4">
          <form method="post">
            <div class="row col-md-6 form-group">
             <label for="exampleInputPassword1">Enter Outing Remarks</label>
              <textarea name="remark" placeholder="Enter Outing Remarks" rows="6" cols="8" class="form-control wd-450" required="true"></textarea>
              <button type="submit" name="update" class="btn btn-primary btn-sm mt-4">Update</button>
            </div>
          </form>
        </div>
        <?php
      }
    }
  } ?>
</div>
<!-- /*!
* Author Name: MH RONY.
* GigHub Link: https://github.com/dev-mhrony
* Facebook Link:https://www.facebook.com/dev.mhrony
* Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com
* Visit My Website : developerrony.com
*/ -->
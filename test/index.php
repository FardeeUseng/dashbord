<?php
$conn = mysqli_connect("localhost", "root", "", "testing");
$sql = "SELECT * FROM donate WHERE (status = 'Approve' AND donate != 0)";
$result = mysqli_query($conn, $sql);
$order = 1;

$sumSql = "SELECT SUM(donate), SUM(expenses) FROM donate WHERE status = 'Approve'";
$sumQuery = mysqli_query($conn, $sumSql);
$sumRow = mysqli_fetch_array($sumQuery);

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>รายรับ - รายจ่าย</title>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
   <script src="js/script.js"></script>
   <style>
      *{
         box-sizing:border-box;
         margin:0;
         padding:0;
      }
      .income, .expenses, .balance{
         border-radius:10px;
         padding: 20px;
      }
      /* .alert {
         display:none;
         position:fixed;
         left:0;
         right:0;
         bottom:5px;
         background-color: red;
         width:300px;
         height:80px;
         margin:0 auto;
         align-items:center;
         justify-content:center;
      } */
   </style>
</head>
<body>
   <div class="container">
      <div class="d-flex justify-content-center my-5">
         <?php 
            $totalSql = "SELECT * FROM donate WHERE status = 'Approve' ORDER BY id DESC LIMIT 1";
            $total = mysqli_query($conn, $totalSql);
            $rowTotal = mysqli_fetch_array($total);
         ?>
         <div class="income text-center bg-success shadow">
            <h2>รายรับทั้งหมด</h2>
            <?php echo "<h5>" . $rowTotal['income'] . "</h5>"; ?>
         </div>
         <div class="expenses mx-5 text-center bg-warning shadow">
            <h2>รายจ่ายทั้งหมด</h2>
            <?php echo "<h5>" . $rowTotal['totalExpenses'] . "</h5>"; ?>
         </div>
         <div class="balance text-center bg-primary shadow">
            <h2>ยอดเงินคงเหลือ</h2>
            <?php echo "<h5>" . $rowTotal['income'] - $rowTotal['totalExpenses'] . "</h5>"; ?>
         </div>
      </div>
      <div class="d-flex mb-3 justify-content-end ">
         <select class="custom-select bg-success text-white hover" style="width: 200px; border-radius:10px;" onchange="location = this.value">
            <option selected>รายรับ</option>
            <option value="expenses.php">รายจ่าย</option>
         </select>
      </div>
      <div class="">
         <table class="table table-bordered text-center">
            <tr>
               <th width="15%">ลำดับ</th>
               <th width="45%" class="text-left pl-5">ชื่อ - นามสกุล</th>
               <th width="20%">รายรับ</th>
               <th width="20%">ลบ</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result)){ ?>
            <tr>
               <td width="15%"><?php echo $order++; ?></td>
               <td width="45%" class="text-left pl-5"><?php echo $row['fname'] . ' ' . $row['lname'] ?></td>
               <td width="20%"><?php echo $row['donate'] ?></td>
               <td width="20%"><input type="button" id="<?php echo $row['id']; ?>" class="btn btn-danger deleteData" value="Delete"></td>
            </tr>
            <?php } ?>
         </table>
      </div>
      <div class="d-flex justify-content-between">
         <div class="left position-relative">
            <?php
               $numSql = "SELECT * FROM donate WHERE (expenses != 0) AND (status = 'dependApproval')";
               $numResult = mysqli_query($conn, $numSql);
               $num = mysqli_num_rows($numResult);
            ?>
            <input type="button" value="ยืนยันคำร้องขอทุน" class="btn btn-warning hover confirmDonate pr-5">
            <div class="bg-danger rounded-circle" style="position:absolute; width:25px; height:25px; top:7px; right:10px;"><?php echo "<p class='pl-2 text-white'>" . $num . "</p>"; ?></div>
         </div>
         <div class="right">
            <input type="button" value="บริจาค" class="btn btn-primary hover" data-toggle="modal" data-target="#donate">
            <input type="button" value="ขอทุน" class="btn btn-success mx-3 hover" data-toggle="modal" data-target="#expenses">
         </div>
      </div>
      <?php include("modal.php") ?>
   </div>
   <!-- <div class="alert hover" id="alertData">
      
   </div> -->

</body>
</html>
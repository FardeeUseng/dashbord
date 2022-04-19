
<?php
$conn = mysqli_connect("localhost", "root", "", "testing");

if(isset($_GET['approve'])){
   $id = $_GET['approve'];
   $sql = "UPDATE donate SET status = 'approve' WHERE id = $id";
   $result = mysqli_query($conn, $sql);
   if($result){
      header("location:expenses.php");
      exit();
   }
}

if(isset($_GET['notApprove'])){
   $id = $_GET['notApprove'];
   $sql = "DELETE FROM donate WHERE id = $id";
   $result = mysqli_query($conn, $sql);
   if($result){
      header("location:index.php");
      exit();
   }
}

if(isset($_POST['deleteData'])){
   $id = $_POST['id'];
   $sql = "DELETE FROM donate WHERE id = $id";
   mysqli_query($conn, $sql);
   exit();
}

if(isset($_POST['donateSubmit'])){
   $dfname = $_POST['dfname'];
   $dlname = $_POST['dlname'];
   $numDonate = $_POST['numDonate'];
   $donIncome = $_POST['donIncome'];
   $donTotalExpenses = $_POST['donTotalExpenses'];
   $total = $numDonate + $donIncome;
   $sql = "INSERT INTO donate(fname, lname, donate, income, totalExpenses, status) VALUES('$dfname', '$dlname', $numDonate, $total, $donTotalExpenses, 'Approve')";
   mysqli_query($conn, $sql);
   exit();
}

if(isset($_POST["expensesSubmit"])){
   $efname = $_POST['efname'];
   $elname = $_POST['elname'];
   $numExpenses = $_POST['numExpenses'];
   $expIncome = $_POST['expIncome'];
   $expTotalExpenses = $_POST['expTotalExpenses'];
   $total = $numExpenses + $expTotalExpenses;
   $sql = "INSERT INTO donate(fname, lname, expenses, income, totalExpenses, status) VALUES('$efname', '$elname', $numExpenses, $expIncome, $total, 'dependApproval')";
   mysqli_query($conn, $sql);
   exit();
}

if(isset($_POST['detail'])){
   $sql = "SELECT * FROM donate WHERE status = 'dependApproval' AND expenses != ''";
   $result = mysqli_query($conn, $sql);
   $order = 1;

   $text = "";
   $text .= "<table class='table table-bordered text-center'>";
   $text .= "<tr>
               <th width='10%'>ลำดับ</th>
               <th width='40%' class='text-left'>ชื่อ</th>
               <th width='20%'>จำนวนขอทุน</th>
               <th width='15%'>ยืนยัน</th>
               <th width='15$'>ยกเลิก</th>
            </tr>";  
      while($row = mysqli_fetch_array($result)){
         $text .= "<tr>
                     <td width='10%'>" . $order++ . "</td>
                     <td width='40%' class='text-left'>{$row['fname']}</td>
                     <td width='20%'>{$row['expenses']}</td>
                     <td width='15%'><a href='process.php?approve={$row['id']}' class='btn btn-success'>ยืนยัน</a></td>
                     <td width='15%'><a href='process.php?notApprove={$row['id']}' class='btn btn-danger'>ยกเลิก</a></td>
                  </tr>";
      }
   
   $text .= "</table>";
   echo $text;
   exit();
}

// if(isset($_POST['approve'])){
//    $id = $_POST['id'];
//    $sql = "UPDATE donate SET status = 'approve' WHERE id = $id";
//    mysqli_query($conn, $sql);

// }

?>

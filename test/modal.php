<div id="donate" class="modal" tabindex="-1">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
         <h5 class="modal-title">บริจาค</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
         </div>
         <div class="modal-body">
            <form id="form-donate">
               <label for="">ชื่อ</label>
               <input type="text" name="dfname" id="dfname" class="form-control" placeholder="ชื่อ">
               <label class="mt-3">นามสกุล</label>
               <input type="text" name="dlname" id="dlname" class="form-control mb-3" placeholder="นามสกุล">
               <label for="">จำนวนเงินบริจาค</label>
               <input type="number" name="numDonate" id="numDonate" class="form-control" placeholder="จำนวนเงินบริจาค">
               <input type="hidden" name="donIncome" id="donIncome" value="<?php echo $sumRow['SUM(donate)']; ?>">
               <input type="hidden" name="donTotalExpenses" id="donTotalExpenses" value="<?php echo $sumRow['SUM(expenses)']; ?>">
         </div>
         <div class="modal-footer">
         <button type="submit" id="dsubmit" class="btn btn-primary">บริจาค</button>
            </form>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>

<div id="expenses" class="modal" tabindex="-1">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
         <h5 class="modal-title">ขอทุน</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
         </div>
         <div class="modal-body">
            <form action="" id="form-expenses">
               <label for="">ชื่อ</label>
               <input type="text" name="efname" id="efname" class="form-control" placeholder="ชื่อ">
               <label class="mt-3">นามสกุล</label>
               <input type="text" name="elname" id="elname" class="form-control mb-3" placeholder="นามสกุล">
               <label for="">จำนวนเงินบริจาค</label>
               <input type="number" name="numExpenses" id="numExpenses" class="form-control" placeholder="จำนวนเงินบริจาค">
               <input type="hidden" name="expIncome" id="expIncome" value="<?php echo $sumRow['SUM(donate)']; ?>">
               <input type="hidden" name="expTotalExpenses" id="expTotalExpenses" value="<?php echo $sumRow['SUM(expenses)']; ?>">
         </div>
         <div class="modal-footer">
               <button type="submit" id="sSubmit" class="btn btn-success">ขอทุน</button>
            </form>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>

<div id="confirmDonate" class="modal" tabindex="-1">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
         <h5 class="modal-title">รายการขอทุน</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
         </div>
         <div class="modal-body" id="detail"></div>
         <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
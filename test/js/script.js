$(document).ready(function(){
   $('#form-donate').on('submit',function(event){
      event.preventDefault()
      var dfname = $('#dfname').val()
      var dlname = $('#dlname').val()
      var numDonate = $('#numDonate').val()
      var donIncome = $('#donIncome').val()
      var donIncome = $('#donIncome').val()
      var donTotalExpenses = $('#donTotalExpenses').val()
      $.ajax({
         url:"process.php",
         method:"post",
         data:{
            "donateSubmit":1,
            "dfname":dfname,
            "dlname":dlname,
            "numDonate":numDonate,
            "donIncome":donIncome,
            "donTotalExpenses":donTotalExpenses
         },
         beforeSeccess:function(){
            $('#dsubmit').text('บริจาค...')
         },
         success:function(){
            location.reload(function(){
               alert('OK')
            })
            // $('#alertData').show(function(){
            //    location.reload()
            // })
            // location.reload(function(){
            //    alert('Ok')
            // })
         }
      })
   })

   $('#form-expenses').on('submit',function(event){
      event.preventDefault()

      var efname = $('#efname').val()
      var elname = $('#elname').val()
      var numExpenses = $('#numExpenses').val()
      var expIncome = $('#expIncome').val()
      var expTotalExpenses = $('#expTotalExpenses').val()
      $.ajax({
         url:"process.php",
         method:"post",
         data:{
            "expensesSubmit":1,
            "efname":efname,
            "elname":elname,
            "numExpenses":numExpenses,
            "expIncome":expIncome,
            "expTotalExpenses":expTotalExpenses
         },
         beforeSeccess:function(){
            $('#eSubmit').text('ขอทุน...')
         },
         success:function(){
            location.reload()
         }
      })
   })

   $('.deleteData').click(function(){
      var id = $(this).attr('id')
      var status = confirm("Are you sure to delete")
      if(status){
         $.ajax({
            url:"process.php",
            method:"post",
            data:{
               "deleteData":1,
               "id":id
            },
            success:function(){
               location.reload()
            }
         })
      }
   })

   $('.confirmDonate').click(function(event){
      event.preventDefault()

      $.ajax({
         url:"process.php",
         method:"post",
         data:{
            "detail":1
         },
         success:function(data){
            $('#detail').html(data)
            $('#confirmDonate').modal('show')
         }
      })
   })

   $('.approve').click(function(){
      var id = $(this).attr()
      $.ajax({
         url:"process.php",
         method:"post",
         data:{
            "appove":1,
            "id":id
         },
         success:function(){
            location.reload()
         }
      })
   })
})
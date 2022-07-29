<?php 
	session_start();
	require("config.php");
	
	if(!isset($_SESSION["login_info"])){
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
	<?php include "header.php";?>
	<style>

		body{
			background-color: #000000;;
		}

		

        .btn-danger{
            background-color: #720d1b;
            border-color: #ae943f;
            
        }

        .btn-primary {
    color:white;
    background-color:#720d1b;
    border-color: #ae943f;
}

.submit{
    color:#ae943f;
    background-color:#000000;
    border: 2px solid #ae943f;
}
.edit,.delete{
    color:#ae943f;
   
}
a:hover {
  font-size: 20px;
  color:#ae943f;
}


 /* table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
} */

/* tr:nth-child(even){background-color: #f2f2f2} */

table.table-bordered{
    border:1px solid #ae943f;
    margin-top:20px;
    color:#ae943f
  }
table.table-bordered > thead > tr > th{
    border:1px solid #ae943f;
    color: #ae943f;
}
table.table-bordered > tbody > tr > td{
    border:1px solid #ae943f !important;
    color: #ae943f;
}

.form-group label{
    color: #ae943f;
}

.form-control:focus{border: 3px solid #720d1b;height: 45px; box-shadow: none;}

/* width */
::-webkit-scrollbar {
  width: 20px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px black; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #720d1b;; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #b30000; 
}



    </style>
	<body>
		<?php include "navbar.php"; ?>
		<div class='container mt-4'>
			<div class='row'>
				<div class='col-md-4'>
					<h3 class=' text-center' style="color:#ae943f;;">ADD EVENT DETAILS</h3>
					<?php 
						if(isset($_POST["reg"])){
							$_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
							$title=mysqli_real_escape_string($con,$_POST["title"]);
							$name=mysqli_real_escape_string($con,$_POST["name"]);
							$email=mysqli_real_escape_string($con,$_POST["email"]);
							$dob=date("Y-m-d",strtotime($_POST["dob"]));
							$description=mysqli_real_escape_string($con,$_POST["description"]);
							
							$sql="insert into users (TITLE,NAME,EMAIL,DOB,DESCRIPTION,WISH_YEAR) values ('{$title}','{$name}','{$email}','{$dob}', '{$description}','-')";
							if($con->query($sql)){
								echo"<div class='alert alert-success'>Added Success</div>";
							}else{
								echo"<div class='alert alert-danger'>Failed Try Again</div>";
							}
						}
					?>
					<form name="myForm" onsubmit="return validateForm()" action='add_reminder.php' method='post' autocomplete='off' >
					<!-- <div class="form-group">
							<label>Title</label>
							<input type="text" class="form-control"   name='title' placeholder="Title" required>
						</div> -->
						<!-- <div class="form-group">
							<label>Event Name</label>
							<input type="text" class="form-control"   name='name' placeholder=" Website Name" required>
						</div> -->
                        <div class="form-group">
							<label>Event Name</label>
							<input type="text" class="form-control"  id="eventname"  name='eventname' placeholder="Event Name" >
						</div>
						<div class="form-group">
							<label>Subject</label>
							<input type="text" class="form-control"  id="subject"  name='subject' placeholder="Subject">
						</div>
						<div class="form-group">
							<!-- <label>Email</label>
							<input type="email" class="form-control" name='email' placeholder="Email" required > -->
							<label for="sel1" class="form-label">Select Email</label>
                               <select  class="form-select w-100 border-0 rounded" style="height:35px" id="sel1" name="email" >
							             <option> --- </option>
                                         <option>sai@gmail.com</option>
                                         <option>sai2@gmail.com</option>
                                         <option>sai3@gmail.com</option>
                                         <option>sai4@gmail.com</option>
                                         </select>
						 </div>
                         <div class="form-group">
							<label>Reminder Date</label>
							<input type="text" class="form-control datepicker"  id="reminderdate" name='reminderdate' placeholder="dd-mm-yyyy">
						</div>
						 <div class="form-group">
							<!-- <label>Email</label>
							<input type="email" class="form-control" name='email' placeholder="Email" required > -->
							<label for="sel1" class="form-label">Reminder Before Date</label>
                               <select   class="form-select w-100 border-0 rounded" style="height:35px" id="sel2" name="days" >
							             <option> ---- </option> 
                                         <option>1</option>
                                         <option>2</option>
                                         <option>3</option>
                                         <option>4</option>
                                         </select>
						 </div>
                         <div class="form-group">
							<!-- <label>Email</label>
							<input type="email" class="form-control" name='email' placeholder="Email" required > -->
							<label for="sel1" class="form-label">Choose The Time Period</label>
                               <select  class="form-select w-100 border-0 rounded" style="height:35px" id="sel3" name="timeperiod" >
							             <option> ---- </option> 
                                         <option>Daily</option>
                                         <option>Weekly</option>
                                         <option>Monthly</option>
                                         <option>Quarterly</option>
                                         <option>Every six month</option>
                                         <option>Yearly</option>
                                         </select>
						 </div>
						<div class="form-group">
							<label>Description</label>
							<input type="text" class="form-control"  id="description"  name="description"  placeholder="Description" >
						</div>
						<div class="form-group">
							<input type='submit' name='reg' value='Submit' class="submit" >
							
						</div>
					</form>
				</div>


                  

		

				<div class='col-md-8'  style="overflow-x:auto;" >
				<!-- <div class="container">
		<h4 style="color:black;">SELECT NUMBER OF ROWS</h4>
				<div class="form-group"> 	
			 		<select class  ="form-control" name="state" id="maxRows">
						 <option value="5000">Show All Rows</option>
						 <option value="5">5</option>
						 <option value="10">10</option>
						 <option value="15">15</option>
						 <option value="20">20</option>
						 <option value="50">50</option>
						 <option value="70">70</option>
						 <option value="100">100</option>
						</select>
			 		
			  	</div> -->

					<table class='table table-bordered table-responsive-md mt-5 table-sm' >
						<thead>
							<tr>
								<td style="border-color:#ae943f;">S.No</td>
								<td style="border-color:#ae943f;">Event Name</td>
								<td style="border-color:#ae943f;">Subject</td>
								<td style="border-color:#ae943f;">Email</td>
								<td style="border-color:#ae943f;">Reminder Date</td>
								<td style="border-color:#ae943f;">Reminder Before Date</td>
                                <td style="border-color:#ae943f;">Time Period</td>                               
                                <td style="border-color:#ae943f;">Description</td>
								<td style="border-color:#ae943f;">Edit</td>
								<td style="border-color:#ae943f;">Delete</td>
							</tr>
						</thead>
						<tbody>
							<?php 
								$sql="select * from users order by ID desc";
								$res=$con->query($sql);
								if($res->num_rows>0){
									$i=0;
									while($row=$res->fetch_assoc()){
										$i++;
										echo "
										<tr>
											<td>{$i}</td>
						                    <td>Event Name</td>
											<td>Subject</td>
											<td>Email</td>
											<td>Reminder Date</td>
											<td>Reminder Before Date</td>
											<td>Time Period</td>										
											<td>Description</td>
											<td><a href='#' class='edit'>Edit</a></td>
											<td><a href='delete_reminder.php?id={$row["ID"]}' class='delete' onclick='return confirm(\"Are You Sure ?\")'>Delete</a></td>
											

										</tr>";
									}
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
	<script>
// 		          getPagination('#table-id');
// 					//getPagination('.table-class');
// 					//getPagination('table');

// 		  /*					PAGINATION 
// 		  - on change max rows select options fade out all rows gt option value mx = 5
// 		  - append pagination list as per numbers of rows / max rows option (20row/5= 4pages )
// 		  - each pagination li on click -> fade out all tr gt max rows * li num and (5*pagenum 2 = 10 rows)
// 		  - fade out all tr lt max rows * li num - max rows ((5*pagenum 2 = 10) - 5)
// 		  - fade in all tr between (maxRows*PageNum) and (maxRows*pageNum)- MaxRows 
// 		  */
		 

// function getPagination(table) {
//   var lastPage = 1;

//   $('#maxRows')
//     .on('change', function(evt) {
//       //$('.paginationprev').html('');						// reset pagination

//      lastPage = 1;
//       $('.pagination')
//         .find('li')
//         .slice(1, -1)
//         .remove();
//       var trnum = 0; // reset tr counter
//       var maxRows = parseInt($(this).val()); // get Max Rows from select option

//       if (maxRows == 5000) {
//         $('.pagination').hide();
//       } else {
//         $('.pagination').show();
//       }

//       var totalRows = $(table + ' tbody tr').length; // numbers of rows
//       $(table + ' tr:gt(0)').each(function() {
//         // each TR in  table and not the header
//         trnum++; // Start Counter
//         if (trnum > maxRows) {
//           // if tr number gt maxRows

//           $(this).hide(); // fade it out
//         }
//         if (trnum <= maxRows) {
//           $(this).show();
//         } // else fade in Important in case if it ..
//       }); //  was fade out to fade it in
//       if (totalRows > maxRows) {
//         // if tr total rows gt max rows option
//         var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
//         //	numbers of pages
//         for (var i = 1; i <= pagenum; ) {
//           // for each page append pagination li
//           $('.pagination #prev')
//             .before(
//               '<li data-page="' +
//                 i +
//                 '">\
// 								  <span>' +
//                 i++ +
//                 '<span class="sr-only">(current)</span></span>\
// 								</li>'
//             )
//             .show();
//         } // end for i
//       } // end if row count > max rows
//       $('.pagination [data-page="1"]').addClass('active'); // add active class to the first li
//       $('.pagination li').on('click', function(evt) {
//         // on click each page
//         evt.stopImmediatePropagation();
//         evt.preventDefault();
//         var pageNum = $(this).attr('data-page'); // get it's number

//         var maxRows = parseInt($('#maxRows').val()); // get Max Rows from select option

//         if (pageNum == 'prev') {
//           if (lastPage == 1) {
//             return;
//           }
//           pageNum = --lastPage;
//         }
//         if (pageNum == 'next') {
//           if (lastPage == $('.pagination li').length - 2) {
//             return;
//           }
//           pageNum = ++lastPage;
//         }

//         lastPage = pageNum;
//         var trIndex = 0; // reset tr counter
//         $('.pagination li').removeClass('active'); // remove active class from all li
//         $('.pagination [data-page="' + lastPage + '"]').addClass('active'); // add active class to the clicked
//         // $(this).addClass('active');					// add active class to the clicked
// 	  	limitPagging();
//         $(table + ' tr:gt(0)').each(function() {
//           // each tr in table not the header
//           trIndex++; // tr index counter
//           // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
//           if (
//             trIndex > maxRows * pageNum ||
//             trIndex <= maxRows * pageNum - maxRows
//           ) {
//             $(this).hide();
//           } else {
//             $(this).show();
//           } //else fade in
//         }); // end of for each tr in table
//       }); // end of on click pagination list
// 	  limitPagging();
//     })
//     .val(5)
//     .change();

//   // end of on select change

//   // END OF PAGINATION
// }

// function limitPagging(){
// 	// alert($('.pagination li').length)

// 	if($('.pagination li').length > 7 ){
// 			if( $('.pagination li.active').attr('data-page') <= 3 ){
// 			$('.pagination li:gt(5)').hide();
// 			$('.pagination li:lt(5)').show();
// 			$('.pagination [data-page="next"]').show();
// 		}if ($('.pagination li.active').attr('data-page') > 3){
// 			$('.pagination li:gt(0)').hide();
// 			$('.pagination [data-page="next"]').show();
// 			for( let i = ( parseInt($('.pagination li.active').attr('data-page'))  -2 )  ; i <= ( parseInt($('.pagination li.active').attr('data-page'))  + 2 ) ; i++ ){
// 				$('.pagination [data-page="'+i+'"]').show();

// 			}

// 		}
// 	}
// }

// $(function() {
//   // Just to append id number for each row
//   $('table tr:eq(0)').prepend('<th> ID </th>');

//   var id = 0;

//   $('table tr:gt(0)').each(function() {
//     id++;
//     $(this).prepend('<td>' + id + '</td>');
//   });
// });

// //  Developed By Yasser Mas
// // yasser.mas2@gmail.com



function validateForm() {
  var x = document.forms["myForm"]["eventname"].value;
  if (x == "" || x == null) {
    alert("Eventname must be filled out");
	
    return false;
  }
  var x = document.forms["myForm"]["subject"].value;
  if (x == "" || x == null) {
    alert("subject must be filled out");
    return false;
  }
  var x = document.forms["myForm"]["email"].value;
  if (x == "" || x == null) {
    alert("Email must be filled out");
    return false;
  }
  var x = document.forms["myForm"]["reminderdate"].value;
  if (x == "" || x == null) {
    alert("Reminderdate must be filled out");
    return false;
  }
  var x = document.forms["myForm"]["days"].value;
  if (x == "" || x == null) {
    alert("Days must be filled out");
    return false;
  }
  var x = document.forms["myForm"]["timeperiod"].value;
  if (x == "" || x == null) {
    alert("Timeperiod must be filled out");
    return false;
  }
  var x = document.forms["myForm"]["description"].value;
  if (x == "" || x == null) {
    alert("Description must be filled out");
    return false;
  }
  
}



// function multiple1()
// {
// var options = $('#sel1 > option:selected');
//          if(options.length == 0){
//              alert('Please Select Any Email');
//              return false;
//          }
  
//   }

//   function multiple1()
// {
// var options = $('#sel2 > option:selected');
//          if(options.length == 0){
//              alert(' Please Select Date Before Reminder');
//              return false;
//          }
  
//   }

//   function multiple1()
// {
// var options = $('#sel3 > option:selected');
//          if(options.length == 0){
//              alert('Plase Select Time Period');
//              return false;
//          }
  
//   }


//kuch bhi

  
	</script>
</html>

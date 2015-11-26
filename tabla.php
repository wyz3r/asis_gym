<?php
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>HOLa</title>
     <script src="Jquery/jquery-2.1.4.min.js"></script>
     <link href="bootstrap-3.3.5-dist/css/bootstrapjurney.min.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="datacss/jquery.dataTables.min.css">
     <link rel="stylesheet" type="text/css" href="     datacss/dataTables.bootstrap.css">


     <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
     <script type="text/javascript" language="javascript" src="Jquery/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" language="javascript" src="datajs/jquery.dataTables.js"></script>
     <link href="css/css.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="css/menu.css">
   </head>
   <body>
     <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
 		<thead>
 			<tr>
 				<th>Rendering engine</th>
 				<th>Browser</th>
 				<th>Platform(s)</th>
 				<th>Engine version</th>
 				<th>CSS grade</th>
 			</tr>
 		</thead>

 		<tbody>
 			<tr class="gradeX">
 				<td>Trident</td>
 				<td>Internet
 					 Explorer 4.0</td>
 				<td>Win 95+</td>
 				<td class="center">4</td>
 				<td class="center">X</td>
 			</tr>
 			<tr class="gradeC">
 				<td>Trident</td>
 				<td>Internet
 					 Explorer 5.0</td>
 				<td>Win 95+</td>
 				<td class="center">5</td>
 				<td class="center">C</td>
 			</tr>
 			<tr class="gradeA">
 				<td>Trident</td>
 				<td>Internet
 					 Explorer 5.5</td>
 				<td>Win 95+</td>
 				<td class="center">5.5</td>
 				<td class="center">A</td>
 			</tr>
 			<tr class="gradeA">
 				<td>Trident</td>
 				<td>Internet
 					 Explorer 6</td>
 				<td>Win 98+</td>
 				<td class="center">6</td>
 				<td class="center">A</td>
 			</tr>

 			............................

 			<tr class="gradeA">
 				<td>Gecko</td>
 				<td>Mozilla 1.5</td>
 				<td>Win 95+ / OSX.1+</td>
 				<td class="center">1.5</td>
 				<td class="center">A</td>
 			</tr>
 		</tbody>
 	</table>

   </body>
   <script type="text/javascript" charset="utf-8">
   	$(document).ready(function() {
   		$('#example').dataTable( {
   			"bPaginate": true,
   			"bLengthChange": true,
   			"bFilter": true,
   			"bSort": true,
   			"bInfo": true,
   			"bAutoWidth": false } );
   	} );
   </script>
   <script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example').dataTable();
	} );
</script>

 </html>

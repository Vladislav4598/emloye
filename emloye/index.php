

<!DOCTYPE html>
<html>
<head>
	<title>Сотрудники</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/style.css">

</head>
<body>
	<?php

		echo '<div class=heading > Отдел кадров </div>'
	?>

		<div class = "conten">
			<form action="index.php">
				<input type="submit" name="fggdg"  value = "Обновить">
			</form>
			<input type="submit" name="rgd" onclick="Output(1)" value = "Испытательный срок">
			<input type="submit" name="dfg" onclick="Output(2)" value = "Уволенные">
			<input type="submit" name="fdg" onclick="Output(3)" value = "Начальники">

		</div>


		<br><br><br><br>




<table id = table border="1" align="center" width="100%">
	<tr>
		<th>№</th>
		<th>ФИО</th>
		<th>Дата рождения</th>
		<th>Должность</th>
		<th>Размер заработной платы</th>
		<th>Дата приема на работ</th>
		<th>Дата увольнения</th>
		<th>Причина увольнения</th>
		<th>Начальник</th>
	</tr>
	<?php
	for ($i=0; $i < 20; $i++) {
		 echo '<tr>
		<th>-</th>
		<th>-</th>
		<th>-</th>
		<th>-</th>
		<th>-</th>
		<th>-</th>
		<th>-</th>
		<th>-</th>
		<th>-</th>
	</tr>' ;
	}



	?>


</table>





<script type="text/javascript">




	function Output(id_v){



     	 $.ajax({
	              method: "POST",
	              url: "date.php",
	              dataType: "html",

	              data: { id_v: id_v }
	            })
	              .done(function( data ) {

	              	//console.log(data);


	              	var user = $.parseJSON(data);

	              	console.log(user);

	              	$('#table').empty().append(
		              	$('<tr>').append(
		              	$('<th>').text('№'),
		              	$('<th>').text('ФИО'),
		              	$('<th>').text('Дата рождения'),
		              	$('<th>').text('Должность'),
		              	$('<th>').text('Размер заработной платы'),
		              	$('<th>').text('Дата приема на работу'),
		              	id_v != 3 ?
		              	$('<th>').text('Дата увольнения') :
		              	id_v == 2 ? $('<th>').text('Причина увольнения') :
		              	$('<th>').text('Начальник'),


		             	)
		              	);


	              	$('#table').append(...user.map((el)=>(

	              		$('<tr>').append(
	              		$('<th>').text(el.user_id),
                      	$('<th>').text(el.last_name + ' ' + el.first_name +  ' ' + el.middle_name ),
                      	$('<th>').text((el.data_of_birth).split("-").reverse().join("-")),
                      	$('<th>').text(el.name_department + ' ( ' + el.description_department +') ' + ' - ' + el.name_position),
						$('<th>').text(el.salary + ' руб.'),
						$('<th>').text((el.date_of_receipt).split("-").reverse().join("-")),
						id_v != 3 ?
						$('<th>').text((el.date_dismission).split("-").reverse().join("-")) :

                      	id_v == 2 ? $('<th>').text(el.description_dismission_reason):
						$('<th>').text(el.description_department),

                      	)
                      	)));


	              });
	          }

</script>





<?php


  ?>






</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</html>




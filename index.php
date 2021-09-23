

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


			<input type="submit" name="rgd" onclick="Output(1)" value = "Испытательный срок">
			<input type="submit" name="dfg" onclick="Output(2)" value = "Уволенные">
			<input type="submit" name="fdg" onclick="Output(3)" value = "Начальники">
		</div>


		<br><br><br><br>



<table id = table border="1" align="center" width="100%">


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
	              	///alert(data);

	              	var user = $.parseJSON(data);

	              	$('#table').empty().append(
		              	$('<tr>').append(
		              	$('<th>').text('№'),
		              	$('<th>').text('ФИО'),
		              	$('<th>').text('Дата рождения'),
		              	$('<th>').text('Должность'),
		              	$('<th>').text('Дата приема на работу'),
		              	$('<th>').text('Дата увольнения'),
		              	$('<th>').text('Причина увольнения'),
		              	$('<th>').text('Размер заработной платы'),
		              	$('<th>').text('Начальник'),



		              	)
		              	);

	              	$('#fio').text('ФИО');

	              	$('#table').append(...user.map((el)=>(


	              		$('<tr>').append(
	              		$('<th>').text(el.id ),
                      	$('<th>').text(el.last_name + ' ' + el.first_name +  ' ' + el.middle_name ),
                      	$('<th>').text(el.data_of_birth),
                      	$('<th>').text(el.name_department + ' ( ' + el.description_department +') ' + ' - ' + el.name_position),
                      	$('<th>').text(el.created_at),
                      	$('<th>').text(el.updated_at),
                      	//$('<th>').text(el.description_dismission_reason),
                      	$('<th>').text(el.salary),
                      	$('<th>').text('-'),

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




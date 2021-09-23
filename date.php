<?php

	$con = mysqli_connect('localhost','root','','employees');

	$id_v= $_POST['id_v'];

	if($id_v == 1){
		$sql = 'select * from user, user_position, department, position where user.id = user_position.user_id and user_position.department_id = department.id and user_position.position_id = position.id order by user.last_name ';
		$query = mysqli_query($con, $sql);

		while ($row = mysqli_fetch_array($query)) {

			$output[] = $row;

		}
		echo json_encode($output, JSON_UNESCAPED_UNICODE);
	}

	if($id_v == 2){
		$sql = 'select * from user, user_position, department, position, dismission_reason, user_dismission where user.id = user_position.user_id and user_position.department_id = department.id and user_position.position_id = position.id and user_dismission.user_id = user.id and  user_dismission.reason_id = dismission_reason.id order by user.last_name ';
		$query = mysqli_query($con, $sql);

		while ($row = mysqli_fetch_array($query)) {

			$output[] = $row;

		}
		echo json_encode($output, JSON_UNESCAPED_UNICODE);






	}

	if($id_v == 3){






	}











 ?>
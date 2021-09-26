<?php

	$con = mysqli_connect('localhost','root','','employees');

	$id_v= $_POST['id_v'];




	if($id_v == 1){
		$sql = 'select * from user, user_position, department, position, boss where user.id = user_position.user_id and user_position.department_id = department.id and user_position.position_id = position.id and user.id <> boss.boss_id and user.id = boss.user_id and ((DATEDIFF(date_dismission, date_of_receipt)) < 90) order by user.last_name  ';
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
		$sql = 'select * from user, user_position, department, position, boss,(SELECT boss.boss_id ,MIN(DATEDIFF(CURDATE(), date_of_receipt)) as date2 from boss,user where user.id = boss.user_id and user.id <> boss.boss_id GROUP by boss.boss_id ) a where user.id = user_position.user_id and user_position.department_id = department.id and user_position.position_id = position.id and user.id <> boss.boss_id and user.id = boss.user_id and (DATEDIFF(CURDATE(), date_of_receipt)) = date2 order by description_department ';
		$query = mysqli_query($con, $sql);

		while ($row = mysqli_fetch_array($query)) {

			$output[] = $row;

		}
		echo json_encode($output, JSON_UNESCAPED_UNICODE);






	}












 ?>
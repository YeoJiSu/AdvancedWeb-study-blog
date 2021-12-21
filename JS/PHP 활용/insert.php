<html>
	<body>
		<?php
			$mysqli = new mysqli("164.125.36.78", "ID(학번)", "비밀번호", "DB이름");
			if($mysqli->connect_errno) {
				die("Failed to connect to MySQL");
			}
			if($mysqli->query("insert into students set studentID = '".$_POST['studentID']."', name = '".$_POST['name']."', phonenum = '".$_POST['phonenum']."'") !== TRUE) {
				die("Failed to Insert Data");
			}
			echo "1 record added.<br/><br/>";
		?>
		<table border = 1>
			<tr>
				<td>학번</td>
				<td>이름</td>
				<td>휴대폰번호</td>
			</tr>
		<?php
			if($result = $mysqli->query("select * from students")) {
				while($data = $result->fetch_array()) {
					echo "<tr>";
					echo "<td>" . $data['studentID'] . "</td>";
					echo "<td>" . $data['name'] . "</td>";
					echo "<td>" . $data['phonenum'] . "</td>";
					echo "</tr>";
				}
				$result->close();
				$mysqli->close();
			}
		?>
		</table>
	</body>
</html>
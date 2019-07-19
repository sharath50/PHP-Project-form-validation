<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form validation Project with Reg Ex</title>
	<meta name="author" content="sharath mohan">
	<meta name="description" content="PHP form validation project with regEx">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

<?php 

	$connection = new mysqli('localhost' , 'root' , '' , 'practice_database');

	$nameError = '';
	$emailError = '';
	$genderError = '';
	$websiteError = '';
	$invalidComments = '';

	$username = '';
	$usermail = '';
	$gender = '';
	$website = '';
	$comments = '';

?>

<?php 

	if (isset($_POST['submit'])) {
		if (empty($_POST['username'])) {
			$nameError = 'name requred';
		} else {
			$username = check_input($_POST['username']);
			if (!preg_match('/[a-zA-Z0-9_]{5,}/', $username)) {
				$nameError = 'name is not in valid format';
			}
		}
		if (empty($_POST['usermail'])) {
			$emailError = 'email requred';
		} else {
			$usermail = check_input($_POST['usermail']);
			if (!preg_match('/[a-zA-Z0-9.-_]{5,}@[a-zA-Z0-9.-_]{3,}[.]{1}[a-zA-Z.-_]{2,}/', $usermail)) {
				$emailError = 'email is not in valid format';
			}
		}
		if (empty($_POST['gender'])) {
			$genderError = 'gender requred';
		} else {
			$gender = $_POST['gender'];
		}

		if (empty($_POST['website'])) {
			$websiteError = 'website name required';
		} else {
			$website = check_input($_POST['website']);
			if (!preg_match('/[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&\/\/=]*)?/', $website)) {
				$websiteError = 'website is not in valid format';
			}
		}
		if (empty($_POST['comments'])) {
			
		} else {
			$comments = check_input($_POST['comments']);
			if (!preg_match('/[a-zA-Z0-9!.,-_?]*/', $comments)) {
				$invalidComments = 'comments include some uncommon characters';
			}
		}

		function send_data() {
			echo "<ul class='list-unstyled'> <li> Name : " . $_POST['username'] . "</li>";
			echo "<li> Email : " . $_POST['usermail'] . "</li>";
			echo "<li> Gender : " . $_POST['gender'] . "</li>";
			echo "<li> Website : " . $_POST['website'] . "</li>";
			echo '<li> comments : ' . $_POST['comments'] . "</li> </ul>";
		}
	}

	function check_input($data) {
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function insert_into_database() {
		global $username , $usermail , $gender , $website , $comments , $connection;

		$Query = "INSERT INTO form_validation(username , email , gender , website , comments) VALUES('{$username}' , '{$usermail}' , '{$gender}' , '{$website}' , '{$comments}');";
		$execution = $connection->query($Query);

			if ($execution) {
				echo 'ok, success';
			} else {
				echo 'No, it\'s not success';
				echo "error : " . $execution->error;
			}
	}

?>

<div class='content'>
	<div class="container">
		<div class="row sec">
			<div class="col"><h1 class="h1 text-white heading">Form validation</h1></div>
		</div>
		<div class="row">
			<div class="col-8">
				<form class="form-group" action="" method="POST">
					<div class="form-group">
						<label class="lead" for="user">UserName : <span class="text-dark font-weight-lighter"><?php echo $nameError; ?></span></label>
						<input class="form-control form-control-sm" id="user" type="text" name="username">
					</div>
					<div class="form-group">
						<label class="lead" for="mail">E-Mail : <span class="text-dark font-weight-lighter"><?php echo $emailError; ?></span></label>
						<input class="form-control form-control-sm" id="mail" type="email" name="usermail">
					</div>
					<div class="form-group">
						<label class="lead">Gender : <span class="text-dark font-weight-lighter"><?php echo $genderError; ?></span></label> <br/>
						<div class="btn-group btn-group-toggle" data-toggle="buttons">
							<label class="btn btn-sm btn-primary active">
								<input id="option1" type="radio" value="male" name="gender" checked>Male
							</label>
							<label class="btn btn-sm btn-primary">
								<input id="option2" type="radio" value="female" name="gender">Female
							</label>
							<label class="btn btn-sm btn-primary">
								<input id="option2" type="radio" value="Trans" name="gender">Trans
							</label>
						</div>
					</div>
					<div class="form-group">
						<label class="lead" for="website">Website : <span class="text-dark font-weight-lighter"><?php echo $websiteError; ?></span></label>
						<input class="form-control form-control-sm" id="website" type="text" name="website">
					</div>
					<div class="form-group">
						<label class="lead" for="message">Comments : <span class="text-dark font-weight-lighter"><?php echo $invalidComments; ?></span></label>
						<textarea class="form-control form-control-sm" id="message" rows="4" cols="30" name="comments" maxlength="512"></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-sm btn-outline-primary btn-block w-25" name="submit" type="submit">Submit</button>
					</div>
				</form>

			</div>
			<div class="col-4 bg-white text-dark card">
				
				<?php

					if (empty($nameError) && empty($emailError) && empty($genderError) && empty($websiteError)) {
						if (!empty($username) && !empty($usermail) && !empty($gender) && !empty($website)) {
							send_data();
							insert_into_database();

						} else {
							echo "<p class='text-danger text-justify'>Something went wrong input is not valid or empty please fill all inputs with valid data...</p>";
						}
					} else {
						echo "<p class='text-danger text-justify'>Something went wrong input is not valid or empty please fill all inputs with valid data...</p>";
					}
					
				?>
			</div>
		</div>
	</div>
</div>




	<!--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>





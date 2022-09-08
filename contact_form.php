<?php
/**
 * Plugin Name: contact-form-pulkit
 * Plugin URI: https://www.your-site.com/
 * Description: This is one of the best contact us form plugin on all of wordpress. Please do not use it
 * Version: 0.1
 * Author: Pulkit
 * Author URI: https://www.your-site.com/
 **/
require_once('./../wp-load.php');
if(isset($_GET['email'])){
	die(var_dump("I am dead"));
}
$email = $fname = $lname = $contact = $subject = $description = '';
$errors = array('email' => '', 'fname' => '', 'lname' => '', 'contact' => '', 'subject' => '', 'description' => '');
if(isset($_POST['submit'])){
	if(empty($_POST['email']))
		$errors['email'] = 'Email is required';
	else{
		$email = $_POST['email'];
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errors['email'] = 'Email must be a valid email address';
		}
	}
	if(empty($_POST['fname']))
		$errors['fname'] = 'First name is required';
	else{
		$fname = $_POST['fname'];
		if(!preg_match('/^[a-zA-Z\s]+$/', $fname)){
			$errors['fname'] = 'Name must be letters and spaces only';
		}
	}
	if(empty($_POST['lname']))
		$errors['lname'] = 'Last Name is required';
	else{
		$lname = $_POST['lname'];
		if(!preg_match('/^[a-zA-Z\s]+$/', $lname)){
			$errors['lname'] = 'Name must be letters and spaces only';
		}
	}
	if(empty($_POST['contact']))
		$errors['contact'] = 'Contact Number is required';
	else{
		$contact = $_POST['contact'];
		if(!preg_match('/^\d{10}$/', $contact)){
			$errors['contact'] = 'Contact Number must contain only digits';
		}
	}
	if(empty($_POST['subject']))
		$errors['subject'] = 'Subject is required';
	else
		$subject = $_POST['subject'];
	if(empty($_POST['description']))
		$errors['description'] = 'Description is required';
	else
		$description = $_POST['description'];

	if(array_filter($errors)){}
	else{
		//$data = add_option('contact_form_data', ['email' => $_POST['email'], 'fname' => $_POST['fname'], 'lname' => $_POST['lname'], 'contact' => $_POST['contact'], 'subject' => $_POST['subject'], 'description' => $_POST['decription']]) ;
		$a = get_option('admin_email');
		header('Location: index.html');
	}
}
?>

<!DOCTYPE html>
<html>
	<?php include('templates/header.php'); ?>
	<section class = "container grey-text">
		<h4 class = "center">Contact Us</h4>
		<form class = "white" action = "contact_form.php" method = "POST">
			<label>Email</label>
			<input type = "text" name = "email" value = "<?php echo htmlspecialchars($email) ?>">
			<div class = "red-text"><?php echo $errors['email']; ?></div>
			<label>First Name</label>
			<input type = "text" name = "fname" value = "<?php echo htmlspecialchars($fname) ?>">
			<div class = "red-text"><?php echo $errors['fname']; ?></div>
			<label>Last Name</label>
			<input type = "text" name = "lname" value = "<?php echo htmlspecialchars($lname) ?>">
			<div class = "red-text"><?php echo $errors['lname']; ?></div>
			<label>Contact Number</label>
			<input type = "text" name = "contact" value = "<?php echo htmlspecialchars($contact) ?>">
			<div class = "red-text"><?php echo $errors['contact']; ?></div>
			<label>Subject</label>
			<input type = "text" name = "subject" value = "<?php echo htmlspecialchars($subject) ?>">
			<div class = "red-text"><?php echo $errors['subject']; ?></div>
			<label>Description</label>
			<input type = "text" name = "description" value = "<?php echo htmlspecialchars($description)?>">
			<div class = "red-text"><?php echo $errors['description']; ?></div>
			<br><div class="center">
			<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

		<?php include('templates/footer.php'); ?>
</html>
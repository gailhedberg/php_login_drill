<?php
// returns true if $value contains alpha, numbers, apostrophe, hyphen or a space
// else returns false

	function clean_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>

<?php
	function test_input_values($data) {
		if (!preg_match("/^[a-zA-Z0-9]*$/", $data)) {
			$msg = "Invalid characters - please retry";
		} else {
			$msg = "";
		}
		return $msg;
	}
	
?>


<?php

// * presence
// use trim() so empty spaces don't count
// use === to avoid false positives
// empty() would consider "0" to be empty

	function has_presence($value) {
		return isset($value) && $value !== "";
	}
?>

<?php 
// * string length
// max length

	function has_max_length($value, $max) {
		return strlen($value) <= $max;
	}
?>

<?php 
// * inclusion in a set
	function has_inclusion_in($value, $set) {
		return in_array($value, $set);
}
?>

<?php 
	function form_errors($errors=array()) {
		$output = "";
		if (!empty($errors)) {
		  $output .= "<div class=\"error\">";
		  $output .= "Please fix the following errors:";
		  $output .= "<ul>";
		  foreach ($errors as $key => $error) {
			$output .= "<li>{$error}</li>";
		  }
		  $output .= "</ul>";
		  $output .= "</div>";
		}
		return $output;
	}
?>
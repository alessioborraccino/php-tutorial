<?php include("class_lib.php"); ?>
<?php
$stefan = new Person($_POST['input']);

$job = new Job();
$job->setApplicant($stefan);

echo "Stefan's full name: " . $stefan->getName();
?>



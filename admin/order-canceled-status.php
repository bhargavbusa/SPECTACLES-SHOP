<?php require_once('header.php'); ?>

<?php
if( !isset($_REQUEST['id']) || !isset($_REQUEST['taskid1']) ) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>
<?php
if(isset($_REQUEST['id']) && isset($_REQUEST['taskid1']) ) {
	$statement = $pdo->prepare("UPDATE tbl_payment SET order_status=? WHERE id=?");
	$statement->execute(array($_REQUEST['taskid1'],$_REQUEST['id']));

	header('location: order.php');
}
?>
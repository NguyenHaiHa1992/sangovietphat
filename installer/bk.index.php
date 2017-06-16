<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>iPhoenix CMS Installer</title>
		<link rel="stylesheet" href="css/style.css">
		<script src="js/script.js"></script>
	</head>
	<body>
		<h1>iPhoenix CMS Installer <span>Easier more than ever </span></h1>
		<section id="step1">
			<div class="title">Please complete your configuration</div>
			<form method="POST">
				<div class="group_input">
					<div class="form_input">
						<label>Host</label>
						<input type="text" readonly placeholder="Your database name" name="DB_HOST" value="127.0.0.1" required />
					</div>
					<div class="form_input">
						<label>Root user</label>
						<input type="text" readonly placeholder="Root user" name="DB_ROOT_USER" value="root" required />
					</div>
					<div class="form_input">
						<label>Root password</label>
						<input type="text" placeholder="Root password" name="DB_ROOT_PASS" value="<?php echo isset($_POST['DB_ROOT_PASS']) ? $_POST['DB_ROOT_PASS']:"";?>" /> <span>Normally empty</span>
					</div>
				</div>
				<div class="group_input">
					<div class="form_input">
						<label>Database name</label>
						<input type="text" placeholder="your database name" name="dbname" required value="<?php echo isset($_POST['dbname']) ? $_POST['dbname']:"";?>"/>
					</div>
					<div class="form_input">
						<label>User name</label>
						<input type="text" placeholder="your database username" name="dbuser" required value="<?php echo isset($_POST['dbuser']) ? $_POST['dbuser']:"";?>"/>
					</div>
					<div class="form_input">
						<label>Password</label>
						<input type="text" placeholder="your database password" name="dbpass" value="<?php echo isset($_POST['dbpass']) ? $_POST['dbpass']:"";?>"/>
					</div>
					<div class="form_input">
						<label>Sample Database</label>
							<?php
							$list_sample = array();
							if ($handle = opendir('../protected/data/')) {
								while (false !== ($entry = readdir($handle))) {
									if ($entry != "." && $entry != "..") {
										$list_sample[] = $entry;
									}
								}
								closedir($handle);
							}
							;?>
						<select name="dbsample">
							<?php foreach($list_sample as $sample):?>
							<option <?php if (isset($_POST['dbsample']) && $_POST['dbsample']==$sample) echo "selected";?> value="<?php echo $sample;?>"><?php echo $sample;?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
				<input type="submit" value="Submit" />
			</form>
		</section>
<?php
$currenturl=$_SERVER['REQUEST_URI'];
$currenturl=str_replace('/installer','',$currenturl); // I have added it here
$homepage = 'http://'.$_SERVER['SERVER_NAME'].$currenturl;

if(isset($_POST) && isset($_POST['DB_HOST'])){
	define('DB_HOST', $_POST['DB_HOST']); // use ip address instead of `localhost`
	define('DB_ROOT_USER', $_POST['DB_ROOT_USER']);
	define('DB_ROOT_PASS', $_POST['DB_ROOT_PASS']);
	
	// the database you want to create
	$dbname = $_POST['dbname'];
	$dbuser = $_POST['dbuser'];
	$dbpass = $_POST['dbpass'];
	$dbsample = $_POST['dbsample'];

	try {
	    // login with root user
	    $dbh = new PDO('mysql:host='.DB_HOST, DB_ROOT_USER, DB_ROOT_PASS);
	
	    // create database
	    $dbh->exec(
	        "CREATE DATABASE `$dbname` CHARACTER SET utf8 COLLATE utf8_unicode_ci;
	        CREATE USER '$dbuser'@'localhost' IDENTIFIED BY '$dbpass';
	        GRANT ALL ON `$dbname`.* TO '$dbuser'@'localhost';
	        FLUSH PRIVILEGES;"
	    )
	    or die(print_r($dbh->errorInfo(), true));

		$dbh->exec("set names utf8");
	
	    // use database
	    $dbh = new PDO('mysql:host='.DB_HOST.';dbname='.$dbname, DB_ROOT_USER, DB_ROOT_PASS);
	
	    // optional: import existing sql file if you have
	    $imported = $dbh->exec(file_get_contents('../protected/data/'.$dbsample));
	    if ($imported === false) { // even if success, it may also return some code
	        die(print_r($dbh->errorInfo(), true));
	    }
		else{
			$dbfile = "../protected/config/db.php";
			$f = fopen($dbfile, 'w') or die("Can't open file");
			$dbcontent = "<?php
							return array(
									'connectionString' => 'mysql:host=localhost;dbname=".$dbname."',
									'emulatePrepare' => true,
									'username' => '".$dbuser."',
									'password' => '".$dbpass."',
									'charset' => 'utf8',
									'tablePrefix' => 'tbl_',
								);";
			fwrite($f, $dbcontent);
			fclose($f);

			echo '<b style="color: red">Install iPhoenix CMS successfully. Please go to <a href="'.$homepage.'">homepage</a></b>';
		}

	} catch (PDOException $e) {
	    die("DB ERROR: ". $e->getMessage());
	}
}
;?>
	</body>
</html>
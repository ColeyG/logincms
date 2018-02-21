<?php
	require_once('phpscripts/config.php');
    confirm_logged_in();
    if(isset($_POST['submit'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);
        $userlvl = $_POST['userlvl'];
        $fname = trim($_POST['firstname']);
        if(empty($userlvl)){
            $message = "Please select a user level.";
        }else{
            $result = createUser($username,$password,$email,$userlvl,$fname);
            $message = $result;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/main.css" rel="stylesheet">
</head>
<body>
    <header id="mainHeader" class="container-fluid flexIn green">
        <div><h6 class="centerText">user controls</h6></div>
        <h2>Cole's CMS</h2>
        <div class="flexInDown">
           <h6 class="centerText"><?php echo "{$_SESSION['users_name']}"?></h6> 
           <a href="phpscripts/caller.php?caller_id=logout">Logout</a>
        </div>
    </header>
    <div class="container">
        <div id="cmsContainer" class="beige flexInDown">
            <?php if(!empty($message)){echo "<p class='danger'>".$message."</p>";}?>
            <form action="admin_users.php" method="post" class="flexInDown">
            <label>First Name:</label>
            <input  type="text" name="firstname" value="<?php if(!empty($message)){echo $fname;}?>">
            <label>Username:</label>
            <input  type="text" name="username" value="<?php if(!empty($message)){echo $username;}?>">
            <label>Password:</label>
            <input  type="text" name="password" value="<?php if(!empty($message)){echo $password;}?>">
            <label>Email:</label>
            <input  type="text" name="email" value="<?php if(!empty($message)){echo $email;}?>">
            <label>User Level:</label>
            <select name="userlvl">
                <option value="">Please Select a User Level</option>
                <option value="2">Web Admin</option>
                <option value="1">Web Master</option>
            </select>
                <input class="btn btn-primary m-1" type="submit" name="submit" value="Create User">
            </form>
        </div> 
    </div>
</body>
</html>
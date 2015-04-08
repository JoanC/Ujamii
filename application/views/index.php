


<html>
<head>

<title>Home Page</title>
</head>
 
<body>
<?php
$this->load->helper('url');
$this->load->model("UserService");
 
$userService=new UserService();
 
$userIDs=$userService->getAllRegisteredUsersIDs();
 
?>
<table>
<tr><td>username</td><td>Edit</td><td>Remove</td></tr>
<?php for($index=0;$index<sizeof($userIDs);$index++){ ?>
<tr>
<td>Username</td><td><a href="<?php echo base_url(); ?>userAdministration/editUserDetails/<?php echo $userIDs[$index]; ?>">Edit User </a></td>
<td><a href="<?php echo base_url(); ?>userAdministration/removeRegisteredUser/<?php echo $userIDs[$index]; ?>">Remove User </a></td>
</tr>
<?php
}
?>
 
<tr><td><a href="<?php echo base_url(); ?>userAdministration/register">Add New User </a></td></tr>
</table>
</body>
</html> 

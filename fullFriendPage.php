<!DOCTYPE html>
<html>
<style>
main{
    background-color: #CAF0f8;
}
nav {
background-color: #CAF0f8;
height: 8%;
}

p1{
    font-size: 18px;
}
p2{
    font-size: 14px;
}
.dropbtn {
  background-color: #CAF0f8;
  padding: 8px 75px;
  font-size: 13px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
  left: 50%;
  margin-right: -50%;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #ADE8F4;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  padding: 8px 75px;
  text-decoration: none;
  display: block;
}
.dropdown-content a:hover {background-color: #ADE8F4;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color:#ADE8F4;}

.friendList {
	background-color:#CAF0f8;
	border:1px solid #ADE8F4;
	display:inline-block;
	font-size:13px;
	padding: 8px 75px;
}
.friendList:hover {
	background-color:#ADE8F4;
}
.friendList:active {
    position:relative;
	  top:1px;
}

.friendSearch {
width: 190px;
height: 14px;
float: left;
}

.submitButton {
  padding: 8px 75px;
  text-align: center;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
}

</style>
<code>
<!-- JavaScript When needed -->
</code>
<title> W/ Friends | Friends </title>
<nav>
    <h1>NAV</h1>
</nav>
<body>
<?php
require_once 'friends.php';
$postIns = new User();
 ?>
</body>
<main>
    <!-- Main Focus Managing Friends Sidebar -->
    <h1>Friends</h1>
    <p1>List</p1><br>
    <div class="dropdown">
        <button class="dropbtn"><?php foreach($postIns->getFriend('123456') as $user){
  echo $user->name;
}?></button>
        <div class="dropdown-content">
          <button class="friendList">Remove Friend</button>
        </div>
    </div></br></br>
    <div class="dropdown">
        <button class="dropbtn">Friend 2</button>
        <div class="dropdown-content">
          <button class="friendList">Remove Friend</button>
        </div>
    </div></br></br>
    <div class="dropdown">
        <button class="dropbtn">Friend 3</button>
        <div class="dropdown-content">
          <button class="friendList">Remove Friend</button>
        </div>
    </div></br></br>
    <div class="dropdown">
        <button class="dropbtn">Friend 4</button>
        <div class="dropdown-content">
          <button class="friendList">Remove Friend</button>
        </div>
    </div></br></br>
    <p1>Add</p1><br>
    <p2>Friend Code: <?php foreach($postIns->getCode() as $user){
  echo $user->friendCode;
}?></p2><br> <!-- Friend Code Should Be Pre-Generated On Account Creation? -->
    <input class="friendSearch"type="text" placeholder="Search For Friends...">
    <br></br>
    <button class="submitButton">Submit</button>
</main>
</html>
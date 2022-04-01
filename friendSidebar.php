<!DOCTYPE html>
<html>
<style>
nav {
background-color: #CAF0f8;
height: 8%;
}
aside {
    float: right;
    background-color: #CAF0f8;
    height: 400px;
    width: 200px;
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

.pfpImage {
  width: 15px;
  height: 15px;
  border-radius: 50%;
  float: left;
  margin-top: 5px;
  margin-right: 5px;
  margin-left: 5px;
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
// [{'id' => 1, 'title' => 'nfeubeu'}]
// foreach($postIns->getUser() as $user){
//   echo $user->friendCode . "<br>";
//   echo $user->name;
// }
// ?>
</body>
<aside>
    <!-- Main Focus Managing Friends Sidebar -->
    <h1>Friends</h1>
    <p1>List</p1>
    <div class="dropdown" style="float:right;">
        <button class="dropbtn" ><img src='img/pfp.png' class="pfpImage" alt="profile image"><?php foreach($postIns->getFriend() as $user){
  echo $user->name;
}?></button>
        <div class="dropdown-content">
          <button class="friendList">Remove Friend</button>
        </div>
    </div>
    <div class="dropdown" style="float:right;">
        <button class="dropbtn"><img src='img/pfp.png' class="pfpImage" alt="profile image">Friend</button>
        <div class="dropdown-content">
          <button class="friendList">Remove Friend</button>
        </div>
    </div>
    <div class="dropdown" style="float:right;">
        <button class="dropbtn"><img src='img/pfp.png' class="pfpImage" alt="profile image">Friend</button>
        <div class="dropdown-content">
          <button class="friendList">Remove Friend</button>
        </div>
    </div>
    <div class="dropdown" style="float:right;">
        <button class="dropbtn"><img src='img/pfp.png' class="pfpImage" alt="profile image">Friend</button>
        <div class="dropdown-content">
          <button class="friendList">Remove Friend</button>
        </div>
    </div></br>
    <p1>Add</p1><br>
    <p2>Friend Code: <?php foreach($postIns->getCode() as $user){
  echo $user->friendCode;
}?></p2><br> <!-- Friend Code Should Be Pre-Generated On Account Creation? -->
    <input class="friendSearch"type="text" placeholder="Search For Friends...">
    <br>
    <button class="submitButton">Submit</button>
</aside>
</html>
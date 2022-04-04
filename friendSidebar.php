<!DOCTYPE html>
<html>
<style>

aside {
    text-align: center;
    float: right;
    background-color: #00b4d8;
    height: 600px;
    width: 14%;
    border-radius: 5%;
}
p1{
    font-size: 18px;
}
p2{
    font-size: 14px;
}
.dropbtn {
  background-color: #90e0ef;
  /* padding: 12px 85px; */
  font-size: 10px;
  text-align: center;
  width: 14vw;
  height: 8vh;
}
.dropbtn

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #90e0ef;
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
	background-color:#90e0ef;
	border:1px solid #90e0ef;
	display:inline-block;
	font-size:13px;
	padding: 8px 75px;
}
.friendList:hover {
	background-color:#90e0ef;
}
.friendList:active {
    position:relative;
	top:1px;
}

.friendSearch {
width: 75%;
height: 20px;
float: left;
background-color:#90e0ef;
border-radius: 20%;
margin-left: 20px;
text-align: center;
}

.submitButton {
  padding: 8px 75px;
  text-align: center;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  background-color: #90e0ef;
  border-radius: 20%;
}

.pfpImage {
  width: 30px;
  height: 30px;
  border-radius: 100%;
  float: left;
  position: absolute;
  left: 88%;
  margin-top: -1vh;

  /*
  margin-top: 1px;
  margin-bottom: 1px;
  left: 95%;
  margin-right: -5%;
  */
}

</style>
<code>
<!-- JavaScript When needed -->
</code>
<title> W/ Friends | Friends </title>
<body>
<?php
require_once 'classes/Friend.php';
require_once 'classes/User.php';
include('indexx.html');

$userClass = new User();


$postIns = new Friend();
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
    
    <p1>Add</p1><br>
    <p2>Friend Code: <?php foreach($postIns->getCode() as $user){
  echo $user->friendCode;
}?></p2><br> <!-- Friend Code Should Be Pre-Generated On Account Creation? -->
    <form action="search.php" method="POST">
    <input class="friendSearch"type="text" placeholder="Search For Friends..." name="term">
    <br>
    <input type="submit" name="submit" value="" class="submitButton">
    </form>

    <p1>List</p1><br>
<?php foreach($userClass->getUsers() as $user) {?>
    <div class="dropdown" style="float:right;">
        <button class="dropbtn" ><img src="./img/<?php echo $user->profilepic;?>" class="pfpImage">
         <?php echo $user->name;?>
        </button>
        <div class="dropdown-content">
          <button class="friendList">Remove Friend</button>
        </div>
    </div>
  <?php } ?>
    </div></br>
 
</aside>
</html>
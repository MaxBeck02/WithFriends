<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require_once 'classes/Friend.php';

        // $postIns = new Friend();

        // $postIns->Search($_POST['term']);
        
        // $button = $_GET ['submit'];
        // $search = $_GET ['search'];

        // $con=mysqli_connect("localhost", "root", "", "wfriends" );

        // $sql="SELECT * FROM users WHERE MATCH(name, userID) AGAINST ('%" . $search . "%')";

        // $run = mysqli_query($con,$sql);
        // $foundnum = mysqli_num_rows($run);

        // if($foundnum==0){
        //     echo "We cannot find the item you searched: '<b>$search</b>'.";
        // } else {
        //     echo "<h1><h2> $foundnum Results Found for \"". $search ."\"</strong></h1>";
        //     $getquery = mysqli_query($con, $sql);

        //     while($runrows = mysqli_fetch_array($getquery)){
        //         $buylink = $runrows['name'];
        //         $imagelink = $runrows['userID'];

        //         echo"<h5 class='card-title'>".$runrows['name'] ."</h5>";
        //     }
        // }
    ?>
</body>
</html>
<?php // login.php
$hn = 'localhost';
$db = 'test2';
$un = 'root';
$pw = '';
?>
<?php
//require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM branch";
$result = $conn->query($query);
if (!$result){echo 'failed'; die($conn->error);}
$rows = $result->num_rows;
$a=$rows;

for ($j = 0 ; $j < $rows ; ++$j)
{
$result->data_seek($j);
$row = $result->fetch_array(MYSQLI_ASSOC);
echo 'Branch Name: ' . $row['branchname'] . '<br>';
echo 'Filled: ' . $row['filled'] . '<br>';
echo 'Max Strength: ' . $row['maxstrength'] . '<br>';

    $branchname[]=$row['branchname'];
    $filled[]=$row['filled'];
    $maxstrength[]=$row['maxstrength'];
//    $filled1["$branchname"]=$row['filled'];
//    $maxstrength1["$branchname"]=$row['maxstrength'];
//    print_r($branchname);
//    print_r($filled);
//    print_r($maxstrength);
}



$query = "SELECT * FROM regi";
$result = $conn->query($query);
if (!$result) die($conn->error);
$rows = $result->num_rows;


for ($j = 0 ; $j < $rows ; ++$j)
{
$result->data_seek($j);
$row = $result->fetch_array(MYSQLI_ASSOC);
echo 'Rank: ' . $row['rank'] . '<br>';
echo 'Branch1: ' . $row['branch1'] . '<br>';
echo 'Branch2: ' . $row['branch2'] . '<br>';

    $rank[]=$row['rank'];
    $branch1[]=$row['branch1'];
    $branch2[]=$row['branch2'];
    
    
//print_r($rank);
//print_r($branch1);
//print_r($branch2);
print_r($row);
    $fill="";
    $branchalloted="null";
    $count=0;
    for($k=0;$k<$a;++$k)
    {
        echo  "<br>$branch2[$j] and $branchname[$k]<br>";
       if(($branch1[$j]==$branchname[$k])&&($filled[$k] < $maxstrength[$k]))
       {
           
    
           $branchalloted=$branch1[$j];
               //$branchalloted[]=$branchalloted1;
           $filled1[$k] = ++$filled[$k];
           $count++;
           
           echo "database<br>$branchalloted and $branch1[$j]<hr>";
           $fill=$filled1[$k];
       }
    }
    for($k=0;($k<$a && $count==0);++$k)
    {
        if(($branch2[$j]==$branchname[$k])&&($filled[$k] < $maxstrength[$k]))
       {
           
           $branchalloted=$branch2[$j];
               //$branchalloted[]=$branchalloted1;
           $filled1[$k] = ++$filled[$k];
           
           echo "database1<br> $branchalloted and $branch2[$j]<hr>";
            $fill=$filled1[$k];
            
       }
    }
    /*    else
        {
            $branchallocated="NULL";
            $filled1[$k]=$filled[$k];
            
        }
        */
    
        
    

$query2 = "UPDATE branch SET filled='$fill' WHERE  branchname='$branchalloted' ";// && branch='$branchname[$k]' ) ";
$result2 = $conn->query($query2);
if (!$result) die ("Database access failed: " . $conn->error);

        /*    $b=(string)($branchname[$j]);
    //echo $b;
    $b='ut';
switch ($b)
{
    case $branch1[$j] :
        if($filled[$j]<=$maxstrength[$j])
        {
            echo 'hi';
  //          $branchalloted=$branch1;
        //    $filled[$j]+=1;
        }
        break;
    case $branch2[$j] :
        if($filled[$j] <= $maxstrength[$j])
        {
            echo 'hello';
    //        $branchalloted=$branch2[$j];
          //  $filled[$j] += 1;
        }
        break;
    default :
        echo 'bye';
        break;
        
}
*/

$query = "INSERT INTO alloted VALUES" ."('$rank[$j]', '$branchalloted')";
$result1 = $conn->query($query);
if (!$result1) echo "INSERT failed: $query<br>" .$conn->error . "<br><br>";
    

    //reset variable to reset the database filled and branch alloted
    //impliment using button    
    $reset=0;
    
    if($reset==1)
    {
        $query3 = "DELETE FROM alloted WHERE 1";// && branch='$branchname[$k]' ) ";
        $result3 = $conn->query($query3);
        if (!$result) die ("Database access failed: " . $conn->error);     

    
        $query4 =  "UPDATE branch SET filled=0 WHERE  filled<100 ";
        //ALTER columnname SET DEFAULT value";// && branch='$branchname[$k]' ) ";
        $result4 = $conn->query($query4);
        if (!$result) die ("Database access failed: " . $conn->error);     
    }
	
	echo "<br><br><hr><br><br><hr>";
	


}
//$result->close();
//$conn->close();
echo "<br><br><br>";
//print_r($rank);
//print_r($branch1);
//print_r($branch2);
//print_r($branchname);
//print_r($filled1);
print_r($maxstrength);
print_r($filled);
?>
<?php
/*
for($j=0;$j<$a;++$j)
{
$option="";
switch ($option)
{
    case "Option1":
        if($filled<=$strength)
        {
            $alloted=$option1;
            $fill+=1;
        }
        break;
        
    case "Option2":
        if($filled<=$strength)
        {
            $alloted=$option1;
            $fill+=1;
        }
        break;
    
    default:
        
        break;
}
}
*/
?>


<!--
<button id='b1'>Reset</button>

<script>
var b1 = document.getElementById('b1');

b1.onclick = function() {
	    <?php
		
	/*	
    $reset=1;
    
    if($reset==1)
    {
		
        $query3 = "DELETE FROM alloted WHERE 1";// && branch='$branchname[$k]' ) ";
        $result3 = $conn->query($query3);
        if (!$result) die ("Database access failed: " . $conn->error);     

    
        $query4 =  "UPDATE branch SET filled=0 WHERE  filled<100 ";
        //ALTER columnname SET DEFAULT value";// && branch='$branchname[$k]' ) ";
        $result4 = $conn->query($query4);
        if (!$result) die ("Database access failed: " . $conn->error);     
    }

	$reset--;
	*/
	?>
};
</script>

<button id='b2'>Get Result</button>

<script>
var b2 = document.getElementById('b2');

b2.onclick = function() {
	    
		
		
    $reset=0;
	
	
	
    
	reload();
};

</script>
-->
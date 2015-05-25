<?php
$servername = "localhost";
$username = "john";
$password = "Lahaina*1";
$dbname = "aa";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
   }
   mysql_connect('localhost','john','Lahaina*1') or die(mysql_error());
   mysql_select_db('aa') or die(mysql_error()); 
$field='DAY';
$sort='ASC';
if(isset($_GET['sorting']))
{
  if($_GET['sorting']=='ASC')
  {
  $sort='DESC';
  }
  else
  {
    $sort='ASC';
  }
}
if($_GET['field']=='DAY')
{
   $field = "DAY";
   // $sql = "SELECT DAY, CITY, TIME, BLDGNAME, ADDRESS, MEETINGNAME FROM aameetings ORDER BY FIELD(DAY, 'SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT' )"; 
}
elseif($_GET['field']=='CITY')
{
   $field = "CITY";
   // $sql = "SELECT DAY, CITY, TIME, BLDGNAME, ADDRESS, MEETINGNAME FROM aameetings ORDER BY $field $sort";
}
elseif($_GET['field']=='TIME')
{
   $field="TIME";
   // $sql = "SELECT DAY, CITY, TIME, BLDGNAME, ADDRESS, MEETINGNAME FROM aameetings ORDER BY $field $sort";
}
elseif($_GET['field']=='BLDGNAME')
{
   $field="BLDGNAME";
   // $sql = "SELECT DAY, CITY, TIME, BLDGNAME, ADDRESS, MEETINGNAME FROM aameetings ORDER BY $field $sort";
}
elseif($_GET['field']=='ADDRESS')
{
   $field="ADDRESS";
   // $sql = "SELECT DAY, CITY, TIME, BLDGNAME, ADDRESS, MEETINGNAME FROM aameetings ORDER BY $field $sort";
}
elseif($_GET['field']=='MEETINGNAME')
{
   $field="MEETINGNAME";
   // $sql = "SELECT DAY, CITY, TIME, BLDGNAME, ADDRESS, MEETINGNAME FROM aameetings ORDER BY $field $sort";
}
// echo 'Hello';
// if $field = "DAY"
// {
//  $sql = "SELECT DAY, CITY, TIME, BLDGNAME, ADDRESS, MEETINGNAME FROM aameetings ORDER BY FIELD(DAY, 'SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT' )";
// }
// else
// {
   $sql = "SELECT DAYTIME, ADDRESSCITY, MEETINGTIME, BLDGNAME, MEETINGNAME FROM meet WHERE UPPER(DATE_FORMAT(now(), '%a ')) = DAY ORDER BY MEETING24HR, CITY";
// }
function formatUrl($str, $sep='-')
    {
            $res = strtolower($str);
            $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
            $res = preg_replace('/[[:space:]]+/', $sep, $res);
            return trim($res, $sep);
    }
$result = mysql_query($sql) or die(mysql_error());
echo'<table border="1">';
echo'<th><a href="table1.php">Day and Time</a></th>
     <th><a href="table1.php?sorting='.$sort.'&field=MEETINGTIME">Group</a></th>
     <th><a href="table1.php?sorting='.$sort.'&field=ADDRESSCITY">Address</a></th>
     <th><a href="table1.php?sorting='.$sort.'&field=BLDGNAME">Building Name</a></th>';
     // <th><a href="table1.php?sorting='.$sort.'&field=ADDRESS">Address</a></th>
     // <th><a href="table1.php?sorting='.$sort.'&field=MEETINGNAME">Meeting Name</a></th>';
    
    
while($row = mysql_fetch_array($result))
{
// $addressurl = '<a href="http://www.w3schools.com/">Visit W3Schools!</a>'
// $addressurl = '<a href="'$link'"http://maps.google.com/'.$row['ADDRESSCITY'].'></a>';
// $addressurl = $row['ADDRESSCITY'];
// echo'<tr><td>'.$row['DAYTIME'].'</td><td>'.$row['MEETINGNAME'].'</td><td>'.$row['ADDRESSCITY'].'</td><td>'.$row['BLDGNAME'].'</td></tr>';
// echo'<tr><td>'.$row['DAYTIME'].'</td><td>'.$row['MEETINGNAME'].'</td><td>'.'<a href="http://maps.google.com/">'.$row['ADDRESSCITY'].'">Map</a>'.'</td><td>'.$row['BLDGNAME'].'</td></tr>';
// echo'<tr><td>'.$row['DAYTIME'].'</td><td>'.$row['MEETINGNAME'].'</td><td>'.'<a href="http://maps.google.com/">'.$row['ADDRESSCITY'].'</a>'.'</td><td>'.$row['BLDGNAME'].'</td></tr>';
// echo'<tr><td>'.$row['DAYTIME'].'</td><td>'.$row['MEETINGNAME'].'</td><td>'.'<a href="http://maps.google.com/?q=">'.$row['ADDRESSCITY'].'</a>'.'</td><td>'.$row['BLDGNAME'].'</td></tr>';
// echo'<tr><td>'.$row['DAYTIME'].'</td><td>'.$row['MEETINGNAME'].'</td><td>'.'<a href="http://maps.google.com/?q=">'.$row['ADDRESSCITY'].'</a>'.'</td><td>'.$row['BLDGNAME'].'</td></tr>';
// echo'<tr><td>'.$row['DAYTIME'].'</td><td>'.$row['MEETINGNAME'].'</td><td>'.'<a href="http://maps.google.com/?q='.$row['ADDRESSCITY'].'">'.$row['ADDRESSCITY'].'</a>'.'</td><td>'.$row['BLDGNAME'].'</td></tr>';
// echo'<tr><td>'.$row['DAYTIME'].'</td><td>'.$row['MEETINGNAME'].'</td><td>'.'<a href="http://maps.google.com/?q='.$row['ADDRESSCITY'].'">'.$row['ADDRESSCITY'].'</a>'.'</td><td>'.$row['BLDGNAME'].'</td></tr>';
echo'<tr><td>'.$row['DAYTIME'].'</td><td>'.$row['MEETINGNAME'].'</td><td>'.'<a href="https://www.google.com/maps?saddr=My+Location&daddr='.$row['ADDRESSCITY'].'">'.$row['ADDRESSCITY'].'</a>'.'</td><td>'.$row['BLDGNAME'].'</td></tr>';
// echo'<tr><td>'.$row['DAYTIME'].'</td><td>'.$row['MEETINGNAME'].'</td><td>'.'<a href="https://www.google.com/maps?saddr=My+Location&daddr='.$row['ADDRESSCITY'].' target="_blank".'">'.$row['ADDRESSCITY'].'</a>'.'</td><td>'.$row['BLDGNAME'].'</td></tr>';


// echo'<tr><td>'.$row['DAYTIME'].'</td><td>'.$row['MEETINGNAME'].'</td><td>'.'<a href="http://maps.google.com/?q=">'.preg_replace('/[[:space:]]+/', '+'. $row['ADDRESSCITY']).'+CA'.'</a>'.'</td><td>'.$row['BLDGNAME'].'</td></tr>';
// echo'<tr><td>'.$row['DAYTIME'].'</td><td>'.$row['MEETINGNAME'].'</td><td>'.'<a href="http://maps.google.com/?q='.preg_replace('/[[:space:]]+/'. '+'. $row['ADDRESSCITY'])>'.preg_replace('/[[:space:]]+/'. '+', $row['ADDRESSCITY']).'+CA'.'</a>'.'</td><td>'.$row['BLDGNAME'].'</td></tr>';
//                                                                        preg_replace('/[[:space:]]+/', '+', $row['ADDRESSCITY']);
// echo'<tr><td>'.$row['DAYTIME'].'</td><td>'.$row['MEETINGNAME'].'</td><td>'.'<a href="http://maps.google.com/?q=" target="_blank">preg_replace('/[[:space:]]+/'. '+'. $row['ADDRESSCITY']).</a>'.'</td><td>'.$row['BLDGNAME'].'</td></tr>';
// echo'<tr><td>'.$row['DAYTIME'].'</td><td>'.$row['MEETINGNAME'].'</td><td>'.'<a href="http://www.w3schools.com/">Visit W3Schools!</a>'.'</td><td>'.$row['BLDGNAME'].'</td></tr>';
}
echo'</table>';
// echo'adress url = '.$addressurl;
?>

<?php
$visitCounter = (int) 0;
if(isset($_COOKIE['visitCounter'])){
    $visitCounter = $_COOKIE['visitCounter'];

}
$visitCounter++;//либо +1 можно написать
       $lastVisit = "";
              if(isset($_COOKIE['time'])){
    $lastVisit = $_COOKIE['time'];
}
       setcookie('visitCounter', $visitCounter);
       setcookie('time', date("l jS \of F Y h:i:s A") );
                 if(date('d-m-Y', $_COOKIE['lastVisit']) != date('d-m-Y'));
?>



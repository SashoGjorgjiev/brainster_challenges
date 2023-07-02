<?php 
//01.
echo "<h1 style='color: green;'>01 Exercise</h1>";
$name = 'Sasho';
$hour = date("H");
$rating =7;
$rated = true ;



if ($name == 'Kathrin'){
echo "Hello Kathrin";
}
else {
    echo "Nice name";
}
echo "<br>";
if ($rating <=10){
    echo "Thank you for rating";
} else {
  echo   "Invalid rating, only numbers between 1 and 10";
}
echo "<br>";
echo "<h1 style='color: green;'>02 Exercise</h1>";

// 02.
if ($hour < 12){
    echo "Good morning Kathrin";
} elseif ($hour >12 && $hour <=19) {
echo "Good afternoon Kathrin";    
} else {
    echo "Good evening Kathrin";
}
echo "<br>";

if (gettype($rating) === 'integer'  && $rating <= 10) {
if ($rated){
    echo "You already voted";
} else {
    echo "Thanks for voting";
}

}
echo "<br>";
echo "<h1 style='color: green;'>03 Exercise</h1>";

//03.


$voters = [
'Stefan' => [ 'voted' => true,  'rating' => 7],
 'John' => [  'voted' => false, 'rating' => 3],
 'James' => [ 'voted' => true, 'rating' => 2],
 'Clouso' =>[ 'voted' => false, 'rating' => 11],
 'Debrie' => [ 'voted' => true, 'rating' => 4],
 'Alex' => [  'voted' => false, 'rating' => 8],
 'Bechkam' => [  'voted' => true, 'rating' => 5],
 'Steve' => [  'voted' => false, 'rating' => 1],
 'Jim' => [  'voted' => true, 'rating' => 13],
 'Andrew' => [  'voted' => false, 'rating' => 10]
];
foreach ($voters as $voterName => $voterRating) {
    $voted = $voterRating['voted'];
    $rating = $voterRating['rating'];
    $concat = $voted . ',' . $rating;
    echo "<br>";

    $hour = date("H");
    $greeting = "";
    
    if ($hour <= 12) {
        $greeting = "morning";
    } elseif ($hour <= 19) {
        $greeting = "afternoon";
    } else {
        $greeting = "evening";
    }
    
    echo "Good $greeting $voterName";
    echo "<br>";
    

    if ($voted  && $rating <= 10) {
        echo "You already voted with a $rating";
    } elseif (!$voted  && $rating <= 10) {
        echo "Thanks for voting with a $rating";
    } else {
        echo "Invalid rating, only numbers between 1 and 10";
    }

    echo "<br>";
}

?>
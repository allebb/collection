<?php
require_once '../lib/collection.inc.php';
use Ballen\Collection\Collection;

$cars = new Collection();

// Add some cars...
$cars->push('Ford Focus');
$cars->push('BMW 580i');
$cars->push('Toyota Avensis');
$cars->push('Marcos Martina Spyder');

// Lets output the cars as a JSON object
echo $cars->all()->toJson();

// How many cars do we have?
echo '<p>Total cars:' . $cars->count().'</p>';

// Add some more cars...
$cars->push([
    'Ferrari Modena',
    'Seat Leon',
    'Peugeot 307',
    'Toyota Auris',
]);

// How many do we have now?
echo '<p>Total cars after adding four:' . $cars->count() . '</p>';

// Lets get the first car in our collection...
echo '<p>First car added was: ' . $cars->first() . '</p>';

// Get the last car from our collection...
echo '<p>Last car added was: ' . $cars->last() . '</p>';

$mini_cooper = 'Nope!';
if ($cars->has('Mini Cooper')) {
    $mini_cooper = 'Yes!';
}

echo '<p>Do we have a Mini Cooper in our collection? ' . $mini_cooper.'</p>';

// Lets shuffle (randomise) our collection...
$cars->shuffle();
echo '<p>Randomised our order now looks like: ' . $cars->all()->toJson().'</p>';

// We now have zero items in our collection...
echo '<p>' .$cars->count(). '</p>';

// Lets iterate over the collection...
echo 'The following cars are in our collection...';
foreach($cars->all()->toArray() as $key => $value){
    echo '<p>' .$value. '</p>';
}

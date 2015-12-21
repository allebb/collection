<?php
require_once '../lib/collection.inc.php';
use Ballen\Collection\Collection;

$eol = '<br>';

$fruits = new Collection(['strawberry' => 'Red', 'orange' => 'Orange', 'lemon' => 'Yellow', 'grape' => 'Purple']);

echo 'Total fruits in our collection:' . $fruits->count() . $eol;

// We'll add Apples to our collection...
$fruits->push(['apple' => 'Green']);

echo 'We added an Apple to our collection so now we have: ' . $fruits->count() . ' fruits.' . $eol;

// We'll not iterate over our fruits and output the data...
$fruits->each(function($key, $value) use ($eol) {
    echo 'An ' . $key . ' is ' . $value . $eol;
});

echo "The first fruit is: " . $fruits->first();

echo "The last fruit is: " . $fruits->last();

// We can reset our fruit collection (to either a new list or emtpy it entirely)
$fruits->reset();
echo 'Now that we\'ve reset the collection we now have ' . $fruits->count() . ' items!';

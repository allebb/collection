<?php

use Ballen\Collection\Collection;

class CollectionlTest extends PHPUnit_Framework_TestCase
{

    public function testCreateCollectionFromArray()
    {
        $collection = new Collection(['A', 'B', 'C', 'D']);
        $this->assertEquals(4, $collection->count());
    }

    public function testPutItemOnToCollection()
    {
        $collection = new Collection();
        $collection->put('test', 'A test string');
        $this->assertArrayHasKey('test', $collection->all()->toArray());
    }

    public function testPushItemOnToCollection()
    {
        $collection = new Collection([]);
        $collection->push(new stdClass());
        $this->assertEquals(1, $collection->count());
    }

    public function testResetToEmptyCollection()
    {
        $collection = new Collection([]);
        $collection->push(new stdClass());
        $collection->reset();
        $this->assertEquals(0, $collection->count());
    }

    public function testResetToNewCollection()
    {
        $collection = new Collection([]);
        $collection->push(new stdClass());
        $collection->reset([1 => 'First', 2 => 'Second']);
        $this->assertEquals(2, $collection->count());
    }

    public function testGetItemFromCollection()
    {
        $collection = new Collection([]);
        $collection->push(['apple' => 'Green', 'organge' => 'Orange', 'strawberry' => 'Red']);
        $this->assertEquals('Red', $collection->get('strawberry'));
    }

    public function testGetItemDefaultValueFromCollection()
    {
        $collection = new Collection([]);
        $collection->push([1 => 'First', 2 => 'Second']);
        $this->assertEquals('Third', $collection->get(3, 'Third'));
    }

    public function testGetItemCountFromCollectionm()
    {
        $collection = new Collection([]);
        $collection->push([1 => 'First', 2 => 'Second']);
        $this->assertEquals(2, $collection->count());
    }

    public function testGetAllItemsFromCollection()
    {
        $collection = new Collection(['one', 'two', 'three', 'four']);
        $this->assertEquals(4, $collection->count());
    }

    public function testCheckHasKeySuccessNumericFromCollection()
    {
        $collection = new Collection([1 => 'Bobby', 2 => 'Barry']);
        $this->assertTrue($collection->has(1));
    }

    public function testCheckHasKeyFailureNumericFromCollection()
    {
        $collection = new Collection([1 => 'Bobby', 2 => 'Barry']);
        $this->assertFalse($collection->has(3));
    }

    public function testCheckHasKeySuccessStringromCollection()
    {
        $collection = new Collection(['name1' => 'Bobby', 'name2' => 'Barry']);
        $this->assertTrue($collection->has('name1'));
    }

    public function testCheckHasKeyFailureStringromCollection()
    {
        $collection = new Collection(['name1' => 'Bobby', 'name2' => 'Barry']);
        $this->assertFalse($collection->has('name3'));
    }

    public function testGetFirstFromCollection()
    {
        $collection = new Collection(['one', 'two', 'three', 'four']);
        $this->assertEquals('one', $collection->first());
    }

    public function testGetLastFromCollection()
    {
        $collection = new Collection(['one', 'two', 'three', 'four']);
        $this->assertEquals('four', $collection->last());
    }

    public function testToString()
    {
        $collection = new Collection(['one' => 1, 'two' => 2, 'three' => 3, 'four' => 4]);
        $this->assertEquals('{"one":1,"two":2,"three":3,"four":4}', (string) $collection);
    }

    public function testActualIsEmpty()
    {
        $collection = new Collection([]);
        $this->assertTrue($collection->isEmpty());
    }

    public function testNotIsEmpty()
    {
        $collection = new Collection(['one', 'two', 'three', 'four']);
        $this->assertFalse($collection->isEmpty());
    }

    public function testShiftCollection()
    {
        $collection = new Collection(['one', 'two', 'three', 'four']);
        $this->assertEquals('one', $collection->shift());
        $this->assertEquals(['two', 'three', 'four'], $collection->all()->toArray());
    }

    public function testPopCollection()
    {
        $collection = new Collection(['one', 'two', 'three', 'four']);
        $this->assertEquals(['one', 'two', 'three'], $collection->pop()->all()->toArray());
    }

    public function testImplodeCollection()
    {
        $collection = new Collection(['one', 'two', 'three', 'four']);
        $this->assertEquals('one,two,three,four', $collection->implode(','));
    }

    public function testShuffleCollection()
    {
        $collection = new Collection(['one', 'two', 'three', 'four']);
        $this->assertNotEquals(['one', 'two', 'three', 'four'], $collection->shuffle());
    }

    public function testPrependCollection()
    {
        $collection = new Collection(['two', 'three', 'four']);
        $collection->prepend('one');
        $this->assertEquals(['one', 'two', 'three', 'four'], $collection->all()->toArray());
    }

    public function testEachOverCollection()
    {
        $collection = new Collection(['two', 'three', 'four']);
        $this->expectOutputString('TWO THREE FOUR ', $collection->each(function($key, $value) {
                echo strtoupper($value) . ' ';
            })
        );
    }

    public function testEachOverBreakCollection()
    {
        $collection = new Collection(['two', 'three', 'four']);
        $this->assertInstanceOf('Ballen\Collection\Collection', $collection->each(function($key, $value) {
                return false;
            }));
    }

    public function testGetIterator()
    {
        $fruits = new Collection(['strawberry' => 'Red', 'orange' => 'Orange', 'lemon' => 'Yellow', 'grape' => 'Purple']);
        $this->assertEquals('Red', $fruits->getIterator()['strawberry']);
    }

    public function testRemoveAlphaItem()
    {
        $fruits = new Collection(['strawberry' => 'Red', 'orange' => 'Orange', 'lemon' => 'Yellow', 'grape' => 'Purple']);
        $this->assertEquals(['strawberry' => 'Red', 'lemon' => 'Yellow', 'grape' => 'Purple'], $fruits->remove('orange')->all()->toArray());
    }

    public function testRemoveNumericItem()
    {
        $fruits = new Collection(['Strawberry', 'Orange', 'Yellow', 'Purple']);
        $this->assertArrayNotHasKey(2, $fruits->remove(2)->all()->toArray());
    }

    public function testPopItem()
    {
        $fruits = new Collection(['strawberry', 'Orange', 'Yellow', 'Purple']);
        $this->assertEquals(['strawberry', 'Orange', 'Yellow'], $fruits->pop()->all()->toArray());
    }

    public function testPullItem()
    {
        $fruits = new Collection(['strawberry', 'Orange', 'Yellow', 'Purple']);
        $this->assertEquals('Orange', $fruits->pull(1));
    }

    public function testPullItemReturnsFalse()
    {
        $fruits = new Collection(['strawberry', 'Orange', 'Yellow', 'Purple']);
        $this->assertFalse($fruits->pull(5));
    }

    public function testRandomItem()
    {
        $fruits = new Collection([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        $random = $fruits->random();
        $assertion = false;
        if (($random > 0) && ($random <= 10)) {
            $assertion = true;
        }
        $this->assertTrue($assertion, $random);
    }
}

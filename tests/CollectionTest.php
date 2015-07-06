<?php
use \PHPUnit_Framework_TestCase;
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
}

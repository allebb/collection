<?php

use Ballen\Collection\Collection;

class CollectionModelTest extends PHPUnit_Framework_TestCase
{

    private $collection;

    public function __construct()
    {
        $this->collection = new Collection(['A' => 'Apple', 'B' => 'Banana', 'C' => 'Cherry', 'D' => 'Date']);
    }

    public function testCollectionExportCount()
    {
        $this->assertEquals(4, $this->collection->all()->count());
    }

    public function testCollectionExportToObject()
    {
        $object = $this->collection->all()->toObject();
        $this->assertInstanceOf('stdClass', $object);
        $this->assertEquals('Cherry', $object->C);
    }

    public function testCollectionExportToString()
    {
        $this->assertEquals('{"A":"Apple","B":"Banana","C":"Cherry","D":"Date"}', (string) $this->collection->all());
    }
}

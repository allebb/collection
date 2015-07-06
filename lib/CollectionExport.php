<?php namespace Ballen\Collection;

/**
 * Collection
 * 
 * A Collection class (library) which provides OOP replacement for the
 * traditional array data structure. 
 *
 * @author Bobby Allen <ballen@bobbyallen.me>
 * @version 1.0.0
 * @license http://opensource.org/licenses/GPL-2.0
 * @link https://github.com/bobsta63/collection
 * @link http://www.bobbyallen.me
 *
 */
class CollectionExport
{

    private $collection;

    /**
     * Initiate the CollectionExport object.
     * @param array $collection The collection.
     */
    public function __construct(array $collection)
    {
        $this->collection = $collection;
    }

    /**
     * The total number of items in the collection.
     * @return integer
     */
    public function count()
    {
        return count($this->collection);
    }

    /**
     * Return the contents of the collection as an array.
     * @return array
     */
    public function toArray()
    {
        return $this->collection;
    }

    /**
     * Return the contents of the collection as an stdClass object.
     * @return stdClass
     */
    public function toObject()
    {
        return (object) $this->toArray();
    }

    /**
     * Return the contents of the collection as a JSON encoded string.
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->collection);
    }

    /**
     * Default return value on the object, will return the collection array.
     * @return array
     */
    public function __toString()
    {
        return $this->collection;
    }
}

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
class Collection
{

    /**
     * The collection data.
     * @var array
     */
    private $items = [];

    public function __construct($items = null)
    {
        if (!is_null($items) && is_array($items)) {
            $this->push($items);
        }
    }

    /**
     * Resets the collection with the specified array content.
     * @param array $items
     * @return \Ballen\Collection
     */
    public function reset(array $items)
    {
        $this->items = $items;
        return $this;
    }

    /**
     * Set an item or items into the the collection.
     * @param string|array $items
     * @return \Ballen\Collection
     */
    public function put($key, $item)
    {
        $this->items[$key] = $item;
        return $this;
    }

    /**
     * Push a new item (or collection of items) into the collection onto the end
     * of the collection.
     * @param array $items
     * @return \Ballen\Collection
     */
    public function push(array $items)
    {
        $this->items = array_merge($this->items, $items);
        return $this;
    }

    /**
     * Get all items from the collection.
     * @return \Ballen\CollectionExport
     */
    public function all()
    {
        return new CollectionExport($this->items);
    }

    /**
     * Get a specific item from the collection.
     * @param string $key The collection (array) key to return.
     * @param string $default Optional default value if the key doesn't exist (defaulted to false)
     * @return string
     */
    public function get($key, $default = false)
    {
        if (!isset($this->items[$key])) {
            return $default;
        }
        return $this->items[$key];
    }

    /**
     * The total number of items in the collection.
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }
}

<?php
namespace Ballen\Collection;

use ArrayIterator;

/**
 * Collection
 * 
 * A Collection class (library) which provides OOP replacement for the
 * traditional array data structure. 
 *
 * @author Bobby Allen <ballen@bobbyallen.me>
 * @license https://opensource.org/licenses/MIT
 * @link https://github.com/allebb/collection
 * @link http://bobbyallen.me
 *
 */
class Collection
{

    /**
     * The collection data.
     * @var array
     */
    private $items = [];

    /**
     * Create new instance of a Collection.
     * @param array $items
     */
    public function __construct($items = null)
    {
        if (!is_null($items) && is_array($items)) {
            $this->push($items);
        }
    }

    /**
     * Resets the collection with the specified array content.
     * @param array $items
     * @return Collection
     */
    public function reset($items = null)
    {
        $this->items = [];
        if ((func_get_args() > 0) && is_array($items)) {
            $this->items = $items;
        }
        return $this;
    }

    /**
     * Set an item or items into the the collection.
     * @param mixed $key
     * @param mixed $item
     * @return Collection
     */
    public function put($key, $item)
    {
        $this->items[$key] = $item;
        return $this;
    }

    /**
     * Push a new item (or array of items) into the collection onto the end
     * of the collection.
     * @param mixed $item
     * @return Collection
     */
    public function push($item)
    {
        if (!is_array($item)) {
            $this->items = array_merge($this->items, [$item]);
            return $this;
        }
        $this->items = array_merge($this->items, $item);
        return $this;
    }

    /**
     * Push an item (or array of items) onto the beginning of the collection.
     * @param  mixed  $item
     * @return Collection
     */
    public function prepend($item)
    {
        array_unshift($this->items, $item);
        return $this;
    }

    /**
     * Get and remove the first item from the collection.
     * @return mixed
     */
    public function shift()
    {
        return array_shift($this->items);
    }

    /**
     * Pop an item off the end of the collection.
     * @return Collection
     */
    public function pop()
    {
        array_pop($this->items);
        return $this;
    }

    /**
     * Pull an item from the collection and remove it from the collection.
     * @param string $key
     * @return mixed|false
     */
    public function pull($key)
    {
        if ($this->has($key)) {
            $pulled = $this->get($key);
            $this->remove($key);
            return $pulled;
        }
        return false;
    }

    /**
     * Removes an item from the collection.
     * @param string $key
     * @return \Ballen\Collection\Collection
     */
    public function remove($key)
    {
        if ($this->has($key)) {
            $this->items[$key] = null;
            unset($this->items[$key]);
        }
        return $this;
    }

    /**
     * Get all items from the collection.
     * @return CollectionExport
     */
    public function all()
    {
        return new CollectionExport($this->items);
    }

    /**
     * Checks if the collection has a the specified key set.
     * @param string $key The key name to check if it exists.
     * @return boolean
     */
    public function has($key)
    {
        return isset($this->items[$key]);
    }

    /**
     * Get a specific item from the collection.
     * @param string $key The collection (array) key to return.
     * @param mixed $default Optional default value if the key doesn't exist (defaulted to null)
     * @return mixed
     */
    public function get($key, $default = null)
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

    /**
     * Iterate over each of the items in the collection and execute the callback.
     * @param callable $callback
     * @return Collection
     */
    public function each(callable $callback)
    {
        foreach ($this->items as $key => $item) {
            if ($callback($key, $item) === false) {
                break;
            }
        }
        return $this;
    }

    /**
     * Retrieve a random item from the collection.
     * @return mixed
     */
    public function random()
    {
        return array_rand($this->items);
    }

    /**
     * Return the first item in the collection.
     * @return  mixed
     */
    public function first()
    {
        return array_values($this->items)[0];
    }

    /**
     * Returns the last item in the collection.
     * @return mixed
     */
    public function last()
    {
        return array_values($this->items)[$this->count() - 1];
    }

    /**
     * Shuffles (randomises) the items in the collection.
     * @return Collection
     */
    public function shuffle()
    {
        shuffle($this->items);
        return $this;
    }

    /**
     * Converts the collection into a string.
     * @return string
     */
    public function implode($glue = ' ')
    {
        return implode($glue, $this->items);
    }

    /**
     * Checks to see if the collection is empty.
     * @return boolean
     */
    public function isEmpty()
    {
        return empty($this->items);
    }

    /**
     * Get an iterator for the collection.
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }

    /**
     * Converts the collection to it's string representation (JSON)
     * @return string
     */
    public function __toString()
    {
        return $this->all()->toJson();
    }
}

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
        if ((func_get_args() > 0) && is_array($items)) {
            $this->items = $items;
        } else {
            $this->items = [];
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
        } else {
            $this->items = array_merge($this->items, $item);
        }
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
     * Pops an item off the end of the collection.
     * @return Collection
     */
    public function pop()
    {
        array_pop($this->items);
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
     * @param mixed $key The key name to check if it exists.
     * @return boolean
     */
    public function has($key)
    {
        return isset($this->items[$key]);
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
     * Return the first item in the collection.
     * @return  mixed
     */
    public function first()
    {
        return $this->items[0];
    }

    /**
     * Returns the last item in the collection.
     * @return mixed
     */
    public function last()
    {
        return array_reverse($this->items)[0];
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
     * Converts the colletion into a string.
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
        return $this->toJson();
    }

    /**
     * Converts the collection to JSON.
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->items);
    }
}

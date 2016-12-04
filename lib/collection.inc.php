<?php
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

/* * *****************************************************************************
 * THIS FILE SHOULD BE USED FOR AUTOMATICALLY LOADING THIS LIBRARY WHEN YOU ARE
 *  USING IT "STANDALONE" AND NOT USING COMPOSER OR ANOTHER PACKAGE MANAGER.
 */

$includes = array(
    'Collection.php',
    'CollectionExport.php',
);

foreach ($includes as $file) {
    require_once dirname(__FILE__) . '/' . $file;
}
<?php
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
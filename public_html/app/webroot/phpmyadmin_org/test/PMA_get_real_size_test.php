<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * tests for PMA_get_real_size()
 *
 * @version $Id: PMA_get_real_size_test.php 11986 2008-11-24 11:05:40Z nijel $
 * @package phpMyAdmin-test
 */

/**
 *
 */
require_once 'PHPUnit/Framework.php';
require_once './libraries/core.lib.php';

/**
 * @package phpMyAdmin-test
 */
class PMA_get_real_size_test extends PHPUnit_Framework_TestCase
{
    public function testNull()
    {
        $this->assertEquals(0, PMA_get_real_size('0'));
    }

    public function testKilobyte()
    {
        $this->assertEquals(1024, PMA_get_real_size('1kb'));
    }

    public function testKilobyte2()
    {
        $this->assertEquals(1024 * 1024, PMA_get_real_size('1024k'));
    }

    public function testMegabyte()
    {
        $this->assertEquals(8 * 1024 * 1024, PMA_get_real_size('8m'));
    }

    public function testGigabyte()
    {
        $this->assertEquals(12 * 1024 * 1024 * 1024, PMA_get_real_size('12gb'));
    }
}
?>

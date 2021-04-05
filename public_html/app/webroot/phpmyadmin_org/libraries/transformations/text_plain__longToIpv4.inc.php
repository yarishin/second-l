<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * @package phpMyAdmin-Transformation
 * @version $Id: text_plain__longToIpv4.inc.php 12848 2009-08-21 07:38:43Z nijel $
 */

/**
 * returns IPv4 address
 *
 * @see http://php.net/long2ip
 */
function PMA_transformation_text_plain__longToIpv4($buffer, $options = array(), $meta = '')
{
    if ($buffer < 0 || $buffer > 4294967295) {
        return $buffer;
    }

    return long2ip($buffer);
}

?>
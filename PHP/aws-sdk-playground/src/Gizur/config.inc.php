<?php

// config.inc.php
//------------------------------
//
// 2013-02-25, Jonas Colmsjö
//
// A small utility that saves files to s3
//
// Documentation is 'docco style' - http://jashkenas.github.com/docco/
//
// Coding standards http://pear.php.net/manual/en/standards.php
//
//------------------------------


// Constants and vairables
//---------------------------------------------------------------

/**
 * The AWS bucket to use
 */
define("BUCKET", "gizur-tmp");

/**
 * Sets of files to upload
 */
$paths = array ('/var/log/*.log', '/var/log/apache2/error_log'); 


?>
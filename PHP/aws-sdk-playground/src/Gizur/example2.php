<?php

// example1.php
//------------------------------
//
// 2013-02-25, Jonas Colmsjö
//
// List files in s3
//
// Documentation is 'docco style' - http://jashkenas.github.com/docco/
//
// Coding standards http://pear.php.net/manual/en/standards.php
//
//------------------------------
//
// NOTE:
//
// All dependencies needs to be loaded with `composer install`
// composer.json should include all dependencies
//------------------------------


// Includes
//---------------------------------------------------------------


// Dependencies will be automatically loaded
require __DIR__ . '/vendor/autoload.php';

// Use AWS namespace
use Aws\Common\Aws;
use Aws\Common\Enum\Region;
use Guzzle\Stream\Stream;

// Configuration
require __DIR__ . '/config.inc.php';


// Prepare Aws
//---------------------------------------------------------------

// Create an Aws object
$aws = Aws::factory(array(
   'key'    => getenv('AWS_API_KEY'),
   'secret' => getenv('AWS_API_SECRET'),
   'region' => Region::IRELAND
));

// Create a S3 client
$s3 = $aws->get('s3');


// List contents of bucket
//---------------------------------------------------------------

echo 'Current content of target bucket...' . PHP_EOL;

$listObjectsCommand = $s3->getCommand('ListObjects', array(
    'Bucket' => BUCKET
));


$iterator = $s3->getIterator($listObjectsCommand);

foreach ($iterator as $object) {
    echo $object['Key'] . ' - ' . $object['Size'] . PHP_EOL;
}


?>

<?php

// example1.php
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


// Upload file to bucket
//---------------------------------------------------------------

echo 'Saving log files to S3 in progress...' . PHP_EOL;

// Iterate over all the paths that should be saved
foreach ($paths as $path) {

    // List all files mathing the pattern
    $files = glob($path);

    // Iterate over all the files
    foreach ($files as $file) {

        // Save the file with the hostname as prefix
        $key = gethostname() . $file;

        echo "Saving " . $key . PHP_EOL;

        // Save the file to S3
        $model = $s3->putObject(array(
            'Bucket' => BUCKET,
            'Key'       => $key,
            'Body'      =>  new Stream(fopen($file, 'r'))
            ));
    }

}


?>

<?php

// All dependencies are loaded automatically
// The dependencies needs to be loaded with `composer install`
require __DIR__ . '/vendor/autoload.php';

// Use AWS namespace
use Aws\Common\Aws;
use Aws\Common\Enum\Region;

// Create an Aws object
$aws = Aws::factory(array(
   'key'    => getenv('AWS_API_KEY'),
   'secret' => getenv('AWS_API_SECRET'),
   'region' => Region::IRELAND
));

// Create a S3 client
$s3 = $aws->get('s3');



$listObjectsCommand = $s3->getCommand('ListObjects', array(
    'Bucket' => 'gizur-tmp'
));


$iterator = $s3->getIterator($listObjectsCommand);

foreach ($iterator as $object) {
    echo $object['Key'] . ' - ' . $object['Size'] . PHP_EOL;
}

?>

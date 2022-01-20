<?php   

require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

$bucket = 'lumintulogistic2021';
$keyname = 'convert_certificate/4HJN43KML57KCAE286AEF066738E70BC4B4043E2C4B38AB2B61FD8C3BA615250BE690499BD205F0B66C97E1FB10CA0DF5D0DB6738A30E6CA0F273206E8F5120B39.png';
                        
$s3 = new S3Client([
    'version' => 'latest',
    'region'  => 'ap-southeast-1'
]);

try {
    // Upload data.
    $result = $s3->putObject([
        'Bucket' => $bucket,
        'Key'    => $keyname,
        'Body'   => 'Hello, world!',
        'ACL'    => 'public-read'
    ]);

    // Print the URL to the object.
    echo $result['ObjectURL'] . PHP_EOL;
} catch (S3Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

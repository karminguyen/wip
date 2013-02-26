<?php
/** 
 * wget.php
 *
 * PHP Version 5 
 *
 *------------------------------
 *
 * @category Gizur
 * @package  Utils
 * @author   "Jonas Colmsjo <jonas@gizur.com>"
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://www.gizur.com
 *
 *------------------------------
 *
 * Get file via HTTP, like wget
 *
 * PhpDoc is used for documentation 
 * http://www.phpdoc.org/docs/latest/for-users/phpdoc-reference.html
 *
 * Coding standards http://pear.php.net/manual/en/standards.php
 *
 *------------------------------
 **/

namespace Gizur;


require __DIR__ . '/vendor/autoload.php';

use Guzzle\Http\Client;

class MyClasss {

    /**
     * Fetch a file over HTTP and save as a local file
     *
     */
    public function myWget($url, $save_as) 
    {

        /** Create HTTP client */
        $client = new Client($url);

        /** Get the file */
        $request = $client->get('');
        $response = $request->send();
        $response->getBody();

        /** Save file locally */
        file_put_contents($save_as, $response->getBody());

        return $response->getHeader('Content-Length');
    }
}

?>

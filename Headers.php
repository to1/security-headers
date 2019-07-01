<?php
namespace App\Http\Middleware;
use Closure;

class Header
{
    // Enumerate headers which you do not want in your application's responses.
    // Check : https://securityheaders.com/
    private $removeHeaderList = [
        'X-Powered-By',
    ];

    public function handle($request, Closure $next)
    {
        $this->removeUnwantedHeaders($this->removeHeaderList);
        $response = $next($request);
        
        //A list of the headers you want to include and they'r options
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('X-Frame-Options', 'DENY');
        return $response;
    }

    private function removeUnwantedHeaders($headerList)
    {
        foreach ($headerList as $header)
            header_remove($header);
    }
}

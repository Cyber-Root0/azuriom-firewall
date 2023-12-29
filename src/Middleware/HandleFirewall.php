<?php
 
namespace Azuriom\Plugin\Firewall\Middleware;
 
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Shieldon\Firewall\Firewall;
 
class HandleFirewall
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        
        $storage = __DIR__ .'/../../storage/shieldon_firewall';

        $firewall = new Firewall();
        $firewall->configure($storage);
        $firewall->controlPanel('/firewall/painel/');
        $response = $firewall->run();
    
        if ($response->getStatusCode() !== 200) {
            $httpResolver = new \Shieldon\Firewall\HttpResolver();
            $httpResolver($response);
        }

        //$response = $next($request);
        return $next($request);
    }
}
<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/events")
 */
class EventController extends Controller{
    
    /**
     * @Route("/list", name="events_list")
     * @return Response
     */
    public function events() {
        $user = $this->getUser();
        dump($user);
        
        return new Response( '<html><body>Eventos</body></html>' );
    }
}
<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class DefaultController extends Controller{
    
    /**
     * @Route("/ind")
     */
    public function admin(){
        return new Response( '<html><body>Admin page</body></html>' );
    }
}
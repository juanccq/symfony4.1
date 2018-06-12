<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Product;

class ProductController extends Controller
{
    /**
     * @Route("/product", name="product")
     */
    public function index()
    {
        $em = $this ->getDoctrine() -> getManager();
        
        $product = new Product();
        $product -> setName( 'test' );
        $product -> setPrice(123);
        $product -> setDescription( 'asdfas fasdfa' );
        
        $em ->persist($product);
        $em ->flush();
        
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
}

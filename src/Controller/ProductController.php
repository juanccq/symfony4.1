<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Product;
use App\Entity\Category;

class ProductController extends Controller
{
    /**
     * @Route("/product", name="product")
     */
    public function index()
    {
        $em = $this ->getDoctrine() -> getManager();
        
        $category = new Category();
        $category ->setName('cat1');
        
        $product = new Product();
        $product -> setName( 'test' );
        $product -> setPrice(123);
        $product -> setDescription( 'asdfas fasdfa' );
        
        $product -> setCategory( $category );
        
        $em -> persist( $category );
        $em ->persist($product);
        $em ->flush();
        
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'category'  => $category -> getId(),
            'product'   => $product -> getId()
        ]);
    }
}

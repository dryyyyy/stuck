<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/home.html.twig', [
            'controller_name' => 'AppRouter',
        ]);
    }

    /**
     * @Route("/products_list", name="products_list")
     */
    public function productsList()
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
        return $this->render('products_list/products_list.html.twig', [
            'controller_name' => 'products_list',
            'products' => $products
        ]);
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show($id)
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
        return $this->render('product/product.html.twig', [
            'controller_name' => 'product',
            'product' => $product
        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('about/about.html.twig', [
            'controller_name' => 'about',
        ]);
    }
}

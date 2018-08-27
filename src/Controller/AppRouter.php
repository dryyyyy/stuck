<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AppRouter extends AbstractController
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
        $products = [];

        return $this->render('products_list/products_list.html.twig', [
            'controller_name' => 'products_list',
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

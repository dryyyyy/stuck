<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();
        return $this->render('home/home.html.twig', [
            'controller_name' => 'AppRouter',
            'articles' => $articles
        ]);
    }

    /**
     * @param string $type
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/products_list/{type}", name="products_list")
     */
    public function productsList(string $type = '')
    {

        if ($type != '') {
            $products = $this->getDoctrine()->getRepository(Product::class)->findBy(['type' => $type]);
            return $this->render('products_list/products_list.html.twig', [
                'controller_name' => 'products_list',
                'products' => $products
            ]);
        } else {
            $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
            return $this->render('products_list/products_list.html.twig', [
                'controller_name' => 'products_list',
                'products' => $products
            ]);
        }
    }

    /**
     * @param $title
     * @Route("/product/{title}", name="product")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function product(string $title)
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->findOneBy(['title' => $title]);
        if (!$product) {
            throw $this->createNotFoundException(
                'No product found with the name '. $title
            );
        }

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

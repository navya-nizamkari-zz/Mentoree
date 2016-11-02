<?php

namespace Prac\MentBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
   /* public function indexAction()
    {
        return new Response("Whattttttttt!");
    }*/

    /**
 * @Route("/", name="app")
 */
public function indexAction()
{
    return $this->render('default/index.html.twig');
}
}
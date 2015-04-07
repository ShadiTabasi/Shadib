<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/homepage/{name}")
     * @Template()
     */
    public function homepageAction(Request $request, $name)
    {
        $min = $request->get('min', 0);
        $max = $request->get('max', 1000);

        $users= [
            'shadi',
            'anybody',
            'somebody'
        ];

        $randomGenerator= $this->get('app.random_generator');
        $number = $randomGenerator->generate($min, $max);

        return [
            'message' => 'hello '.$name,
            'number' => $number,
            'users' =>$users
        ];
    }
}

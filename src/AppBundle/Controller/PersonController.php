<?php


namespace AppBundle\Controller;

use AppBundle\Entity\Person;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class PersonController extends Controller
{
    /**
     * @Route("/persons/")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $personRepository = $em->getRepository('AppBundle:Person');
        $persons = $personRepository->findAll();

        return ['persons' => $persons];
    }
}

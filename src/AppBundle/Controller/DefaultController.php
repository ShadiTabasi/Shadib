<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Document;
use AppBundle\Entity\Person;
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

        $users = [
            'shadi',
            'anybody',
            'somebody'
        ];

        $person = new Person();

        $randomGenerator = $this->get('app.random_generator');
        $number = $randomGenerator->generate($min, $max);

        return [
            'message' => 'hello ' . $name,
            'number' => $number,
            'users' => $users
        ];
    }

    /**
     * @Route("/dashboard")
     * @Template()
     */
    public function dashboardAction()
    {

        $em = $this->getDoctrine()->getManager();
        $personRepository = $em->getRepository('AppBundle:Person');
        $documentRepository = $em->getRepository('AppBundle:Document');

        $persons = $personRepository->findAll();
        $documents = $documentRepository->findAll();

        return ['persons' => $persons, 'documents' => $documents];
    }

    /**
     * @Route("/dumb-dashboard")
     * @Template()
     */
    public function dumbDashboardAction(Request $request)
    {
        // The detailed way :
        // $entityManager = $this->get('doctrine.orm.default_entity_manager');

        // The symfony shortcut way:
        $entityManager = $this->getDoctrine()->getManager();

        $john = new Person();
        $john
            ->setFirstname('John')
            ->setLastname('Doe')
            ->setEmail('john@doe.com')
            ->setJob('Art critic');
        // $entityManager->persist($john);


        $jane = new Person();
        $jane
            ->setFirstname('Jane')
            ->setLastname('Doe')
            ->setJob('Data scientist')
            ->setEmail('jane@example.com');
        // $entityManager->persist($jane);

        $persons = [$john, $jane];

        $scienceArticle = new Document();
        $scienceArticle
            ->setAuthor($jane)
            ->setReference('data_1')
            ->setSummary('An article about data mining')
            ->setTitle('Data');
        //  $entityManager->persist($scienceArticle);

        $artReview = new Document();
        $artReview
            ->setAuthor($john)
            ->setReference('review_1')
            ->setTitle('Goya\'s dog')
            ->setSummary('An essay about a great painting');
        // $entityManager->persist($artReview);
        $documents = [$scienceArticle, $artReview];


        //  $entityManager->flush();
        return ['persons' => $persons, 'documents' => $documents];
    }
}

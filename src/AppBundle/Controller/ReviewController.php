<?php
/**
 * Created by PhpStorm.
 * User: shadi
 * Date: 09/04/15
 * Time: 09:41
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Document;
use AppBundle\Entity\Review;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReviewController extends Controller {
    /**
     * @Route("/documents/{id}/reviews/new")
     * @Template()
     */
    public function createAction(Request $request , Document $document)
    {
        $review = new Review();
        $form = $this->createForm('review',$review);
        $review->setDocument($document);

        if( $request->getMethod()== 'POST')
        {
            $form->handleRequest($request);
            $em = $this->getDoctrine()->getManager();
            $em->persist($review);
            $em->flush();
            return $this->redirectToRoute('app_document_show', ['id'=>$document->getId()]);
        }


        return['form' => $form->createView(),
        'document' => $document];



    }

}
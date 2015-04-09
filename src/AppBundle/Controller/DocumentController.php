<?php


namespace AppBundle\Controller;

use AppBundle\Entity\Document;
use AppBundle\Entity\Person;
use AppBundle\Repository\DocumentRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use \DateTime;


class DocumentController extends Controller
{

    /**
     * @Route("/documents/")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $personId = $request->get('person');
        $em = $this->getDoctrine()->getManager();
        if ($personId) {
            $person = $em->getRepository('AppBundle:Person')->find($personId);
            if (! $person) {
                throw new NotFoundHttpException();
            }
        } else {
            $person = null;
        }
        /** @var DocumentRepository $documentRepository */
        $documentRepository = $em->getRepository('AppBundle:Document');
        if (! $personId) {
            $documents = $documentRepository->findBy([], ['created' => 'DESC']);
        } else {
            $documents = $documentRepository->findBy(['author' => $person], ['created' => 'DESC']);
        }

        $topAuthors = $documentRepository->findTopAuthors(3);

        return ['documents' => $documents, 'person' => $person, 'topAuthors' => $topAuthors];
    }

    /**
     * @Route("/documents/new")
     * @Template()
     */
    public function newAction(Request $request)
    {
        $document = new Document();
        $form = $this->createForm('document', $document);
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($document);
                $em->flush();
            }

            return $this->redirectToRoute('app_document_index');
        }

        return ['form' => $form->createView()];
    }

    /**
     * Here we use the Symfony's ParameterConverter :
     *  - We indicate by typehinting we want a document parameter of the class Document
     *  - We named our route parameter {id}
     *  - It understands what to do because we have a  mapped Doctrine entity for Document
     *  - It calls "magically" the Doctrine->Manager->DocumentRepository->find($id) method
     *  - It gives the result of this call to our $document parameter.
     *
     *  - If there is no result, it throws a 404 error for us
     *
     * @Route("/documents/{id}/edit")
     * @Template()
     */
    public function editAction(Request $request, Document $document)
    {

        $form = $this->createForm('document', $document);
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $document->setUpdated(new DateTime());
                $em->flush();
            }

            return $this->redirectToRoute('app_document_index');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/documents/{id}")
     * @Template()
     */
    public function showAction(Document $document)
    {
        return['document' => $document];
    }
}

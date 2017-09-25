<?php
/**
 * Created by PhpStorm.
 * User: amor3
 * Date: 25/09/17
 * Time: 09:25
 */

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route(path="/", name="home")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        return $this->render('layout/index.html.twig');
    }

    /**
     * @Route(path="/contact", name="contact")
     * @param EntityManager $em
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function contact(EntityManager $em, Request $request)
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($contact);
            $em->flush();
            //$this->addFlash("notice","Formulaire enregistré .");

            return $this->redirectToRoute('home');
        }

        return $this->render('form/contact.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}
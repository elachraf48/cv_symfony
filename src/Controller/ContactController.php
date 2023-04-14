<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, \Swift_Mailer $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $message = (new \Swift_Message('New Contact Message'))
                ->setFrom($data['email'])
                ->setTo('YOUR_EMAIL_ADDRESS')
                ->setBody(
                    $this->renderView(
                        'emails/contact.html.twig',
                        [
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'message' => $data['message']
                        ]
                    ),
                    'text/html'
                );

            $mailer->send($message);

            $this->addFlash('success', 'Your message has been sent!');

            return $this->redirectToRoute('contact');
        }
    
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
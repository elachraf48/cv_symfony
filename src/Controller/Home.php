<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
$request = Request::createFromGlobals();

class Home extends AbstractController {
     /**
     * @Route("/")
     */
    public function index()
    {
        $posts=[
            [
                'id'=>1,
                'title'=>'achraf',
                'body'=>'im here'
            ],
            [
                'id'=>1,
                'title'=>'zaki',
                'body'=>'im poor'
            ],
            [
                'id'=>1,
                'title'=>'hcham',
                'body'=>'im not here'
            ]
        ]
        ;
        return $this->render('base.html.twig',[
            'posts' => $posts
        ]);
    }

    /**
     * @Route("/home",name="post_home")
     */
 
    public function home()
    {
        // return new Response(
        //     'add post'
        // );
        return $this->render('home.html.twig');
    }
    /**
     * @Route("/download", name="download_file")
    **/
    public function downloadFileAction(){
        $response = new BinaryFileResponse('../public/assets/cv-achraf.pdf');
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT,'cv-achraf.pdf');
        return $response;
    }
    /**
     * @Route("/about",name="post_about")
     */
    public function about()
    {
        
        // return new Response(
        //     'add post'
        // );
        return $this->render('about.html.twig');
    }
    /**
     * @Route("/resume",name="post_resume")
     */
    public function resume()
    {
        // return new Response(
        //     'add post'
        // );
        return $this->render('resume.html.twig');
    }
    /**
     * @Route("/services",name="post_services")
     */
    public function services()
    {
        // return new Response(
        //     'add post'
        // );
        return $this->render('services.html.twig');
    }
    /**
     * @Route("/skills",name="post_skills")
     */
    public function skills()
    {
        // return new Response(
        //     'add post'
        // );
        return $this->render('skills.html.twig');
    }
    /**
     * @Route("/projects",name="post_projects")
     */
    public function projects()
    {
        // return new Response(
        //     'add post'
        // );
        return $this->render('projects.html.twig');
    }
    /**
     * @Route("/blog",name="post_blog")
     */
    public function blog()
    {
        // return new Response(
        //     'add post'
        // );
        return $this->render('blog.html.twig');
    }
    /**
     * @Route("/contact1",name="post_contact1")
     */
    public function contact1(Request $request)
    {
        // $form=$this->createForm(contactType::class);
        // $form->handleRequest($request);
        // if($form->isSubmitted() && $form->isValid()){
            
        //     $data = $form->getData();
        //     $address - $data['email'];
        //     $content - $data['content'];
        //     $email - (new Email())
        //             ->from($address)
        //             ->to('admin@admin. com')
        //             ->subject( 'Demande de contact')
        //             ->text($content);
           

        // }
        // return new Response(
        //     'add post'
        // );
        return $this->render('contact.html.twig');
    }
}

// src/Controller/LuckyController.php
// namespace App\Controller;

// use Symfony\Component\HttpFoundation\Response;

// class Home
// {
//     // #[Route('/   /number/{max}', name: 'app_lucky_number')]
//     public function number(int $max): Response
//     {
//         $number = random_int(0, $max);

//         return new Response(
//             '<html><body>Lucky number: '.$number.'</body></html>'
//         );
//     }
// }


?>
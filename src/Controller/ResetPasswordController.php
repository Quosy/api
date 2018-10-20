<?php
namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ResetPasswordController extends Controller
{
    /**
     * @Route("/reset/{email}")
     * @param Request $request
     * @param $email
     * @return Response
     */
    public function number(Request $request, $email)
    {
      //   $email = $request->attributes->get('email');
        $exist = $this->getDoctrine()
            ->getRepository(User::class)->findByEmail($email);
        $token = $exist[0]->getToken();

        if($exist){
            try {
                $message = (new \Swift_Message('Test contact'))
                    ->setFrom('xxxx@gmail.com')
                    ->setTo($email)
                    ->setBody(
                        $this->renderView(
                            'emails/reset.html.twig',
                            ['email' => $email,
                            'token' => $token ]
                        ),
                        'text/html'
                    );

                $this->get('mailer')->send($message);

             return $this->redirect("http://localhost:4200/recover?token=$token");

            } catch (Swift_TransportException $err) {
                throw new Exception('Error' + $err);
            }
        }
        return new Response(
            'Email dont exist into database'
        );
    }

}

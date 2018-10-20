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
        $title = $request->attributes->get('email');
        $exist = $this->getDoctrine()
            ->getRepository(User::class)->findByEmail($email);
// check if email exist
        if($exist){
            try {
                $message = (new \Swift_Message('Test contact'))
                    ->setFrom('xxxx@gmail.com')
                    ->setTo($email)
                    ->setBody(
                        $this->renderView(
                            'emails/reset.html.twig',
                            array('email' => $email)
                        ),
                        'text/html'
                    );
                    $this->get('mailer')->send($message);

                return $this->redirect('http://localhost:4200/recover');

            } catch (Swift_TransportException $err) {
                throw new Exception('Error' + $err);
            }
        }
        return new Response(
            'Email dont exist into database'
        );
    }

}

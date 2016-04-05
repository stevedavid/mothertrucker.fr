<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjaxController extends Controller
{
    const CONTACT_MAIL_SUBJECT = 'Un nouveau message sur mothertrucker.fr';

    /**
     * @Route("/ajax/contact", name="ajax_contact")
     */
    public function contactAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $post = $request->request;

            $message = [
                'name' => $post->get('name'),
                'email' => $post->get('email'),
                'subject' => $post->get('subject'),
                'message' => $post->get('message'),
            ];

            $errors = [];

            foreach ($message as $key => $value) {
                if (empty($value)) {
                    $errors[$key] = 'empty';
                }
            }

            if (!empty($errors)) {
                return new JsonResponse($errors, 412);
            }

            $email = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('AppBundle:Meta')
                ->findOneByName('contact_email');

            $message = \Swift_Message::newInstance()
                ->setTo($email->getValue())
                ->setSubject(self::CONTACT_MAIL_SUBJECT)
                ->setFrom([$message['email'] => $message['name']])
                ->setBody($message['message'], 'text/plain')
            ;

//            $this->get('mailer')->send($message);

            return new JsonResponse(['sent' => true]);
        }

        return new Response(null, 405);
    }
}
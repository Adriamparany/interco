<?php
namespace App\Controller;

use Symfony\Component\Mime\Email;
use Symfony\Component\Form\Button;
use AsyncAws\Core\Exception\Exception;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Collections\Expr\Value;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class MailerController extends AbstractController
{
    /**
     * @Route("/email")
     */
    public function sendEmail(MailerInterface $mailer): Response
    {
        //dd();
        $email = (new Email())
            //->from('ddpwebetmultimedia@gmail.com')
            ->from('interco@paositramalagasy.mg')
            ->to('ddpwebetmultimedia@gmail.com')
            ->cc('rasolonjatovofetra@gmail.com')
            ->cc('masakymakaveli@gmail.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            ->priority(Email::PRIORITY_HIGH)
            ->subject('Interco!')
            ->text('Sending emails is fun again!')
            ->html('<p>Miarahaba tompoko; Sending emails is fun again</p>');

            $sender = '';
            $receiver = '';
            $copies = '';
            $userSentConfirmationMessage = [];
        try {
            $mailer->send($email);
            //dd($email->getHeaders()->get('to')->getBodyAsString());
            //dd($email->getHeaders()->get('to'));
            //$sender = $email->text;
            $userSentConfirmationMessage = ['notif'];
            $sender = $email->getHeaders()->get('from')->getBodyAsString();
            $receiver = $email->getHeaders()->get('to')->getBodyAsString();
        } catch (TransportExceptionInterface $e) {
            // some error prevented the email sending; display an
            // error message or try to resend the message
        }

        // the template path is the relative file path from `templates/`
        return $this->render('email/notifications.html.twig', [
            // this array defines the variables passed to the template,
            // where the key is the variable name and the value is the variable value
            // (Twig recommends using snake_case variable names: 'foo_bar' instead of 'fooBar')
            'sender' => $sender,
            'userSentConfirmationMessage' => $userSentConfirmationMessage,
            'receiver'=> $receiver,
            'copy'=> $copies,
        ]);
    }
    /**
     * @Route("/emailform",name="emailform")
     */
    public function showEmailForm(Request $request, EntityManagerInterface $em, MailerInterface $mailer)
    {
        $form = $this->createFormBuilder()
            ->add('from',EmailType::class,['label'=>'De'])
            ->add('to',TextType::class,['label'=>'à'])
            ->add('cc',TextType::class,['label'=>'cc','required'=>false])
            ->add('subject',null,[
                'label'=>'Objet',
                ])
            ->add('content',TextareaType::class,[
                'label'=>'Contenu',
                ])
            ->add('send',SubmitType::class ,['label'=>'Envoyer'])
            ->getForm();
        //dd($form->createView());

        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()) {

            $contactFormData = $form->getData();
            //dd($contactFormData);
            //$to_array = explode(",",$contactFormData['to']);
            //$cc_array = explode(",",$contactFormData['cc']);
            //dd($cc_array);
            $sender = '';
            $receiver = '';
            $copies = '';
            $userSentConfirmationMessage = [];

            //dd($contactFormData);
            $email = (new Email())
                ->from($contactFormData['from'])
                ->subject($contactFormData['subject'])
                ->text($contactFormData['content']);

            if (str_contains($contactFormData['to'], ',')) {
                $to_array = explode(",",$contactFormData['to']);
                foreach($to_array as $value){
                    $email->addTo($value);
                }
            }else{
                $email->to($contactFormData['to']);
            }

            if ($contactFormData['cc'] != null) {
                if (str_contains($contactFormData['cc'], ',')) {
                    $cc_array = explode(",",$contactFormData['cc']);
                    foreach($cc_array as $value){
                        $email->addCc($value);
                    }
                }else{
                    $email->cc($contactFormData['cc']);
                }
            }
            //dd($email);
            try {
                //dd($email->getHeaders()->get('cc'));
                $mailer->send($email);
                //dd($email->getHeaders()->get('to')->getBodyAsString());
                //dd($email->getHeaders()->get('to'));
                //$sender = $email->text;
                $userSentConfirmationMessage = ['notif'];
                $sender = $email->getHeaders()->get('from')->getBodyAsString();
                $receiver = $email->getHeaders()->get('to')->getBodyAsString();
                if ($email->getHeaders()->get('cc') != null) {
                    $copies = $email->getHeaders()->get('cc')->getBodyAsString();
                }

                $this->addFlash('success', 'Your message has been sent');
            } catch (TransportExceptionInterface $e) {
                // some error prevented the email sending; display an
                // error message or try to resend the message
                //dd('Une erreur est survenue');
                print($e);
            }

            //return $this->redirectToRoute('emailform');
            // the template path is the relative file path from `templates/`
            return $this->render('email/notifications.html.twig', [
                // this array defines the variables passed to the template,
                // where the key is the variable name and the value is the variable value
                // (Twig recommends using snake_case variable names: 'foo_bar' instead of 'fooBar')
                'sender' => $sender,
                'userSentConfirmationMessage' => $userSentConfirmationMessage,
                'receiver'=> $receiver,
                'copy'=> $copies,
            ]);
        }

        return $this->render('email/contact.html.twig', [
            'our_form' => $form->createView()
        ]);
    }

    /**
     * @Route("/emailme", name="emailme")
     * 
     * @param Request $request
     * @return array|JsonResponse|null|object
     */
    public function sendEmailMe(MailerInterface $mailer, Request $request)
    {
        //dump(array(1=>'fetra')) ;
        $content = $request->getContent(false);
       //dump($content);
        $content_arr = explode('&',$content);
        $data_array=array();
        foreach ($content_arr as $key => $value) {
            $x = explode('=',urldecode($value));
            $a=$x[0]; 
            $b=$x[1];
            $data_array += [$a=>$b];
            //dump($data_array);
        }
        //$pattern = "/\s/";//Match any whitespace characteres
        //$pattern = "/[^\S ]+/"; //Regex that Matches all whitespace characteres except spaces
        $pattern = "/\n/";
        $replacement = "<br>";
        //$text = "Earth revolves around\nthe\tSun";
        // Replace spaces, newlines and tabs
        $text = $data_array['message'];
        //dump(preg_replace($pattern, $replacement, $text));

        $email = (new Email())
            //->from('interco@paositramalagasy.mg')
            ->from($data_array['sender'])
            //->to('rasolonjatovofetra@gmail.com')
            //->to($data_array['recipient'])
            //->cc('masaky@gmail.com')
            //->cc($data_array['cc'])
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            ->priority(Email::PRIORITY_HIGH)
            //->subject('Interco!')
            ->subject($data_array['subject'])
            //->text('it works!')
            ->text($data_array['message'])
            //->html("<p>Miarahaba tompoko mandeha tsara</p>");
           ->html(preg_replace($pattern, $replacement, $text));

        if (str_contains($data_array['recipient'], ',')) {
            $to_array = explode(",",$data_array['recipient']);
            foreach($to_array as $value){
                $email->addTo($value);
            }
        }else{
            $email->to($data_array['recipient']);
            //$email->to('rasolonjatovofetra@gmail.com');
        }

        if ($data_array['cc'] != null && $data_array['cc'] != "") {
            if (str_contains($data_array['cc'], ',')) {
                $cc_array = explode(",",$data_array['cc']);
                foreach($cc_array as $value){
                    $email->addCc($value);
                }
            }else{
                $email->cc($data_array['cc']);
            }
        }

        //dump($data_array);
        
        $sender = '';
        $receiver = '';
        $copies = '';
        $userSentConfirmationMessage = [];
        try {
            $mailer->send($email);
            //dd($email->getHeaders()->get('to')->getBodyAsString());
            //dd($email->getHeaders()->get('to'));
            //$sender = $email->text;
            $userSentConfirmationMessage = ['notif'];
            $sender = $email->getHeaders()->get('from')->getBodyAsString();
            $receiver = $email->getHeaders()->get('to')->getBodyAsString();
            if ($email->getHeaders()->get('cc') != null) {
                $copies = $email->getHeaders()->get('cc')->getBodyAsString();
            }

            $this->addFlash('success', 'Your message has been sent');
        } catch (TransportExceptionInterface $e) {
            // some error prevented the email sending; display an
            // error message or try to resend the message
            print($e);
        }

        // the template path is the relative file path from `templates/`
        return $this->json(['sender' => $sender,
            'userSentConfirmationMessage' => $userSentConfirmationMessage,
            'receiver'=> $receiver,
            'copy'=> $copies,
        ]);
    }

}

<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * AsinDown controller.
 *
 * @Route("admin")
 */
class AdminController extends Controller
{

    /**
    * @Route("/registerUsuario", name="registerUsuario")
    */
    public function registerUsuarioAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
        {
        // 1) build the form
        $user = new Usuario();
        $form = $this->createForm(UsuarioType::class, $user);
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            return $this->redirectToRoute('calendario');
            }
            return $this->render(
                'seguridad/register_alumnos.html.twig',
                array('form' => $form->createView())
            );
        }


}


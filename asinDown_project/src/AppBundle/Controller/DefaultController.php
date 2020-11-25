<?php
namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Usuario;
use AppBundle\Form\UsuarioType;

use AppBundle\Entity\Profesor;
use AppBundle\Form\ProfesorType;

use AppBundle\Entity\Voluntario;
use AppBundle\Form\VoluntarioType;

use AppBundle\Entity\Aula;
use AppBundle\Form\AulaType;

use AppBundle\Entity\Asignatura;
use AppBundle\Form\AsignaturaType;

use AppBundle\Entity\Programa;
use AppBundle\Form\ProgramaType;


use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="calendario")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('frontal/calendario.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/programas", name="programas")
     */
    public function programasAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('frontal/programas.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/personal", name="personal")
     */
    public function personalAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('frontal/personal.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/evento", name="evento")
     */
    public function eventoAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('frontal/evento.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
    * @Route("/login", name="login")
    */
    public function loginAction(AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('frontal/login.html.twig', array(
            'last_username' => $lastUsername,
                'error'         => $error,
            ));
    }


    /**
     * @Route("/restaurarContraseña", name="restaurarContraseña")
     */
    public function restaurarContraseñaAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('frontal/restaurarContraseña.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

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
                'seguridad/register_usuario.html.twig',
                array('form' => $form->createView())
            );
        }

    /**
     * @Route("/registerAulas", name="registerAulas")
     */
    public function registerAulasAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('seguridad/register_aulas.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/registerAsignaturas", name="registerAsignaturas")
     */
    public function registerAsignaturasAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('seguridad/register_asignaturas.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/registerProgramas", name="registerProgramas")
     */
    public function registerProgramasAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('seguridad/register_programas.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
    * @Route("/perfil", name="perfil")
    */
    public function perfilAction(Request $request)
        {
        // replace this example code with whatever you need

                  $id = $this->get('security.token_storage')->getToken()->getUser()->getUsername();


                  $repository = $this->getDoctrine()->getRepository('AppBundle:Usuario');
                  $usuario = $repository->find($id);

                    $form = $this-> createForm(UsuarioType::class, $usuario);
                           $form->handleRequest($request);


                   return $this->render('Frontal/perfil.html.twig', array(
                'form' => $form->createView(),));
                }


}

<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Usuario;
use AppBundle\Form\UsuarioType;
use AppBundle\Form\UpdateType;
use AppBundle\Entity\Asignatura;
use AppBundle\Form\AsignaturaType;
use AppBundle\Entity\Aula;
use AppBundle\Form\AulaType;
use AppBundle\Entity\Programa;
use AppBundle\Form\ProgramaType;

class TodoController extends Controller
{
  /**
 * @Route("/listado/", name="listado")
 */
public function listodo(Request $request)
{
    // replace this example code with whatever you need
    return $this->render('todo/listaTodo.html.twig');
}
    /**
    *@Route("/listodo/", name="listodo")
    */
    public function listaTodoAction(Request $request){
      $repository = $this->getDoctrine()->getRepository(Asignatura::class);
      $asignatura_todo = $repository->findAll();

      $repository = $this->getDoctrine()->getRepository(Aula::class);
      $aula_todo = $repository->findAll();

      $repository = $this->getDoctrine()->getRepository(Programa::class);
      $programa_todo = $repository->findAll();

      $repository = $this->getDoctrine()->getRepository(Usuario::class);
      $Usuario_todo = $repository->findAll();

      return $this->render('listas/listaTodo.html.twig',array('profesor_todo' => $Usuario_todo, 'asignatura_todo' => $asignatura_todo, 'programa_todo' => $programa_todo, 'aula_todo' => $aula_todo));
    }


  /**
   * @Route("/lincado/", name="lincado")
   */
  public function lincado(Request $request)
  {
      // replace this example code with whatever you need
      return $this->render('listas/links.html.twig');
  }

    /**
    *@Route("/listadoPrograma/", name="listadoPrograma")
    */
    public function listadoProgramaAction(Request $request){
      $repository = $this->getDoctrine()->getRepository(Asignatura::class);
      $asignatura_todo = $repository->findAll();
      dump($asignatura_todo);

      $repository = $this->getDoctrine()->getRepository(Aula::class);
      $aula_todo = $repository->findAll();

      $repository = $this->getDoctrine()->getRepository(Programa::class);
      $programa_todo = $repository->findAll();

      return $this->render('listas/listaPrograma.html.twig',array('asignatura_todo' => $asignatura_todo, 'programa_todo' => $programa_todo, 'aula_todo' => $aula_todo));
    }
//ESTA DE AQUI
      /**
      *@Route("/listadoProfesor/", name="listadoProfesor")
      */
      public function listadoProfAction(Request $request){


        $repository = $this->getDoctrine()->getRepository(Usuario::class);
        $usuario = $repository->findByTipoUsuario("1");

        return $this->render('listas/listaProfesor.html.twig',array( 'usuario' => $usuario));
      }



      /**
       * @Route("/listadoVoluntario/", name="listadoVoluntario")
       */
       public function listadoVolAction(Request $request){


         $repository = $this->getDoctrine()->getRepository(Usuario::class);
         $usuario = $repository->findByTipoUsuario("2");

         return $this->render('listas/listaProfesor.html.twig',array( 'usuario' => $usuario));
        }

        /**
         * @Route("/listadoAlumno/", name="listadoAlumno")
         */
         public function listadoAlumnoAction(Request $request){


           $repository = $this->getDoctrine()->getRepository(Usuario::class);
           $usuario = $repository->findByTipoUsuario("3");

           return $this->render('listas/listaProfesor.html.twig',array( 'usuario' => $usuario));
          }
        //UPDATES
        /**
        *@Route("/updatePrograma/{id}", name="updatePrograma")
        */

        public function ActuaProgramaAction(Request $request,$id)
            {
              if ($id) {
                $repository = $this->getDoctrine()->getRepository(Programa::class);
                  $Programa = $repository->find($id);
                }else {
                  $Programa = new Programa();
                }
                // creates a task and gives it some dummy data for this example

                $form = $this->createForm(ProgramaType::class, $Programa);
                $form->handleRequest($request);

                        if ($form->isSubmitted() && $form->isValid()) {
                            $Programa = $form->getData();

                            $entityManager = $this->getDoctrine()->getManager();
                            $entityManager->persist($Programa);
                            $entityManager->flush();
                            return $this->redirectToRoute('listadoPrograma');
                          }

                  return $this->render('listas/updatePrograma.html.twig', array(
                      'form' => $form->createView(),
                  ));
              }
              /**
              *@Route("/updateAsign/{id}", name="updateAsign")
              */

              public function ActuaAsignAction(Request $request,$id)
                  {
                    if ($id) {
                      $repository = $this->getDoctrine()->getRepository(Asignatura::class);
                        $Asignatura = $repository->find($id);
                      }else {
                        $Asignatura = new Asignatura();
                      }
                      // creates a task and gives it some dummy data for this example

                      $form = $this->createForm(AsignaturaType::class, $Asignatura);
                      $form->handleRequest($request);

                              if ($form->isSubmitted() && $form->isValid()) {
                                  $Asignatura = $form->getData();

                                  $entityManager = $this->getDoctrine()->getManager();
                                  $entityManager->persist($Asignatura);
                                  $entityManager->flush();
                                  return $this->redirectToRoute('listadoPrograma');
                                }

                        return $this->render('listas/updateAsignatura.html.twig', array(
                            'form' => $form->createView(),
                        ));
                    }
                    /**
                    *@Route("/updateAula/{id}", name="updateAula")
                    */

                    public function ActuaAulaAction(Request $request,$id)
                        {
                          if ($id) {
                            $repository = $this->getDoctrine()->getRepository(Aula::class);
                              $Aula = $repository->find($id);
                            }else {
                              $Aula = new Aula();
                            }
                            // creates a task and gives it some dummy data for this example

                            $form = $this->createForm(AulaType::class, $Aula);
                            $form->handleRequest($request);

                                    if ($form->isSubmitted() && $form->isValid()) {
                                        $Aula = $form->getData();

                                        $entityManager = $this->getDoctrine()->getManager();
                                        $entityManager->persist($Aula);
                                        $entityManager->flush();
                                        return $this->redirectToRoute('listadoPrograma');
                                      }

                              return $this->render('listas/updateAula.html.twig', array(
                                  'form' => $form->createView(),
                              ));
                          }
        /**
        *@Route("/updateUsuario/{username}", name="updateUsuario")
        */

        public function ActuaProfAction(Request $request,$username)
            {
              if ($username) {
                $repository = $this->getDoctrine()->getRepository(Usuario::class);
                  $Usuario = $repository->find($username);
                }else {
                  $Usuario = new Usuario();
                }
                // creates a task and gives it some dummy data for this example

                $form = $this->createForm(UpdateType::class, $Usuario);
                $form->handleRequest($request);

                        if ($form->isSubmitted() && $form->isValid()) {
                            $Usuario = $form->getData();

                            $entityManager = $this->getDoctrine()->getManager();
                            $entityManager->persist($Usuario);
                            $entityManager->flush();
                            return $this->redirectToRoute('listadoProfesor');
                          }

                  return $this->render('listas/updateProfe.html.twig', array(
                      'form' => $form->createView(),
                  ));
              }

                    //DELETES
                /**
                * @Route("/deletePrograma/{id}", name="deletePrograma")
                */
                public function deleteProgramaAction($id)
                {
                  $form = $this->getDoctrine()->getManager();

                  $Programa = $form->getRepository('AppBundle:Programa')->find($id);

                  if (!$Programa) {
              return $this->redirectToRoute('listadoPrograma');
            }

            $form->remove($Programa);
            $form->flush();

            return $this->redirectToRoute('listadoPrograma');
          }
          /**
          * @Route("/deleteAsign/{id}", name="deleteAsign")
          */
          public function deleteAsignAction($id)
          {
            $form = $this->getDoctrine()->getManager();

            $Asignatura = $form->getRepository('AppBundle:Asignatura')->find($id);

            if (!$Asignatura) {
        return $this->redirectToRoute('listadoPrograma');
      }

      $form->remove($Asignatura);
      $form->flush();

      return $this->redirectToRoute('listadoPrograma');
    }
    /**
    * @Route("/deleteAula/{id}", name="deleteAula")
    */
    public function deleteAulaAction($id)
    {
      $form = $this->getDoctrine()->getManager();

      $Aula = $form->getRepository('AppBundle:Aula')->find($id);

      if (!$Aula) {
  return $this->redirectToRoute('listadoPrograma');
}

$form->remove($Aula);
$form->flush();

return $this->redirectToRoute('listadoPrograma');
}
              /**
              * @Route("/deleteUsuario/{username}", name="deleteUsuario")
              */
              public function deleteProfAction($username)
              {
              $form = $this->getDoctrine()->getManager();


                $Usuario = $form->getRepository('AppBundle:Usuario')->find($username);

                if (!$Usuario) {
            return $this->redirectToRoute('login');
          }

          $form->remove($Usuario);
          $form->flush();

          return $this->redirectToRoute('login');
        }

        /**
       * @Route("/nuevaAsignatura/", name="nuevaAsignatura")
       */
      public function nuevaAsignatura(Request $request)
      {
          // replace this example code with whatever you need
          return $this->render('listas/nuevaAsignatura.html.twig');
      }

      /**
      *@Route("/nuevaAsignatura/", name="nuevaAsignatura")
      */

      public function newAsignatura(Request $request)
      {
          // creates a task and gives it some dummy data for this example
          $nuevo = new Asignatura();
          $form = $this->createForm(AsignaturaType::class, $nuevo);
          $form->handleRequest($request);

                  if ($form->isSubmitted() && $form->isValid()) {
                      $nuevo = $form->getData();

                      $entityManager = $this->getDoctrine()->getManager();
                      $entityManager->persist($nuevo);
                      $entityManager->flush();
                      return $this->redirectToRoute('listadoPrograma');
                    }

                    return $this->render('listas/nuevaAsignatura.html.twig', array(
                      'form' => $form->createView(),
                    ));
                  }
                  /**
                 * @Route("/nuevoPrograma/", name="nuevoPrograma")
                 */
                public function nuevoPrograma(Request $request)
                {
                    // replace this example code with whatever you need
                    return $this->render('listas/nuevoPrograma.html.twig');
                }
                  /**
                  *@Route("/nuevoPrograma/", name="nuevoPrograma")
                  */

                  public function newPrograma(Request $request)
                  {
                    // creates a task and gives it some dummy data for this example
                    $nuevo = new Programa();
                    $form = $this->createForm(ProgramaType::class, $nuevo);
                    $form->handleRequest($request);

                    if ($form->isSubmitted() && $form->isValid()) {
                        $nuevo = $form->getData();

                        $entityManager = $this->getDoctrine()->getManager();
                        $entityManager->persist($nuevo);
                        $entityManager->flush();

                      }

                      return $this->render('listas/nuevoPrograma.html.twig', array(
                        'form' => $form->createView(),
                      ));
                    }
                    /**
                   * @Route("/nuevaAula/", name="nuevaAula")
                   */
                  public function nuevaAula(Request $request)
                  {
                      // replace this example code with whatever you need
                      return $this->render('listas/nuevaAula.html.twig');
                  }
                    /**
                    *@Route("/nuevaAula/", name="nuevaAula")
                    */

                    public function newAula(Request $request)
                    {
                      // creates a task and gives it some dummy data for this example
                      $nuevo = new Aula();
                      $form = $this->createForm(AulaType::class, $nuevo);
                      $form->handleRequest($request);

                      if ($form->isSubmitted() && $form->isValid()) {
                          $nuevo = $form->getData();

                          $entityManager = $this->getDoctrine()->getManager();
                          $entityManager->persist($nuevo);
                          $entityManager->flush();

                        }

                        return $this->render('listas/nuevaAula.html.twig', array(
                          'form' => $form->createView(),
                        ));
                      }
}

<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsuarioRepository")
 */
class Usuario implements UserInterface
{
  /**
   * @var int
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

        /**
         * Many Usuario have Many Asignaturas.
         * @ORM\ManyToMany(targetEntity="Asignatura", inversedBy="usuario")
         * @ORM\JoinTable(name="usuario_asignaturas")
         */
        private $asignaturas;

        /**
         * Many Usuario have Many Programas.
         * @ORM\ManyToMany(targetEntity="Programa", inversedBy="usuario")
         * @ORM\JoinTable(name="programas_usuario")
         */
        private $programas;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Apellidos", type="string", length=255)
     */
    private $apellidos;

    /**
     * @var int
     *
     * @ORM\Column(name="Telefono", type="integer")
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="Direccion", type="string", length=255)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="Programa", type="string", length=255)
     */
    private $programa;

    /**
     * @var string
     *
     * @ORM\Column(name="Correo", type="string", length=255)
     */
    private $correo;

    /**
     * @var string
     *
     * @ORM\Column(name="Disponibilidad", type="string", length=255)
     */
    private $disponibilidad;

    /**
     * @var string
     *
     * @ORM\Column(name="Diversidad", type="string", length=255)
     */
    private $diversidad;

    /**
     * @var int
     *
     * @ORM\Column(name="Tipo_usuario", type="integer")
     */
    private $tipoUsuario;

    /**
       * @var array
       *
       * @ORM\Column(name="roles", type="json_array")
       */
      private $roles;

      private $plainPassword;

      public function __construct()
     {
         $this->roles = array('ROLE_USER');
         $this->asignaturas = new \Doctrine\Common\Collections\ArrayCollection();
    $this->programas = new \Doctrine\Common\Collections\ArrayCollection();
     }

    /**
     * Set username.
     *
     * @param string $username
     *
     * @return Usuario
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set nombre.
     *
     * @param string $nombre
     *
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre.
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidos.
     *
     * @param string $apellidos
     *
     * @return Usuario
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos.
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set telefono.
     *
     * @param int $telefono
     *
     * @return Usuario
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono.
     *
     * @return int
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set direccion.
     *
     * @param string $direccion
     *
     * @return Usuario
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion.
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set programa.
     *
     * @param string $programa
     *
     * @return Usuario
     */
    public function setPrograma($programa)
    {
        $this->programa = $programa;

        return $this;
    }

    /**
     * Get programa.
     *
     * @return string
     */
    public function getPrograma()
    {
        return $this->programa;
    }

    /**
     * Set correo.
     *
     * @param string $correo
     *
     * @return Usuario
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo.
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set disponibilidad.
     *
     * @param string $disponibilidad
     *
     * @return Usuario
     */
    public function setDisponibilidad($disponibilidad)
    {
        $this->disponibilidad = $disponibilidad;

        return $this;
    }

    /**
     * Get disponibilidad.
     *
     * @return string
     */
    public function getDisponibilidad()
    {
        return $this->disponibilidad;
    }

    /**
     * Set diversidad.
     *
     * @param string $diversidad
     *
     * @return Usuario
     */
    public function setDiversidad($diversidad)
    {
        $this->diversidad = $diversidad;

        return $this;
    }

    /**
     * Get diversidad.
     *
     * @return string
     */
    public function getDiversidad()
    {
        return $this->diversidad;
    }

    /**
     * Set tipoUsuario.
     *
     * @param int $tipoUsuario
     *
     * @return Usuario
     */
    public function setTipoUsuario($tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;

        return $this;
    }

    /**
     * Get tipoUsuario.
     *
     * @return int
     */
    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }

    /**
   * Set roles
   *
   * @param array $roles
   *
   * @return Usuario
   */
  public function setRoles($roles)
  {
      $this->roles = $roles;

      return $this;
  }

  /**
   * Get roles
   *
   * @return array
   */
  public function getRoles()
  {
      return $this->roles;
  }

    public function getPlainPassword()
 {
     return $this->plainPassword;
 }

 public function setPlainPassword($password)
 {
     $this->plainPassword = $password;
 }



  public function getSalt()
{
  // The bcrypt and argon2i algorithms don't require a separate salt.
  // You may need a real salt if you choose a different encoder.
  return null;
}

    public function eraseCredentials()
    {
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add asignatura
     *
     * @param \AppBundle\Entity\Asignatura $asignatura
     *
     * @return Usuario
     */
    public function addAsignatura(\AppBundle\Entity\Asignatura $asignatura)
    {
        $this->asignaturas[] = $asignatura;

        return $this;
    }

    /**
     * Remove asignatura
     *
     * @param \AppBundle\Entity\Asignatura $asignatura
     */
    public function removeAsignatura(\AppBundle\Entity\Asignatura $asignatura)
    {
        $this->asignaturas->removeElement($asignatura);
    }

    /**
     * Get asignaturas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAsignaturas()
    {
        return $this->asignaturas;
    }

    /**
     * Add programa
     *
     * @param \AppBundle\Entity\Programa $programa
     *
     * @return Usuario
     */
    public function addPrograma(\AppBundle\Entity\Programa $programa)
    {
        $this->programas[] = $programa;

        return $this;
    }

    /**
     * Remove programa
     *
     * @param \AppBundle\Entity\Programa $programa
     */
    public function removePrograma(\AppBundle\Entity\Programa $programa)
    {
        $this->programas->removeElement($programa);
    }

    /**
     * Get programas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProgramas()
    {
        return $this->programas;
    }
    public function __toString() {
return $this->nombre;
return $this->tipoUsuario;
}
}

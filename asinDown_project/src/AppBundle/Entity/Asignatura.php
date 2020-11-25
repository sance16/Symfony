<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * Asignatura
 *
 * @ORM\Table(name="asignatura")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AsignaturaRepository")
 */
class Asignatura
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(name="aulas", type="string")
     * @ORM\ManyToMany(targetEntity="Aula", mappedBy="asignaturas")

     */
    private $aulas;


    /**
     * Many Asignaturas have Many Usuario.
     * @ORM\ManyToMany(targetEntity="Usuario", mappedBy="asignaturas")
     */
    private $usuario;

    /**
     * Many Asignaturas have Many Usuario.
     * @ORM\ManyToMany(targetEntity="Programa", mappedBy="asignaturas")
     */
    private $programas;

    /**
     * @ORM\Column(name="duracion", type="string")
     */
    private $duracion;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre.
     *
     * @param string $nombre
     *
     * @return Asignatura
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
     * Set aulas.
     *
     * @param string $aulas
     *
     * @return Asignatura
     */
    public function setaulas($aulas)
    {
        $this->aulas = $aulas;

        return $this;
    }

    /**
     * Get aulas.
     *
     * @return string
     */
    public function getaulas()
    {
        return $this->aulas;
    }


    /**
     * Set NombrePrograma.
     *
     * @param string $NombrePrograma
     *
     * @return Asignatura
     */
    public function setNombrePrograma($NombrePrograma)
    {
        $this->NombrePrograma = $NombrePrograma;

        return $this;
    }

    /**
     * Get NombrePrograma.
     *
     * @return string
     */
    public function getNombrePrograma()
    {
        return $this->NombrePrograma;
    }

    /**
     * Set duracion.
     *
     * @param string $duracion
     *
     * @return Asignatura
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;

        return $this;
    }
     /**
     * Get duracion.
     *
     * @return string
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Add usuario.
     *
     * @param \AppBundle\Entity\Usuario $usuario
     *
     * @return Asignatura
     */
    public function addUsuario(\AppBundle\Entity\Usuario $usuario)
    {
        $this->usuario[] = $usuario;

        return $this;
    }

    /**
     * Remove usuario.
     *
     * @param \AppBundle\Entity\Usuario $usuario
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeUsuario(\AppBundle\Entity\Usuario $usuario)
    {
        return $this->usuario->removeElement($usuario);
    }

    /**
     * Get usuario.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->usuario = new \Doctrine\Common\Collections\ArrayCollection();
    }
    public function __toString() {
    return $this->nombre;
    }

    /**
     * Add programa
     *
     * @param \AppBundle\Entity\Programa $programa
     *
     * @return Asignatura
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
}

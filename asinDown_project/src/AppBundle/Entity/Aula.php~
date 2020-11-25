<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\ManytoOne;
/**
 * Aula
 *
 * @ORM\Table(name="aula")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AulaRepository")
 */
class Aula
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
     * @ORM\Column(name="numAula", type="string")
     */
    private $numAula;

    /**
    * Many Asignaturas have Many aulas.
    * @ORM\Column(name="asignaturas", type="string")
    * @ORM\ManyToMany(targetEntity="Asignatura", inversedBy="aulas")
    * @ORM\JoinTable(name="aulas_asignaturas")
     */
    private $asignaturas;

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
     * Set numAula
     *
     * @param string $numAula
     *
     * @return Aula
     */
    public function setNumAula($numAula)
    {
        $this->numAula = $numAula;

        return $this;
    }

    /**
     * Get numAula
     *
     * @return string
     */
    public function getNumAula()
    {
        return $this->numAula;
    }

    /**
     * Set asignaturas
     *
     * @param string $asignaturas
     *
     * @return Aula
     */
    public function setAsignaturas($asignaturas)
    {
        $this->asignaturas = $asignaturas;

        return $this;
    }

    /**
     * Get asignaturas
     *
     * @return string
     */
    public function getAsignaturas()
    {
        return $this->asignaturas;
    }
    public function __toString() {
    return $this->numAula;
    }
}

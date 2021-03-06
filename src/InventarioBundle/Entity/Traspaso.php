<?php

namespace InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * traspaso
 *
 * @ORM\Table(name="traspaso")
 * @ORM\Entity(repositoryClass="InventarioBundle\Repository\traspasoRepository")
 */
class Traspaso
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
     * @var \DateTime
     *
     * @ORM\Column(name="horaentrada", type="datetime")
     */
    private $horaentrada;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horaSalida", type="datetime")
     */
    private $horaSalida;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable", type="string", length=255)
     */
    private $responsable;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text")
     */
    private $observaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="caracteristicas", type="string", length=255)
     */
    private $caracteristicas;

    /**
     * @ORM\OneToMany(targetEntity="DetalleTraspaso", mappedBy="traspaso", cascade={"persist", "merge"})
     */
    private $detalles;
    
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set horaentrada
     *
     * @param \DateTime $horaentrada
     *
     * @return traspaso
     */
    public function setHoraentrada($horaentrada)
    {
        $this->horaentrada = $horaentrada;

        return $this;
    }

    /**
     * Get horaentrada
     *
     * @return \DateTime
     */
    public function getHoraentrada()
    {
        return $this->horaentrada;
    }

    /**
     * Set horaSalida
     *
     * @param \DateTime $horaSalida
     *
     * @return traspaso
     */
    public function setHoraSalida($horaSalida)
    {
        $this->horaSalida = $horaSalida;

        return $this;
    }

    /**
     * Get horaSalida
     *
     * @return \DateTime
     */
    public function getHoraSalida()
    {
        return $this->horaSalida;
    }

    /**
     * Set responsable
     *
     * @param string $responsable
     *
     * @return traspaso
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get responsable
     *
     * @return string
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return traspaso
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set caracteristicas
     *
     * @param string $caracteristicas
     *
     * @return traspaso
     */
    public function setCaracteristicas($caracteristicas)
    {
        $this->caracteristicas = $caracteristicas;

        return $this;
    }

    /**
     * Get caracteristicas
     *
     * @return string
     */
    public function getCaracteristicas()
    {
        return $this->caracteristicas;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->detalles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add detalle
     *
     * @param \InventarioBundle\Entity\DetalleTraspaso $detalle
     *
     * @return Traspaso
     */
    public function addDetalle(\InventarioBundle\Entity\DetalleTraspaso $detalle)
    {
        $this->detalles[] = $detalle;

        return $this;
    }

    /**
     * Remove detalle
     *
     * @param \InventarioBundle\Entity\DetalleTraspaso $detalle
     */
    public function removeDetalle(\InventarioBundle\Entity\DetalleTraspaso $detalle)
    {
        $this->detalles->removeElement($detalle);
    }

    /**
     * Get detalles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDetalles()
    {
        return $this->detalles;
    }
}

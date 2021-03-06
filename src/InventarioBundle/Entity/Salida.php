<?php

namespace InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salida
 *
 * @ORM\Table(name="salida")
 * @ORM\Entity(repositoryClass="InventarioBundle\Repository\SalidaRepository")
 */
class Salida
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
     * @ORM\Column(name="tipoSalida", type="string", length=50)
     */
    private $tipoSalida;

    /**
     * @var string
     *
     * @ORM\Column(name="referencia", type="string", length=255)
     */
    private $referencia;

    /**
     * @var string
     *
     * @ORM\Column(name="autorizacion", type="string", length=255)
     */
    private $autorizacion;

    /**
     * @var string
     *
     * @ORM\Column(name="encargado", type="string", length=255)
     */
    private $encargado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @ORM\OneToMany(targetEntity="DetalleSalida", mappedBy="salida", cascade={"persist", "merge"})
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
     * Set tipoSalida
     *
     * @param string $tipoSalida
     *
     * @return Salida
     */
    public function setTipoSalida($tipoSalida)
    {
        $this->tipoSalida = $tipoSalida;

        return $this;
    }

    /**
     * Get tipoSalida
     *
     * @return string
     */
    public function getTipoSalida()
    {
        return $this->tipoSalida;
    }

    /**
     * Set referencia
     *
     * @param string $referencia
     *
     * @return Salida
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;

        return $this;
    }

    /**
     * Get referencia
     *
     * @return string
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * Set autorizacion
     *
     * @param string $autorizacion
     *
     * @return Salida
     */
    public function setAutorizacion($autorizacion)
    {
        $this->autorizacion = $autorizacion;

        return $this;
    }

    /**
     * Get autorizacion
     *
     * @return string
     */
    public function getAutorizacion()
    {
        return $this->autorizacion;
    }

    /**
     * Set encargado
     *
     * @param string $encargado
     *
     * @return Salida
     */
    public function setEncargado($encargado)
    {
        $this->encargado = $encargado;

        return $this;
    }

    /**
     * Get encargado
     *
     * @return string
     */
    public function getEncargado()
    {
        return $this->encargado;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Salida
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
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
     * @param \InventarioBundle\Entity\DetalleSalida $detalle
     *
     * @return Salida
     */
    public function addDetalle(\InventarioBundle\Entity\DetalleSalida $detalle)
    {
        $this->detalles[] = $detalle;

        return $this;
    }

    /**
     * Remove detalle
     *
     * @param \InventarioBundle\Entity\DetalleSalida $detalle
     */
    public function removeDetalle(\InventarioBundle\Entity\DetalleSalida $detalle)
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

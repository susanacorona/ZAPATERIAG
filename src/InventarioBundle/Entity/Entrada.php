<?php

namespace InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entrada
 *
 * @ORM\Table(name="entrada")
 * @ORM\Entity(repositoryClass="InventarioBundle\Repository\EntradaRepository")
 */
class Entrada
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
     * @ORM\Column(name="tipoEntrada", type="string", length=15)
     */
    private $tipoEntrada;

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
     * @ORM\OneToMany(targetEntity="DetalleEntrada", mappedBy="entrada", cascade={"persist", "merge"})
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
     * Set tipoEntrada
     *
     * @param string $tipoEntrada
     *
     * @return Entrada
     */
    public function setTipoEntrada($tipoEntrada)
    {
        $this->tipoEntrada = $tipoEntrada;

        return $this;
    }

    /**
     * Get tipoEntrada
     *
     * @return string
     */
    public function getTipoEntrada()
    {
        return $this->tipoEntrada;
    }

    /**
     * Set referencia
     *
     * @param string $referencia
     *
     * @return Entrada
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
     * @return Entrada
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
     * @return Entrada
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
     * @return Entrada
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
     * @param \InventarioBundle\Entity\DetalleEntrada $detalle
     *
     * @return Entrada
     */
    public function addDetalle(\InventarioBundle\Entity\DetalleEntrada $detalle)
    {
        $this->detalles[] = $detalle;

        return $this;
    }

    /**
     * Remove detalle
     *
     * @param \InventarioBundle\Entity\DetalleEntrada $detalle
     */
    public function removeDetalle(\InventarioBundle\Entity\DetalleEntrada $detalle)
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

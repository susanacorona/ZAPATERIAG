<?php

namespace InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleTraspaso
 *
 * @ORM\Table(name="detalle_traspaso")
 * @ORM\Entity(repositoryClass="InventarioBundle\Repository\DetalleTraspasoRepository")
 */
class DetalleTraspaso
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
     * @var int
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="lote", type="string", length=255)
     */
    private $lote;

    /**
     * @var float
     *
     * @ORM\Column(name="costo", type="float")
     */
    private $costo;


    /**
     * @ORM\ManyToOne(targetEntity="Traspaso", inversedBy="detalles")
     * @ORM\JoinColumn(name="traspaso_id", referencedColumnName="id")
     */
    private $traspaso;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Zapato")
     * @ORM\JoinColumn(name="zapato_id", referencedColumnName="id")
     */
    private $zapato;
    
    
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
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return DetalleTraspaso
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return int
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set lote
     *
     * @param string $lote
     *
     * @return DetalleTraspaso
     */
    public function setLote($lote)
    {
        $this->lote = $lote;

        return $this;
    }

    /**
     * Get lote
     *
     * @return string
     */
    public function getLote()
    {
        return $this->lote;
    }

    /**
     * Set costo
     *
     * @param float $costo
     *
     * @return DetalleTraspaso
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;

        return $this;
    }

    /**
     * Get costo
     *
     * @return float
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * Set traspaso
     *
     * @param \InventarioBundle\Entity\Traspaso $traspaso
     *
     * @return DetalleTraspaso
     */
    public function setTraspaso(\InventarioBundle\Entity\Traspaso $traspaso = null)
    {
        $this->traspaso = $traspaso;

        return $this;
    }

    /**
     * Get traspaso
     *
     * @return \InventarioBundle\Entity\Traspaso
     */
    public function getTraspaso()
    {
        return $this->traspaso;
    }

    /**
     * Set zapato
     *
     * @param \InventarioBundle\Entity\Zapato $zapato
     *
     * @return DetalleTraspaso
     */
    public function setZapato(\InventarioBundle\Entity\Zapato $zapato = null)
    {
        $this->zapato = $zapato;

        return $this;
    }

    /**
     * Get zapato
     *
     * @return \InventarioBundle\Entity\Zapato
     */
    public function getZapato()
    {
        return $this->zapato;
    }
}

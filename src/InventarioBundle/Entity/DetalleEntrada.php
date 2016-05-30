<?php

namespace InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleEntrada
 *
 * @ORM\Table(name="detalle_entrada")
 * @ORM\Entity(repositoryClass="InventarioBundle\Repository\DetalleEntradaRepository")
 */
class DetalleEntrada
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
     * @ORM\Column(name="lote", type="string", length=100)
     */
    private $lote;

    /**
     * @var float
     *
     * @ORM\Column(name="costo", type="float")
     */
    private $costo;

    /**
     * @ORM\ManyToOne(targetEntity="Entrada", inversedBy="detalles")
     * @ORM\JoinColumn(name="entrada_id", referencedColumnName="id")
     */
    private $entrada;
    
    
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
     * @return DetalleEntrada
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
     * @return DetalleEntrada
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
     * @return DetalleEntrada
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
     * Set entrada
     *
     * @param \InventarioBundle\Entity\Entrada $entrada
     *
     * @return DetalleEntrada
     */
    public function setEntrada(\InventarioBundle\Entity\Entrada $entrada = null)
    {
        $this->entrada = $entrada;

        return $this;
    }

    /**
     * Get entrada
     *
     * @return \InventarioBundle\Entity\Entrada
     */
    public function getEntrada()
    {
        return $this->entrada;
    }

    /**
     * Set zapato
     *
     * @param \InventarioBundle\Entity\Zapato $zapato
     *
     * @return DetalleEntrada
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

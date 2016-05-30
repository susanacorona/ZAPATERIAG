<?php

namespace InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleSalida
 *
 * @ORM\Table(name="detalle_salida")
 * @ORM\Entity(repositoryClass="InventarioBundle\Repository\DetalleSalidaRepository")
 */
class DetalleSalida
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
     * @ORM\ManyToOne(targetEntity="Salida", inversedBy="detalles")
     * @ORM\JoinColumn(name="salida_id", referencedColumnName="id")
     */
    private $salida;
    
    
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
     * @return DetalleSalida
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
     * @return DetalleSalida
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
     * @return DetalleSalida
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
     * Set salida
     *
     * @param \InventarioBundle\Entity\Salida $salida
     *
     * @return DetalleSalida
     */
    public function setSalida(\InventarioBundle\Entity\Salida $salida = null)
    {
        $this->salida = $salida;

        return $this;
    }

    /**
     * Get salida
     *
     * @return \InventarioBundle\Entity\Salida
     */
    public function getSalida()
    {
        return $this->salida;
    }

    /**
     * Set zapato
     *
     * @param \InventarioBundle\Entity\Zapato $zapato
     *
     * @return DetalleSalida
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

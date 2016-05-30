<?php

namespace InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inventario
 *
 * @ORM\Table(name="inventario")
 * @ORM\Entity(repositoryClass="InventarioBundle\Repository\InventarioRepository")
 */
class Inventario
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
     * @var float
     *
     * @ORM\Column(name="precio", type="float")
     */
    private $precio;

    /**
     * @var float
     *
     * @ORM\Column(name="existencia", type="float")
     */
    private $existencia;


    /**
     * @ORM\ManyToOne(targetEntity="Almacen", inversedBy="inventarios")
     * @ORM\JoinColumn(name="almacen_id", referencedColumnName="id")
     */
    private $almacen;
    
    
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
     * Set precio
     *
     * @param float $precio
     *
     * @return Inventario
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set existencia
     *
     * @param float $existencia
     *
     * @return Inventario
     */
    public function setExistencia($existencia)
    {
        $this->existencia = $existencia;

        return $this;
    }

    /**
     * Get existencia
     *
     * @return float
     */
    public function getExistencia()
    {
        return $this->existencia;
    }

    /**
     * Set almacen
     *
     * @param \InventarioBundle\Entity\Almacen $almacen
     *
     * @return Inventario
     */
    public function setAlmacen(\InventarioBundle\Entity\Almacen $almacen = null)
    {
        $this->almacen = $almacen;

        return $this;
    }

    /**
     * Get almacen
     *
     * @return \InventarioBundle\Entity\Almacen
     */
    public function getAlmacen()
    {
        return $this->almacen;
    }

    /**
     * Set zapato
     *
     * @param \InventarioBundle\Entity\Zapato $zapato
     *
     * @return Inventario
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

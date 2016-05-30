<?php

namespace InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Almacen
 *
 * @ORM\Table(name="almacen")
 * @ORM\Entity(repositoryClass="InventarioBundle\Repository\AlmacenRepository")
 */
class Almacen
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
     * @ORM\Column(name="capacidad", type="float")
     */
    private $capacidad;

    /**
     * @var float
     *
     * @ORM\Column(name="metrosCuadrados", type="float")
     */
    private $metrosCuadrados;

    /**
     * @var int
     *
     * @ORM\Column(name="pisos", type="integer")
     */
    private $pisos;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="reponsable", type="string", length=255)
     */
    private $reponsable;

    /**
     * @ORM\OneToMany(targetEntity="Inventario", mappedBy="almacen", cascade={"persist", "merge"})
     */
    private $inventarios;
    
    
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
     * Set capacidad
     *
     * @param float $capacidad
     *
     * @return Almacen
     */
    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;

        return $this;
    }

    /**
     * Get capacidad
     *
     * @return float
     */
    public function getCapacidad()
    {
        return $this->capacidad;
    }

    /**
     * Set metrosCuadrados
     *
     * @param float $metrosCuadrados
     *
     * @return Almacen
     */
    public function setMetrosCuadrados($metrosCuadrados)
    {
        $this->metrosCuadrados = $metrosCuadrados;

        return $this;
    }

    /**
     * Get metrosCuadrados
     *
     * @return float
     */
    public function getMetrosCuadrados()
    {
        return $this->metrosCuadrados;
    }

    /**
     * Set pisos
     *
     * @param integer $pisos
     *
     * @return Almacen
     */
    public function setPisos($pisos)
    {
        $this->pisos = $pisos;

        return $this;
    }

    /**
     * Get pisos
     *
     * @return int
     */
    public function getPisos()
    {
        return $this->pisos;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Almacen
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set reponsable
     *
     * @param string $reponsable
     *
     * @return Almacen
     */
    public function setReponsable($reponsable)
    {
        $this->reponsable = $reponsable;

        return $this;
    }

    /**
     * Get reponsable
     *
     * @return string
     */
    public function getReponsable()
    {
        return $this->reponsable;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->inventarios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add inventario
     *
     * @param \InventarioBundle\Entity\Inventario $inventario
     *
     * @return Almacen
     */
    public function addInventario(\InventarioBundle\Entity\Inventario $inventario)
    {
        $this->inventarios[] = $inventario;

        return $this;
    }

    /**
     * Remove inventario
     *
     * @param \InventarioBundle\Entity\Inventario $inventario
     */
    public function removeInventario(\InventarioBundle\Entity\Inventario $inventario)
    {
        $this->inventarios->removeElement($inventario);
    }

    /**
     * Get inventarios
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInventarios()
    {
        return $this->inventarios;
    }
}

<?php

namespace First\Cuotas\Api\Data;

interface CuotaInterface
{
    const CUOTA_ID = 'cuota_id';
    const CUOTA    = 'cuota';
    const INTERES  = 'interes';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get CUOTA
     *
     * @return int|null
     */
    public function getCuota();

    /**
     * Get INTERES
     *
     * @return int|null
     */
    public function getInteres();

  
    /**
     * Set ID
     *
     * @param int $id
     * @return \First\Cuotas\Api\Data\CuotaInterface
     */
    public function setId($id);

    /**
     * Set CUOTA
     *
     * @param int $cuota
     * @return \First\Cuotas\Api\Data\CuotaInterface
     */
    public function setCuota($cuota);

    /**
     * Set INTERES
     *
     * @param int $interes
     * @return \First\Cuotas\Api\Data\CuotaInterface
     */
    public function setInteres($interes);
}

<?php

namespace First\Cuotas\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CuotaRepositoryInterface
{
    /**
     * Save Cuota.
     *
     * @param \First\Cuotas\Api\Data\CuotaInterface $cuota
     * @return \First\Cuotas\Api\Data\CuotaInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\First\Cuotas\Api\Data\CuotaInterface $cuota);

    /**
     * Retrieve Cuota.
     *
     * @param int $id
     * @return \First\Cuotas\Api\Data\CuotaInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($id);

    /**
     * Retrieve Cuotas matching the specified criteria.
     *
     * @return \First\Cuotas\Api\Data\CuotaInterface[]
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList();
}

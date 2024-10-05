<?php

namespace Ukpos\ScheduledBanners\Model;

/**
 * @method \Ukpos\ScheduledBanners\Model\ResourceModel\ScheduledVariableSet getResource()
 * @method \Ukpos\ScheduledBanners\Model\ResourceModel\ScheduledVariableSet\Collection getCollection()
 */
class ScheduledVariableSet extends \Magento\Framework\Model\AbstractModel implements \Ukpos\ScheduledBanners\Api\Data\ScheduledVariableSetInterface,
    \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'ukpos_scheduledbanners_scheduledvariableset';
    protected $_cacheTag = 'ukpos_scheduledbanners_scheduledvariableset';
    protected $_eventPrefix = 'ukpos_scheduledbanners_scheduledvariableset';

    protected function _construct()
    {
        $this->_init('Ukpos\ScheduledBanners\Model\ResourceModel\ScheduledVariableSet');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}

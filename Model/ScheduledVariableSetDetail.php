<?php

namespace Ukpos\ScheduledBanners\Model;

/**
 * @method \Ukpos\ScheduledBanners\Model\ResourceModel\ScheduledVariableSetDetail getResource()
 * @method \Ukpos\ScheduledBanners\Model\ResourceModel\ScheduledVariableSetDetail\Collection getCollection()
 */
class ScheduledVariableSetDetail extends \Magento\Framework\Model\AbstractModel implements \Ukpos\ScheduledBanners\Api\Data\ScheduledVariableSetDetailInterface,
    \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'ukpos_scheduledbanners_scheduledvariablesetdetail';
    protected $_cacheTag = 'ukpos_scheduledbanners_scheduledvariablesetdetail';
    protected $_eventPrefix = 'ukpos_scheduledbanners_scheduledvariablesetdetail';

    protected function _construct()
    {
        $this->_init('Ukpos\ScheduledBanners\Model\ResourceModel\ScheduledVariableSetDetail');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}

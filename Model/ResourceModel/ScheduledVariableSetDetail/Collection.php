<?php

namespace Ukpos\ScheduledBanners\Model\ResourceModel\ScheduledVariableSetDetail;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'ukpos_scheduled_variable_set_id';


    protected function _construct()
    {
        $this->_init('Ukpos\ScheduledBanners\Model\ScheduledVariableSetDetail', 'Ukpos\ScheduledBanners\Model\ResourceModel\ScheduledVariableSetDetail');
    }

}

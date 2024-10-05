<?php

namespace Ukpos\ScheduledBanners\Model\ResourceModel\ScheduledVariableSet;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'id';


    protected function _construct()
    {
        $this->_init('Ukpos\ScheduledBanners\Model\ScheduledVariableSet', 'Ukpos\ScheduledBanners\Model\ResourceModel\ScheduledVariableSet');
    }

}

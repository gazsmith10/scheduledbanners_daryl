<?php

namespace Ukpos\ScheduledBanners\Model\ResourceModel;

class ScheduledVariableSet extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    protected function _construct()
    {
        $this->_init('ukpos_scheduled_variable_set', 'id');
    }

}

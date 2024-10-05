<?php

namespace Ukpos\ScheduledBanners\Model\ResourceModel;

class ScheduledVariableSetDetail extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    protected function _construct()
    {
        $this->_init('ukpos_scheduled_variable_set', 'ukpos_scheduled_variable_set_id');
    }

}

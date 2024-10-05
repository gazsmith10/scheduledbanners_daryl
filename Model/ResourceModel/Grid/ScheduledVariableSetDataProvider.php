<?php

namespace Ukpos\ScheduledBanners\Model\ResourceModel\Grid;

use Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider;

/**
 * Data source for the Scheduled Banners Variable Set Grid
 */
class ScheduledVariableSetDataProvider extends DataProvider
{
    /**
     * @return array
     */
    public function getData()
    {
        $data = parent::getData();

        $groupedData = [];
        foreach ($data['items'] as $item) {
            $variableSet = $item['variable_set'];
            if (!isset($groupedData[$variableSet])) {
                $groupedData[$variableSet] = $item;
            }
        }

        return ['items' => array_values($groupedData)];
    }
}

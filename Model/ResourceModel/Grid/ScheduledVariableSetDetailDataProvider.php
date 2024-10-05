<?php

namespace Ukpos\ScheduledBanners\Model\ResourceModel\Grid;

use Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\ReportingInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ObjectManager;
use Psr\Log\LoggerInterface;

class ScheduledVariableSetDetailDataProvider extends DataProvider
{
    private $logger;
    private static $lastVariableSet = null;
    private static $filteredData = [];

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        ReportingInterface $reporting,
        \Magento\Framework\Api\Search\SearchCriteriaBuilder $searchCriteriaBuilder,
        RequestInterface $request,
        FilterBuilder $filterBuilder,
        array $meta = [],
        array $data = []
    ) {
        $this->logger = ObjectManager::getInstance()->get(LoggerInterface::class);

        parent::__construct(
            $name,
            $primaryFieldName,
            $requestFieldName,
            $reporting,
            $searchCriteriaBuilder,
            $request,
            $filterBuilder,
            $meta,
            $data
        );
    }

    public function getData(): array
    {
        $data = parent::getData();

        // Get the variable set from the request
        $variableSet = $this->request->getParam('variable_set');

        $this->logger->info('Entering getData method.');

        // Check if the variable set has changed
        if (self::$lastVariableSet === $variableSet) {
            $this->logger->info('Variable set has not changed. Returning previously filtered data.');
            return ['items' => self::$filteredData]; // Return the cached filtered data
        }

        $this->logger->info('Fetched variable set: ' . $variableSet);
        self::$lastVariableSet = $variableSet; // Update the static variable

        // Exit if variable set is empty
        if (empty($variableSet)) {
            $this->logger->warning('Variable set is empty. Exiting data provider.');
            return ['items' => []];
        }

        // Filter data
        $filteredData = [];
        foreach ($data['items'] as $item) {
            if (isset($item['variable_set']) && $item['variable_set'] === $variableSet) {
                $filteredData[] = $item;
            }
        }

        // Store the filtered data
        self::$filteredData = $filteredData;

        // Log filtered data
        $this->logger->info('Filtered data items: ' . print_r($filteredData, true));

        return ['items' => $filteredData];
    }
}

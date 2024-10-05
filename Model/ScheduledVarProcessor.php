<?php
namespace Ukpos\ScheduledBanners\Model;

use Magento\Framework\Filter\SimpleDirective\ProcessorInterface;
use Ukpos\ScheduledBanners\Helper\Data;

/**
 * Seems like in 2.3.4 this logic was modified, and the recomended way is to use di.xml
 * to inject the directives by passing it into the directiveProcessors property of the constructor
 * https://developer.adobe.com/commerce/frontend-core/guide/templates/email-migration/
 */
class ScheduledVarProcessor implements ProcessorInterface
{
    /**
     * @var Data
     */
    protected $helper;

    /**
     * @param Data $helper
     */
    public function __construct(Data $helper)
    {
        $this->helper = $helper;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'scheduledVar';
    }

    /**
     * @param $value
     * @param array $parameters
     * @param string|null $html
     * @return string
     */
    public function process($value, array $parameters, ?string $html): string
    {
        $variableId = $parameters['variable_id'] ?? '';
        $result = $this->helper->getVariableValue($variableId);

        return $result ?: $value;
    }

    /**
     * @return array|string[]|null
     */
    public function getDefaultFilters(): ?array
    {
        return null;
    }
}

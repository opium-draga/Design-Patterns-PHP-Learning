<?php

/**
 * Interface ComponentWithTooltip
 * Handlers interface
 */
interface ComponentWithTooltip
{
    public function showHelp();
}

/**
 * Class Component
 * Base class of simple components
 */
abstract class Component implements ComponentWithTooltip
{
    protected $toolTipText;

    public function __construct($toolTipText = null)
    {
        $this->toolTipText = $toolTipText;
    }

    /**
     * Next items in chain
     * @var ComponentWithTooltip
     */
    public $container;

    public function showHelp()
    {
        if ($this->toolTipText) {
            echo $this->toolTipText;
        } else {
            $this->container->showHelp();
        }
    }
}

/**
 * Class Container
 * Container with components or other containers
 */
abstract class Container extends Component
{
    /**
     * @var Component
     */
    protected $children;

    /**
     * Add Component to Container
     * @param Component $item
     */
    public function add(Component $item)
    {
        $item->container = $this;
        $this->children[] = $item;
    }
}

/**
 * Class Button
 * Concrete simple Component
 */
class Button extends Component
{

}

/**
 * Class Panel
 * Concrete Container
 */
class Panel extends Container
{

}

$button1 = new Button("OK button");
$button2 = new Button();

$panel = new Panel("Default panel tooltip");
$panel->add($button1);
$panel->add($button2);

$button2->showHelp();

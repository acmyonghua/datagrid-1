<?php

namespace Jfsimon\Datagrid\Model\Component;

use Jfsimon\Datagrid\Service\RendererInterface;
use Jfsimon\Datagrid\Service\VisitorInterface;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
interface ComponentInterface
{
    /**
     * Returns component name.
     *
     * @return string
     */
    public function getName();

    /**
     * Accepts component visitor.
     *
     * @param VisitorInterface $visitor
     *
     * @return ComponentInterface|boolean
     */
    public function accept(VisitorInterface $visitor);

    /**
     * Renders the component.
     *
     * @param RendererInterface $renderer
     * @param array             $options
     *
     * @return string
     */
    public function render(RendererInterface $renderer, array $options = array());
}

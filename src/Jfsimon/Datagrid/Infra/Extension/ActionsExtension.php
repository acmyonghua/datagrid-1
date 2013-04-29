<?php

namespace Jfsimon\Datagrid\Infra\Extension;

use Jfsimon\Datagrid\Infra\Extension\AbstractExtension;
use Jfsimon\Datagrid\Infra\Handler\ActionsHandler;
use Jfsimon\Datagrid\Model\Column;
use Jfsimon\Datagrid\Model\Data\Collection;
use Jfsimon\Datagrid\Model\Schema;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class ActionsExtension extends AbstractExtension
{
    const NAME = 'actions';

    /**
     * {@inheritdoc}
     */
    public function configure(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(self::NAME => null));
    }

    /**
     * {@inheritdoc}
     */
    public function buildSchema(Schema $schema, Collection $collection, array $options = array())
    {
        if ($options[self::NAME]) {
            $schema->add('.'.self::NAME, self::NAME);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function buildColumn(Column $column, $type, array $options = array())
    {
        if (self::NAME === $type) {
            $column->register(new ActionsHandler());
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return self::NAME;
    }
}
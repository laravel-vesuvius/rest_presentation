<?php

namespace AppBundle\Serializer\Listener;


use Doctrine\ORM\EntityManager;
use JMS\Serializer\EventDispatcher\ObjectEvent;

/**
 * Class CreditorSerializeListener
 */
class CreditorSerializeListener
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * CreditorSerializeListener constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param ObjectEvent $event
     */
    public function onPostSerialize(ObjectEvent $event)
    {
        $dealsCounts = $this->em->getRepository('AppBundle:Creditor')->getOpenedClosedDealsCount($event->getObject());
        $event->getVisitor()->addData('opened_deals_count', $dealsCounts['opened']);
        $event->getVisitor()->addData('closed_deals_count', $dealsCounts['closed']);
    }
}
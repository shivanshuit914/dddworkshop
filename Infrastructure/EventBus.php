<?php

/**
 * Class EventBus.
 *
 * @author        Shivanshu Patel <shivanshu.patel@worldfirst.com>
 * @copyright     2016 World First Ltd. All rights reserved.
 */
class EventBus implements EventBusInterface
{
    /**
     * @var ListenerInterface[]
     */
    private $listeners;

    /**
     * @param array $events
     */
    public function dispatch(array $events)
    {
        foreach($events as $event) {
            foreach($this->listeners as $listener) {
                $listener->handle($event);
            }
        }
    }

    public function subscribe(ListenerInterface $listener)
    {
        $this->listeners[] = $listener;
    }
}
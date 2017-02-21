<?php

/**
 * interface EventBusInterface.
 *
 * @author        Shivanshu Patel <shivanshu.patel@worldfirst.com>
 * @copyright     2016 World First Ltd. All rights reserved.
 */
interface EventBusInterface
{
    public function dispatch(array $events);

    public function subscribe(ListenerInterface $listener);
}
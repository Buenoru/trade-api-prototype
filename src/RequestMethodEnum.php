<?php

declare(strict_types=1);

namespace Trade\Api;

enum RequestMethodEnum: string
{
    case TIME = 'time';
    case INFO = 'info';
    case ORDERS = 'orders';
    case ACCOUNT = 'account';
    case ORDER_CREATE = 'order_create';
    case ORDER_STATUS = 'order_status';
    case MY_ORDERS = 'my_orders';
}

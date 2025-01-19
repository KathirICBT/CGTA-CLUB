<?php

namespace App\Enums;

enum EventType: string
{
    case Customers = 'customers';
    case Admin = 'admin';
}
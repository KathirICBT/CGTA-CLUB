<?php

namespace App\Enums;

enum EventVisibility: string
{
    case Members = 'members';
    case AllUsers = 'allUsers';
}

<?php

namespace App\Models\Types;

// ????????
enum FieldType: string
{
    case TEXT = 'text';
    case CHECKBOX = 'checkbox';
    case SELECT = 'select';
    case DATE = 'date';
    case USER = 'user';
    case NUMBER = 'number';
    case CURRENCY = 'currency';
    case TABLE = 'table';
}

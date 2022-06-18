<?php
namespace App\Models\Enums;

enum TypeTenantEnum:string
{
    case ADMIN ='admin';
    case VISITOR = 'visitor';
    case EDITOR ='editor';
}


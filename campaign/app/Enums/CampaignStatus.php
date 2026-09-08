<?php

namespace App\Enums;

enum CampaignStatus: string
{
    case DRAFT = 'draft';
    case ACTIVE = 'active';
    case ARCHIVED = 'archived';
}

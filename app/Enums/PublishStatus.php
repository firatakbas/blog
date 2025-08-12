<?php

namespace App\Enums;

enum PublishStatus: string
{
    case PUBLISHED = 'published';
    case DRAFT = 'draft';

    public function label(): string
    {
        return match ($this) {
            self::PUBLISHED => __('Yayınlandı'),
            self::DRAFT => __('Taslakta'),
        };
    }

    public function published(): bool
    {
        return $this == self::PUBLISHED;
    }

    public function draft(): bool
    {
        return $this == self::DRAFT;
    }
}

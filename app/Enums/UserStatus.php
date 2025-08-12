<?php

namespace App\Enums;

enum UserStatus: string
{
    //Sistemi kullanabilir
    case ACTIVE = 'active';

    //Giriş yapamaz
    case INACTIVE = 'inactive';

    //Yasaklanmış kullanıcı
    case BANNED = 'banned';

    //Onay bekliyor
    case PENDING = 'pending';

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => __('Aktif'),
            self::INACTIVE => __('Pasif'),
            self::BANNED => __('Yasaklı'),
            self::PENDING => __('Onay Bekliyor'),
        };
    }

    public function active(): bool
    {
        return $this == self::ACTIVE;
    }

    public function inactive(): bool
    {
        return $this == self::INACTIVE;
    }

    public function banned(): bool
    {
        return $this == self::BANNED;
    }

    public function pending(): bool
    {
        return $this == self::PENDING;
    }
}

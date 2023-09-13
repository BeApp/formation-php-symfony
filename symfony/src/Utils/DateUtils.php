<?php

namespace App\Utils;

use DateTimeInterface;

class DateUtils
{
    public static function formatDate(?DateTimeInterface $dateTime, string $locale): string
    {
        if ($locale === 'en') {
            if ($dateTime === null) {
                return '';
            }
            return $dateTime->format('\L\e\ j\ F\ \à\ H\:i');
        } else {
            return $dateTime->format('\L\e\ j\ F\ \à\ H\:i');

        }
    }
}

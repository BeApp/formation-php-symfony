<?php

namespace App\Utils;

class DateUtils
{
    public static function formatDate(\DateTimeInterface $dateTime): string {
        return $dateTime->format('\L\e\ j\ F\ \à\ H\hi');
    }
}

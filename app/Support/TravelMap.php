<?php

namespace App\Support;

use Illuminate\Support\Str;

class TravelMap
{
    /**
     * @return array<string, array{name: string, label: string, lat: float, lng: float, x: float, y: float, accent: string}>
     */
    public static function cities(): array
    {
        return [
            'macapa' => [
                'name' => 'Macapa',
                'label' => 'Macapa',
                'lat' => 0.0349,
                'lng' => -51.0694,
                'x' => 53.0,
                'y' => 21.0,
                'accent' => '#0f766e',
            ],
            'santana' => [
                'name' => 'Santana',
                'label' => 'Santana',
                'lat' => -0.0389,
                'lng' => -51.1817,
                'x' => 50.0,
                'y' => 29.0,
                'accent' => '#2563eb',
            ],
            'mazagao' => [
                'name' => 'Mazagao',
                'label' => 'Mazagao',
                'lat' => -0.1133,
                'lng' => -51.2894,
                'x' => 44.0,
                'y' => 41.0,
                'accent' => '#d97706',
            ],
            'oiapoque' => [
                'name' => 'Oiapoque',
                'label' => 'Oiapoque',
                'lat' => 3.8413,
                'lng' => -51.8350,
                'x' => 22.0,
                'y' => 7.0,
                'accent' => '#7c3aed',
            ],
            'laranjaldojari' => [
                'name' => 'Laranjal do Jari',
                'label' => 'Laranjal do Jari',
                'lat' => -0.8050,
                'lng' => -52.4533,
                'x' => 12.0,
                'y' => 82.0,
                'accent' => '#dc2626',
            ],
        ];
    }

    /**
     * @return array{name: string, label: string, lat: float, lng: float, x: float, y: float, accent: string}|null
     */
    public static function city(?string $city): ?array
    {
        if (blank($city)) {
            return null;
        }

        return static::cities()[static::normalizeCityKey($city)] ?? null;
    }

    public static function normalizeCityKey(string $city): string
    {
        return (string) str($city)
            ->ascii()
            ->lower()
            ->replaceMatches('/[^a-z0-9]+/', '')
            ->trim();
    }

    public static function routeUrl(?string $origin, ?string $destination, string $provider = 'google'): ?string
    {
        if (blank($origin) || blank($destination)) {
            return null;
        }

        $originQuery = rawurlencode($origin . ', Amapa, Brasil');
        $destinationQuery = rawurlencode($destination . ', Amapa, Brasil');

        return match ($provider) {
            'osm' => sprintf(
                'https://www.openstreetmap.org/directions?engine=fossgis_osrm_car&route=%s;%s',
                $originQuery,
                $destinationQuery,
            ),
            default => sprintf(
                'https://www.google.com/maps/dir/?api=1&origin=%s&destination=%s&travelmode=driving',
                $originQuery,
                $destinationQuery,
            ),
        };
    }

    public static function embedRouteUrl(?string $origin, ?string $destination): string
    {
        $query = blank($origin) || blank($destination)
            ? 'Macapa,Amapa,Brasil'
            : "{$origin} para {$destination}, Amapa, Brasil";

        return 'https://maps.google.com/maps?q=' . rawurlencode($query) . '&t=&z=7&ie=UTF8&iwloc=&output=embed';
    }

    public static function cityMapUrl(?string $city): ?string
    {
        if (blank($city)) {
            return null;
        }

        return 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($city . ', Amapa, Brasil');
    }

    public static function travelDurationLabel(?string $start, ?string $end): ?string
    {
        if (blank($start) || blank($end)) {
            return null;
        }

        $minutes = now()->parse($start)->diffInMinutes(now()->parse($end));

        if ($minutes < 60) {
            return "{$minutes} min";
        }

        $hours = intdiv($minutes, 60);
        $remainingMinutes = $minutes % 60;

        if ($remainingMinutes === 0) {
            return "{$hours}h";
        }

        return "{$hours}h {$remainingMinutes}min";
    }
}

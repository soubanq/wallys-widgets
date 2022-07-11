<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    use HasFactory;

    private static function minPackSizes($packSizes, $number)
    {
        // sort pack sizes in asc order
        sort($packSizes);
        // initialise the results to be 0
        $results = array_fill_keys($packSizes, 0);

        // loop around the order number, allocating parts to packet sizes until order number is 0 (fulfilled)
        while ($number > 0) {
            foreach ($packSizes as $size) {
                if ($size >= $number) break;
            }
            ++$results[$size];
            $number -= $size;
        }

        return $results;
    }

    private static function minWidgets($packSizes, $number)
    {
        // sort pack sizes in desc order
        rsort($packSizes);
        // initialise the results to be 0
        $results = array_fill_keys($packSizes, 0);

        // loop around the order number, allocating parts to packet sizes until order number is 0 (fulfilled)
        while ($number > 0) {
            foreach ($packSizes as $size) {
                if ($size <= $number) break;
            }
            ++$results[$size];
            $number -= $size;
        }

        return $results;
    }

    public static function optimizePacks($packSizes, $number)
    {
        $minPacks = self::minPackSizes($packSizes, $number);
        $minWidgets = self::minWidgets($packSizes, $number);

        //work out the quantity of widgets you'd be sending if you prioritied minimum number of packs
        $minPackCount = 0;
        foreach ($minPacks as $key => $minPack) {
            $minPackCount += $key * $minPack;
        }

        //work out the quantity of widgets you'd be sending if you prioritied minimum number of widgets
        $minWidgetCount = 0;
        foreach ($minWidgets as $key => $minWidget) {
            $minWidgetCount += $key * $minWidget;
        }

        //sort so results are in asc order
        ksort($minPacks);
        ksort($minWidgets);

        return $minPackCount <= $minWidgetCount ? $minPacks : $minWidgets;
    }
}

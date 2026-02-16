<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperController extends Controller
{
    public static function responsive_image($src, $alt, $width, $height, $sizes)
    {
        $srcset = collect(explode(',', $sizes))
            ->mapWithKeys(function ($size) use ($src) {
                [$width, $media] = explode(' ', $size);
                return [asset("$src-$width.jpg") => "$width w"];
            })
            ->implode(', ');

        $sizes = collect(explode(',', $sizes))
            ->map(function ($size) {
                [$width, $media] = explode(' ', $size);
                return "($media) $width";
            })
            ->implode(', ');

        return <<<HTML
            <img
            src="{{ asset('$src-500.jpg') }}"
            srcset="$srcset"
            sizes="$sizes"
            width="$width"
            height="$height"
            alt="$alt">
            HTML;
        }
}

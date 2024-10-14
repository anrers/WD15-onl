<?php
function mapped_implode($array, $separator = ', ', $innerSeparator = ': '): string
{
    return implode($separator, array_map(
            function($k, $v) use($innerSeparator) {
                return implode($innerSeparator, [$k, $v]);
            },
            array_keys($array),
            array_values($array)
        )
    );
}

function mapped_implode2($array, $separator = ', ', $innerSeparator = ': '): string
{
    $resultArray = [];
    foreach ($array as $key => $value) {
        $resultArray[] = implode($innerSeparator, [$key, $value]);
    }
    return implode($separator, $resultArray);
}
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
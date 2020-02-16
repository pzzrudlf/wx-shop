<?php

return [
    'template' => [
        'layout_on' => true,
        'layout_name' => 'layouts/main',
        'layout_item'   => '{{__CONTENT__}}',
        'tpl_begin'    => '{{',
        // 模板引擎普通标签结束标记
        'tpl_end'      => '}}',
        // 标签库标签开始标记
        'taglib_begin' => '{{',
        // 标签库标签结束标记
        'taglib_end'   => '}}',
    ],
];

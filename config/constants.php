<?php
return [
    'title' => 'INTRANET',
    'currentdate' => 'TODAY',
    'attn_default_date' => 'YESTERDAY',
    'yesterday'=> date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")-1,date("Y")))
    
];

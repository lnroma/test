<?php
$data1 = [
    'parent.child.field' => 1,
    'parent.child.field2' => 2,
    'parent2.child.name' => 'test',
    'parent2.child2.name' => 'test',
    'parent2.child2.position' => 10,
    'parent3.child3.position' => 10,
];

$data = [
    'parent' => [
        'child' => [
            'field' => 1,
            'field2' => 2,
        ]
    ],
    'parent2' => [
        'child' => [
            'name' => 'test'
        ],
        'child2' => [
            'name' => 'test',
            'position' => 10
        ]
    ],
    'parent3' => [
        'child3' => [
            'position' => 10
        ]
    ],
];

// parse configuration 
function parse($data1) {
   $result = array();
   foreach($data1 as $k => $v) {
      list($parent,$child,$field) = explode('.',$k);
      $result[$parent][$child][$field] = $v;
   }
   return $result;
}

// compile configuration
function compile($data) {
   $result = array();
   foreach($data as $parent => $parentValue) {
     foreach($parentValue as $child => $childValue) {
       foreach($childValue as $field => $fieldValue) {
         $result[$parent.'.'.$child.'.'.$field] = $fieldValue;
       }
     }
   }
   return $result;
}
var_dump(parse($data1));
var_dump(compile($data));

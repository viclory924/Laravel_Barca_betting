<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'özellik kabul edilmeli.',
    'active_url'           => 'The :özellik geçerli bir URL değil.',
    'after'                => 'The :özniteliği bir tarih sonra olmalı :tarih.',
    'after_or_equal'       => 'The :öznitelik, eşit veya büyük bir tarih olmalıdır :tarih.',
    'alpha'                => 'The :özellik yalnızca harf içerebilir.',
    'alpha_dash'           => 'The :öznitelik yalnızca harf, rakam ve çizgi içerebilir.',
    'alpha_num'            => 'The :özellik yalnızca harfleri ve sayıları içerebilir.',
    'array'                => 'The :öznitelik bir dizi olmalıdır.',
    'before'               => 'The :özellik önce bir tarih olmalı :tarih.',
    'before_or_equal'      => 'The :öznitelik daha önce veya ona eşit bir tarih olmalıdır :tarih.',
    'between'              => [
        'numeric' => 'The :öznitelik arasında olmalıdır :dk ve :mak.',
        'file'    => 'The :öznitelik arasında olmalıdır :dk ve :maksimum kilobayt.',
        'string'  => 'The :öznitelik arasında olmalıdır :dk ve :maksimum karakter',
        'array'   => 'The :öznitelik arasında olmalıdır :dk ve :maksimum ürün',
    ],
    'boolean'              => 'The :öznitelik alanı doğru veya yanlış olmalıdır.',
    'confirmed'            => 'The :özellik onayı uyuşmuyor.',
    'date'                 => 'The :özellik geçerli bir tarih değil.',
    'date_format'          => 'The :öznitelik biçimiyle eşleşmiyor :biçim.',
    'different'            => 'The :özellik ve :diğeri farklı olmalı.',
    'digits'               => 'The :özellik olmalı :basamak basamak.',
    'digits_between'       => 'The :öznitelik arasında olmalıdır :dk ve :maksimum rakam',
    'dimensions'           => 'The :özniteliğin geçersiz resim boyutları var.',
    'distinct'             => 'The :öznitelik alanı yinelenen bir değere sahip.',
    'email'                => 'The :özellik geçerli bir e-posta adresi olmalı.',
    'exists'               => 'Seçili :özellik geçersiz.',
    'file'                 => 'The :öznitelik bir dosya olmalıdır.',
    'filled'               => 'The :öznitelik alanı bir değere sahip olmalıdır.',
    'image'                => 'The :öznitelik bir resim olmalıdır.',
    'in'                   => 'Seçili :özellik geçersiz.',
    'in_array'             => 'The :öznitelik alanı içinde mevcut değil :diğer.',
    'integer'              => 'The :öznitelik bir tamsayı olmalıdır.',
    'ip'                   => 'The :özniteliğin geçerli bir IP adresi olması gerekir.',
    'ipv4'                 => 'The :özniteliğin geçerli bir IPv4 adresi olması gerekir.',
    'ipv6'                 => 'The :özniteliğin geçerli bir IPv6 adresi olması gerekir.',
    'json'                 => 'The :özniteliğin geçerli bir JSON dizesi olması gerekir.',
    'max'                  => [
        'numeric' => 'The :özellik şundan büyük olamaz :maksimum.',
        'file'    => 'The :özellik şundan büyük olamaz :maksimum kilobayt.',
        'string'  => 'The :özellik şundan büyük olamaz :maksimum karakter',
        'array'   => 'The :öznitelik daha fazla olamaz :maksimum ürün',
    ],
    'mimes'                => 'The :öznitelik türünde bir dosya olmalı: :değerler.',
    'mimetypes'            => 'The :öznitelik türünde bir dosya olmalı: :değerler.',
    'min'                  => [
        'numeric' => 'The :özellik en az olmalıdır :min.',
        'file'    => 'The :özellik en az olmalıdır :min kilobayt.',
        'string'  => 'The :özellik en az olmalıdır :min karakterler.',
        'array'   => 'The :özellik en az sahip olmalı :min ürün.',
    ],
    'not_in'               => 'Seçili :özellik geçersiz.',
    'numeric'              => 'The :öznitelik bir sayı olmalıdır.',
    'present'              => 'The :öznitelik alanı mevcut olmalıdır.',
    'regex'                => 'The :özellik biçimi geçersiz.',
    'required'             => 'The :özellik alanı gerekiyor.',
    'required_if'          => 'The :özellik alanı gerekiyor ne zaman :diğer :value.',
    'required_unless'      => 'The :özellik alanı gerekiyor olmadıkça :diğer içinde :değerler.',
    'required_with'        => 'The :özellik alanı gerekiyor ne zaman :değerler mevcut.',
    'required_with_all'    => 'The :özellik alanı gerekiyor ne zaman :değerler mevcut.',
    'required_without'     => 'The :özellik alanı gerekiyor ne zaman :değerler mevcut olmayan.',
    'required_without_all' => 'The :özellik alanı gerekiyor ne zaman hiçbiri :değerler mevcut.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :özellik olmalı :boyut.',
        'file'    => 'The :özellik olmalı :boyut kilobayt.',
        'string'  => 'The :özellik olmalı :boyut karakter.',
        'array'   => 'The :özellik içermelidir :boyut ürün.',
    ],
    'string'               => 'The :özellik olmalı dizi.',
    'timezone'             => 'The :özellik olmalı geçerli bir bölge.',
    'unique'               => 'The :öznitelik zaten alınmış.',
    'uploaded'             => 'The :özellik yüklenemedi.',
    'url'                  => 'The :özellik biçimi geçersiz.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'özel mesaj',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];

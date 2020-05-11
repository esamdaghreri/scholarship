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

    'accepted' => ':attribute يجب أن يكون مقبول.',
    'active_url' => ' :attribute غير صالح URL.',
    'after' => ':attribute يجب أن تكون بيانات بعد بيانات :date.',
    'after_or_equal' => ':attribute يجب أن يكون بعد البيانات أو مساوٍ لها :date.',
    'alpha' => ':attribute ربما يحتوي على أحرف فقط .',
    'alpha_dash' => 'ربما يحتوي على أحرف وأرقام وشرطات و خط سفلي .',
    'alpha_num' => ':attribute ربما يحتوي على أحرف و أرقام فقط .',
    'array' => ':attribute يجب أن يكون مصفوفة .',
    'before' => ':attribute يجب أن يكون بيانات قبل بيانات :date.',
    'before_or_equal' => ':attribute يجب أن يكون قبل البيانات أو مساوٍ لها :date.',
    'between' => [
        'numeric' => ':attribute يجب أن يكون بين :min و:max.',
        'file' => ':attribute يجب أن يكون بين :min و:max kilobytes.',
        'string' => ':attribute يجب أن يكون بين :min و:max الحرفين.',
        'array' => ':attribute يجب أن يكون بين :min و:max العنصرين.',
    ],
    'boolean' => ':attribute يجب أن يكون المجال صحيح أو خاطئ.',
    'confirmed' => ':attribute كلمة المرور المدخلة غير متطابقة.',
    'date' => ':attribute الوقت غير مناسب الشكل',
    'date_equals' => ':attribute يجب أن تكون بيانات مساوية لبيانات :date.',
    'date_format' => ':attribute ليست مطابقة إلى الشكل :format.',
    'different' => ':attribute و:other يجب أن يكون مختلف  .',
    'digits' => ':attribute يجب أن يكون :digits digits.',
    'digits_between' => ' :attribute يجب أن يكون بين  :min و :max digits.',
    'dimensions' => ':attribute يحتوي على أبعاد صورة غير صحيحة.',
    'distinct' => ':attribute الخانة تحتوي على قيمة مكررة .',
    'email' => ':attribute يجب أن يكون عنوان إيميل صحيح.',
    'ends_with' => ':attribute يجب أن ينتهي بإحدى الآتي : :values',
    'exists' => 'المحدد :attribute غير صحيح.',
    'file' => ':attribute يجب أن يكون ملف.',
    'filled' => ':attribute يجب أن يحتوي الخانة على قيمة .',
    'gt' => [
        'numeric' => ':attribute يجب أن يكون أكبر من  :value.',
        'file' => ':attribute يجب أن يكون أكبر من :value كيلوبايت.',
        'string' => ':attribute يجب أن يكون أكبر من :value حرف.',
        'array' => ':attribute يجب أن يحتوي على أكثر من :value عنصر.',
    ],
    'gte' => [
        'numeric' => ':attribute يجب أن يكون أعلى من أو مساوٍ :value.',
        'file' => ':attribute يجب أن يكون أعلى من أو مساوٍ :value كيلوبايت.',
        'string' => ':attribute يجب أن يكون أعلى من أو مساوٍ:value حرف.',
        'array' => ':attribute يجب أن يحتوي على :value عناصر و أكثر.',
    ],
    'image' => ':attribute يجب أن يكون صورة.',
    'in' => 'المحدد:attribute غير صحيح.',
    'in_array' => ':attribute المجال لا يوجد في :other.',
    'integer' => ':attribute يجب أن يكون عدد صحيح.',
    'ip' => ':attribute يجب أن يكون عنوان IP صحيح.',
    'ipv4' => ':attribute يجب أن يكون عنوان IPv4 صحيح.',
    'ipv6' => ':attribute يجب أن يكون عنوان IPv6 صحيح.',
    'json' => ':attribute يجب أن تكون سلسلة JSON صحيحة.',
    'lt' => [
        'numeric' => ':attribute يجب أن يكون أقل من :value.',
        'file' => ':attribute يجب أن يكون أقل من  :value كيلوبايت.',
        'string' => ':attribute يجب أن يكون أقل من :value حرف.',
        'array' => ':attribute يجب أن يكون أقل من :value عنصر.',
    ],
    'lte' => [
        'numeric' => ':attribute يجب أن يكون أقل من أو مساوٍ :value.',
        'file' => ':attribute يجب أن يكون أقل من أو مساوٍ:value كيلوبايت.',
        'string' => ':attribute يجب أن يكون أقل من أو مساوٍ:value حرف.',
        'array' => ':attribute يجب ألا يحتوي على أكثر من :value عنصر.',
    ],
    'max' => [
        'numeric' => ':attribute ربما لن يكون أكبر من :max.',
        'file' => ':attribute ربما لن يكون أكبر من  :max كيلوبايت.',
        'string' => ':attribute ربما لن يكون أكبر من :max حرف.',
        'array' => 'The :attribute may not have more than :max عنصر.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'لا يقبل أقل من :min.',
        'file' => 'لا يقبل أقل من :min كيلوبايت.',
        'string' => 'لا يقبل أقل من :min حرف.',
        'array' => 'لا يقبل أقل من :min عنصر.',
    ],
    'not_in' => 'المحدد :attribute غير صحيح.',
    'not_regex' => 'مطلوب 8 حروف على الأقل تحتوي على رقم واحد وحرف صغير وحرف كبير.',
    'numeric' => ':attribute يجب أن يكون رقم.',
    'present' => ':attribute يجب إدخال الخانة.',
    'regex' => 'مطلوب 8 حروف على الأقل تحتوي على رقم واحد وحرف صغير وحرف كبير.',
    'required' => ':attribute الخانة مطلوبة .',
    'required_if' => ':attribute الخانة مطلوبة عندما :other تكون :value.',
    'required_unless' => ':attribute الخانة مطلوبة مالم :other تكون في :values.',
    'required_with' => ':attribute الخانة مطلوبة عندما :values تكون مدخلة.',
    'required_with_all' => ':attribute الخانة مطلوبة عندما :values تكون مدخلة.',
    'required_without' => ':attribute الخانة مطلوبة عندما :values تكون غير مدخلة .',
    'required_without_all' => ':attribute الخانة مطلوبة عندما لا يوجد :values قد أدخلت .',
    'same' => ':attribute و:other يجب أن يكون متطابق في الحجم .',
    'size' => [
        'numeric' => ':attribute يجب أن يكون :size.',
        'file' => ':attribute يجب أن يكون :size كيلوبايت.',
        'string' => ':attribute يجب أن يكون :size حرف.',
        'array' => ':attribute يجب أن يحتوي على :size عنصر.',
    ],
    'starts_with' => ':attribute يجب أن يبدأ بواحدة من عنصر الآتية :values',
    'string' => ':attribute يجب أن يكون سلسلة.',
    'timezone' => ':attribute يجب أن يكون نطاق صحيح.',
    'unique' => ' هذا :attribute مستخدم بالفعل',
    'uploaded' => ':attribute فشل الرفع.',
    'url' => ':attribute الهيئة غير صحيحة.',
    'uuid' => ':attribute يجب أن يكون معرف فريد عالمي صحيح.',


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
        'email' => [
            'required' => 'البريد الالكتروني مطلوب',
            'email' => 'أدخل بريدًا إلكترونيًا صالحًا',
            'unique' => 'البريد الالكتروني موجود مسبقا',
        ],
        'username' => [
            'required' => 'اسم المستخدم مطلوب',
            'min' => 'يجب أن يحتوي اسم المستخدم على الأقل 4 حروف',
            'max' => 'يجب أن يحتوي اسم المستخدم على الاكثر 26 حروف',
            'unique' => 'اسم المستخدم موجود مسبقا',
        ],
        'password' => [
            'required' => 'كلمة المرور مطلوب',
            'min' => 'يجب أن يحتوي كلمة المرور على الأقل 8 رموز',
            'max' => 'يجب أن يحتوي كلمة المرور على الاكثر 26 رمز',
            'confirmed' => 'كلمة المرور غير متطابقة',
            'regex' => 'يجب كلمة المرور ان تحتوي على احرف صغيرة و كبير و ارقام ومن 8 الى 26 رمز',
        ],
        'role' => [
            'required' => 'الدور مطلوب',
            'exists' => 'رقم الدور غير موجود',
        ],
        'gender' => [
            'required' => 'الجنس مطلوب',
            'exists' => 'رقم الجنس غير موجود',
        ],
        'reason' => [
            'required' => 'السبب مطلوب',
            'min' => 'يجب أن يحتوي السبب على الأقل 4 حروف',
            'max' => 'يجب أن يحتوي السبب على الاكثر 200 حروف',
        ],
        'user_id' => [
            'required' => 'رقم المستخدم مطلوب',
            'exists' => 'رقم المستخدم غير موجود',
        ],
        'file' => [
            'required' => 'الرجاء رفع الملفات المطلوبة',
        ],
        'file.*' => [
            'max' => 'يجب أن يكون حجم الملف ":input" اقل من 2 ميجا بايت',
            'mimes' => 'يجب ان يكون صيغة الملف من pdf,jpeg,bmp,png,docx,doc'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'email' =>'البريد الاكتروني',
        'username' => 'الإسم',
        'password' => 'كلمة المرور',
    ],

];

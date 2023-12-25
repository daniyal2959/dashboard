<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enable All Language Routes
    |--------------------------------------------------------------------------
    |
    | This option enable language route.
    |
    */
    'route'         => true,

    /*
    |--------------------------------------------------------------------------
    | Enable Language Home Route
    |--------------------------------------------------------------------------
    |
    | This option enable language route to set language and return
    | to url('/')
    |
    */
    'home'          => true,

    /*
    |--------------------------------------------------------------------------
    | Add Language Code
    |--------------------------------------------------------------------------
    |
    | This option will add the language code to the redirected url
    |
    */
    'url'          => false,

    /*
    |--------------------------------------------------------------------------
    | Set strategy
    |--------------------------------------------------------------------------
    |
    | This option will determine the strategy used to determine the back url.
    | It can be 'session' (default) or 'referer'
    |
    */
    'back'          => 'session',

    /*
    |--------------------------------------------------------------------------
    | Carbon Language
    |--------------------------------------------------------------------------
    |
    | This option the language of carbon library.
    |
    */
    'carbon'        => true,

    /*
    |--------------------------------------------------------------------------
    | Date Language
    |--------------------------------------------------------------------------
    |
    | This option the language of jenssegers/date library.
    |
    */
    'date'          => false,

    /*
    |--------------------------------------------------------------------------
    | Auto Change Language
    |--------------------------------------------------------------------------
    |
    | This option allows to change website language to user's
    | browser language.
    |
    */
    'auto'          => true,

    /*
    |--------------------------------------------------------------------------
    | Routes Prefix
    |--------------------------------------------------------------------------
    |
    | This option indicates the prefix for language routes.
    |
    */
    'prefix'        => 'languages',

    /*
    |--------------------------------------------------------------------------
    | Middleware
    |--------------------------------------------------------------------------
    |
    | This option indicates the middleware to change language.
    |
    */
    'middleware'    => 'Akaunting\Language\Middleware\SetLocale',

    /*
    |--------------------------------------------------------------------------
    | Controller
    |--------------------------------------------------------------------------
    |
    | This option indicates the controller to be used.
    |
    */
    'controller'    => 'Akaunting\Language\Controllers\Language',

    /*
    |--------------------------------------------------------------------------
    | Flags
    |--------------------------------------------------------------------------
    |
    | This option indicates the flags features.
    |
    */
    'flags'         => ['width' => '22px', 'ul_class' => '', 'li_class' => '', 'img_class' => ''],

    /*
    |--------------------------------------------------------------------------
    | Language code mode
    |--------------------------------------------------------------------------
    |
    | This option indicates the language code and name to be used, short/long
    | and english/native.
    | Short: language code (en)
    | Long: languagecode-COUNTRYCODE (en-GB)
    |
    */
    'mode'          => ['code' => 'short', 'name' => 'english'],

    /*
    |--------------------------------------------------------------------------
    | Allowed languages
    |--------------------------------------------------------------------------
    |
    | This options indicates the language allowed languages.
    |
    */
    'allowed'       => ['en', 'es', 'fr', 'it', 'fa', 'ar'],

    /*
    |--------------------------------------------------------------------------
    | All Languages
    |--------------------------------------------------------------------------
    |
    | This option indicates the language codes and names.
    |
    */
    'all' => [
        ['flag' => 'saudi-arabia.svg',     'short' => 'ar',       'long' => 'ar-SA',      'direction' => 'rtl',       'english' => 'Arabic',              'native' => 'العربية'],
        ['flag' => '',                     'short' => 'az',       'long' => 'az-AZ',      'direction' => 'ltr',       'english' => 'Azerbaijani',         'native' => 'Azərbaycan'],
        ['flag' => '',                     'short' => 'bg',       'long' => 'bg-BG',      'direction' => 'ltr',       'english' => 'Bulgarian',           'native' => 'български'],
        ['flag' => '',                     'short' => 'bn',       'long' => 'bn-BD',      'direction' => 'ltr',       'english' => 'Bengali',             'native' => 'বাংলা'],
        ['flag' => '',                     'short' => 'bs',       'long' => 'bs-BA',      'direction' => 'ltr',       'english' => 'Bosnian',             'native' => 'Bosanski'],
        ['flag' => '',                     'short' => 'ca',       'long' => 'ca-ES',      'direction' => 'ltr',       'english' => 'Catalan',             'native' => 'Català'],
        ['flag' => '',                     'short' => 'cn',       'long' => 'zh-CN',      'direction' => 'ltr',       'english' => 'Chinese_Simplified',  'native' => '简体中文'],
        ['flag' => '',                     'short' => 'cs',       'long' => 'cs-CZ',      'direction' => 'ltr',       'english' => 'Czech',               'native' => 'Čeština'],
        ['flag' => '',                     'short' => 'da',       'long' => 'da-DK',      'direction' => 'ltr',       'english' => 'Danish',              'native' => 'Dansk'],
        ['flag' => '',                     'short' => 'de',       'long' => 'de-DE',      'direction' => 'ltr',       'english' => 'German',              'native' => 'Deutsch'],
        ['flag' => '',                     'short' => 'fi',       'long' => 'fi-FI',      'direction' => 'ltr',       'english' => 'Finnish',             'native' => 'Suomi'],
        ['flag' => 'france.svg',           'short' => 'fr',       'long' => 'fr-FR',      'direction' => 'ltr',       'english' => 'French',              'native' => 'Français'],
        ['flag' => '',                     'short' => 'el',       'long' => 'el-GR',      'direction' => 'ltr',       'english' => 'Greek',               'native' => 'Ελληνικά'],
        ['flag' => 'united-states.svg',    'short' => 'en',       'long' => 'en-US',      'direction' => 'ltr',       'english' => 'English',             'native' => 'English (US)'],
        ['flag' => 'spain.svg',            'short' => 'es',       'long' => 'es-ES',      'direction' => 'ltr',       'english' => 'Spanish',             'native' => 'Español'],
        ['flag' => '',                     'short' => 'et',       'long' => 'et-EE',      'direction' => 'ltr',       'english' => 'Estonian',            'native' => 'Eesti'],
        ['flag' => '',                     'short' => 'he',       'long' => 'he-IL',      'direction' => 'rtl',       'english' => 'Hebrew',              'native' => 'עִבְרִית'],
        ['flag' => '',                     'short' => 'hi',       'long' => 'hi-IN',      'direction' => 'ltr',       'english' => 'Hindi',               'native' => 'हिन्दी'],
        ['flag' => '',                     'short' => 'hr',       'long' => 'hr-HR',      'direction' => 'ltr',       'english' => 'Croatian',            'native' => 'Hrvatski'],
        ['flag' => '',                     'short' => 'hu',       'long' => 'hu-HU',      'direction' => 'ltr',       'english' => 'Hungarian',           'native' => 'Magyar'],
        ['flag' => '',                     'short' => 'hy',       'long' => 'hy-AM',      'direction' => 'ltr',       'english' => 'Armenian',            'native' => 'Հայերեն',],
        ['flag' => '',                     'short' => 'id',       'long' => 'id-ID',      'direction' => 'ltr',       'english' => 'Indonesian',          'native' => 'Bahasa Indonesia'],
        ['flag' => '',                     'short' => 'is',       'long' => 'is-IS',      'direction' => 'ltr',       'english' => 'Icelandic',           'native' => 'Íslenska'],
        ['flag' => 'italy.svg',            'short' => 'it',       'long' => 'it-IT',      'direction' => 'ltr',       'english' => 'Italian',             'native' => 'Italiano'],
        ['flag' => 'iran.svg',             'short' => 'fa',       'long' => 'fa-IR',      'direction' => 'rtl',       'english' => 'Persian',             'native' => 'فارسی'],
        ['flag' => '',                     'short' => 'jp',       'long' => 'ja-JP',      'direction' => 'ltr',       'english' => 'Japanese',            'native' => '日本語'],
        ['flag' => '',                     'short' => 'ka',       'long' => 'ka-GE',      'direction' => 'ltr',       'english' => 'Georgian',            'native' => 'ქართული'],
        ['flag' => '',                     'short' => 'ko',       'long' => 'ko-KR',      'direction' => 'ltr',       'english' => 'Korean',              'native' => '한국어'],
        ['flag' => '',                     'short' => 'lt',       'long' => 'lt-LT',      'direction' => 'ltr',       'english' => 'Lithuanian',          'native' => 'Lietuvių'],
        ['flag' => '',                     'short' => 'lv',       'long' => 'lv-LV',      'direction' => 'ltr',       'english' => 'Latvian',             'native' => 'Latviešu valoda'],
        ['flag' => '',                     'short' => 'mk',       'long' => 'mk-MK',      'direction' => 'ltr',       'english' => 'Macedonian',          'native' => 'Македонски јазик'],
        ['flag' => '',                     'short' => 'ms',       'long' => 'ms-MY',      'direction' => 'ltr',       'english' => 'Malay',               'native' => 'Bahasa Melayu'],
        ['flag' => '',                     'short' => 'mx',       'long' => 'es-MX',      'direction' => 'ltr',       'english' => 'Mexico',              'native' => 'Español de México'],
        ['flag' => '',                     'short' => 'nb',       'long' => 'nb-NO',      'direction' => 'ltr',       'english' => 'Norwegian',           'native' => 'Norsk Bokmål'],
        ['flag' => '',                     'short' => 'ne',       'long' => 'ne-NP',      'direction' => 'ltr',       'english' => 'Nepali',              'native' => 'नेपाली'],
        ['flag' => '',                     'short' => 'nl',       'long' => 'nl-NL',      'direction' => 'ltr',       'english' => 'Dutch',               'native' => 'Nederlands'],
        ['flag' => '',                     'short' => 'pl',       'long' => 'pl-PL',      'direction' => 'ltr',       'english' => 'Polish',              'native' => 'Polski'],
        ['flag' => '',                     'short' => 'pt-BR',    'long' => 'pt-BR',      'direction' => 'ltr',       'english' => 'Brazilian',           'native' => 'Português do Brasil'],
        ['flag' => '',                     'short' => 'pt',       'long' => 'pt-PT',      'direction' => 'ltr',       'english' => 'Portuguese',          'native' => 'Português'],
        ['flag' => '',                     'short' => 'ro',       'long' => 'ro-RO',      'direction' => 'ltr',       'english' => 'Romanian',            'native' => 'Română'],
        ['flag' => '',                     'short' => 'ru',       'long' => 'ru-RU',      'direction' => 'ltr',       'english' => 'Russian',             'native' => 'Русский'],
        ['flag' => '',                     'short' => 'sr',       'long' => 'sr-CS',      'direction' => 'ltr',       'english' => 'Serbian',             'native' => 'Српски језик'],
        ['flag' => '',                     'short' => 'sq',       'long' => 'sq-AL',      'direction' => 'ltr',       'english' => 'Albanian',            'native' => 'Shqip'],
        ['flag' => '',                     'short' => 'sk',       'long' => 'sk-SK',      'direction' => 'ltr',       'english' => 'Slovak',              'native' => 'Slovenčina'],
        ['flag' => '',                     'short' => 'sl',       'long' => 'sl-SI',      'direction' => 'ltr',       'english' => 'Slovenian',           'native' => 'Slovenščina'],
        ['flag' => '',                     'short' => 'sv',       'long' => 'sv-SE',      'direction' => 'ltr',       'english' => 'Swedish',             'native' => 'Svenska'],
        ['flag' => '',                     'short' => 'th',       'long' => 'th-TH',      'direction' => 'ltr',       'english' => 'Thai',                'native' => 'ไทย'],
        ['flag' => '',                     'short' => 'tr',       'long' => 'tr-TR',      'direction' => 'ltr',       'english' => 'Turkish',             'native' => 'Türkçe'],
        ['flag' => '',                     'short' => 'tw',       'long' => 'zh-TW',      'direction' => 'ltr',       'english' => 'Chinese_Traditional', 'native' => '繁體中文'],
        ['flag' => '',                     'short' => 'uk',       'long' => 'uk-UA',      'direction' => 'ltr',       'english' => 'Ukrainian',           'native' => 'Українська'],
        ['flag' => '',                     'short' => 'ur',       'long' => 'ur-PK',      'direction' => 'rtl',       'english' => 'Urdu',                'native' => 'اردو'],
        ['flag' => '',                     'short' => 'uz',       'long' => 'uz-UZ',      'direction' => 'ltr',       'english' => 'Uzbek',               'native' => 'O\'zbek'],
        ['flag' => '',                     'short' => 'vi',       'long' => 'vi-VN',      'direction' => 'ltr',       'english' => 'Vietnamese',          'native' => 'Tiếng Việt'],
    ],
];

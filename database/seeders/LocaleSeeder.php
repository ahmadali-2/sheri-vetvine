<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('locales')->insert([
                ['locale_name' => 'Afrikaans'],
                ['locale_name' => 'Albanian - shqip'],
                ['locale_name' => 'Amharic - አማርኛ'],
                ['locale_name' => 'Arabic - العربية'],
                ['locale_name' => 'Aragonese - aragonés'],
                ['locale_name' => 'Armenilocale_name - հայերեն'],
                [ 'locale_name' => 'Asturilocale_name - asturilocale_nameu'],
                ['locale_name' => 'Azerbaijlocale_namei - azərbaycan dili'],
                ['locale_name' => 'Basque - euskara'],
                ['locale_name' => 'Belarusian - беларуская'],
                ['locale_name' => 'Bengali - বাংলা'],
                ['locale_name' => 'Bosnian - bosanski'],
                ['locale_name' => 'Breton - brezhoneg'],
                ['locale_name' => 'Bulgarian - български'],
                ['locale_name' => 'Catalan - català'],
                ['locale_name' => 'Central Kurdish - کوردی (دەستنوسی عەرەبی)'],
                ['locale_name' => 'Chinese - 中文'],
                ['locale_name' => 'Chinese (Hong Kong) - 中文（香港）'],
                ['locale_name' => 'Chinese (Simplified) - 中文（简体）'],
                ['locale_name' => 'Chinese (Traditional) - 中文（繁體）'],
                ['locale_name' => 'Corsican'],
                ['locale_name' => 'Croatian - hrvatski'],
                ['locale_name' => 'Czech - čeština'],
                ['locale_name' => 'Danish - dansk'],
                ['locale_name' => 'Dutch - Nederlands'],
                ['locale_name' => 'English'],
                ['locale_name' => 'English (Australia)'],
                ['locale_name' => 'English (Canada)'],
                ['locale_name' => 'English (India)'],
                ['locale_name' => 'English (New Zealand)'],
                ['locale_name' => 'English (South Africa)'],
                ['locale_name' => 'English (United Kingdom)'],
                ['locale_name' => 'English (United States)'],
                ['locale_name' => 'Esperanto - esperanto'],
                ['locale_name' => 'Estonian - eesti'],
                ['locale_name' => 'Faroese - føroyskt'],
                ['locale_name' => 'Filipino'],
                ['locale_name' => 'Finnish - suomi'],
                ['locale_name' => 'French - français'],
                ['locale_name' => 'French (Canada) - français (Canada)'],
                ['locale_name' => 'French (France) - français (France)'],
                ['locale_name' => 'French (Switzerland) - français (Suisse)'],
                ['locale_name' => 'Galician - galego'],
                ['locale_name' => 'Georgian - ქართული'],
                ['locale_name' => 'German - Deutsch'],
                ['locale_name' => 'German (Austria) - Deutsch (Österreich)'],
                ['locale_name' => 'German (Germany) - Deutsch (Deutschland)'],
                ['locale_name' => 'German (Liechtenstein) - Deutsch (Liechtenstein)'],
                ['locale_name' => 'German (Switzerland) - Deutsch (Schweiz)'],
                ['locale_name' => 'Greek - Ελληνικά'],
                ['locale_name' => 'Guarani'],
                ['locale_name' => 'Gujarati - ગુજરાતી'],
                ['locale_name' => 'Hausa'],
                ['locale_name' => 'Hawaiian - ʻŌlelo Hawaiʻi'],
                ['locale_name' => 'Hebrew - עברית'],
                ['locale_name' => 'Hindi - हिन्दी'],
                ['locale_name' => 'Hungarian - magyar'],
                ['locale_name' => 'Icelandic - íslenska'],
                ['locale_name' => 'Indonesian - Indonesia'],
                ['locale_name' => 'Interlingua'],
                ['locale_name' => 'Irish - Gaeilge'],
                ['locale_name' => 'Italian - italiano'],
                ['locale_name' => 'Italian (Italy) - italiano (Italia)'],
                ['locale_name' => 'Italian (Switzerland) - italiano (Svizzera)'],
                ['locale_name' => 'Japanese - 日本語'],
                ['locale_name' => 'Kannada - ಕನ್ನಡ'],
                ['locale_name' => 'Kazakh - қазақ тілі'],
                ['locale_name' => 'Khmer - ខ្មែរ'],
                ['locale_name' => 'Korean - 한국어'],
                ['locale_name' => 'Kurdish - Kurdî'],
                ['locale_name' => 'Kyrgyz - кыргызча'],
                ['locale_name' => 'Lao - ລາວ'],
                ['locale_name' => 'Latin'],
                ['locale_name' => 'Latvian - latviešu'],
                ['locale_name' => 'Lingala - lingála'],
                ['locale_name' => 'Lithuanian - lietuvių'],
                ['locale_name' => 'Macedonian - македонски'],
                ['locale_name' => 'Malay - Bahasa Melayu'],
                ['locale_name' => 'Malayalam - മലയാളം'],
                ['locale_name' => 'Maltese - Malti'],
                ['locale_name' => 'Marathi - मराठी'],
                ['locale_name' => 'Mongolian - монгол'],
                ['locale_name' => 'Nepali - नेपाली'],
                ['locale_name' => 'Norwegian - norsk'],
                ['locale_name' => 'Norwegian Bokmål - norsk bokmål'],
                ['locale_name' => 'Norwegian Nynorsk - nynorsk'],
                ['locale_name' => 'Occitan'],
                ['locale_name' => 'Oriya - ଓଡ଼ିଆ'],
                ['locale_name' => 'Oromo - Oromoo'],
                ['locale_name' => 'Pashto - پښتو'],
                ['locale_name' => 'Persian - فارسی'],
                ['locale_name' => 'Polish - polski'],
                ['locale_name' => 'Portuguese - português'],
                ['locale_name' => 'Portuguese (Brazil) - português (Brasil)'],
                ['locale_name' => 'Portuguese (Portugal) - português (Portugal)'],
                ['locale_name' => 'Punjabi - ਪੰਜਾਬੀ'],
                ['locale_name' => 'Quechua'],
                ['locale_name' => 'Romanian - română'],
                ['locale_name' => 'Romanian (Moldova) - română (Moldova)'],
                [ 'locale_name' => 'Romansh - rumantsch'],
                ['locale_name' => 'Russian - русский'],
                ['locale_name' => 'Scottish Gaelic'],
                ['locale_name' => 'Serbian - српски'],
                ['locale_name' => 'Serbo-Croatian - Srpskohrvatski'],
                ['locale_name' => 'Shona - chiShona'],
                ['locale_name' => 'Sindhi'],
                ['locale_name' => 'Sinhala - සිංහල'],
                ['locale_name' => 'Slovak - slovenčina'],
                [ 'locale_name' => 'Slovenian - slovenščina'],
                ['locale_name' => 'Somali - Soomaali'],
                ['locale_name' => 'Southern Sotho'],
                ['locale_name' => 'Spanish - español'],
                ['locale_name' => 'Spanish (Argentina) - español (Argentina)'],
                ['locale_name' => 'Spanish (Latin America) - español (Latinoamérica)'],
                ['locale_name' => 'Spanish (Mexico) - español (México)'],
                ['locale_name' => 'Spanish (Spain) - español (España)'],
                ['locale_name' => 'Spanish (United States) - español (Estados Unidos)'],
                ['locale_name' => 'Sundanese'],
                ['locale_name' => 'Swahili - Kiswahili'],
                ['locale_name' => 'Swedish - svenska'],
                ['locale_name' => 'Tajik - тоҷикӣ'],
                ['locale_name' => 'Tamil - தமிழ்'],
                ['locale_name' => 'Tatar'],
                ['locale_name' => 'Telugu - తెలుగు'],
                ['locale_name' => 'Thai - ไทย'],
                ['locale_name' => 'Tigrinya - ትግርኛ'],
                ['locale_name' => 'Tongan - lea fakatonga'],
                ['locale_name' => 'Turkish - Türkçe'],
                ['locale_name' => 'Turkmen'],
                ['locale_name' => 'Twi'],
                ['locale_name' => 'Ukrainian - українська'],
                ['locale_name' => 'Urdu - اردو'],
                ['locale_name' => 'Uyghur'],
                ['locale_name' => 'Uzbek - o‘zbek'],
                ['locale_name' => 'Vietnamese - Tiếng Việt'],
                ['locale_name' => 'Walloon - wa'],
                ['locale_name' => 'Welsh - Cymraeg'],
                ['locale_name' => 'Western Frisian'],
                ['locale_name' => 'Xhosa'],
                ['locale_name' => 'Yiddish'],
                ['locale_name' => 'Yoruba - Èdè Yorùbá'],
                ['locale_name' => 'Zulu - isiZulu']
            ]);
    }
}

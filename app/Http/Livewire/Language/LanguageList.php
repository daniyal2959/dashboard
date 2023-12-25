<?php

namespace App\Http\Livewire\Language;

use Akaunting\Language\Language;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LanguageList extends Component
{
    public function render()
    {
        $supportedLanguages = LaravelLocalization::getSupportedLocales();
        $supportedLanguages = array_map([$this, 'setProgress'], $supportedLanguages, array_keys($supportedLanguages));

        $locale = App::getLocale();
        return view('livewire.language.language-list', compact('supportedLanguages', 'locale'));
    }

    public function setProgress($language, $excerpt)
    {
        $language['locale'] = $excerpt;

        $languagePathDirectory = lang_path($excerpt);
        $dashboardDirectory = $languagePathDirectory . '/dashboard';
        if( !File::exists($languagePathDirectory) or !File::exists($dashboardDirectory) ) {
            return $language;
        }

        $language['progress'] = [];
        $files = getFiles($dashboardDirectory);
        $total = 0;
        $remaining = 0;
        $filledOut = 0;
        foreach ($files as $file) {
            $filePath = $dashboardDirectory . '/' . $file;
            $contents = include $filePath;
            $total += count($contents);
            $remaining += count(array_filter($contents, fn($item) => $item == null));
            $filledOut = $total - $remaining;
        }

        $language['progress']['total'] = $total;
        $language['progress']['remaining'] = $remaining;
        $language['progress']['filledOut'] = $filledOut;
        $language['progress']['rate'] = floor($filledOut / $total * 100);

        match (true){
            $language['progress']['rate'] <= 33 => $language['progress']['color'] = 'danger',
            $language['progress']['rate'] <= 66 => $language['progress']['color'] = 'warning',
            $language['progress']['rate'] <= 99 => $language['progress']['color'] = 'success',
            $language['progress']['rate'] <= 100 => $language['progress']['color'] = 'primary',
        };
        return $language;
    }
}

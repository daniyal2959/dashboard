<?php

namespace App\Http\Controllers;

use App\Core\KTBootstrap;
use App\Core\Theme;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.apps.management.languages.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $filesContent = $request->input();
        $excerpt = $filesContent['excerpt'];
        unset($filesContent['_token']);
        unset($filesContent['excerpt']);

        foreach ($filesContent as $fileName => $fileContent) {
            if( $fileName == 'dashboard' )
                $filePath = lang_path($excerpt . '/dashboard.php');
            else
                $filePath = lang_path($excerpt . '/dashboard/'.$fileName.'.php');


            $structure = "<?php \nreturn [\n";
            foreach ($fileContent as $key => $value){
                $structure .= "\t'{$key}' => '{$value}',\n";
            }
            $structure .= "];";

            File::put($filePath, $structure);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $excerpt)
    {
        $files = getFiles(lang_path('base/dashboard'));
        $files = array_map(function ($file) use($excerpt){
            $path = createLanguageFile($file, $excerpt);

            $contents = include $path;
            unset($contents['']);

            $name =  explode('.', $file)[0];
            return [
                'name' => $name,
                'langPrefix' => 'dashboard/'.$name.'.',
                'contents' => $contents
            ];
        }, $files);

        $contents = include lang_path($excerpt) . '/dashboard.php';
        unset($contents['']);
        $files[] = [
            'name' => 'dashboard',
            'langPrefix' => 'dashboard.',
            'contents' => $contents
        ];

        $language = LaravelLocalization::getSupportedLocales()[$excerpt];
        $language['excerpt'] = $excerpt;
        $language['name'] = Str::lower($language['name']);

        return view('pages.apps.management.languages.show', compact('language', 'files'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function switch($langLocale)
    {
        LaravelLocalization::setLocale($langLocale);

        $settings = include config_path() . '/settings.php';
        if( $settings['KT_THEME_DIRECTION'] != getLocaleDirection() ){
            $settings['KT_THEME_DIRECTION'] = getLocaleDirection();

            $structure = "<?php \nreturn [\n";
            $structure .= convertConfigArrayToConfigFile($settings);
            $structure .= "];";
            File::put(config_path() . '/settings.php', $structure);
        }

        return redirect(LaravelLocalization::localizeUrl(back()->getTargetUrl()));
    }

    public function evacuate($langLocale)
    {
        File::deleteDirectory(lang_path($langLocale));
        Session::flash('result', [
            'title' => trans('dashboard/language.successful'),
            'message' => trans('dashboard/language.evacuated_message'),
            'status' => 'success'
        ]);
        return back();
    }
}

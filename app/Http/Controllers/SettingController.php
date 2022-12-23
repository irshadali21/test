<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use anlutro\LaravelSettings\Facade as Setting;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Role;
use Illuminate\Http\RedirectResponse;
use Session;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Artisan;
use App;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:update-settings')->except('updateLanguage');
        $this->middleware('permission:view-activity-log', ['only' => ['activity']]);
    }
    public function index() {
        activity('settings')
            ->causedBy(Auth::user())
            ->log('view');
        $title =  'Settings';
        $roles = Role::pluck('name', 'id');
        return view('settings.edit', compact('roles', 'title'));
    }

    public function update(Request $request) {

        foreach ($request->all() as $key => $value) {
            if ($request->company_logo) {
                Setting::set($key, parse_url($value, PHP_URL_PATH));
            }else{
                Setting::set($key, $value);
            }
        }
        Setting::save();
        activity('settings')
            ->causedBy(Auth::user())
            ->withProperties($request->all())
            ->log('updated');
        flash('Settings updated successfully!')->success();
        return back();

    }
    public function activity(Request $request){
        $title= 'Activity Logs';
        activity('activity')
        ->causedBy(Auth::user())
        ->log('view');
        $activities = Activity::paginate(setting('record_per_page', 15));
        return view('settings.activity', compact('activities', 'title'));
    }
    public function updateLanguage(Request $request): RedirectResponse
    {
        $locale = $request->get('locale');
        app()->setLocale($locale);
        Session::forget('locale');
        Session::put('locale', $locale);
        Flash::success(__('lang.updated_successfully', ['operator' => __('lang.app_setting_global')]));
        Artisan::call("config:clear");
        return redirect()->back();
    }

}

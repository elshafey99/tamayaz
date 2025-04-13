<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Settings\SettingRequest;
use App\Models\Setting;
use App\Traits\HasImage;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use HasImage;

    public function show()
    {
        $settings = Setting::first();
        return view('admin.pages.settings.index', compact('settings'));
    }
    public function update(SettingRequest $request, string $id)
    {
        $settings = Setting::findOrFail($id);
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            if ($settings->image) {
                $this->deleteImage($settings->image);
            }
            $validatedData['image'] = $this->saveImage($validatedData['image'], 'settings');
        }

        $settings->update($validatedData);

        return redirect()->route('admin.pages.settings.index')->with('success', 'Setting updated successfully.');
    }
}

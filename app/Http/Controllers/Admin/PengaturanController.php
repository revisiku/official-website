<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Upload;
use App\Http\Requests\Admin\PengaturanRequest;
use App\Models\Pengaturan;
use App\Services\ResponseService;
use Illuminate\Support\Facades\Log;

class PengaturanController extends \App\Http\Controllers\AdminController
{

    protected $pageName = 'Pengaturan';


    public function index()
    {
        foreach (Pengaturan::all() as $data) {
            $data[$data->name] = $data->value;
        }

        return view('admin.contents.pengaturan.index', $data);
    }

    public function update(PengaturanRequest $request)
    {
        try {
            if ($request->hasFile('favicon')
                || $request->hasFile('logo')
                || $request->hasFile('logo_2')
            ) {
                $upload = new Upload();
                $upload->setPath('assets/static/');

                if ($request->hasFile('favicon')) {
                    $this->uploadHandler($upload, $request->file('favicon'), 'favicon', 'favicon');
                }

                if ($request->hasFile('logo')) {
                    $this->uploadHandler($upload, $request->file('logo'), 'logo', 'logo');
                }

                if ($request->hasFile('logo_2')) {
                    $this->uploadHandler($upload, $request->file('logo_2'), 'logo_2', 'logo-putih');
                }
            }

            $this->updateHandler('site_name', $request->site_name);
            $this->updateHandler('tag', $request->tag);
            $this->updateHandler('footer_copyright', $request->footer_copyright);
            $this->updateHandler('nav_animation_text', $request->nav_animation_text);

            return ResponseService::successWithMessage(
                'Pengaturan Website berhasil diperbaharui.', 'pengaturan.index'
            );
        } catch (\Throwable $th) {
            Log::debug($th->getMessage().' in '.$th->getFile());
            return ResponseService::errorWithMessage(
                'Pengaturan Website gagal diperbaharui.', 'pengaturan.index'
            );
        }
    }

    private function uploadHandler($upload, $file, $field, $fileName)
    {
        $check = Pengaturan::where('name', $field)->first();
        $upload->delete($check->value);
        $upload->move($file, $fileName);
        $check->update(['value' => $upload->getFullPath()]);
    }

    private function updateHandler($name, $value)
    {
        Pengaturan::where('name', $name)->update(['value' => $value]);
    }
}

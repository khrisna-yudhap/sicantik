<?php

namespace App\Http\Controllers;

use App\Http\Resources\ModuleResource;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::get();
        return view('modules', [
            "title" => "Modules - SiCantik Admin Panel",
            "pageIndex" => 2,
            "modules" => $modules,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->validate($request, [
                'thumbnail' => 'mimes:png,jpg|image',
                'title' => 'required|max:255',
                'module_content' => 'required|mimes:pdf,doc,docx',
            ]);
        } catch (ValidationException $e) {
            $errors = $e->errors();
            return response()->json(['error' => 'Terjadi Kesalahan', 'errors' => $errors], 422);
        }

        // Check thumbnail
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbName = Str::random(20) . '.' . $thumbnail->getClientOriginalExtension();
        } else {
            $thumbnail = "";
            $thumbName = "defaultThumb.jpg";
        }

        // Check module content
        if ($request->hasFile('module_content')) {
            $module_pdf = $request->file('module_content');
            $moduleName = Str::random(20) . '.' . $module_pdf->getClientOriginalExtension();
        }

        $moduleData = new Module;
        $moduleData->title = $validatedData['title'];
        $moduleData->thumbnail = $thumbName;
        $moduleData->module_content = $moduleName;

        // Module::create($moduleData)
        if ($moduleData->save()) {

            if ($thumbnail != null) {
                $thumbnail->storeAs('public/thumbnail/', $thumbName);
            }

            $module_pdf->storeAs('public/modules/', $moduleName);

            // Generate QR
            // D:\\xampp2\\htdocs\\sicantik\\storage\\app/public/modules/vH040SzK4xTMcvPY787C.pdf
            $qr_link = storage_path('app/public/modules/');
            $qr_data = [
                'id' => $moduleData->id,
                'link' => $qr_link
            ];
            $this->generateQR($qr_data);

            return response()->json(
                ['messages' => 'New Module Created'],
                Response::HTTP_OK
            );
        }
    }

    public function view($id)
    {
        $module = Module::findOrFail($id);
        $pdfFile = $module['module_content'];

        $title = $module['title'];

        return view('read_module', [
            "title" => $title . "- SiCantik Admin Panel",
            "pdf_file" => $pdfFile
        ]);
    }

    public function delete($id)
    {
        $module = Module::findOrFail($id);
        // $module->delete();

        if ($module != null) {
            if ($module->thumbnail != null) {
                $filePath = 'storage/thumbnail/' . $module->thumbnail;

                $thumbExist = File::exists($filePath);

                if ($thumbExist) {
                    File::delete($filePath);
                }
            }

            if ($module->module_content != null) {
                $filePath = 'storage/modules/' . $module->module_content;

                $moduleExist = File::exists($filePath);

                if ($moduleExist) {
                    File::delete($filePath);
                }
            }
        }
        $module->delete();
        return redirect()->back()->withErrors('Data Successfully Deleted.');
    }

    public function generateQR($qr_data)
    {
        $id = $qr_data['id'];

        $module_data = Module::findOrfail($id);
        $qr_link = $qr_data['link'] . $module_data['module_content'];

        $module_data->update(['qr_link' => $qr_link]);
        $module_data->save();
    }

    public function print_out()
    {
        $modules = Module::get();

        return view('print_out', [
            "title" => "Print Out QR - SiCantik Admin Panel",
            "modules" => $modules,
        ]);
    }


    // API
    public function getAllModules()
    {
        $modules = Module::all();
        return ModuleResource::collection($modules);
    }

    public function viewModule($id)
    {
        $module = Module::findOrFail($id);

        if ($module->module_content != null) {
            $fileName = $module->module_content;
            $filePath = storage_path('app/public/modules/') . $fileName;

            if (file_exists($filePath)) {
                return response()->json(
                    [
                        'messages' => 'Successfully get the file path',
                        'data' => [
                            'module_id' => $module->id,
                            'file_path' => $filePath
                        ]
                    ],
                    Response::HTTP_OK
                );
            } else {
                return response()->json(['message' => 'Error getting the file path'], Response::HTTP_NOT_FOUND);
            }
        }


        // dd(response()->file($filePath));
        // return new UserDetailResource($user);
    }
}

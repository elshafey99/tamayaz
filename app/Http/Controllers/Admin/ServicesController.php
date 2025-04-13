<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Services\ServicesRequest;
use App\Models\Service;
use App\Traits\HasImage;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    use HasImage;
    public function __construct(public Service $model) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = $this->model->paginate();
        return view('admin.pages.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicesRequest $request)
    {
        $validatedData = $request->validated();
        if ($validatedData['image']) {
            $validatedData['image'] = $this->saveImage($validatedData['image'], 'services');
        }
        Service::create($validatedData);
        return redirect()->route('admin.services.index')->with('success', 'Services created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $services = Service::findOrFail($id);
        return view('admin.pages.services.edit', compact('services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicesRequest $request, string $id)
    {
        $services = Service::findOrFail($id);
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            if ($services->image) {
                $this->deleteImage($services->image);
            }
            $validatedData['image'] = $this->saveImage($validatedData['image'], 'services');
        }

        $services->update($validatedData);

        return redirect()->route('admin.services.index')->with('success', 'Services updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $services = Service::findOrFail($id);
        if ($services->image) {
            $this->deleteImage($services->image);
        }
        $services->delete();
        return redirect()->route('admin.services.index')->with('success', 'Services deleted successfully.');
    }
}

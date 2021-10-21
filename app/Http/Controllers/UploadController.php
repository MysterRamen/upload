<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;

class UploadController extends Controller
{

    public function index()
    {
        // abort_if(Gate::denies('upload_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $uploads = Upload::all();

        return view('uploads.index', compact('uploads'));
    }

    public function create()
    {
        // abort_if(Gate::denies('upload_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('uploads.create');
    }

    public function store(StoreUploadRequest $request)
    {
        Upload::create($request->validated());

        return redirect()->route('uploads.index');
    }

    public function show(Upload $upload)
    {
        // abort_if(Gate::denies('upload_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('uploads.show', compact('upload'));
    }

    public function edit(Upload $upload)
    {
        // abort_if(Gate::denies('upload_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('uploads.edit', compact('upload'));
    }

    public function update(UpdateUploadRequest $request, Upload $upload)
    {
        $upload->update($request->validated());

        return redirect()->route('uploads.index');
    }

    public function destroy(Upload $upload)
    {
        // abort_if(Gate::denies('upload_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $upload->delete();

        return redirect()->route('uploads.index');
    }
}

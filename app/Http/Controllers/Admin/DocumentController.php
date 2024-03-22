<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Document\StoreRequest;
use App\Http\Requests\Document\UpdateRequest;
use App\Models\Document;
use App\Models\ProjectBlock;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
  public function show($project_slug, $project_block_slug, $item)
  {
    $item = Document::whereId($item)->firstOrFail();
    $user = Auth::user();
    $file_info = [
      'file_name' => pathinfo($item->file, PATHINFO_FILENAME),
      'file_extension' => pathinfo($item->file, PATHINFO_EXTENSION),
      'file_size' => $this->formatSize(Storage::size($item->file))
    ];
    return view('admin.documents.show', compact('user', 'project_slug', 'project_block_slug', 'item', 'file_info'));
  }

  public function create($project_slug, $project_block_slug)
  {
    $user = Auth::user();
    return view('admin.documents.create', compact(
      'user',
      'project_slug',
      'project_block_slug',
    ));
  }
  public function store(StoreRequest $request, $project_slug, $project_block_slug)
  {
    $data = $request->validated();
    if ($request->hasFile('file')) :
      $data['file'] = $this->loadFile($request, $data, 'file');
    endif;
    $document = ProjectBlock::whereSlug($project_block_slug)->firstOrFail();
    $document->documents()->create($data);

    return redirect()->route('admin.projects.project_block_show', [$project_slug, $project_block_slug])->with('status', 'item-created');
  }
  public function edit($project_slug, $project_block_slug, $item)
  {
    $item = Document::whereId($item)->firstOrFail();
    $user = Auth::user();

    return view('admin.documents.edit', compact(
      'user',
      'project_slug',
      'project_block_slug',
      'item'
    ));
  }
  public function update(UpdateRequest $request, $project_slug, $project_block_slug, $item)
  {
    $data = $request->validated();
    if ($request->hasFile('file')) :
      $data['file'] = $this->loadFile($request, $data, 'file');
    endif;
    $item = Document::whereId($item)->firstOrFail();
    $item->update($data);


    return redirect()->route('admin.projects.project_block_show', [$project_slug, $project_block_slug])->with('status', 'item-updated');
  }

  public function destroy($project_slug, $project_block_slug, $item)
  {

    $item = Document::whereId($item)->firstOrFail();
    $item->delete();
    return redirect()->route('admin.projects.project_block_show', [$project_slug, $project_block_slug])->with('status', 'item-deleted');
  }
  protected function loadFile(Request $request, $data, $key)
  {

    // Имя и расширение файла
    $filenameWithExt = $request->file($key)->getClientOriginalName();
    // Только оригинальное имя файла
    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    $filename = str_replace(' ', '_', $filename);
    // Расширение
    $extention = $request->file($key)->getClientOriginalExtension();
    // Путь для сохранения
    $fileNameToStore = "$key/" . $filename . "_" . time() . "." . $extention;
    // Сохраняем файл
    $data = $request->file($key)->storeAs('public', $fileNameToStore);
    return $data;
  }

  function formatSize($bytes)
  {

    if ($bytes >= 1073741824) {
      $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
      $bytes = number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
      $bytes = number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
      $bytes = $bytes . ' байты';
    } elseif ($bytes == 1) {
      $bytes = $bytes . ' байт';
    } else {
      $bytes = '0 байтов';
    }

    return $bytes;
  }

}

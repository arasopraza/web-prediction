<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
 
class IndexController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index(): View
    {
      return view('index');
    }

    public function upload(Request $request)
    {
      $validatedData = $request->validate([
        'komoditas' => 'required|max:255',
        'file' => 'required'
      ], [
        'komoditas.required' => 'Komoditas tidak boleh kosong!',
        'file.required' => 'File tidak boleh kosong!',
      ]);
      // http://103.186.0.104:4000/uploader
      $api = 'http://127.0.0.1:5000/uploader';
      $komoditas = $request["komoditas"];
      $file = $request->file('file');
      $response = Http::attach('file', file_get_contents($file->getRealPath()), $file->getClientOriginalName())->post($api, [
        'komoditas' => $komoditas,
      ]);

      $message = $response->json()["message"];
      $data = $response->json()["data"];
      $statusCode = $response->status();

      if ($statusCode == 200) {
        session()->flash('message', $message);
        session()->flash('data', $data);
        session()->flash('messageType', 'success');
      } else {
        session()->flash('message', $message);
        session()->flash('data', 'kosong');
        session()->flash('messageType', 'danger');
      }

      // return redirect()->back();
      return redirect('/show')->with('data', $data)->with('komoditas', $komoditas);
    }

    public function show(): View
    {
      $data = session('data');
      $komoditas = session('komoditas');
      return view('show', compact('data', 'komoditas'));
    }

    public function cleaning(Request $request)
    {
      $komoditas = $request->query('komoditas');
      $api = 'http://127.0.0.1:5000/data-cleaning?komoditas='.urlencode($komoditas);
      $response = Http::get($api);
      $data = $response->json()["data"];
      $message = $response->json()["message"];
      if ($message == "Success get outliers") {
        return view('cleaning', ['data' => $data, 'komoditas' => $komoditas]);
      } else {
        $message = $response->json()["message"];
        session()->flash('message', $message);
        return redirect('/show')->with('komoditas', $komoditas)->with('message', $message);
      }
      return view('cleaning', ['message' => $message, 'data' => $data, 'komoditas' => $komoditas]);
    }

    public function binning(Request $request)
    {
      $komoditas = $request->query('komoditas');
      $api = 'http://127.0.0.1:5000/binning-data?komoditas='.urlencode($komoditas);
      $response = Http::get($api);
      $data = $response->json()["data"];
      $statusCode = $response->status();

      if ($statusCode == 200) {
        session()->flash('message', 'Success');
        session()->flash('data', $data);
        session()->flash('messageType', 'success');
      } else {
        session()->flash('message', 'Failure');
        session()->flash('data', 'kosong');
        session()->flash('messageType', 'danger');
      }

      return view('binning', ['data' => $data, 'komoditas' => $komoditas]);
    }

    public function proses(Request $request)
    {
      if (session()->has('komoditas')) {
        $komoditas = session('komoditas');
      } else {
        $komoditas = $request->query('komoditas');
      }
      $api = 'http://127.0.0.1:5000/train-model?komoditas='.$komoditas;
      $response = Http::get($api);
      $data = $response->json();
      return view('hasil', ['data' => $data]);
    }
}
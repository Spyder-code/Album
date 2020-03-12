<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Customer;
use App\Layouts;
use App\UserLayout;
use ZipArchive;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    public function upload(Customer $customer)
    {
        $a = 1;
        $id = $customer->id;
        $nama = $customer->nama;
        $layouts = Layouts::all();
        $userLayouts = UserLayout::all()->where('id_user', '=', $id);
        $album = DB::table('albums')
            ->join('customers', 'customers.id', '=', 'albums.id_user')
            ->select('customers.nama', 'customers.id as id_customer', 'albums.*')
            ->where('id_user', '=', $id)
            ->get();
        $hasil = 0;
        return view('user.upload', [
            'album' => $album,
            'id' => $id,
            'nama' => $nama,
            'layouts' => $layouts,
            'userLayouts' => $userLayouts,
            'hasil' => $hasil,
            'customer' => $customer,
            'a' => $a
        ]);
    }

    public function preview(Request $request)
    {
        $a = 0;
        $id = $request->id;
        $nama = $request->nama;
        $customer = Customer::all()->where('id', $id);
        $layouts = Layouts::all();
        $userLayouts = UserLayout::all()->where('id_user', '=', $id);
        $album = DB::table('albums')
            ->join('customers', 'customers.id', '=', 'albums.id_user')
            ->select('customers.nama', 'customers.id as id_customer', 'albums.*')
            ->where('id_user', '=', $id)
            ->get();
        return view('user.preview', [
            'album' => $album,
            'id' => $id,
            'nama' => $nama,
            'layouts' => $layouts,
            'userLayouts' => $userLayouts,
            'customer' => $customer,
            'a' => $a
        ]);
    }

    public function print(Customer $customer)
    {
        $id = $customer->id;
        $album = DB::table('albums')
            ->join('customers', 'customers.id', '=', 'albums.id_user')
            ->select('customers.nama', 'customers.id as id_customer', 'albums.*')
            ->where('id_user', '=', $id)
            ->get();
        return view('user.print', [
            'album' => $album,
            'id' => $id
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request)
    {
        $zip = new ZipArchive;

        $fileName = $request->nama . '.zip';

        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE) {
            $files = File::files(public_path('assets/images/' . $request->nama . '*'));

            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

            $zip->close();
        }

        return response()->download(public_path($fileName));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Customer $customer, Request $request)
    {
        $album = DB::table('albums')
            ->join('customers', 'customers.id', '=', 'albums.id_user')
            ->select('customers.nama', 'customers.id as id_customer', 'albums.*')
            ->where('id_user', '=', $customer->id)
            ->get();
        $total = $album->count();
        $request->validate([
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $nama = $customer->nama;
        $id = $customer->id;
        if ($request->file('image')) {
            foreach ($request->file('image') as $photo) {
                $file = $photo;
                $size = getimagesize($file);
                $width = $size[0];
                $height = $size[1];
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = date('His') . '_' . $filename;
                $pictures[] = $picture;
                $file->move(public_path('assets/images/' . $nama), $picture); // upload path
                $postArray = ['image' => $picture,];
                $insert['image'] = "$picture";

                $total = $total + 1;
                $data = new Album();
                $data->image = "$picture";
                $data->id_user = $id;
                $data->width = $width;
                $data->height = $height;
                $data->order = $total;
                $data->save();
            }
        }

        // $imageName = time().'.'.$request->image->extension();
        // $request->image->move(public_path('assets/images'), $imageName);
        return redirect('upload/' . $id);
    }

    public function bgUpload(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $nama = $request->nama;
        $id = $request->id;
        if ($request->file('image')) {
            foreach ($request->file('image') as $photo) {
                $file = $photo;
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = date('His') . '_' . $filename;
                $pictures[] = $picture;
                $file->move(public_path('assets/images/' . $nama), $picture); // upload path
                $postArray = ['image' => $picture,];
                $insert['image'] = "$picture";

                Customer::where('id', $request->id)->update([
                    'background' => "$picture"
                ]);
                return redirect('upload/' . $id);
            }
        } else {
            return redirect('upload/. $id');
        }
    }


    public function TambahCustomer(Request $request)
    {
        $data = new Customer;
        $data->nama = $request->user;
        $data->background = null;
        $data->header = null;
        $data->save();

        $id = $data->id;

        return redirect('upload/' . $id);
    }

    public function layouts(Request $request)
    {
        $data = new UserLayout();
        $data->id_user = $request->id_user;
        $data->id_layout = $request->id_layouts;
        $data->save();

        $id = $request->id_user;

        return redirect('upload/' . $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album, Request $request)
    {
        if (File::exists(public_path('assets/images/' . $request->nama . '/' . $album->image))) {

            File::delete(public_path('assets/images/' . $request->nama . '/' . $album->image));
            Album::destroy($album->id);
        }
        $id_customer = $request->id_customer;
        return redirect('upload/' . $id_customer);
    }

    public function destroyLayout(Request $request)
    {
        UserLayout::destroy($request->id);

        $id_customer = $request->id_user;
        return redirect('upload/' . $id_customer);
    }
}

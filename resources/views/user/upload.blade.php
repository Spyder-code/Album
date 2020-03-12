    @extends('layouts.user')
    @section('title','Uploads')
    @section('container')

    <div class="container-fluid sticky-top">
        <div class="row">
            <div class="col">
                <div class="btn-group ml-5 mt-2">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tambah layout
                    </button>
                    <div class="dropdown-menu">
                        @foreach ($layouts as $item)
                        <form action="{{url('layouts')}}" method="get" class="dropdown-item">
                        @csrf
                            <input type="hidden" name="id_user" value="{{$id}}">
                            <input type="hidden" name="id_layouts" value="{{$item->id}}">
                            <p class="text-center">{{$item->nama}}</p>
                            <img src="{{asset('assets/images/layouts/'.$item->image)}}" onclick="submit()" width="100%" height="70px">
                        </form>
                        <hr>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col mt-2 mr-5">
                <form action="{{ url('preview') }}" method="get">
                    <input type="hidden" name="nama" value="{{ $customer->nama }}">
                    <input type="hidden" name="id" value="{{ $customer->id }}">
                    <button type="submit" class="btn btn-info float-right ml-2 d-inline">Preview</button>
                </form>
            </div>
        </div>
    </div>

        <div class="container mt-5">
            <div class="print-layouts">
                @section('bg',asset('assets/images/'.$customer->nama.'/'.$customer->background))
                @foreach ($userLayouts as $item)
            <div hidden>{{$hasil = session()->get('angka')}} </div>
                @include('templates/'.$item->id_layout)
                @endforeach
            </div>
        </div>

        @endsection



        @section('sidebar')

    {{-- upload file --}}
    <div class="container sticky-top">
        <div class="card">
            <div class="card-header bg-info">
                    <div class="text-center">
                        <h6>Background</h6>
                    </div>
            </div>
            <div class="card-body">
                <form  method="post" action="{{url('bgUpload')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="file" id="image" name="image[]"/>
                    <input type="hidden" name="nama" value="{{ $customer->nama }}">
                    <input type="hidden" name="id" value="{{ $customer->id }}">
                    <button type="submit" class="btn btn-success mt-2">Submit</button>
                </form>
                @if ($customer->background!=null)
                <div class="card mt-3" style="height:100px">
                    <img src="{{asset('assets/images/'.$customer->nama.'/'.$customer->background)}}" draggable="true" ondragstart="drag(event)" id="picture">
                </div>
                @endif
                <hr>
            </div>
        </div>
            <div class="card mt-5">
                <div class="card-header text-center bg-warning">
                    Item
                </div>
                <div class="card-body">
                    <form  method="post"  enctype="multipart/form-data">
                        @csrf
                        <input type="file" id="image" name="image[]" multiple />
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                        <br>
                        <button type="submit" class="btn btn-success mt-2">Submit</button>
                    </form>
                    <div class="row">
                    @foreach ($album as $item)
                        <div class="col col-3">
                            <div class="card mt-3">
                                <form action="{{url('hapus/'.$item->id)}}" method="get">
                                    @csrf
                                    <input type="hidden" name="id_customer" value="{{$item->id_customer}}">
                                    <input type="hidden" name="nama" value="{{$item->nama}}">
                                <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </form>
                                <img src="{{asset('assets/images/'.$item->nama.'/'.$item->image)}}" width="151" height="100" draggable="true" ondragstart="drag(event)" id="picture">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

    </div>

    @endsection



<div class="page-break"></div>
@if ($a==1)
<form action="{{url('layouts/'.$item->id)}}" method="get">
    @csrf
    <input type="hidden" name="id_user" value="{{$item->id_user}}">
    <input type="hidden" name="id" value="{{$item->id}}">
    <button type="submit" class="close ml-2" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</form>
@endif
<div class="container mt-5 mb-5">
    <div class="card" style="background-image:url(@yield('bg')); border-color:black;" id="layout">
        <div class="row mt-5 mb-2 ml-5 mr-5">
            <div class="col col-4">
                <div id="c" class="card" style="height:130px; border-color:black" ondrop="drop(event)" ondragover="allowDrop(event)">
                    @if ($loop->iteration==1)
                    <div hidden>{{$hasil = 1}}</div>
                            @foreach ($album as $item)
                            @if ($item->order==1)
                            <img src="{{asset('assets/images/'.$item->nama.'/'.$item->image)}}" class="image-thumbnail" draggable="true" ondragstart="drag(event)" id="picture">
                            @endif
                            @endforeach
                    @else
                        <div hidden>
                        {{ $hasil=$hasil+1}}
                            </div>
                            @foreach ($album as $item)
                            @if ($item->order==$hasil)
                            <img src="{{asset('assets/images/'.$item->nama.'/'.$item->image)}}" class="image-thumbnail" draggable="true" ondragstart="drag(event)" id="picture">
                            @endif
                            @endforeach
                    @endif
                </div>
                <div id="c" class="card mt-3" style="height:130px; border-color:black" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div hidden>
                    {{ $hasil=$hasil+1}}
                        </div>
                        @foreach ($album as $item)
                        @if ($item->order==$hasil)
                        <img src="{{asset('assets/images/'.$item->nama.'/'.$item->image)}}" class="image-thumbnail" draggable="true" ondragstart="drag(event)" id="picture">
                        @endif
                        @endforeach
            </div>
            </div>
            <div class="col col-8 mb-3">
                <div id="c" class="card" style="height:280px; border-color:black" ondrop="drop(event)" ondragover="allowDrop(event)">
                        <div hidden>
                        {{ $hasil=$hasil+1}}
                            </div>
                            @foreach ($album as $item)
                            @if ($item->order==$hasil)
                            <img src="{{asset('assets/images/'.$item->nama.'/'.$item->image)}}" class="image-thumbnail" draggable="true" ondragstart="drag(event)" id="picture">
                            @endif
                            @endforeach
                </div>
            </div>
        </div>

        <div class="row mb-5 ml-5 mr-5">
            <div class="col">
                <div id="c" class="card" style="height:190px; border-color:black" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div hidden>
                        {{ $hasil=$hasil+1}}
                            </div>
                            @foreach ($album as $item)
                            @if ($item->order==$hasil)
                            <img src="{{asset('assets/images/'.$item->nama.'/'.$item->image)}}" class="image-thumbnail" draggable="true" ondragstart="drag(event)" id="picture">
                            @endif
                            @endforeach
                </div>
            </div>
            <div class="col">
                <div id="c" class="card" style="height:190px; border-color:black" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div hidden>
                        {{ $hasil=$hasil+1}}
                            </div>
                    @foreach ($album as $item)
                            @if ($item->order==$hasil)
                            <img src="{{asset('assets/images/'.$item->nama.'/'.$item->image)}}" class="image-thumbnail" draggable="true" ondragstart="drag(event)" id="picture">
                            @endif
                            @endforeach
                </div>
            </div>
            <div class="col">
                <div id="c" class="card" style="height:190px; border-color:black" ondrop="drop(event)" ondragover="allowDrop(event)">
                        <div hidden>
                        {{ $hasil=$hasil+1}}
                            </div>
                    @foreach ($album as $item)
                            @if ($item->order==$hasil)
                            <img src="{{asset('assets/images/'.$item->nama.'/'.$item->image)}}" class="image-thumbnail" draggable="true" ondragstart="drag(event)" id="picture">
                            @endif
                            @endforeach
                            {{ session()->put('angka',$hasil) }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-break"></div>


@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
    <h1>{{ $viewData["concert"]->getVenue() }}</h1>
    <h2>{{ $viewData["concert"]->getConcertDateTime() }}</h2>

    @if($errors->any())
    <div class="card mb-4">
        <div class="card-header">
            Oops - Error!
        </div>
        <div class="card-body">
            <ul class="alert alert-danger list-unstyled">
                @foreach ($errors->all() as $error)
                    <li> - {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <div class="container">

        <!-- TABLE HEADER -->
        <div class="row">
            <div class="col-1">Item #</div>
            <div class="col-2">Move</div>
            <div class="col-5">Piece of Music</div>
            <div class="col-2">Move</div>
            <div class="col-2">Remove</div>
        </div>

        <!-- 
            ONE ROW per programme item with:
            - Order number
            - [Move Up] button (All rows EXCEPT first)
            - Musical item Title
            - [Move Down] button. (All rows EXCEPT last)
            - [DELETE] button. (All rows)
        -->
        @foreach($viewData["programme_items"] as $programme_item)

            <div class="row">
                <div class="col-1">
                    <input type="hidden" name="concert_id[]" value="{{ $viewData["concert"]->getId() }}" class="form-control" />
                    <input type="hidden" name="id[]" value="{{ $programme_item->getId() }}" class="form-control" />
                    <input type="hidden" name="order[]" value="{{ $programme_item->getOrder() }}" class="form-control" />
                    {{ $programme_item->getOrder() }}
                </div>

                @if ($loop->first)
                    <div class="col-2">
                    &nbsp;
                    </div>
                @else
                    <div class="col-2">
                        <form action="{{ route('admin.programme.moveup', $programme_item->getId()) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-primary">
                                <i class="bi-arrow-up-square"> UP</i>
                            </button>
                        </form>
                    </div>
                @endif

                <div class="col-5">
                    {{ $programme_item->title }}
                </div>

                @if ($loop->last)
                    <div class="col-2">
                        &nbsp;
                    </div>
                @else
                    <div class="col-2">
                        <form action="{{ route('admin.programme.movedown', $programme_item->getId()) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-primary">
                                <i class="bi-arrow-down-square"> DOWN</i>
                            </button>
                        </form>
                    </div>
                @endif
                <div class="col-2">
                    <form action="{{ route('admin.programme.deleteItem', $programme_item->getId()) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                            <i class="bi-trash"> </i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    
        <!-- 
            Row with music selector and [Add] button. to allow user to ADD a piece of music to the programme
        -->
        <form action="{{ route('admin.programme.create', $viewData["concert"]->getId()) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-1">&nbsp;</div>
                <div class="col-2">&nbsp;</div>
                <div class="col-5">
                    <input type="hidden" name="add_concert_id" value="{{ $viewData["concert"]->getId() }}">
                    <select name="add_music_id" class="form-control">
                        @foreach($viewData["music"] as $piece)
                        <option value="{{ $piece['id'] }}">{{ $piece['title'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <button class="btn btn-success">
                        <i class="bi-plus-square"> Add</i>
                    </button>
                </div>
                <div class="col-2">&nbsp;</div>
            </div>
        </form>
    <!-- END CONTAINER -->
    </div>    
@endsection

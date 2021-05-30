@extends('main')

@section('title', 'Partner')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Partner</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Partner</a></li>
                        <li class="active">Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    
    <div class="content mt-3">

        <div class="animated fadeIn">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status')}}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Data Partner</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('partner/add') }}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i> Add
                        </a>
                    </div>
                </div>
            <div class="card-body table-responsive">
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                                <th>No.</th>
                                <th>Nama Partner</th>
                                <th>Kategori</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th></th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($partner as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->nohp }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('partner/edit/' .$item->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ url('partner/' .$item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data?')">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                               
                           @endforeach
                       </tbody>
                   </table>
                </div>
        
        </div>
    </div>

    
    </div>
@endsection
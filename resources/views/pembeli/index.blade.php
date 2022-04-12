@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>CRUD LARAVEL 8</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('pembeli.create') }}"> Input Pembeli</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="280px"class="text-center">Nama</th>
            <th width="280px"class="text-center">Email</th>
            <th width="280px"class="text-center">No Telpon</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($pembelis as $pembeli)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $pembeli->name }}</td>
            <td>{{ $pembeli->email }}</td>
            <td>{{ $pembeli->no_telp }}</td>
            <td class="text-center">
                <form action="{{ route('pembeli.destroy',$pembeli->id) }}" method="POST">

                   <a class="btn btn-info btn-sm" href="{{ route('pembeli.show',$pembeli->id) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('pembeli.edit',$pembeli->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
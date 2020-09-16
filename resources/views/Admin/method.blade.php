@extends('Admin.Layout.layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Account Name and Number</h3>
                            <div class="card-tools">
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-download"></i>
                                </a>
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                <tr>
                                    <th>Method Name</th>
                                    <th>Account Number</th>
                                    <th>Account Role</th>
                                    <th>More</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($method as $m)
                                <tr>
                                    <td>
                                        <img src="" class="img-circle img-size-32 mr-2">
                                        {{$m['name']}}
                                    </td>
                                    <td>{{$m['account']}}</td>
                                    <td>
                                        {{\App\Helpers\Helper::stringModify($m['role'])}}
                                    </td>
                                    <td>
                                        <a href="{{route('admin.showUpdateMethod',['name'=>$m['name']])}}" class="text-muted">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form id="delete" style="display: inline-block" action="{{route('admin.deleteMethod',['id'=>$m['id']])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="border: none;background-color: white"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <a class="btn btn-primary" href="{{route('admin.addMethod')}}" role="button">Add</a>
                </div>
            </div>
        </div>
    </section>
@endsection

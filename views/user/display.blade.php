@extends('adminLayouts.layout')
@section('content')
    <h1><b>Users</b></h1>

    <hr>

    <div ><a href="/admin/user/add" style="text-decoration: none;"><i class="fas fa-plus-square fa-3x"  title="New Post"></i></a></div>
    <div><table class="col-12 table table-bordered" id="table">
            <thead>
            <tr style="max-height: 30px">
                <th style="width: 5px">#</th>
                <th style="width: 5px; min-width: 200px;">User</th>
                <th >email</th>
                <th>type</th>
                <th colspan="2" ></th>

            </tr>
            </thead>
            <tbody>
            <div >
                @foreach ($users as $user)
                <tr>


                    <th>{{$user->id}}</th>
                    <td>{{$user->login}}</td>

                    <td style="max-height: 10px"><div class="box" style="max-height: 40px; ">{{$user->email}}</div></td>
                    <td>{{$user->type}}</td>
                    <td><div ><a href="/admin/user/edit/{{$user->id}}"><i class="fa fa-edit fa-2x edit" title="edit"></i></a></div></td>
                    <td><div ><a href="/admin/user/delete/{{$user->id}}"><i class="fas fa-trash fa-2x remove" title="remove"></i></a></div></td>

                </tr>
                @endforeach
            </div>
            </tbody>
        </table></div>
@endsection

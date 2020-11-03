@extends('adminLayouts.layout')
@section('content')
    <h1><b>Posts</b></h1>

    <hr>

    <div style="text-align: center;"><a href="/admin/posts/add" style="text-decoration: none;"><i class="fas fa-plus-square fa-3x"  title="New Post"></i></a></div>
    <div style="text-align: center; ">
        <table class="col-12 table table-bordered" id="table">
            <thead>
            <tr style="max-height: 30px">
                <th style="width: 5px">#</th>
                <th style="width: 5px">Author</th>
                <th >title</th>
                <th >description</th>
                <th colspan="2" ></th>

            </tr>
            </thead>
            <tbody>
            <div class="admin_pagination">
            </div>
            <div >
                @foreach ($posts as $post)
                <tr>
                <th>{{$post->getId()}}</th>
                <td>{{$post->user()->login}}</td>
                <td>{{$post->title}}</td>
                <td style="max-height: 10px"><div class="box" style="max-height: 40px; "><p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$post->content}}</p></div></td>

                <td><div ><a href="/admin/posts/edit/{{$post->getId()}}"><i class="fa fa-edit fa-2x edit" title="edit"></i></a></div></td>
                <td><div ><a href="/admin/posts/delete/{{$post->getId()}}"><i class="fas fa-trash fa-2x remove" title="remove"></i></a></div></td>
                </tr>
                @endforeach

            </div>
            </tbody>
        </table>
        <div class="admin_pagination">

        </div>
    </div>
@endsection

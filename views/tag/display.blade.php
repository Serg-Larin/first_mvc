@extends('adminLayouts.layout')
@section('content')
    <h1><b>Tags</b></h1>

    <hr>

    <div ><a href="/admin/tag/add" style="text-decoration: none;"><i class="fas fa-plus-square fa-3x"  title="New Post"></i></a></div>
    <div style="text-align: center; "><table class="col-6 table table-bordered" id="table">
            <thead>
            <tr style="max-height: 30px">
                <th style="width: 5px">#</th>
                <th style="width: 5px">Tag</th>
                <th>created_at</th>
                <th>updated_at</th>

                <th colspan="2" ></th>

            </tr>
            </thead>
            <tbody>
            <div>
                @foreach ($tags as $tag)
                <tr>
                    <th>{{$tag->id}}</th>
                    <td>{{$tag->name}}</td>
                    <td>{{$tag->created_at}}</td>
                    <td>{{``$tag->$updated_at}}</td>
                    <td><div ><a href="/admin/tag/edit/{{$tag->id}}"><i class="fa fa-edit fa-2x edit" title="edit"></i></a></div></td>
                    <td><div ><a href="/admin/tag/delete/{{$tag->id}}"><i class="fas fa-trash fa-2x remove" title="remove"></i></a></div></td>
                </tr>
                @endforeach
            </div>
            </tbody>
        </table></div>
    <script>
        import {toastr} from 'toastr';
        toastr.info('qwe');
    </script>
@endsection

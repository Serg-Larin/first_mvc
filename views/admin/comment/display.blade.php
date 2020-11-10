@extends('admin.adminLayouts.layout')
@section('content')
    <h1><b>Comments</b></h1>

    <hr>
    <form action="/admin/comment/edit" method="post">
    <div style="height: 25px">
        <div class="redact_panel" style="display: none;">
            <button type="submit" class="btn btn-danger">Редактировать</button>
            <button type="submit" class="btn btn-warning">Удалить</button>
        </div>
    </div>
    <div style="text-align: center; "><table class="col-6 table table-bordered" id="table">
            <thead>
            <tr style="max-height: 30px">
                <th style="width: 5px"></th>
                <th style="width: 5px">#</th>
                <th style="width: 5px">Email</th>
                <th >Content</th>
                <th >Created_at</th>
                <th >Updated_at</th>

                <th colspan="2" ></th>

            </tr>
            </thead>
            <tbody>
            <div>
                @foreach ($comments as $comment)
                    <tr>
                        <th><input type="checkbox" name="check{{$comment->id}}" value="{{$comment->id}}" class="check"></th>
                        <th>{{$comment->id}}</th>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->content}}</td>
                        <td>{{$comment->created_at}}</td>
                        <td>{{$comment->updated_at}}</td>
                        <td><div ><a href="/admin/comment/edit/{{$comment->id}}"><i class="fa fa-edit fa-2x edit" title="edit"></i></a></div></td>
                        <td><div ><a href="/admin/comment/delete/{{$comment->id}}"><i class="fas fa-trash fa-2x remove" title="remove"></i></a></div></td>
                        </tr>
                @endforeach
            </div>

            </tbody>
        </table></div>
    </form>
    <script>
        $('.check').on('click', function () {
            let data = [];
            let checked = $('input:checkbox:checked');
            if(checked.length>0){
                $('.redact_panel').css('display', 'block');
                // checked.each(function (index){
                //     data.push($(this).val());
                // })

            } else {
                $('.redact_panel').css('display', 'none');
            }


        })

    </script>
    @endsection

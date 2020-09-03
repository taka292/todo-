@extends('layouts.admin')
@section('title', '記載済みのtodo')

@section('content')
<div class="container">
    <div class="row">
        <h2>todo一覧</h2>
    </div>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ action('Admin\TodosController@add') }}" role="button" class="btn btn-primary">新規作成</a>
        </div>
        <div class="col-md-8">
            <form action="{{ action('Admin\TodosController@index') }}" method="get">
                <div class="form-group row">
                    <label class="col-md-2">todo</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                    </div>
                    <div class="col-md-2">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="検索">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="list-news col-md-12 mx-auto">
            <div class="row">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th width="40%">やること</th>
                            <th width="30%">いつまでに</th>
                            <th width="10%">操作</th>
                            {{-- <th width="50%">本文</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $todos)
                        <tr>
                            <th>{{ $todos->id }}</th>
                            <td>{{ \Str::limit($todos->title, 100) }}</td>
                            <td>{{ \Str::limit($todos->date, 100) }}</td>
                            <td>
                                <div>
                                    <a href="{{ action('Admin\TodosController@edit', ['id' => $todos->id]) }}">編集</a>
                                </div>
                                <div>
                                    <a href="{{ action('Admin\TodosController@delete', ['id' => $todos->id]) }}">削除</a>
                                </div>
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

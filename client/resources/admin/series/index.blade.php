@extends('adminlte::page')
@section('title', 'Diziler Sayfası - AnimeTurk')
@section('content_header')
    <div class="row">
        <div class="col-auto">
            <h1>Diziler</h1>
        </div>
        <div class="col-auto">
            <a href="{{route("series.create")}}" class="btn btn-success btn-sm">Yeni Ekle</a>
        </div>
    </div>
@stop
@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Tüm Diziler</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">Id</th>
                    <th style="width: 150px">Dizi İsmi</th>
                    <th style="width: 170px">Dizinin Orijinal İsmi</th>
                    <th>Slug</th>
                    <th>Youtube Fragman Keyi</th>
                    <th style="width: 150px">IMDB ID</th>
                    <th style="width: 150px">İlk Yayımlanma</th>
                    <th style="width: 100px"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->show_title}}</td>
                        <td>{{$item->original_title ? $item->original_title : "Yok"}}</td>
                        <td>{{$item->slug}}</td>
                        <td>{{$item->youtube_key}}</td>
                        <td>{{$item->imdb_id}}</td>
                        <td>{{$item->release}}</td>
                        <td>
                            <a href="" class="btn btn-sm float-left" title="Düzenle">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="" method="post">
                                @csrf
                                {{method_field("DELETE")}}
                                <button type="submit" class="btn btn-sm float-left" title="Sil" onclick="return confirm('Silmek üzeresiniz')">
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
@stop

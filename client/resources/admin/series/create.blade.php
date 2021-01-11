@extends('adminlte::page')
@section('title', 'Etkinlik Takvimi')
@section('content_header')
    <h1>Yeni Dizi</h1>
@stop
@section('content')
    <div class="card card-default mb-5">
        <div class="card-header">
            <h3 class="card-title">Yeni Dizi Oluştur</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-success" onclick="document.getElementById('activity-form').submit()">Kaydet</button>
            </div>
        </div>
        <form action="{{route("series.store")}}" method="POST" id="activity-form"  enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Dizi İsmi</label>
                    <input type="text" class="form-control" placeholder="Dizi İsmi" name="show_title" id="show-title">
                </div>
                <div class="form-group">
                    <label>Dizi Orijinal İsmi (Eğer Varsa)</label>
                    <input type="text" class="form-control" placeholder="Dizi Orijinal İsmi" name="original_title">
                </div>
                <div class="form-group">
                    <label>Dizi IMDB ID</label>
                    <input type="text" class="form-control" placeholder="IMDB ID" name="imdb_id">
                </div>
                <div class="form-group">
                    <label for="image_input">Dizi Posterini Seçin</label>
                    <input type="file" class="form-control" id="image_input" name="poster">
                </div>
                <div class="form-group">
                    <label for="image_input">Dizi Arka Posterini Seçin</label>
                    <input type="file" class="form-control" id="image_input" name="back_poster">
                </div>
                <div class="form-group">
                    <label>Dizi YouTube Fragman Key</label>
                    <input type="text" class="form-control" placeholder="YouTube Fragman Key" name="youtube_key">
                </div>
                <div class="form-group">
                    <label>Dizi İlk Çıkış Yılı</label>
                    <input type="number" class="form-control" placeholder="İlk Çıkış Yılı" name="release">
                </div>
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" class="form-control" placeholder="Slug" name="slug" id="slug" readonly>
                </div>


            </div>
        </form>
    </div>
    @push('js')
    <script>
        $('#show-title').on('input',function(e){
              $('#slug').val(slugify($('#show-title').val()));

         });
        function slugify(string) {
            const a = 'àáâäæãåāăąçćčđďèéêëēėęěğǵḧîïíīįìłḿñńǹňôöòóœøōõőṕŕřßśšşșťțûüùúūǘůűųẃẍÿýžźż·/_,:;'
            const b = 'aaaaaaaaaacccddeeeeeeeegghiiiiiilmnnnnoooooooooprrsssssttuuuuuuuuuwxyyzzz------'
            const p = new RegExp(a.split('').join('|'), 'g')

            return string.toString().toLowerCase()
                .replace(/\s+/g, '-') // Replace spaces with -
                .replace(p, c => b.charAt(a.indexOf(c))) // Replace special characters
                .replace(/&/g, '-and-') // Replace & with 'and'
                .replace(/[^\w\-]+/g, '') // Remove all non-word characters
                .replace(/\-\-+/g, '-') // Replace multiple - with single -
                .replace(/^-+/, '') // Trim - from start of text
                .replace(/-+$/, '') // Trim - from end of text
        }

    </script>
    @endpush
@endsection


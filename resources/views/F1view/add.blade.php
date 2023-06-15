
<html>

<head>
    <title>Yazı Ekle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>

<form action="{{route('haberlers.add')}}" method="post">
    <div class="row" style="width:400px;margin: 20px auto">
@if(session()->has('success'))
    <div class="alert alert-success">{{session()->get('success')}} </div>
@endif

@csrf
<input type="hidden" name="news_id" value="" />
<div class="col-4">
    Başlık :
</div>
<div class="col-8">
    <input value="" type="text" name="title" class="form-control" />
</div>
<div class="col-12" style="padding-bottom:20px">
    <label>Açıklama :</label><br>
    <textarea  class="form-control"  name="description" row="7"> </textarea>
</div>
<div class="col-12" style="text-align:right;padding-top:20px">
    <input type="submit" value="Yeni Kayıt Ekle" class="btn btn-danger" />
</div>
        <div>
            <select name="author">
                <option value="">Seçiniz</option>
                @foreach($authors as $author)
                    <option value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            </select>

        </div>

</div>
</form>

</body>
</html>

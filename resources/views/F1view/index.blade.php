<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>

@if(session()->has('success'))
    <div class="alert alert-success">{{session()->get('success')}} </div>
@endif

<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Başlık</th>
        <th>Yazar</th>
        <th>Oluşturuldu</th>
        <th>İşlemler</th>
    </tr>
    </thead>
    <tbody>
    @foreach($news as $n)
    <tr>
        <td>{{$n->id}}</td>
        <td>{{$n->title}}</td>
        <td>{{$n->getAuthor->email ?? ' '}}</td>
        <td>{{$n->created_at}}</td>
        <td><a href ="{{  route ('haberlers.detaylar',[$n->id])  }}">Düzenle </a> </td>
        <td><a href ="{{  route ('haberlers.delete',[$n->id])  }}">Sil </a> </td>

    </tr>
    @endforeach
    </tbody>

</table>
<div>
    <a href="{{route('haberlers.add')}}">Yeni Ekle</a>
</div>


</body>
</html>

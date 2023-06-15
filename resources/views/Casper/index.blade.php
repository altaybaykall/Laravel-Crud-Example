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
        <th>Marka</th>
        <th>Model</th>
        <th>Seri No</th>
        <th>İşlemler</th>
        <th>Sil</th>
    </tr>
    </thead>
    <tbody>
    @foreach($caspers as $n)
        <tr>
            <td>{{$n->id}}</td>
            <td>{{$n->marka}}</td>
            <td>{{$n->model}}</td>
            <td>{{$n->seri_no}}</td>
            <td><a href ="{{  route ('casper.second',[$n->id])  }}">Düzenle </a> </td>
            <td><a href ="{{  route ('casper.numsix',[$n->id])  }}">Sil </a> </td>

        </tr>
    @endforeach
    </tbody>

</table>
<div>
    <a href="{{route('casper.fourth')}}">Yeni Ekle</a>
</div>


</body>
</html>

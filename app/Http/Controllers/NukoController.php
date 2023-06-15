<?php

namespace App\Http\Controllers;

use App\Models\asus;
use App\Models\Author;
use App\Models\F1news;
use App\Models\F2news;
use App\Models\Casper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NukoController extends Controller
{
    public function __Construct()
    {
        //$this->middleware('auth')->except('getAllNews');
        //F2news::orderby('id','desc')->limit(2)->get();
        //F2news::where('id','>','1')->where('maas,'<','5')->get();
    }

    public function getAllNews()
    {

        $news = F2news::all();
        return view('F1view.index')->with('news', $news);

    }

    public function getNewsDetail($detay)
    {
        echo 'Title id =' . $detay;
        $news = F2news::where('id', $detay)->first();
        $authors = Author::select('id', 'name')->orderby('name')->get();
        return view('F1view.edit')->with('news', $news)->with('authors', $authors);

    }

    public function edit(Request $request)
    {
        $title = $request->input('title');
        $desc = $request->input('description');
        $id = $request->input('news_id');
        $author = $request->author;

        $news = F2news::where('id', $id)->first();
        $news->title = $title;
        $news->description = $desc;
        $news->author_id = $author;
        $news->save();
        return redirect('haberler')->with('success', $news->title . ' Güncelleme Başarılı');

    }

    public function add()
    {
        $authors = Author::select('id', 'name')->orderby('name')->get();
        return view('F1view.add')->with('authors', $authors);

    }

    public function save(Request $request)
    {
        $title = $request->input('title');
        $desc = $request->input('description');
        $author = $request->author;
        $news = new F2news();
        $news->author_id = $author;
        $news->title = $title;
        $news->description = $desc;
        $news->save();
        return redirect()->route('haberlers.')->with('success', 'Yeni Kayıt eklendi');
    }

    public function delete($news_id)
    {
        $news = F2news::where('id', $news_id)->first()->delete();
        return redirect()->route('haberlers.')->with('success', 'Silme Başarılı');
    }

    public function first()
    {
        $casper = casper::all();
        return view('Casper.index')->with('caspers', $casper);
    }

    public function second($casperid)
    {
        echo 'Title id =' . $casperid;
        $news = casper::where('id', $casperid)->first();
        return view('Casper.edit')->with('news', $news);
    }

    public function third(Request $request)
    {
        $marka = $request->input('marka');
        $model = $request->input('model');
        $seri_no = $request->input('seri_no');
        $id = $request->input('id');

        $news = casper::where('id', $id)->first();
        $news->seri_no = $seri_no;
        $news->marka = $marka;
        $news->model = $model;
        $news->save();
        return redirect('casper')->with('success', $news->seri_no . ' Seri No Güncelleme Başarılı');
    }
    public function fourth ()
    {
        $casper = Casper::select('id', 'marka')->orderby('marka')->get();
        return view('Casper.add')->with('casper', $casper);

    }
    public function five(Request $request)
    {
        $marka = $request->input('marka');
        $model = $request->input('model');
        $seri_no = $request->input('seri_no');

        $news = new Casper();
        $news->marka = $marka;
        $news->model = $model;
        $news->seri_no = $seri_no;
        $news->save();
        return redirect()->route('casper.first')->with('success', 'Yeni Kayıt eklendi');
    }
    public function numsix($news_id)
    {
        $news = Casper::where('id', $news_id)->first()->delete();
        return redirect()->route('casper.first')->with('success', 'Silme Başarılı');
    }
}


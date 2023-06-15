<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class F2news extends Model
{
    use HasFactory;
    protected $table="F2news";

    public function getAuthor(){
        return $this->hasOne(Author::class,'id','author_id');
        // ortak id değilse class,foreignKey:'yazar_id' , localkey:'id') gibi
    }
public function getCategories(){
        return $this->hasMany(Category::class);
}


}

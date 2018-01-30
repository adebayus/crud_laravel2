<?php

namespace App\Http\Controllers;

use App\Blog; // mendeklarasikan model blog

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { // $blogs -> hanya sebuah variable
      $blogs = Blog::all(); // Blog merupakan model dan ::all menampilakan semua data database
      return view('blog.index',['blogs'=> $blogs]);
      // 'blog.index' -> blog menunjukan folder dari index
      //              -> index nama file dari view
      // ['blogs'=> $blogs] -> 'blogs' di taruh di variable blog
      //                    -> $blogs isi dari database table
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // menambahkan view create dan datanya akan di olah di fungsi 'store'
        return view('blog.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // Request merupakan inputan dari form
    {
        //
        $this->validate($request,[
          'title'   => 'required|unique:blog|max:255',
          'subject' => 'required',
          // required -> berfungsi untuk wajib diisi
          //unique    -> berfungsi untuk ciri tersendiri mudahnya tidak boleh ada kata yang sama dalam suatu tabel
          //blog      -> berfungsi untuk menunjuk table yang akan digunakan
          //max:255   -> berfungsi untuk batasan karakter yang di gunakan
        ]);

        $blog = new Blog; //  blog nama model yang telah di buat
        $blog->title   = $request->title; // $request->title merupakan inputan dari view create
        $blog->subject = $request->subject;
        $blog->save();
        return redirect('blog')->with('message',"data updated");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $blog = Blog::find($id);
        if(!$blog){
          abort(404);
        }
        return view('blog.single')->with('blog',$blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $blog = Blog::find($id);
        if(!$blog){
          abort(404);
        }
        return view('blog.edit')->with('blog',$blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
        $this->validate($request,[
          'title'   => 'required|unique:blog|max:255',
          'subject' => 'required',
          // required -> berfungsi untuk wajib diisi
          //unique    -> berfungsi untuk ciri tersendiri mudahnya tidak boleh ada kata yang sama dalam suatu tabel
          //blog      -> berfungsi untuk menunjuk table yang akan digunakan
          //max:255   -> berfungsi untuk batasan karakter yang di gunakan
        ]);

        $blog = Blog::find($id);  //  blog nama model yang telah di buat
        $blog->title   = $request->title; // $request->title merupakan inputan dari view create
        $blog->subject = $request->subject;
        $blog->save();
        return redirect('blog')->with('message',"data di edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $blog = Blog::find($id);
        $blog->delete();
        return redirect('blog')->with('message', 'blog sudah di hapus ');
    }
}

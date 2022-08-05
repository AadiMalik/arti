<?php

namespace App\Http\Controllers;

use App\ArtiFallow;
use App\Blog;
use App\Faq;
use App\FaqCategory;
use App\Models\Service;
use App\News;
use App\Brand;
use App\Category;
use App\Comment;
use App\OtherProduct;
use App\OtherProductImage;
use App\Package;
use App\Product;
use App\ProductImage;
use App\ProductPost;
use App\Rating;
use App\Review;
use App\Sector;
use App\Slider;
use App\Support;
use App\Team;
use App\Term;
use App\User;
use App\UserGallery;
use App\UserProduct;
use App\UserVideo;
use App\WritingPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Jorenvh\Share\Share;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    function changeLang($langcode){
    
        App::setLocale($langcode);
        session()->put("lang_code",$langcode);
        return redirect()->back();
    }  
    public function index()
    {

        return view('home');
    }
    public function home()
    {
        $product = Product::orderBy('hits', 'DESC')->where('zamidar',0)->get();
        $sale_product = OtherProduct::orderBy('created_at', 'DESC')->get();
        $user_product = UserProduct::orderBy('created_at', 'ASC')->get();
        $category = Category::orderBy('name', 'ASC')->get();
        $arti = User::orderBy('created_at', 'ASC')->get();
        $arti_fallow = ArtiFallow::all();
        $product_image = ProductImage::all();
        $slider = Slider::orderBy('created_at', 'DESC')->get();
        $review = Review::orderBy('created_at', 'ASC')->get();
        $blog = Blog::orderBy('created_at', 'ASC')->get();
        $rating = Rating::all();
        $admin_videos = UserVideo::where('user_id',1)->get();
        return view('welcome', compact('rating','arti_fallow','admin_videos','sale_product','product','user_product','arti', 'category', 'product_image', 'slider', 'review', 'blog'));
    }
    public function search(Request $request)
    {
        $product = Product::orWhere('name','LIKE','%'.$request->search.'%')->orWhere('description','LIKE','%'.$request->search.'%')->orderBy('hits', 'DESC')->where('zamidar',0)->get();
        $sale_product = OtherProduct::orWhere('name','LIKE','%'.$request->search.'%')->orderBy('created_at', 'DESC')->get();
        $user_product = UserProduct::orderBy('created_at', 'ASC')->get();
        $category = Category::orderBy('name', 'ASC')->get();
        $arti = User::orWhere('username','LIKE','%'.$request->search.'%')->orWhere('first_name','LIKE','%'.$request->search.'%')->orWhere('last_name','LIKE','%'.$request->search.'%')->orderBy('created_at', 'ASC')->get();
        $arti_fallow = ArtiFallow::all();
        $product_image = ProductImage::all();
        $slider = Slider::orderBy('created_at', 'DESC')->get();
        $review = Review::orderBy('created_at', 'ASC')->get();
        $blog = Blog::orderBy('created_at', 'ASC')->get();
        $rating = Rating::all();
        $admin_videos = UserVideo::where('user_id',1)->get();
        return view('welcome', compact('rating','arti_fallow','admin_videos','sale_product','product','user_product','arti', 'category', 'product_image', 'slider', 'review', 'blog'));
    }
    public function about()
    {
        $team = Team::orderBy('created_at','ASC')->get();
        $review = Review::where('permission',0)->get();
        return view('about',compact('team','review'));
    }
    public function contact()
    {
        return view('contact');
    }
    public function blog()
    {
        $blog = Blog::orderBy('created_at', 'ASC')->paginate(10);
        return view('blog', compact('blog'));
    }
    public function blog_search(Request $request)
    {
        $blog = Blog::where('name', 'LIKE','%'.$request->search.'%')->paginate(10);
        return view('blog', compact('blog'));
    }
    public function blog_detail($id)
    {
        $blog = Blog::orderBy('created_at', 'DESC')->get();
        $blog_detail = Blog::find($id);
        $comment = Comment::where('blog_id', $id)->orderBy('created_at', 'DESC')->get();
        $socialShare = \Share::page(
            url('/').'/'.$blog_detail->image,
            $blog_detail->name,
        )
        ->facebook()
        ->twitter()
        ->reddit()
        ->linkedin()
        ->whatsapp()
        ->telegram();
        return view('blog_detail', compact('blog', 'blog_detail', 'comment','socialShare'));
    }
    public function blog_comment(Request $request)
    {
        $comment = new Comment;
        $comment->user_id = Auth()->user()->id;
        $comment->blog_id = $request->blog_id;
        $comment->comment = $request->comment;
        $comment->save();
        return back();
    }
    public function shop()
    {
        $product = Product::orderBy('created_at', 'ASC')->where('zamidar',0)->paginate(20);
        $category = Category::orderBy('name', 'ASC')->get();
        $product_image = ProductImage::all();
        $product_category = Product::orderBy('created_at', 'ASC')->where('zamidar',0)->get();
        return view('shop', compact('product','product_category', 'category', 'product_image'));
    }
    public function shop_price(Request $request)
    {
        $product = Product::orWhere('price_high', $request->max)->orWhere('price_low', $request->min)->paginate(20);
        $category = Category::orderBy('name', 'ASC')->get();
        $product_image = ProductImage::all();
        $product_category = Product::orderBy('created_at', 'ASC')->where('zamidar',0)->get();
        return view('shop', compact('product','product_category', 'category', 'product_image'));
    }
    public function shop_category($category)
    {
        $product = Product::where('category_id', $category)->paginate(20);
        $category = Category::orderBy('name', 'ASC')->get();
        $product_image = ProductImage::all();
        $product_category = Product::orderBy('created_at', 'ASC')->where('zamidar',0)->get();
        return view('shop', compact('product','product_category', 'category', 'product_image'));
    }
    public function shop_tags($tag)
    {
        $product = Product::where('tags', $tag)->paginate(20);
        $category = Category::orderBy('name', 'ASC')->get();
        $product_image = ProductImage::all();
        $product_category = Product::orderBy('created_at', 'ASC')->where('zamidar',0)->get();
        return view('shop', compact('product','product_category', 'category', 'product_image'));
    }
    public function zamidar()
    {
        $sale_product = OtherProduct::orderBy('created_at', 'DESC')->paginate(10);
        $sale_product_image = OtherProductImage::orderBy('created_at', 'DESC')->get();
        $sale_product_count = OtherProduct::orderBy('created_at', 'DESC')->get();
        return view('zamidar', compact('sale_product', 'sale_product_image','sale_product_count'));
    }
    public function zamidar_category($category)
    {
        $sale_product = OtherProduct::where('category',$category)->orderBy('created_at', 'DESC')->paginate(10);
        $sale_product_image = OtherProductImage::orderBy('created_at', 'DESC')->get();
        $sale_product_count = OtherProduct::orderBy('created_at', 'DESC')->get();
        return view('zamidar', compact('sale_product', 'sale_product_image','sale_product_count'));
    }
    public function zamidar_price(Request $request)
    {
        $sale_product = OtherProduct::whereBetween('price', array($request->min, $request->max))->paginate(10);
        $sale_product_image = OtherProductImage::orderBy('created_at', 'DESC')->get();
        $sale_product_count = OtherProduct::orderBy('created_at', 'DESC')->get();
        return view('zamidar', compact('sale_product', 'sale_product_image','sale_product_count'));
    }
    public function zamidar_sub_category($sub_category)
    {
        $sale_product = OtherProduct::where('sub_category',$sub_category)->orderBy('created_at', 'DESC')->paginate(10);
        $sale_product_image = OtherProductImage::orderBy('created_at', 'DESC')->get();
        $sale_product_count = OtherProduct::orderBy('created_at', 'DESC')->get();
        return view('zamidar', compact('sale_product', 'sale_product_image','sale_product_count'));
    }
    
    public function zamidar_detail($id){
        $sale_product_detail = OtherProduct::find($id);
        $product_detail = OtherProduct::find($id);
        $product_detail->hits = $product_detail->hits+1;
        $sale_product = OtherProduct::find($id);
        $product_detail->update();
        $related = OtherProduct::orderBy('created_at','DESC')->get();
        $feature = OtherProduct::orderBy('created_at','ASC')->get();
        return view('forsale_detail', compact('sale_product_detail','sale_product','related','feature'));
        
    }
    public function product_detail($id)
    {
        $product = Product::orderBy('created_at', 'DESC')->get();
        $user_product = UserProduct::all();
        $product_detail = Product::find($id);
        $product_detail->hits = $product_detail->hits+1;
        $product_detail->update();
        $arti_fallow = ArtiFallow::all();
        $related_product = Product::where('category_id',$product_detail->category_id)->get();
        $product_image = ProductImage::where('product_id', $id)->get();
        $related_product_image = ProductImage::get();
        $feature_product = Product::all();
        $comment = Comment::where('product_id', $id)->orderBy('created_at', 'DESC')->get();
        $verify = DB::table('users')->where('verify',0)
        ->join('user_products', 'users.id', '=', 'user_products.user_id')
        ->select('users.*', 'user_products.price_low', 'user_products.price_high','user_products.image1','user_products.user_id','user_products.product_id')
        ->get();
        return view('product_detail', compact('verify','arti_fallow','product','feature_product','related_product_image','related_product','user_product', 'product_detail', 'product_image', 'comment'));
    }
    public function product_comment(Request $request)
    {
        $comment = new Comment;
        $comment->user_id = Auth()->user()->id;
        $comment->product_id = $request->product_id;
        $comment->comment = $request->comment;
        $comment->save();
        return back();
    }
    public function arti_fallow(Request $request){
        $arti_fallow = new ArtiFallow;
        $arti_fallow->arti_id = $request->arti_id;
        $arti_fallow->user_id = $request->user_id;
        $arti_fallow->save();
        return back();
    }
    public function arti_detail($id)
    {
        $arti = User::find($id);
        $user_product = UserProduct::where('user_id',$id)->get();
        $gallery = UserGallery::where('user_id',$id)->get();
        $videos = UserVideo::where('user_id',$id)->get();
        $rating = Rating::where('arti_id',$id)->get();
        $comment = Comment::orderBy('created_at','desc')->get();
        $arti_fallow = ArtiFallow::all();
        $post = ProductPost::where('user_id',$id)->orderBy('created_at','DESC')->get();
        $socialShare = \Share::page(
            url('arti-detail/'.$id),
            'Post By Sabzi Mandi',
        )
        ->facebook()
        ->twitter()
        ->reddit()
        ->linkedin()
        ->whatsapp()
        ->telegram();
        return view('arti_detail', compact('arti','arti_fallow','user_product','gallery','comment','videos','post','rating','socialShare'));
    }
    public function newfeeds()
    {
        $post = ProductPost::orderBy('created_at','DESC')->get();
        $fallow = ArtiFallow::orderBy('created_at','DESC')->where('user_id',Auth()->user()->id)->get();
        $comment = Comment::all();
        $socialShare = \Share::page(
            url('newfeeds'),
            'Post By Sabzi Mandi',
        )
        ->facebook()
        ->twitter()
        ->reddit()
        ->linkedin()
        ->whatsapp()
        ->telegram();
        return view('newfeed', compact('post','socialShare','comment','fallow'));
    }
    public function postlike(Request $request){
        $likes = new Comment;
        $likes->post_id = $request->post_id;
        $likes->user_id = $request->user_id;
        $likes->likes = 1;
        $likes->save();
        return back();
    }
    public function shareSocial($id)
    {
        $socialShare = \Share::page(
            url('arti-detail/'.$id),
            'Post By Sabzi Mandi',
        )
        ->facebook()
        ->twitter()
        ->reddit()
        ->linkedin()
        ->whatsapp()
        ->telegram();
        
        return view('share_post', compact('socialShare'));
    }
    public function post_comment(Request $request)
    {
        $comment_save = new Comment;
        $comment_save->user_id = Auth()->user()->id;
        $comment_save->post_id = $request->post_id;
        $comment_save->comment = $request->comment;
        $comment_save->save();
        return response()->json(
            [
              'success' => true,
              'message' => 'Comment inserted successfully!'
            ]
       );
    }
    public function Comment(){
        $comment = Comment::all();
        $commentData['data'] = $comment;

     return json_encode($commentData);
    }
    public function rating(Request $request){
        $rating = new Rating;
        $rating->user_id = Auth()->user()->id;
        $rating->arti_id = $request->arti_id;
        $rating->rate = $request->rate;
        $rating->remarks = $request->remarks;
        $rating->save();
        return back();
    }
    public function faq()
    {
        $faq = Faq::orderBy('created_at', 'ASC')->get();
        return view('faq', compact('faq'));
    }
    public function term()
    {
        $term = Term::orderBy('created_at', 'ASC')->get();
        return view('term',compact('term'));
    }
    
    public function redirect()
    {
        if (auth()->user()->is_admin) {

            return redirect()->route('admin.home')->with('status', session('status'));
        } else {
            foreach (auth()->user()->roles as $role) {
                if ($role->title == 'Arti') {
                    return redirect('/');
                } elseif ($role->title == 'Zameendar') {
                    return redirect('/');
                }
            }
        }
        // return redirect('home')->with('status', session('status'));
    }
}

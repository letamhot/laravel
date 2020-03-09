<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use DB;
use App\Product;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (Auth::check()) {

            $product = DB::table('product')
                ->join('type', 'type.id', '=', 'product.type')
                ->join('producer', 'producer.id', '=', 'product.producer')
                ->select(DB::raw("product.id, product.name, type.name as type, producer.name as producer, product.amount, product.image, product.price_input"))
                ->orderby("product.id","desc")
                ->get();
            return view('product.index', compact('product'));
        } else {
            return view('admin.404');
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = DB::table('product')
                ->join('type', 'type.id', '=', 'product.type')
                ->join('producer', 'producer.id', '=', 'product.producer')
                ->select(DB::raw("product.id, product.name, type.name as type, producer.name as producer, product.amount, product.image, product.price_input"))
                ->orderby("product.id","desc")
                ->get();
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'producer' => 'required',
            'amount' => 'required',
            'image' => 'required',
            'price_input' => 'required',

         ]);
         $id = $request->id;
        $name = $request->name;
        $type = $request->type;
        $producer = $request->producer;
        $amount = $request->amount;
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        // if($request->hasFile('slide_img')) // Kiểm tra xem người dùng có upload hình hay không
    	// {
    	// 	$img_file = $request->file('slide_img'); // Nhận file hình ảnh người dùng upload lên server

    	// 	$img_file_extension = $img_file->getClientOriginalExtension(); // Lấy đuôi của file hình ảnh

    	// 	if($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg')
    	// 	{
    	// 		return redirect('admin/slide/them')->with('error','Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
    	// 	}

    	// 	$img_file_name = $img_file->getClientOriginalName(); // Lấy tên của file hình ảnh

    	// 	$random_file_name = str_random(4).'_'.$img_file_name; // Random tên file để tránh trường hợp trùng với tên hình ảnh khác trong CSDL
    	// 	while(file_exists('upload/slide/'.$random_file_name)) // Trường hợp trên gán với 4 ký tự random nhưng vẫn có thể xảy ra trường hợp bị trùng, nên bỏ vào vòng lặp while để kiểm tra với tên tất cả các file hình trong CSDL, nếu bị trùng thì sẽ random 1 tên khác đến khi nào ko trùng nữa thì thoát vòng lặp
    	// 	{
    	// 		$random_file_name = str_random(4).'_'.$img_file_name;
    	// 	}
    	// 	echo $random_file_name;

    	// 	unlink('upload/slide/'.$slide->Hinh);
    	// 	$img_file->move('upload/slide',$random_file_name); // file hình được upload sẽ chuyển vào thư mục có đường dẫn như trên
    	// 	$slide->Hinh = $random_file_name;
    	// }
        $price_input = $request->price_input;
        $data = array('id' => $id, "name" => $name, "type" => $type, "producer" => $producer, "amount" => $amount, "image" => $image, "price_input" => $price_input);
        DB::table('product')->insert($data);
         Product::create($request->all());
         return redirect()->route('product.index')->with('success','Product Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $product = Product::find($id);
        $product = DB::table('product')
                ->join('type', 'type.id', '=', 'product.type')
                ->join('producer', 'producer.id', '=', 'product.producer')
                ->select(DB::raw("product.id, product.name, type.name as type, producer.name as producer, product.amount, product.image, product.price_input"))
                ->orderby("product.id","desc")
                ->get();
// dd($product[0]->name);
        //pass posts data to view and load list view
        return view('product.show', ['product' => $product[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $product = Product::find($id);
        $product = DB::table('product')
                ->join('type', 'type.id', '=', 'product.type')
                ->join('producer', 'producer.id', '=', 'product.producer')
                ->select(DB::raw("product.id, product.name, type.name as type, producer.name as producer, product.amount, product.image, product.price_input"))
                ->orderby("product.id","desc")
                ->get();

        //load form view
        return view('product.edit', ['product' => $product[0]]);
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
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'producer' => 'required',
            'amount' => 'required',
            'image' => 'required',
            'price_input' => 'required',

         ]);
         $id = $request->id;
        $name = $request->name;
        $type = $request->type;
        $producer = $request->producer;
        $amount = $request->amount;
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        // if($request->hasFile('slide_img')) // Kiểm tra xem người dùng có upload hình hay không
    	// {
    	// 	$img_file = $request->file('slide_img'); // Nhận file hình ảnh người dùng upload lên server

    	// 	$img_file_extension = $img_file->getClientOriginalExtension(); // Lấy đuôi của file hình ảnh

    	// 	if($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg')
    	// 	{
    	// 		return redirect('admin/slide/them')->with('error','Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
    	// 	}

    	// 	$img_file_name = $img_file->getClientOriginalName(); // Lấy tên của file hình ảnh

    	// 	$random_file_name = str_random(4).'_'.$img_file_name; // Random tên file để tránh trường hợp trùng với tên hình ảnh khác trong CSDL
    	// 	while(file_exists('upload/slide/'.$random_file_name)) // Trường hợp trên gán với 4 ký tự random nhưng vẫn có thể xảy ra trường hợp bị trùng, nên bỏ vào vòng lặp while để kiểm tra với tên tất cả các file hình trong CSDL, nếu bị trùng thì sẽ random 1 tên khác đến khi nào ko trùng nữa thì thoát vòng lặp
    	// 	{
    	// 		$random_file_name = str_random(4).'_'.$img_file_name;
    	// 	}
    	// 	echo $random_file_name;

    	// 	unlink('upload/slide/'.$Hinh);
    	// 	$img_file->move('upload/slide',$random_file_name); // file hình được upload sẽ chuyển vào thư mục có đường dẫn như trên
    	// 	$Hinh = $random_file_name;
    	// }
        $price_input = $request->price_input;
        DB::update('update product set name = ?, type=?, producer=?, amount=?, image=?, price_input=? where id = ?', [$name, $type, $producer, $amount, $image, $price_input, $id]);
        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();

        //store status message
        Session::flash('success_msg', 'Product deleted successfully!');

        return redirect()->route('product.index');
    }
}

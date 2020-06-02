<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Carbon;
use App\Models\ProductOrder;
use App\Models\Tag;
use Validation;


class HomeController extends Controller
{
    private $slider;
    private $product;
    private $category;
    private $brand;
    private $productorder;
    private $tag;

    public function __construct(Slider $slider, Product $product, Category $category, Brand $brand, ProductOrder $productorder, Tag $tag)
    {
        $this->slider = $slider;
        $this->product = $product;
        $this->category = $category;
        $this->brand = $brand;
        $this->productorder = $productorder;
        $this->tag = $tag;
    }
    public function getHome()
    {
        //slider show

        $listSlider = $this->slider->where('status', '=', 1)->get();

        //sản phẩm mới
        $listProductlatest = $this->product->latest()->where('status', '=', 1)->paginate(6);

        //sản phẩm giảm giá
        $mytime = Carbon\Carbon::now()->toDateTimeString();
        $listProductSale = $this->product->whereDate('end_sale', '>', $mytime)->where('status', '=', 1)->whereNotNull('price_sale')->paginate(3);

        $data = $listProductSale->pluck('id')->toArray();
        $listProductSale1 = $this->product->whereNotIn('id', $data)->whereDate('end_sale', '>', $mytime)->where('status', '=', 1)->paginate(3);
        //sản phẩm bán chạy
        $listProductSelling = [];
        $listProductSelling_3 = [];
        $i = 0;
        $listProduct = $this->product->where('status', '=', 1)->get();
        foreach ($listProduct as $item) {
            $count = ProductOrder::where('product_id', '=', $item->id)->count();
            if ($count) {
                if ($item->end_sale == null) {
                    $end_sale = Carbon\Carbon::yesterday()->toDateTimeString();
                    $listProductSelling[$i] = ([
                        'count' => $count,
                        'id' => $item->id,
                        'name' => $item->name,
                        'status' => $item->status,
                        'quantity' => $item->quantity,
                        'feature_image_path' => $item->feature_image_path,
                        'price' => $item->price,
                        'price_sale' => $item->price_sale,
                        'end_sale' => $end_sale,
                    ]);
                } else {
                    $listProductSelling[$i] = ([
                        'count' => $count,
                        'id' => $item->id,
                        'name' => $item->name,
                        'status' => $item->status,
                        'quantity' => $item->quantity,
                        'feature_image_path' => $item->feature_image_path,
                        'price' => $item->price,
                        'price_sale' => $item->price_sale,
                        'end_sale' => $item->end_sale,
                    ]);
                }
            }
            $i = $i + 1;
        }
        rsort($listProductSelling);
        if (count($listProductSelling) >= 3) {
            for ($i = 0; $i < 3; $i++) //in ra vị trí của ký tự trong chuỗi và ký tự tương ứng
            {
                $listProductSelling_3[$i] = $listProductSelling[$i];
            }
        } else {
            for ($i = 0; $i < count($listProductSelling); $i++) //in ra vị trí của ký tự trong chuỗi và ký tự tương ứng
            {
                $listProductSelling_3[$i] = $listProductSelling[$i];
            }
        }

        return view('customer.content', compact('listSlider', 'listProductlatest', 'listProductSale', 'listProductSale1', 'listProductSelling_3', 'mytime'));
    }

    public function getCategory($id)
    {
        $productOfCategory = $this->product->where('category_id', $id)->where('status', '=', 1)->simplePaginate(9);
        $nameCategory = $this->category->where('id', $id)->value('name');
        $timenow = Carbon\Carbon::now()->toDateTimeString();
        return view('customer.pages.category', compact('productOfCategory', 'nameCategory', 'timenow'));
    }

    public function getBrand($id)
    {
        $productOfBrand = $this->product->where('brand_id', $id)->where('status', '=', 1)->simplePaginate(9);
        $nameBrand = $this->brand->where('id', $id)->value('name');
        $timenow = Carbon\Carbon::now()->toDateTimeString();
        return view('customer.pages.brand', compact('productOfBrand', 'nameBrand', 'timenow'));
    }

    public function getTag($id)
    {
        $timenow = Carbon\Carbon::now()->toDateTimeString();
        $productOfTag = $this->tag->findOrFail($id);
        $nameTag = $this->tag->where('id', $id)->value('name');
        return view('customer.pages.tag', compact('productOfTag', 'timenow', 'nameTag'));
    }


    public function getSearch(Request $request)
    {
        $request->validate([
            'data_search' => 'required|max:255',
        ], [
            'data_search.required' => 'Chưa nhập thông tin'
        ]);
        $keywords  = $request->data_search;
        $timenow = Carbon\Carbon::now()->toDateTimeString();
        $listProduct = $this->product->where('name', 'like', '%' . $keywords . '%')->simplePaginate(9);
        return view('customer.pages.search', compact('listProduct', 'timenow', 'keywords'));
    }
}

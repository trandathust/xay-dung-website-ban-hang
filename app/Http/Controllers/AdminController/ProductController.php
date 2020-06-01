<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Models\Category;
use Storage;
use App\Traits\StorageImageTrait;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tag;
use App\Models\ProductTag;
use DB;
use App\Http\Requests\AdminRequest\ProductRequest;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Supplier;
use Carbon;
use App\Models\ProductOrder;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    use StorageImageTrait;
    private $categories;
    private $product;
    private $productimage;
    private $tag;
    private $producttag;
    private $brand;
    private $supplier;

    public function __construct(Category $categories, Product $product, ProductImage $productimage, Tag $tag, ProductTag $producttag, Brand $brand, Supplier $supplier)
    {
        $this->categories = $categories;
        $this->product = $product;
        $this->productimage = $productimage;
        $this->tag = $tag;
        $this->producttag = $producttag;
        $this->brand = $brand;
        $this->supplier = $supplier;
    }

    public function getCategory($parentId)
    {
        $data = $this->categories->all();
        $recusive =  new Recusive($data);
        $htmlOption = $recusive->Recusive($parentId);
        return $htmlOption;
    }

    function listProductSale($product)
    {
        $listProductSell  = [];
        foreach ($product as $key => $value) {
            $ProductSell = DB::table('products')
                ->where('id', $value->idProduct)
                ->select('id as id', 'products.name as name', 'products.price as price', 'products.price_sale as price_sale', 'products.end_sale as end_sale', 'products.feature_image_path as image', 'products.status as status', 'products.quantity as quantity')
                ->get()->toArray();
            if ($ProductSell) {
                $listProductSell[] = ([
                    'id' => $value->idProduct,
                    'name' => $ProductSell[0]->name,
                    'price' => $ProductSell[0]->price,
                    'price_sale' => $ProductSell[0]->price_sale,
                    'end_sale' => $ProductSell[0]->end_sale,
                    'count' => $value->number,
                    'feature_image_path' => $ProductSell[0]->image,
                    'status' => $ProductSell[0]->status,
                    'quantity' => $ProductSell[0]->quantity,
                ]);
            } else {
                $listProductSell  = [];
            }
        }
        return ($listProductSell);
    }


    //xem thông tin sản phẩm
    public function viewProduct(Request $request)
    {
        $search = ($request->search);
        //tất cả sản phẩm
        $listProduct = $this->product->all();
        //sản phẩm đang khuyến mại
        $mytime = Carbon\Carbon::now()->toDateTimeString();
        $listProductSale = $this->product->whereDate('end_sale', '>', $mytime)->get();
        //sản phẩm bán chạy
        $day = Carbon\Carbon::now()->subDays(30)->format('Y-m-d');
        $product_Sell = DB::table('product_orders')
            ->select(DB::raw('product_id as idProduct'), DB::raw('COUNT(*) as number'))
            ->groupBy('idProduct')
            ->orderBy('number', 'DESC')
            ->get();


        $day_old = Carbon\Carbon::now()->subDays(60)->format('Y-m-d');
        $percent_product = [];
        foreach ($product_Sell as $key => $value) {
            $productSell_old = DB::table('product_orders')
                ->where('product_id', $value->idProduct)
                ->select(DB::raw('COUNT(*) as number'))
                ->whereDate('created_at', '<', $day)
                ->whereDate('created_at', '>=', $day_old)
                ->value('number');
            if ($productSell_old == 0) {
                $percent_product[] = $value->number * 100;
            } else {
                if ($productSell_old > $value->number) {
                    $percent_product[] = round(-($productSell_old / $value->number - 1) * 100, 2);
                } else {
                    $percent_product[] = round(($value->number / $productSell_old - 1) * 100, 2);
                }
            }
        }
        $listProductSelling = $this->listProductSale($product_Sell);

        //hàng tồn
        $dt = Carbon\Carbon::now()->subDays(30);
        $listInventory = [];
        $i = 0;
        $listProductInventory = $this->product->whereDate('created_at', '<', '$dt')->get();
        foreach ($listProductInventory as $item) {
            $count = ProductOrder::where('product_id', '=', $item->id)->count();
            if ($count == 0) {
                $listInventory[$i] = ([
                    'id' => $item->id,
                    'name' => $item->name,
                    'quantity' => $item->quantity,
                    'feature_image_path' => $item->feature_image_path,
                    'price' => $item->price,
                ]);
            }
            $i = $i + 1;
        }


        return view('admin.products.view', compact('search', 'listProduct', 'listProductSale', 'listProductSelling', 'listInventory', 'mytime', 'percent_product'));
    }

    //thêm sản phẩm mới
    public function getAddProduct()
    {
        $htmlOption = $this->getCategory($parentId = '');
        $listBrand = $this->brand->all();
        $listSupplier = $this->supplier->all();
        return view('admin.products.add', compact('htmlOption', 'listBrand', 'listSupplier'));
    }
    public function postAddProduct(ProductRequest $request)
    {
        try {
            $status = $request->status;
            if ($request->status == null)
                $status = 0;
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'supplier_id' => $request->supplierID,
                'quantity' => $request->qty,
                'price' => $request->price,
                'price_sale' => $request->price_sale,
                'start_sale' => $request->start_sale,
                'end_sale' => $request->end_sale,
                'brand_id' => $request->brandID,
                'category_id' => $request->categoryID,
                'content' => $request->detailSP,
                'size' => $request->size,
                'weight' => $request->weight,
                'status' => $status,
                'user_id' => auth()->id(),
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            //thêm thông tin vào bảng product
            $product = $this->product->create($dataProductCreate);


            //thêm thông tin vào bảng product_image
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                    $product->productImage()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);
                }
            }


            //thêm thông tin vào bảng tag
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    //thêm vào bảng tag
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                };
                $product->tags()->attach($tagIds);
            }

            DB::commit();
            return back()->with('thanhcong', 'Thêm sản phẩm thành công!');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('thatbai', 'Thêm sản phẩm thất bại!');
        }
    }
    // hết thêm thông tin


    //sửa thông tin sản phẩm.
    public function getEditProduct($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        $listBrand = $this->brand->all();
        $listSupplier = $this->supplier->all();
        return view('admin.products.edit', compact('product', 'htmlOption', 'listBrand', 'listSupplier'));
    }
    public function postEditProduct(ProductRequest $request, $id)
    {
        try {
            $status = $request->status;
            if ($request->status == null)
                $status = 0;
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'supplier_id' => $request->supplierID,
                'quantity' => $request->qty,
                'price' => $request->price,
                'price_sale' => $request->price_sale,
                'start_sale' => $request->start_sale,
                'end_sale' => $request->end_sale,
                'brand_id' => $request->brandID,
                'category_id' => $request->categoryID,
                'content' => $request->detailSP,
                'size' => $request->size,
                'weight' => $request->weight,
                'status' => $status,
                'user_id' => auth()->id(),
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            //sửa thông tin trong bảng product
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);


            //sửa thông tin trong bảng product_image
            if ($request->hasFile('image_path')) {
                $this->productimage->where('product_id', $id)->delete();
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                    $product->productImage()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);
                }
            }


            //thêm thông tin vào bảng tag
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    //thêm vào bảng tag
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);

                    $tagIds[] = $tagInstance->id;
                };
                $product->tags()->sync($tagIds);
            }
            DB::commit();
            return back()->with('thanhcong', 'Sửa sản phẩm thành công!');
        } catch (Exception $exception) {
            DB::rollBack();
            return back()->with('thatbai', 'Sửa sản phẩm thất bại!');
        }
    }
    public function DeleteProduct($id)
    {
        try {
            $this->product->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (Exception $exception) {
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }


    public function postEditStatus($id, Request $request)
    {
        $this->product->findOrfail($id)->update([
            'status' => $request->status,
        ]);
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

    public function getSearch(Request $request)
    {
        $request->validate([
            'data_search' => 'required|max:255',
        ], [
            'data_search.required' => 'Chưa nhập thông tin'
        ]);
        $keywords  = $request->data_search;

        $mytime = Carbon\Carbon::now()->toDateTimeString();
        $listProduct = $this->product->where('name', 'like', '%' . $keywords . '%')->get();
        return view('admin.products.search', compact('mytime', 'listProduct'));
    }
}

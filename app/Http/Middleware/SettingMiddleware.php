<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Setting;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use DB;
use Auth;
use App\Models\Menu;
use App\Models\Tag;

class SettingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    private $setting;
    private $menu;
    private $tag;
    public function __construct(Setting $setting, Brand $brand, Category $category, Menu $menu, Tag $tag)
    {
        $this->setting = $setting;
        $this->brand = $brand;
        $this->category = $category;
        $this->menu = $menu;
        $this->tag = $tag;
        $footer = $this->setting->where('config_key', 'footer')->value('config_value');
        $logo = $this->setting->where('config_key', 'logo')->value('config_value');
        $nameshop = $this->setting->where('config_key', 'nameshop')->value('config_value');
        $listSetting = $this->setting->all();
        view()->share('footer', $footer);
        view()->share('listSetting', $listSetting);
        $listBrand = $this->brand->all();
        view()->share('listBrand', $listBrand);
        $listCategory = $this->category->where('parent_id', 0)->get();
        view()->share('listCategory', $listCategory);
        $listTag = $this->tag->paginate(8);
        view()->share('listTag', $listTag);
        view()->share('logo', $logo);
        view()->share('nameshop', $nameshop);
        $listMenuFooterParentVIEW = $this->menu->where('slug', 'menu-xem-nhanh')->value('id');
        $listMenuFooterParentINFO = $this->menu->where('slug', 'menu-thong-tin')->value('id');
        $listMenuFooterChilVIEW = $this->menu->where('parent_id', $listMenuFooterParentVIEW)->get();
        $listMenuFooterChilINFO = $this->menu->where('parent_id', $listMenuFooterParentINFO)->get();

        $listMenuHeaderParent = $this->menu->where('slug', 'menu-header')->value('id');
        $listMenuHeaderChil = $this->menu->where('parent_id', $listMenuHeaderParent)->get();

        view()->share('listMenuFooterChilVIEW', $listMenuFooterChilVIEW);
        view()->share('listMenuFooterChilINFO', $listMenuFooterChilINFO);
        view()->share('listMenuHeaderChil', $listMenuHeaderChil);
    }

    public function handle($request, Closure $next)
    {

        return $next($request);
    }
}

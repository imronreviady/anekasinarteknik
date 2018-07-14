<?php
namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Controllers\App\CategoriesController;
use App\Http\Controllers\App\ManufacturerController;

use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdminSiteSettingController;

//validator is builtin class in laravel
use Validator;

use App;

use Lang;

use DB;
//for password encryption or hash protected
use Hash;

//for authenitcate login data
use Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;

//for requesting a value 
use Illuminate\Http\Request;

//for Carbon a value 
use Carbon;

class FrontendController extends Controller
{
	
	public function getHome()
	{
		$title = array('pageTitle' => 'Home');

		$language_id = '1';
		$result = array();
		$message = array();
			
		$banners = DB::table('banners')
			->where('status','=', '1')
			->paginate(20);
		
		$result['message'] = $message;
		$result['banners'] = $banners;

		//get function from other controller
		$myVar = new AdminCategoriesController();
		$result['myVar'] = $myVar;
		$categories = $myVar->getCategories($language_id);
		$subCategories = $myVar->getSubCategories($language_id);

		$data = DB::table('products_to_categories')
		->leftJoin('categories', 'categories.categories_id', '=', 'products_to_categories.categories_id')
		->leftJoin('categories_description', 'categories_description.categories_id', '=', 'products_to_categories.categories_id')
		->leftJoin('products', 'products.products_id', '=', 'products_to_categories.products_id')
		->leftJoin('products_description','products_description.products_id','=','products.products_id')
		->LeftJoin('manufacturers', function ($join) {
			$join->on('manufacturers.manufacturers_id', '=', 'products.manufacturers_id');
		})
		->LeftJoin('specials', function ($join) {
			$join->on('specials.products_id', '=', 'products.products_id')->where('status', '=', '1');
		})
		->select('products_to_categories.*', 'categories_description.categories_name','categories.*', 'products.*','products_description.*', 'specials.specials_id', 'manufacturers.*', 'specials.products_id as special_products_id', 'specials.specials_new_products_price as specials_products_price', 'specials.specials_date_added as specials_date_added', 'specials.specials_last_modified as specials_last_modified', 'specials.expires_date')
		->where('products_description.language_id','=', $language_id)
		->where('categories_description.language_id','=', $language_id);

		if(isset($_REQUEST['categories_id']) and !empty($_REQUEST['categories_id'])) {
			$data->where('products_to_categories.categories_id','=', $_REQUEST['categories_id']);

			if(isset($_REQUEST['product']) and !empty($_REQUEST['product'])){
				$data->where('products_name', 'like', '%' . $_REQUEST['product'] . '%');
			}

			$products = $data->orderBy('products.products_id', 'DESC')->paginate(100);	
		} else {
			$products = $data->orderBy('products.products_id', 'DESC')->paginate(9);
		}
		
		$result['categories'] = $categories;
		$result['subCategories'] = $subCategories;
		$result['products'] = $products;
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$result['currency'] = $myVar->getSetting();
		
		$currentTime =  array('currentTime'=>time());

		return view("frontend.home",$title)->with('result', $result);
	}

	public function getDetail(Request $request)
	{
		$title = array('pageTitle' => 'Product Detail');
		$language_id      =   '1';	
		$products_id      =   $request->id;	
		$category_id	  =	  '0';
		
		$result = array();

		//get categories from CategoriesController controller
		$myVar = new CategoriesController();
		$result['categories'] = $myVar->getMainCategories($language_id);
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$result['languages'] = $myVar->getLanguages();
		
		//tax class
		$taxClass = DB::table('tax_class')->get();
		$result['taxClass'] = $taxClass;
		
		//get all sub categories
		$subCategories = DB::table('categories')
		->leftJoin('categories_description','categories_description.categories_id', '=', 'categories.categories_id')
		->select('categories.categories_id as id', 'categories_description.categories_name as name')
		->where('parent_id','!=', '0')->where('categories_description.language_id', $language_id)->get();
		$result['subCategories'] = $subCategories;
		
		//get function from ManufacturerController controller
		$myVar = new ManufacturerController();
		$result['manufacturer'] = $myVar->getManufacturer($language_id);
		
				
		$product = DB::table('products')
			->leftJoin('products_description','products_description.products_id','=','products.products_id')
	
			->select('products.*','products_description.*')
			//->where('products_description.language_id','=', $language_id)
			->where('products.products_id','=', $products_id)
			->get();
		
		$result['product'] = $product;
		
		//get product sub category id
		$productsCategory = DB::table('products_to_categories')->where('products_id','=', $products_id)->get();
		$result['subCategoryId'] = $productsCategory;
		
		
		//print_r($result['subCategoryId'][0]->categories_id);
				
		$getSpecialProduct = DB::table('specials')->where('products_id',$products_id)->orderby('specials_id', 'desc')->limit(1)->get();
		
		if(count($getSpecialProduct)>0){
			$specialProduct = $getSpecialProduct;			
		}else{
			$specialProduct[0] = (object) array('specials_id'=>'', 'products_id'=>'', 'specials_new_products_price'=>'', 'status'=>'', 'expires_date' => '');
			
		}
		$result['specialProduct'] = $specialProduct;
		
		$Categories = DB::table('categories')
		->leftJoin('categories_description','categories_description.categories_id', '=', 'categories.categories_id')
		->select('categories.categories_id as id', 'categories_description.categories_name as name', 'categories.parent_id' )
		->where('categories.categories_id','=', $result['subCategoryId'][0]->categories_id)->get();
		$result['mainCategories'] = $Categories;
		
		//print_r($result);
		return view("frontend.productDetail", $title)->with('result', $result);
	}
}
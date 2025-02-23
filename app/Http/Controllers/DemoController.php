<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DemoController extends Controller
{



   //this method use to write query using laravel query builder
    //Retrive all data from a table
  public function ProductController(){
      $product = DB::table('product_carts')->get();
      return $product;
  }

  //Retrieving Singe Row
    public function singleProduct($id){
      $singleProduct = DB::table('product_carts')->find($id);
      return $singleProduct;
    }

    //Retriving First Data In a Row
    public function firstProduct(){
      $firsProduct = DB::table('products')->first();
      return $firsProduct;
    }

    //Retrieving List Of Column Values
    public function productPrice(){
      $productPrice = DB::table('products')->pluck('stock','title');
      return $productPrice;
    }

    //Aggregate query
    public function calculatePrice():array{
      $count = DB::table('products')->count();
      $max = DB::table('products')->max('price');
      $min = DB::table('products')->min('price');
      $avg = DB::table('products')->avg('price');
      $sum = DB::table('products')->sum('price');
      return [
          "Number of products" => $count,
          "Max Price" => $max,
          "Min Price" => $min,
          "Avg Price" => $avg,
          "Sum Price" => $sum
      ];
    }

    //Select  Clause
    public  function selectProduct(){
        $products = DB::table('products')->select('title','price')->distinct()->get();
        return $products;
    }

    //Inner Join
    //The Name OF the table to join
    //The column on the current table to join on
    //the column on the joined table to join on

    public function InnerJoin(){
      $innerJoin = DB::table('products')
          ->join('brands', 'products.brand_id', '=' , 'brands.id')
          ->join('categories', 'products.category_id' ,'=', 'categories.id' )
          ->get();
      return $innerJoin;
    }

    //Left Join And Right Join
    public function LeftRightJoin(){
      $productDetailsWithBrandsDetails = DB::table('products')
          ->rightJoin('brands', 'products.brand_id', '=' , 'brands.id')
          ->get();
      return $productDetailsWithBrandsDetails;
    }

    //cross join
    //retrun all posiblem combination of two table
    public function crossjoin(){
       $crossjoinresult = DB::table('products')
           ->crossJoin('brands')
           ->get();
       $cnt = $crossjoinresult->count();
       return $cnt;
    }


    //Advance join clause
    public function advancedJoin(){
      $selectedProducts = DB::table('products')
          ->join('categories',function(JoinClause $join){
              $join->on('products.category_id', '=' , 'categories.id')
                  ->where('price', '=' , '120');
          })
          ->get();
      return $selectedProducts;
    }


    //the union operator return query not collection
    public function unionQuery(){
      $title = DB::table('products')->select('title');
      $price = DB::table('products')->select('price')->union($title)->get();
      return $price;
    }


    //...........................Model ........................
    public function DemoModelActon(Request $request){
         return brand::create($request->input());
    }



}




















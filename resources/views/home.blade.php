@extends('layouts.master')

@section('content')
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="container" ng-app="app" ng-controller = "ctrl">
                    <div class="row">
                        <div class="col-md-3">
                            <h1 style="margin: 0 0 30px 0">สินค้าในร้าน</h1>
                            <div class="list-group">
                                <a href="#" class="list-group-item" ng-class = "{'active':animal == null}" ng-click="getProductList(null)">ทั้งหมด</a>
                                <a href="#" class="list-group-item" ng-repeat="c in animals" ng-class = "{'active':animal.id == c.id}" ng-click="getProductList(c)">@{c.name}</a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                            <div class="pull-right" style="margin-top: 10px" style="margin-bottom: 10px">
                            <input type="text" class="form-control" ng-model="query" ng-keyup = "searchProduct($event)" style="width: 190px" placeholder="พิมพ์ชื่อสินค้าเพื่อค้นหาสินค้า">
                            <br>    
                        </div>
                        </div>
                            <div class="row">
                                <div class="col-md-3" ng-repeat="p in pets">
                                    <div class="panel panel-default bs-product-card">
                                        <img ng-src="@{p.image_url}" class="img-responsive">

                                        <div class="panel-body">
                                            <h4><a href="#">@{p.name_pet}</a></h4>
                                            <div class="form-group">
                                                <div>คงเหลือ: @{p.stock_qty}</div>
                                                <div><strong>ราคา: @{p.price}</strong></div>
                                            </div>
                                            @guest
                                            <a href="#" class="btn btn-success btn-block" ><i class="fa fa-shopping-cart"></i>ยิบใส่ตะกร้า</a>
                                             @else
                                             <a href="#" class="btn btn-success btn-block" ng-click ="addToCart(p)"><i class="fa fa-shopping-cart"></i>ยิบใส่ตะกร้า</a>
                                            @endguest
                                            
                                        </div>
                                    </div>
                                    <!--end product card-->
                                </div>
                                <h3 ng-if='!pets.length' style="text-align: center">ไม่พบข้อมูลสินค้า</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    var app = angular.module('app',[]).config(function ($interpolateProvider){
                        $interpolateProvider.startSymbol('@{').endSymbol('}');
                    });
                    app.controller('ctrl',function($scope, productService){
                        $scope.pets = [];
                        $scope.animal = {};
                            $scope.getProductList = function (animal){
                                $scope.animal = animal;
                                animal_id = animal != null ? animal.id : '';
                                productService.getProductList(animal_id).then(function (res){
                                if(!res.data.ok) return;
                                $scope.pets = res.data.pets;
                            })
                        }
                        $scope.getProductList(null);
                
                        $scope.animals = [];
                        $scope.getCategoryList = function (){
                            productService.getCategoryList().then( function (res){
                                if(!res.data.ok) return;
                                $scope.animals = res.data.animal
                            })
                        }
                        $scope.getCategoryList();
                        $scope.searchProduct = function (e){
                            productService.searchProduct($scope.query).then(function(res){
                                if(!res.data.ok) return;
                                $scope.pets= res.data.pets
                            })
                        }
                        $scope.addToCart = function (p){
                            window.location.href = '/cart/add/'+ p.id;
                        };
                    });
                    app.service('productService',function($http){
                        this.getProductList = function (animal_id){
                            if(animal_id){
                                return $http.get('/api/pet/' + animal_id);
                            }else {
                                return $http.get('/api/pet');
                            }    
                        };
                        this.getCategoryList = function(){
                            return $http.get('/api/animal')
                        };
                        this.searchProduct = function (query){
                            return $http({url:'/api/pet/search', method:'post' , data:{'query' : query}
                        });
                        };
                    })
                </script>
@endsection

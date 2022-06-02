@extends('frontEnd.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('exams/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('exams/css/responsive.css')}}" />
 @endsection
@section('content')
<div id="page-content">
                <!-- Collection Banner -->
       
                <!-- End Collection Banner -->

                <div class="container mt-5">
                    <div class="row">
                        <!-- Sidebar -->
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
                            <div class="closeFilter d-block d-md-block d-lg-none"><i class="icon an an-times"></i></div>
                            <div class="sidebar_tags">
                                <!-- Price Filter -->
                                
                                <!-- End Price Filter -->
                                <!-- Categories -->
                                <div class="sidebar_widget filterBox categories">
                                    <div class="widget-title"><h2>Categories</h2></div>
                                    <div class="widget-content">
                                        <ul class="sidebar_categories">
                                          

                                            
                                            @foreach($categories as $category)
                                            <li class="lvl-1"><a href="{{ route('categoryExam',$category) }}" class="site-nav">{{$category->name}}</a>
                                            <ul class="ps-4">
                                            @foreach($category->childrens as $children)
                                               <li class="lvl-1"><a href="#" class="site-nav">{{$children->name}}</a></li>
                                               @endforeach
                                            </ul>
                                            @endforeach
                                         
                                        </ul>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <!-- End Sidebar -->

                        <!-- Main Content -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-9 main-col">
                            <div class="productList">
                                <!-- Toolbar -->
                                <div class="toolbar">
                                    <!-- <div class="filters-toolbar-wrapper">
                                        <div class="row">
                                            <div class="col-4 col-md-4 col-lg-4 filters-toolbar__item collection-view-as d-flex justify-content-Start align-items-center">
                                                <button type="button" class="btn-filter d-block d-md-block d-lg-none icon an an-sliders-h" data-bs-toggle="tooltip" data-bs-placement="top" title="Filters"></button>
                                                <a href="shop-left-sidebar.html" class="change-view change-view--active" data-bs-toggle="tooltip" data-bs-placement="top" title="Grid View">
                                                    <i class="icon an an-table"></i>
                                                </a>
                                                <a href="shop-listview.html" class="change-view" data-bs-toggle="tooltip" data-bs-placement="top" title="List View">
                                                    <i class="icon an an-th-list"></i>
                                                </a>
                                            </div>
                                            <div class="col-4 col-md-4 col-lg-4 text-center filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center">
                                                <span class="filters-toolbar__product-count">Showing: 22</span>
                                            </div>
                                            <div class="col-4 col-md-4 col-lg-4 d-flex justify-content-end align-items-center text-end">
                                                <div class="filters-toolbar__item">
                                                    <label for="SortBy" class="hidden">Sort</label>
                                                    <select name="category" id="category" class="filters-toolbar__input filters-toolbar__input--sort">
                                                        <option value="title-ascending" selected="selected">Sort</option>
                                     
                                                   
                                              
                                                    </select>
                                                    <input class="collection-header__default-sort" type="hidden" value="manual">
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- End Toolbar -->

                                <!-- Grid Product -->
                                <div class="grid-products grid--view-items product-three-load-more">
                                    <div class="row" id="row">
                                        @foreach($cat->exams as $exam)
                                         <div class="col-md-6">
                                            
                                            <div class="card mb-3 shadow-sm" style="">
                                                <div class="card-body">
                                                    <h6 class="up-exam-title"><a href="">{{$exam->title}}</a></h6>
                                                    @foreach($exam->categories as $category)
                                                    <h6 class="up-exam-subtitle mb-2 text-muted my-3 d-inline"><a class="" href="">{{$category->name}}</a></h6>
                                                    @endforeach
                                                    <p class="live-exam-date"><span><i class="far fa-calendar-alt"></i> 22 May, 2022 10:00 AM </span>| To <span><i class="far fa-calendar-alt"></i> 22 May, 2022 10:00 AM</span></p>
                                                </div>
                                            </div>
                                       
                                        </div>
                                        @endforeach
                                    
                                     </div>
                                 
                                  
                                </div>
                                <!-- End Grid Product -->
                            </div>

                            <!-- Infinit Pagination -->
                            <!-- <div class="infinitpaginOuter">
                                <div class="infinitpagin-three">	
                                    <a href="#" class="btn loadMoreThree">Load More</a>
                                </div>
                            </div> -->
                            <!-- End Infinit Pagination -->
                        </div>
                        <!-- End Main Content -->
                    </div>
                </div>
            </div>
@endsection

@section('js')
<script src="{{asset('exams/js/plugins.js')}}"></script>
            <!-- Main JS -->
<script src="{{asset('exams/js/main.js')}}"></script>



@endsection
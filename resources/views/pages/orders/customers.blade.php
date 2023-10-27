@extends('layouts.app')
@section('content')

<div id="kt_app_content_container" class="app-container container-xxl">
    <!--begin::Products-->
    <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4"></i>
                    <input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Order" />
                </div>
                <!--end::Search-->
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                <div class="w-100 mw-150px">
                    <!--begin::Select2-->
                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-product-filter="status">
                        <option></option>
                        <option value="all">All</option>
                        <option value="published">Published</option>
                        <option value="scheduled">Scheduled</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    <!--end::Select2-->
                </div>
                <!--begin::Add Order-->
                {{-- <a href="#" class="btn btn-primary">Create Order</a> --}}
                <!--end::Add Order-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1" />
                            </div>
                        </th>
                        <th class="min-w-200px">Order</th>
                        <th class="text-end min-w-100px">Date</th>
                        <th class="text-end min-w-70px">Qty</th>
                        <th class="text-end min-w-100px">Price</th>
                        <th class="text-end min-w-100px">Status</th>
                        <th class="text-end min-w-70px">Actions</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">
                    @foreach($orders as $key => $order)
                    {{-- @dd($order->order_items) --}}
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                              
                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">
                                        @forelse($order->order_items as $item)
                                        <span class="badge badge-light-warning text-primary">
                                            {{ $item->products->name }} x{{ $item->qty }}
                                        </span>
                                            
                                        @empty
                                        @endforelse
                                        
                                    </a>
                                  
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">{{ $order->created_at->toFormattedDateString() }}</span>
                        </td>
                        <td class="text-end pe-0" data-order="39">
                            <span class="fw-bold ms-3">
                                <span class="badge badge-light-info text-primary">
                                    {{ $order->order_items->sum('qty') }}
                                </span>  
                            </span>
                        </td>
                        <td class="text-end pe-0">K {{ $order->order_items->sum('price') * $order->order_items[$key]->qty }}</td>
                      
                        <td class="text-end pe-0" data-order="Inactive">
                            <!--begin::Badges-->
                            
                            @switch($order->status)
                                @case(0)
                                    <div class="badge badge-light-danger text-primary">Not Delivered</div>
                                    @break
                                @case(1)
                                    <div class="badge badge-light-success text-primary">Delivered</div>
                                    @break
                                @case(2)
                                    <div class="badge badge-light-info text-primary">Partial Delivery</div>
                                    @break
                                @case(3)
                                    <div class="badge badge-light-primary text-primary">Return</div>
                                    @break
                                @default
                                    <div class="badge badge-danger text-white">Cancelled</div>
                            @endswitch
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <i class="ki-outline ki-down fs-5 ms-1"></i>
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Update</a>
                                    {{-- <a href="{{ route('Order.edit', $order->id) }}" class="menu-link px-3">Edit</a> --}}
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" onclick="event.preventDefault(); document.getElementById('delete-product-form-{{ $order->id }}').submit();">Delete</a>
                                    <form id="delete-product-form-{{ $order->id }}" action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                        
                    </tr>
                    
        @endforeach
                    {{-- <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="../../demo29/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/4.png);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="../../demo29/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 4</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">04971002</span>
                        </td>
                        <td class="text-end pe-0" data-order="3">
                            <span class="badge badge-light-warning">Low stock</span>
                            <span class="fw-bold text-warning ms-3">3</span>
                        </td>
                        <td class="text-end pe-0">155</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-outline ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-outline ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-outline ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-outline ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-outline ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Published">
                            <!--begin::Badges-->
                            
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                            <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="../../demo29/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="../../demo29/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/6.png);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="../../demo29/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 6</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">03340007</span>
                        </td>
                        <td class="text-end pe-0" data-order="49">
                            <span class="fw-bold ms-3">49</span>
                        </td>
                        <td class="text-end pe-0">114</td>
                        <td class="text-end pe-0" data-order="rating-3">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-outline ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-outline ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-outline ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-outline ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-outline ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Inactive">
                            <!--begin::Badges-->
                            <div class="badge badge-light-danger">Inactive</div>
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                            <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="../../demo29/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="../../demo29/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                    <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/7.png);"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="../../demo29/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 7</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0">
                            <span class="fw-bold">03181007</span>
                        </td>
                        <td class="text-end pe-0" data-order="38">
                            <span class="fw-bold ms-3">38</span>
                        </td>
                        <td class="text-end pe-0">299</td>
                        <td class="text-end pe-0" data-order="rating-4">
                            <div class="rating justify-content-end">
                                <div class="rating-label checked">
                                    <i class="ki-outline ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-outline ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-outline ki-star fs-6"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-outline ki-star fs-6"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-outline ki-star fs-6"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-end pe-0" data-order="Scheduled">
                            <!--begin::Badges-->
                            
                            <!--end::Badges-->
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                            <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="../../demo29/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr> --}}
                    
                    
                </tbody>
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Products-->
</div>

@endsection
@extends('admin.dashboard')

@section('content')

 <div class="row"> 
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Transaction Total Collection</h4>
                <canvas id="transaction-history" class="transaction-chart"></canvas>
                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                    <div class="text-md-center text-xl-left">
                        <h6 class="mb-1"><i class="mdi mdi-currency-usd"></i> Total Profit</h6>
                        <p class="text-muted mb-0">{{ now()->format('d M Y, h:ia') }}</p>
                    </div>
                    <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">RM{{ $totalProfit }}</h6>
                    </div>
                </div>
                <div class="additional-info mt-3">
                    <!-- Add more information or components here -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Top Selling Product</h5>
                    <div class="row">
                    @if($products->isNotEmpty())
                    <p class="text-muted mb-0">
                        Product: {{ $products->first()->product_name }}
                        <br>
                        Total Sold: {{ $totalQuantities[$products->first()->id] ?? 0 }}
                        <br>
                        <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                    <div class="text-md-center text-xl-left">
                        Total Revenue:  <h2 class="mb-0">RM{{ number_format($orderAmounts[$products->first()->id] ?? 0, 2) }}</h2>
                    </div>
                    </div>
                    </p>
                @else
                    <p class="text-muted mb-0">No products available</p>
                @endif
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <!-- <h2 class="mb-0">$45850</h2> -->
                      
                          <p class="text-success ms-2 mb-0 font-weight-medium">+8.3%</p>
                        </div>
                        <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-wallet-travel text-danger ms-auto"></i>
                      </div>
                    </div>
                    
                  </div>
                </div>
    </div>
    <div class="col-sm-4 grid-margin">
    <div class="card">
        <div class="card-body">
            <h5>Total Users</h5>
            <div class="row">
                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                        <h2 class="mb-0">{{ $totalUsers }}</h2>
                        <br>
                  
                        <p class="text-success ms-2 mb-0 font-weight-medium">{{ number_format($percentageChange, 2) }}%</p>
                    </div>
                    <h6 class="text-muted font-weight-normal">Since last month</h6>
                </div>
                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                    <i class="icon-lg mdi mdi-codepen text-primary ms-auto"></i>
                </div>
                <div class="card-body">
                    <h5>Total Orders: {{ $totalOrders }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Staff Activity</h4>
            <p class="card-description">See staff activity status: <code>ONLINE/OFFLINE</code></p>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Staff ID</th>
                            <th>First name</th>
                            <th>Online Timestamp</th>
                            <th>Account Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staff_status as $status)
                            <tr>
                                <td>{{ $status->id }}</td>
                                <td>{{ $status->username }}</td>
                                <td>{{ $status->last_login_at }}</td>
                                <td>
                                    @if ($status->online_status == 1)
                                        <label class="badge badge-success">Online</label>
                                    @else
                                        <label class="badge badge-danger">Offline</label>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



    <div class="row"> 
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Select Promoted Products:</h4>
                <form method="post" action="{{ route('admin.promotion.update') }}">
    @csrf
    <div class="form-group">
        @foreach($products as $product)
            <div class="mt-5">
                <div class="form-check">
                    <input type="checkbox" name="promoted[]" value="{{ $product->id }}" id="product_{{ $product->id }}"
                           class="form-check-input" {{ $product->promoted ? 'checked' : '' }}>
                    <label for="product_{{ $product->id }}" class="{{ $product->promoted ? 'promoted' : 'not-promoted' }}">
                        Product Name: {{ $product->product_name }}
                        <br>Status:
                        @if($product->promoted)
                            <span class="badge badge-success">Promoted</span>
                        @else
                            <span class="badge badge-failed">Not Promoted</span>
                        @endif
                    </label>
                </div>
                <div class="mt-3">
                    <label for="discount">Product Discount:
                       {{ $product->discount }}%
                    </label>
                    <select name="discounts[{{ $product->id }}]" class="form-control">
                        @foreach ($availableDiscounts as $discount)
                            <option value="{{ $discount }}">{{ $discount }}%</option>
                        @endforeach
                    </select>
                </div>
            </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Update Promotion Settings</button>
</form>

            </div>
        </div>
    </div>

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                    
                    <h4 class="card-title mb-1">Sales by Product</h4>
               
                    <p class="text-muted mb-1">   Total Order Amount:</p>
                </div>
                @foreach ($products as $product)
                    <div class="row">
                        <div class="col-12">
                            <div class="preview-list">
                                <div class="preview-item border-bottom">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                            <i class="mdi mdi-file-document"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                            <h6 class="preview-subject">{{ $product->product_name }}</h6>
                                            <p class="text-muted mb-0">Total Sold: {{ $totalQuantities[$product->id] ?? 0 }}</p>
                                        </div>
                                        <div class="me-auto text-sm-right pt-2 pt-sm-0">
                                            <p class="text-muted mb-0"> RM{{ number_format($orderAmounts[$product->id] ?? 0, 2) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex">
                    <!-- Buttons for toggling arrangement -->
                    <form method="get" action="{{ route('admin.index') }}" class="me-2">
                        <input type="hidden" name="sort" value="asc">
                        <button type="submit" class="btn btn-inverse-danger btn-fw">Sort Ascending</button>
                    </form>
                    <form method="get" action="{{ route('admin.index') }}">
                        <input type="hidden" name="sort" value="desc">
                        <button type="submit" class="btn btn-inverse-primary btn-fw">Sort Descending</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection

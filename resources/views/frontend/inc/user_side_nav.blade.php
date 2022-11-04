<div class="aiz-user-sidenav-wrap position-relative z-1 shadow-sm">
    <div class="aiz-user-sidenav rounded overflow-auto c-scrollbar-light pb-5 pb-xl-0">
        <div class="p-4 text-xl-center mb-4 border-bottom bg-primary text-white position-relative">
            <span class="avatar avatar-md mb-3">
                @if (Auth::user()->avatar_original != null)
                    <img src="{{ uploaded_asset(Auth::user()->avatar_original) }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
                @else
                    <img src="{{ static_asset('assets/img/avatar-place.png') }}" class="image rounded-circle" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
                @endif
            </span>
            <h4 class="h5 fs-16 mb-1 fw-600">{{ Auth::user()->name }}</h4>
            @if(Auth::user()->phone != null)
                <div class="text-truncate opacity-60">{{ Auth::user()->phone }}</div>
            @else
                <div class="text-truncate opacity-60">{{ Auth::user()->email }}</div>
            @endif
        </div>

        <div class="sidemnenu mb-3">
            <ul class="aiz-side-nav-list px-2" data-toggle="aiz-side-menu">

                <li class="aiz-side-nav-item">
                    <a href="{{ route('dashboard') }}" class="aiz-side-nav-link {{ areActiveRoutes(['dashboard'])}}">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Dashboard') }}</span>
                    </a>
                </li>

                @php
                        $delivery_viewed = App\Models\Order::where('user_id', Auth::user()->id)->where('delivery_viewed', 0)->get()->count();
                        $payment_status_viewed = App\Models\Order::where('user_id', Auth::user()->id)->where('payment_status_viewed', 0)->get()->count();
                    @endphp
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('purchase_history.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['purchase_history.index'])}}">
                            <i class="las la-file-alt aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Purchase History') }}</span>
                            @if($delivery_viewed > 0 || $payment_status_viewed > 0)<span class="badge badge-inline badge-success">{{ translate('New') }}</span>@endif
                        </a>
                    </li>

                    <li class="aiz-side-nav-item">
                        <a href="{{ route('digital_purchase_history.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['digital_purchase_history.index'])}}">
                            <i class="las la-download aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Downloads') }}</span>
                        </a>
                    </li>

                    @if (addon_is_activated('refund_request'))
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('customer_refund_request') }}" class="aiz-side-nav-link {{ areActiveRoutes(['customer_refund_request'])}}">
                                <i class="las la-backward aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">{{ translate('Sent Refund Request') }}</span>
                            </a>
                        </li>
                    @endif

                    <li class="aiz-side-nav-item">
                        <a href="{{ route('wishlists.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['wishlists.index'])}}">
                            <i class="la la-heart-o aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Wishlist') }}</span>
                        </a>
                    </li>

                    <li class="aiz-side-nav-item">
                        <a href="{{ route('compare') }}" class="aiz-side-nav-link {{ areActiveRoutes(['compare'])}}">
                            <i class="la la-refresh aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Compare') }}</span>
                        </a>
                    </li>


                    <li class="aiz-side-nav-item">
                        <a href="{{ route('customer.blog.create') }}" class="aiz-side-nav-link {{ areActiveRoutes(['compare'])}}">
                            <i class="la la-heart-o aiz-side-nav-ico"></i>
                            <span class="aiz-side-nav-text">{{ translate('Blog') }}</span>
                        </a>
                    </li>

                    
                <li class="aiz-side-nav-item">
                    <a href="{{ route('profile') }}" class="aiz-side-nav-link {{ areActiveRoutes(['profile'])}}">
                        <i class="las la-user aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Manage Profile')}}</span>
                    </a>
                </li>

            </ul>
        </div>
        @if (get_setting('vendor_system_activation') == 1 && Auth::user()->user_type == 'customer')
            <div>
                <a href="{{ route('shops.create') }}" class="btn btn-block btn-soft-primary rounded-0">
                    </i>{{ translate('Be A Seller') }}
                </a>
            </div>
        @endif
        @if(Auth::user()->user_type == 'seller')
          <hr>
          <h4 class="h5 fw-600 text-center">{{ translate('Sold Amount')}}</h4>
          @php
              $date = date("Y-m-d");
              $days_ago_30 = date('Y-m-d', strtotime('-30 days', strtotime($date)));
              $days_ago_60 = date('Y-m-d', strtotime('-60 days', strtotime($date)));
          @endphp
          <div class="widget-balance pb-3 pt-1">
            <div class="text-center">
                <div class="heading-4 strong-700 mb-4">
                    @php
                        $orderTotal = \App\Models\Order::where('seller_id', Auth::user()->id)->where("payment_status", 'paid')->where('created_at', '>=', $days_ago_30)->sum('grand_total');
                        //$orderDetails = \App\Models\OrderDetail::where('seller_id', Auth::user()->id)->where('created_at', '>=', $days_ago_30)->get();
                        //$total = 0;
                        //foreach ($orderDetails as $key => $orderDetail) {
                            //if($orderDetail->order != null && $orderDetail->order != null && $orderDetail->order->payment_status == 'paid'){
                                //$total += $orderDetail->price;
                            //}
                        //}
                    @endphp
                    <small class="d-block fs-12 mb-2">{{ translate('Your sold amount (current month)')}}</small>
                    <span class="btn btn-primary fw-600 fs-18">{{ single_price($orderTotal) }}</span>
                </div>
                <table class="table table-borderless">
                    <tr>
                        @php
                            $orderTotal = \App\Models\Order::where('seller_id', Auth::user()->id)->where("payment_status", 'paid')->sum('grand_total');
                        @endphp
                        <td class="p-1" width="60%">
                            {{ translate('Total Sold')}}:
                        </td>
                        <td class="p-1 fw-600" width="40%">
                            {{ single_price($orderTotal) }}
                        </td>
                    </tr>
                    <tr>
                        @php
                            $orderTotal = \App\Models\Order::where('seller_id', Auth::user()->id)->where("payment_status", 'paid')->where('created_at', '>=', $days_ago_60)->where('created_at', '<=', $days_ago_30)->sum('grand_total');
                        @endphp
                        <td class="p-1" width="60%">
                            {{ translate('Last Month Sold')}}:
                        </td>
                        <td class="p-1 fw-600" width="40%">
                            {{ single_price($orderTotal) }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        @endif

    </div>

    <div class="fixed-bottom d-xl-none bg-white border-top d-flex justify-content-between px-2" style="box-shadow: 0 -5px 10px rgb(0 0 0 / 10%);">
        <a class="btn btn-sm p-2 d-flex align-items-center" href="{{ route('logout') }}">
            <i class="las la-sign-out-alt fs-18 mr-2"></i>
            <span>{{ translate('Logout') }}</span>
        </a>
        <button class="btn btn-sm p-2 " data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb">
            <i class="las la-times la-2x"></i>
        </button>
    </div>
</div>

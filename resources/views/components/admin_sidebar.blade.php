<!--begin::Aside-->
<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle" style="background-color: #4d4d4d ">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo" style="background-color: #fff; border-bottom:1px solid #edc596;">
        <!--begin::Logo-->
        <a href="#">
            <img alt="Logo" src="{{ asset('admin_assets')}}/assets/images/icons/background.png"
                class="h-60px logo" />
        </a>
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize" style="border-bottom:1px solid #edc596; color:#edc596;">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path opacity="0.5"
                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                        fill="black" />
                    <path
                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                        fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
            data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-users fa-lg text-white"></i>
                    </span>
                    <span class="menu-title">Human Resource</span>
                    <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.employee.all_employees')}}">
                                <span class="menu-title"><i class="fas fa-users fa-lg text-white"></i>&nbsp; &nbsp;Employees</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.driver.all_driver')}}">
                                <span class="menu-title"><i class="fas fa-car fa-lg text-white"></i>&nbsp; &nbsp;Drivers</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.employee.add_employee')}}">
                                <span class="menu-title"><i class="fas fa-user-plus fa-lg text-white"></i>&nbsp; &nbsp;Add Employee</span>
                            </a>
                        </div>

                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-brands fa-rebel fa-lg text-white"></i>
                    </span>
                    <span class="menu-title">Shipper Details</span>
                    <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.shipper.add')}}">
                                <span class="menu-title"><i class="fas fa-user-plus fa-lg text-white"></i>&nbsp; &nbsp;Add Shipper</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.shipper.index')}}">
                                <span class="menu-title"><i class="fas fa-brands fa-rebel fa-lg text-white"></i>&nbsp; &nbsp;Shipper</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.shipper.rates')}}">
                                <span class="menu-title"><i class="fas fa-user-plus fa-lg text-white"></i>&nbsp; &nbsp;Shipper Rates</span>
                            </a>
                        </div>

                    </div>
                </div>


                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-columns fa-lg text-white"></i>
                    </span>
                    <span class="menu-title">Shipment Details</span>
                    <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.shipment.tracking')}}">
                                <span class="menu-title"><i class="fas fa-paw fa-lg text-white"></i>&nbsp; &nbsp;Tracking</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.shipment.place_order')}}">
                                <span class="menu-title"><i class="fas fa-cube fa-lg text-white"></i>&nbsp; &nbsp;Place Order</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.shipment.upload_shipments')}}">
                                <span class="menu-title"><i class="fas fa-file-excel fa-lg text-white"></i>&nbsp; &nbsp;Upload Shipment</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.shipment.create_booking')}}">
                                <span class="menu-title"><i class="fas fa-codepen fa-lg text-white"></i>&nbsp; &nbsp;Create Booking</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.shipment.operation_dashboard')}}">
                                <span class="menu-title"><i class="fas fa-reply fa-lg text-white"></i>&nbsp; &nbsp;Operation Dashboard</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.shipment.update_status')}}">
                                <span class="menu-title"><i class="fas fa-plus fa-lg text-white"></i>&nbsp; &nbsp;Update Status</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.shipment.send_sms')}}">
                                <span class="menu-title"><i class="fas fa-envelope fa-lg text-white"></i>&nbsp; &nbsp;Send SMS</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.shipment.edit_place_order')}}">
                                <span class="menu-title"><i class="fas fa-edit fa-lg text-white"></i>&nbsp; &nbsp;Edit Order</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.shipment.add_collection')}}">
                                <span class="menu-title"><i class="fas fa-umbrella fa-lg text-white"></i>&nbsp; &nbsp;Add Collection Without Ref</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.shipment.all_shipment_audit')}}">
                                <span class="menu-title"><i class="fas fa-file fa-lg text-white"></i>&nbsp; &nbsp;Shipment Audit</span>
                            </a>
                        </div>

                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-cubes fa-lg text-white"></i>
                    </span>
                    <span class="menu-title">Dispatch</span>
                    <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.dispatch.delivery_jobs')}}">
                                <span class="menu-title"><i class="fas fa-truck fa-lg text-white"></i>&nbsp; &nbsp;Delivery Jobs</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.dispatch.inscan')}}">
                                <span class="menu-title"><i class="fas fa-sign-in-alt fa-lg text-white"></i>&nbsp; &nbsp;Inscan</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.dispatch.outscan')}}">
                                <span class="menu-title"><i class="fas fa-sign-out-alt fa-lg text-white"></i>&nbsp; &nbsp;Outscan</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.dispatch.pickup_req')}}">
                                <span class="menu-title"><i class="fas fa-cubes fa-lg text-white"></i>&nbsp; &nbsp;Pickup Jobs</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.dispatch.manifest')}}">
                                <span class="menu-title"><i class="fas fa-file-alt fa-lg text-white"></i>&nbsp; &nbsp;Manifest</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.dispatch.pendings')}}">
                                <span class="menu-title"><i class="fas fa-car fa-lg text-white"></i>&nbsp; &nbsp;Collection Pendings</span>
                            </a>
                        </div>


                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.dispatch.collection_jobs')}}">
                                <span class="menu-title"><i class="fas fa-truck fa-lg text-white"></i>&nbsp; &nbsp;Collection Jobs</span>
                            </a>
                        </div>


                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.dispatch.driver_location')}}">
                                <span class="menu-title"><i class="fas fa-location-arrow fa-lg text-white"></i>&nbsp; &nbsp;Driver Location</span>
                            </a>
                        </div>

                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-sitemap fa-lg text-white"></i>
                    </span>
                    <span class="menu-title">Distribution</span>
                    <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-reply fa-lg text-white"></i>&nbsp; &nbsp;Zone</span>
                            </a>
                        </div>

                    </div>
                </div>


                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-sitemap fa-lg text-white"></i>
                    </span>
                    <span class="menu-title">Customers Service</span>
                    <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-users fa-lg text-white"></i>&nbsp; &nbsp;Receieve Return</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-car fa-lg text-white"></i>&nbsp; &nbsp;Pending For Return</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-user-plus fa-lg text-white"></i>&nbsp; &nbsp;Return Report</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-user-plus fa-lg text-white"></i>&nbsp; &nbsp;Return Reports</span>
                            </a>
                        </div>

                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-file fa-lg text-white"></i>
                    </span>
                    <span class="menu-title">Reports</span>
                    <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-users fa-lg text-white"></i>&nbsp; &nbsp;Collection Report</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-car fa-lg text-white"></i>&nbsp; &nbsp;Delivery Report</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-user-plus fa-lg text-white"></i>&nbsp; &nbsp;Collection Report v2</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-user-plus fa-lg text-white"></i>&nbsp; &nbsp;Driver Commissions</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-user-plus fa-lg text-white"></i>&nbsp; &nbsp;Pickup Commissions</span>
                            </a>
                        </div>

                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-university fa-lg text-white"></i>
                    </span>
                    <span class="menu-title">Shipper Account</span>
                    <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-users fa-lg text-white"></i>&nbsp; &nbsp;Add Adjustment</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-car fa-lg text-white"></i>&nbsp; &nbsp;Generate Invoice</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-user-plus fa-lg text-white"></i>&nbsp; &nbsp;Order</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-user-plus fa-lg text-white"></i>&nbsp; &nbsp;Invoice Report</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-user-plus fa-lg text-white"></i>&nbsp; &nbsp;Edit Service Charges</span>
                            </a>
                        </div>

                    </div>
                </div>


                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-university fa-lg text-white"></i>
                    </span>
                    <span class="menu-title">Driver Account</span>
                    <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-users fa-lg text-white"></i>&nbsp; &nbsp;Verify AWB</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-car fa-lg text-white"></i>&nbsp; &nbsp;Expense / Shortage</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-user-plus fa-lg text-white"></i>&nbsp; &nbsp;Receivable</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-user-plus fa-lg text-white"></i>&nbsp; &nbsp;Print Report</span>
                            </a>
                        </div>


                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-user-plus fa-lg text-white"></i>&nbsp; &nbsp;Verify Report</span>
                            </a>
                        </div>

                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-link fa-lg text-white"></i>
                    </span>
                    <span class="menu-title">Permission</span>
                    <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-users fa-lg text-white"></i>&nbsp; &nbsp;Set Permissions</span>
                            </a>
                        </div>

                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-sharp fa-solid fa-gear fa-lg text-white"></i>
                    </span>
                    <span class="menu-title">Settings</span>
                    <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-users fa-lg text-white"></i>&nbsp; &nbsp;Add Warehouse</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-car fa-lg text-white"></i>&nbsp; &nbsp;Warehouse</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-user-plus fa-lg text-white"></i>&nbsp; &nbsp;Add Rank</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-user-plus fa-lg text-white"></i>&nbsp; &nbsp;Ranks</span>
                            </a>
                        </div>

                    </div>
                </div>


                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-user fa-lg text-white"></i>
                    </span>
                    <span class="menu-title">Account</span>
                    <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-users fa-lg text-white"></i>&nbsp; &nbsp;Payment Vouchers</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-title"><i class="fas fa-car fa-lg text-white"></i>&nbsp; &nbsp;Sales Vouchers</span>
                            </a>
                        </div>


                    </div>
                </div>

            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
</div>

<!--end::Aside-->

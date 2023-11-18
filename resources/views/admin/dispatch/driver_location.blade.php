{{-- Extends layout --}}
@extends('layouts.admin')
@section('page_title', ' Delivery Location')
{{-- Content --}}
@section('content')
    <div class="card-body">
        <div class="row p-4 bg-light" style="margin-left: 0.1rem; margin-right: 0.1rem;">
            <div class="card card-custom example example-compact w-100">
                <h2 class="card-title ml-4">
                    Driver Location
                </h2>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <hr>
                                <div class="col-12">
                                    <!--Google map-->
                                    <div class="google_map_area mt-2 mb-2 ml-3 mr-2">
                                        <iframe class="map"
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115579.9515049569!2d55.16953355544885!3d25.090356924905966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f4346e65f5365%3A0x6beb0d2d1c50af17!2sDubai%2C%20United%20Arab%20Emirates!5e0!3m2!1sen!2sus!4v1622504052093!5m2!1sen!2sus"
                                            width="900" height="600" style="border:0;" allowfullscreen=""
                                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                    <!--Google map-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- Scripts Section --}}
@section('page-scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection

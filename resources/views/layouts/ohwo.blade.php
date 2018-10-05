<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', 'OHWO')</title>

        <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('dist/css/helper.css') }}" rel="stylesheet">    

        <link rel="stylesheet" href="{{ asset('dist/css/font-awesome.css') }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dist/images/favicon.png') }}">
        <!-- Notify -->
        <link rel="stylesheet" href="{{ asset('plugins/notify/jquery.growl.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700" rel="stylesheet">

        <link href="{{ asset('dist/css/bootstrap-colorpicker.css') }}" rel="stylesheet">       
        
         @yield('header-assets')
        <script>
            window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            ]) !!};



              
        </script>
        <style>
            /* This sets the color for "TK" nodes to a light blue green. */
            g.type-TK > rect {
                fill: #00ffd0;
            }

            text {
                font-weight: 300;
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                font-size: 14px;
            }

            .nodes {
                padding: 10px;
            }

            .node rect {
                stroke: #999;
                fill: #fff;
                stroke-width: 1.5px;
            }

            .nodes .node div {
                color: #444;
            }

            .edgePath path {
                stroke: #333;
                stroke-width: 1.5px;
            }

        </style>
    </head>
    <body>

    @include('partials.topbar')
        
        <section class="mainsection">
            <div class="container-fluid"  id="ohwo">
                <div class="row row-no-padding">
                    
                    @yield('content')
                    
                </div>
            </div>
        </section>

        <!-- Start Script -->
        <script src="{{ asset('dist/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('dist/js/bootstrap.min.js') }}"></script>
        

        <!-- notify -->
        <script src="{{ asset('plugins/notify/jquery.growl.js') }}"></script>     
        <script src="{{ asset('dist/js/jquery.panzoom.js') }}"></script>
       
        <script type="text/javascript">
            
            function show_notify(notify_msg,notify_type){
                if(notify_type == true){
                    $.growl.notice({ title:"Success!",message:notify_msg});
                } else if(notify_type == 'Alert'){
                    $.growl.warning({ title:"Alert!",message:notify_msg});
                } else {
                    $.growl.error({ title:"False!",message:notify_msg});
                }
            }
             
        </script>


        <script>
            $(".cm-box").each(function () {
             if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
                 $(this).addClass('image-checkbox-checked');
               }
               else {
                 $(this).removeClass('image-checkbox-checked');
               }
            });

            $(".cm-box").on("click", function (e) {
             $(this).toggleClass('image-checkbox-checked');
               var $checkbox = $(this).find('input[type="checkbox"]');
               $checkbox.prop("checked",!$checkbox.prop("checked"));

               e.preventDefault();
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
                $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});    

               

                $('.Switch').click(function() {
                    $(this).toggleClass('On').toggleClass('Off');
                });

            });  
        </script>

        <script type="text/javascript">
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            window.APP_URL = "{{ env('APP_URL') }}"
        </script>

         <!--end::Page Snippets -->
         @yield('script-assets')
    </body>

</html>
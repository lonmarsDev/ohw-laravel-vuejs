@extends('layouts.ohwo')

@section('content')
<section class="mainsection">
    <div class="container-fluid">
        <div class="row row-no-padding">

            <div class="col-sm-4 col-md-3 col-lg-2">
                @include('partials.left_sidebar', ['ActiveMenu'=>'details'])
            </div>

            <div class="col-sm-8 col-md-9 col-lg-10">

                <div class="rightmenumain">
                    <div class="titlemain">
                        <h2>Company Name</h2>
                        <!--<div class="right">ccs</div>-->
                    </div>
                </div>

                <div class="containbox">

                    <div class="innerformmain topspace">
                        <h2>Details</h2>

                        <div class="formall">
                            <form id="form_details" class="row">

                                <div class="form-group col-md-6">
                                    <label>Account Name</label>
                                    <input type="text" name="account_name" class="form-control" value="{{ $user['username'] }}" placeholder="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Time Zone</label>
                                    <div class="dropdown">
                                        <select class="form-control" name="timezone">
                                            <option value="" >--Select--</option>
                                            @foreach($timezone as $tz)
                                            <option value="{{ $tz['timezoneId'] }}" {{ ($user['timezone'] == $tz['timezoneId']) ? 'selected': '' }}>{{ $tz['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="note">When you schedule campaigns, we'll use this time zone as a reference.</span>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Date/Time/Format</label>
                                    <div class="dropdown">
                                        <select class="form-control" name="date_format">
                                            <option value="">--Select--</option>
                                            <option value="1" {{ $user['date_format'] == 1 ? 'selected' : '' }}>mm/dd/yyyy 12 hour</option>
                                            <option value="2" {{ $user['date_format'] == 2 ? 'selected' : '' }}>mm/dd/yyyy 24 hour</option>
                                            <option value="3" {{ $user['date_format'] == 3 ? 'selected' : '' }}>dd/mm/yyyy 12 hour</option>
                                            <option value="4" {{ $user['date_format'] == 4 ? 'selected' : '' }}>dd/mm/yyyy 24 hour</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Currency Format</label>
                                    <div class="dropdown">
                                        <select class="form-control" name="currency_format">
                                            <option value="" >--Select--</option>
                                            <option value="1" {{ $user['currency_format'] == 1 ? 'selected' : '' }}>1,234.56</option>
                                            <option value="2" {{ $user['currency_format'] == 2 ? 'selected' : '' }}>1.234,56</option>
                                            <option value="3" {{ $user['currency_format'] == 3 ? 'selected' : '' }}>1 234,56</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="sep"></div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn1">Save</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>


                <div class="containbox">
                    <h2>Company Name for Agencies</h2>
                    <p>Do you help other organizations use Company Name?<br />As an <a href="#" class="link02">agency</a>, you can manage multiple clients and invite collaborators to your account!</p>

                    <div class="sep clear"></div>
                    <ul class="checkbox2">
                        <li>
                            <input class="checkbox2-checkbox" id="checkbox2-checkbox-3" value="value1" type="checkbox">
                            <label for="checkbox2-checkbox-3">I'm a marketing agency</label>
                        </li>
                    </ul>
                    <div class="sep clear"></div>

                    <a href="#" class="btn btn2">Save</a>
                </div>


                <div class="containbox">

                    <div class="innerformmain topspace">
                        <h2>Help Us Improve Stats</h2>
                        <p>We use this info to run stats like, "average rates for non-profits" or best day to send emails for restaurants."<br />Help us and fellow Company Name users get really useful data. We keep it anonymous.</p>
                        <div class="sep"></div>
                        <div class="formall">
                            <form class="row">

                                <div class="form-group col-md-6">
                                    <label>Your Industry</label>
                                    <div class="dropdown">
                                        <select class="form-control">
                                            <option>Please specify...</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group col-md-6">
                                    <label>How many people are in your organization?</label>
                                    <div class="dropdown">
                                        <select class="form-control">
                                            <option>Select</option>
                                            <option>02</option>
                                            <option>03</option>
                                        </select>
                                    </div>
                                    <span class="note">When you schedule campaigns, we'll use this time zone as a reference.</span>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>How old is your organization?</label>
                                    <div class="dropdown">
                                        <select class="form-control">
                                            <option>&#706; 1 year</option>
                                            <option>&#706; 2 year</option>
                                            <option>&#706; 3 year</option>
                                            <option>&#706; 4 year</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="sep"></div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn1">Save</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>


                <div class="containbox">
                    <h2>Email from Company Name</h2>
                    <p>I'd like to receive the following emails:</p>

                    <div class="checkbox2 box">
                        <div>
                            <input class="checkbox2-checkbox" id="Emailfrom1" value="value1" type="checkbox">
                            <label for="Emailfrom1">Confirmation when campaign is sent</label>
                        </div>
                        <div>
                            <input class="checkbox2-checkbox" id="Emailfrom2" value="value1" type="checkbox">
                            <label for="Emailfrom2">Weekly account summary</label>
                        </div>
                        <div>
                            <input class="checkbox2-checkbox" id="Emailfrom3" value="value1" type="checkbox">
                            <label for="Emailfrom3">Monkey Wrench: new content and company updates</label>
                        </div>
                        <div>
                            <input class="checkbox2-checkbox" id="Emailfrom4" value="value1" type="checkbox">
                            <label for="Emailfrom4">Getting started: setup, design, reporting, and more</label>
                        </div>
                        <div>
                            <input class="checkbox2-checkbox" id="Emailfrom5" value="value1" type="checkbox">
                            <label for="Emailfrom5">What's in Store: weekly e-commerce stories, tips, and experimentation</label>
                        </div>
                        <div>
                            <input class="checkbox2-checkbox" id="Emailfrom6" value="value1" type="checkbox">
                            <label for="Emailfrom6">MailChimp <i class="fa fa-heart"></i>Agencies: Personalized recommendations, agency insights, and case studies</label>
                        </div>
                        <div>
                            <input class="checkbox2-checkbox" id="Emailfrom7" value="value1" type="checkbox">
                            <label for="Emailfrom7">Getting started for Agencies: tips for account setup, campaign building, automation, and client success</label>
                        </div>
                    </div>

                    <a href="#" class="link02 bold">See past issues of our newsletters</a>
                    <div class="sep clear"></div>

                    <a href="#" class="btn btn2">Save</a>
                </div>


            </div>

        </div>
    </div>
</section>

<script type="text/javascript" src="{{ asset('dist/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        /* profile form validation */
        var form_details = $('#form_details');
        form_details.validate( {
            rules: {
                account_name: {required: true},
                timezone: {required: true},
                date_format: {required: true},
                currency_format: {required: true}
            },
            messages: {
                account_name: "Please enter Account Username.",
                timezone: "Please Select Timezone.",
                date_format: "Please Select Date Format.",
                currency_format: "Please Select Currency Format."
            },
            submitHandler: function(form) {
               //var postData = new FormData('#form_details');
               var postData = $("#form_details").serialize();
                $.ajax({
                    url: "{{ url('home/save_user_details') }}",
                    type: "POST",
                    data: postData,
                    success: function (response) {
                        var json = $.parseJSON(response);
                        if (json['success'] == 'Updated'){
                            show_notify('Cool, your account details have been saved.',true);
                        }
                        if(json['success'] == 'Error'){
                            show_notify('Some error has occurred !',false);
                            return false;
                        }
                        return false;
                    },
                });
                return false;
            },
        
        });
        
        $.validator.addMethod("regex", function (value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        });

        /* profile form validation */
        var profile_form = $('#profileForm');
        profile_form.validate( {
            //ignore: [".hidden"],
            rules: {
                username: {
                    required: true,
                    /*regex: /^[a-zA-Z_\s]{2,10}$/*/
                },
                fname: {
                    required: true,
                },
                lname: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                // username: { required : "Please enter your first name", regex : "Please enter valid first name" },
                username: "Please enter your Username",
                fname: "Please enter your First name",
                lname: "Please enter your Last name",
                email: "Please enter a valid email address"
            },
            errorElement: "span",
            errorPlacement: function ( error, element ) {
                // Add the `help-block` class to the error element
                error.addClass( "help-block" );

                if ( element.prop( "type" ) === "checkbox" ) {
                    error.insertAfter( element.parent( "label" ) );
                } else if( element.hasClass("phone") ){
                    error.insertAfter( element.parent( ".input-group" ) );
                } else {
                    error.insertAfter( element );
                }
            },
            highlight: function ( element, errorClass, validClass ) {
            //$( element ).parents( ".col-md-6,.col-md-12" ).addClass( "has-error" ).removeClass( "has-success" );
            },
            unhighlight: function (element, errorClass, validClass) {
            //$( element ).parents( ".col-md-6,.col-md-12" ).addClass( "has-success" ).removeClass( "has-error" );
            }
        });

        /* change password validation */
        var password_form = $('#passwordForm');
        password_form.validate( {
            //ignore: [".hidden"],
            rules: {
                oldpassword: {
                    required: true,
                    /*regex: /^[a-zA-Z_\s]{2,10}$/*/
                },
                password: {
                    required: true,
                    regex: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{8}$/
                },
                newpassword: {
                    required: true,
                }
            },
            messages: {
                // username: { required : "Please enter your first name", regex : "Please enter valid first name" },
                oldpassword: "Please enter Old Password",
                password: { required: "Please enter Password", regex: "Please enter Valid Password"},
                newpassword: "Please enter New Password",
            },
            errorElement: "span",
            errorPlacement: function ( error, element ) {
                // Add the `help-block` class to the error element
                error.addClass( "help-block" );

                if ( element.prop( "type" ) === "checkbox" ) {
                    error.insertAfter( element.parent( "label" ) );
                } else if( element.hasClass("phone") ){
                    error.insertAfter( element.parent( ".input-group" ) );
                } else {
                    error.insertAfter( element );
                }
            },
            highlight: function ( element, errorClass, validClass ) {
            //$( element ).parents( ".col-md-6,.col-md-12" ).addClass( "has-error" ).removeClass( "has-success" );
            },
            unhighlight: function (element, errorClass, validClass) {
            //$( element ).parents( ".col-md-6,.col-md-12" ).addClass( "has-success" ).removeClass( "has-error" );
            }
        });

        /* Profile Information */
        $('#profileBtn').click(function() {
            var id = $('#userid').val();

            if(profile_form.valid())
            {
                var data = $('#profileForm').serialize();
                $.ajax({
                    type: "post",
                    url: "{{ url('Home/update_information/') }}"+id,
                    data: data,
                    success: function(data) {
                        data = jQuery.parseJSON(data);
                        if(data.success == true)
                        {
                            show_notify(data.message,true);
                        }
                        else
                        {
                            show_notify(data.message,false);
                        }
                    }
                });
            }
            else
            {
                return false;
            }

        });

        /* Change Password */
        $('#passwordBtn').click(function() {
            var id = $('#userid').val();

            if(password_form.valid())
            {
                if($('#password').val() == $('#newpassword').val())
                {
                    var data = $('#passwordForm').serialize();
                    $.ajax({
                        type: "post",
                        url: "{{ url('Home/change_password/') }}"+id,
                        data: data,
                        success: function(data) {
                            console.log(data);
                            data = jQuery.parseJSON(data);
                            if(data.success == true)
                            {
                                $('#passwordForm').trigger("reset");;
                                show_notify(data.message,true);
                                show_notify('You have to login again',true);
                                setTimeout(function() {
                                    window.location.href = "{{ url('auth/logout') }}";
                                }, 5000)
                            }
                            else
                            {
                                show_notify(data.message,false);
                            }
                        }
                    });
                }
                else
                {
                    alert('Passwords does not match');
                }
            }
            else
            {
                return false;
            }

        });


        /* Image Upload */
        $(".Image").on("change", function (event) {
            var oldImage = $('#oldImage').val();
            var id = $(this).attr("id");
            filename = event.target.files[0].name;
            file = filename.split(".").pop().toLowerCase();
            $("#Preview"+id).fadeIn("fast").attr('src','');
            if(file == "jpg" || file == "png" || file == "jpeg" || file == "gif"){
                var tmppath = URL.createObjectURL(event.target.files[0]);
                $("#Preview"+id).css('height','160px');
                $("#Preview"+id).fadeIn("fast").attr('src',tmppath);
                
                /*var uid = $('#userid').val();
                var data = $('#imageForm').serialize();
                $.ajax({
                    type: "post",
                    url: "{{ url('Home/upload_image/') }}"+uid,
                    data: data,
                    success: function(data) {
                        console.log(data);
                        return false;
                        data = jQuery.parseJSON(data);
                        if(data.success == true)
                        {
                            show_notify(data.message,true);
                        }
                        else
                        {
                            show_notify(data.message,false);
                        }
                    }
                });*/
                $('#imageForm').submit();

            } else {
              // $('#'+id+'-error').html("Please Select Correct File Only.!!!");
              show_notify('Please Select Correct File Only.!!!', false);
              //$(this).val(oldImage);
              $("#Preview"+id).fadeIn("fast").attr('src',oldImage);
            }
        });


    });
    
</script>        
@endsection

@extends('layouts.ohwo')

@section('content')
<style type="text/css">
    .modal .modal-header {
        background: #f2f2f2;
    }
    .modal .modal-header .close {
        background: #000;
        border-radius: 100%;
        height: 25px;
        width: 25px;
        text-align: center;
    }
    legend.required::after, label.required::after {
        content: "required";
        float: right;
        color: #959595;
        font-size: .86666667em;
    }
    #billingModal .modal-dialog {
        width: 50%;
    }
    #billingModal .modal-body {
        padding: 30px 15px;
    }
    #billingModal label {
        font-size: 14px;
    }
    #billingModal .modal-footer {
        text-align: left;
    }
    #billingModal span {
        font-size: 14px;
    }
</style>

<section class="mainsection">
    <div class="container-fluid">
        <div class="row row-no-padding">

            <div class="col-sm-4 col-md-3 col-lg-2">
                @include('partials.left_sidebar', ['ActiveMenu'=>'contact', 'user'=>$user])
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
                        <h2>Contact Information</h2>

                        <h4>Profile</h4>
                        <p>This is the information we have associated with your Company Name profile, which you can use to access multiple Company Name accoun. If you need to reset your username or password, or verify account changes, well send the link to your profile email address.</p>

                        <p>All contact information is kept stnctly confidential. View our <a href="#" class="link2 bold">privacy policy</a>.</p>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="tablestriped-one table-responsive">
                                    <table class="table table-striped bold">
                                        <thead>
                                            <tr>
                                                <th class="left">Username</th>
                                                <th class="right">{{ $user['username'] }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="left">First Name</td>
                                                <td class="right">{{ $user['fname'] }}</td>
                                            </tr>
                                            <tr>
                                                <td class="left">Last Name</td>
                                                <td class="right">{{ $user['lname'] }}</td>
                                            </tr>
                                            <tr>
                                                <td class="left">Email Address</td>
                                                <td class="right">{{ $user['email'] }}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <a href="{{ url('Profile') }}" class="btn btn1">Edit Profile Information</a>

                    </div>
                </div>


                <div class="containbox">
                    <h2>Billing Info</h2>
                    <p>This is the information we have associated with your payment method.</p>

                    <div class="row">
                        <div class="col-md-6">
                            <h4>Contact Name</h4>
                            <div class="tablestriped-one table-responsive">
                                <table class="table table-striped bold">
                                    <tbody>
                                        <tr>
                                            <td class="left">Company/ Organization</td>
                                            <td class="right">
                                            {{ ($user['company'] != "") ? $user['company'] : '<span class="left">Company not Provided</span>' }}       
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">Address</td>
                                            <td class="right">
                                            <?php
                                            $address = $user['address']."<br>";
                                            $address .= ($user['address_2'] != "") ? $user['address_2']."<br>" : '';
                                            $address .= $user['city'].','.$user['zip']."<br>";
                                            $address .= (isset($user['countryName'])) ? $user['countryName'] : '' ;
                                            ?>
                                            {!! ($user['address'] != "") ? $address : '<span class="left">Address not Provided</span>' !!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">Phone</td>
                                            <td class="right">
                                            {!! ($user['phone'] != "") ? $user['phone'] : '<span class="left">No Phone number provided</span>' !!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">Email</td>
                                            <td class="right">
                                            {!! ($user['email'] != "") ? $user['email'] : '<span class="left">No Email Provided</span>' !!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">VAT, GST / Tax ID</td>
                                            <td class="right">{{ $user['vat_tax'] }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <a data-toggle="modal" data-target="#billingModal" class="btn btn1">Edit Billing Information</a>
                </div>


                <div class="containbox">
                    <h2>Lists in this Account</h2>
                    <p>We'll show your list, contact info in campaign footers to comply with <a href="#" class="link02 bold">international spam laws</a>.</p>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="tablestriped-one table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td class="left">
                                                <p class="bold">List Name</p>
                                                <p>Company Name</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <p class="bold">Contact Name</p>
                                                <p>John Smith</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <p class="bold">ComPany / Organization</p>
                                                <p>wwwtestl.com</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <p class="bold">Address</p>
                                                <p>508 Virginia,</p>
                                                <p>Chicago, IL 60653, USA</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <p class="bold">Email</p>
                                                <p>lohnsmith@gmail.com</p>
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <a href="#" class="btn btn1">Edit Profile Information</a>
                </div>





            </div>

        </div>
    </div>
</section>

<!-- Modal -->
<div id="billingModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form name="billingForm" id="billingForm">
        <input type="hidden" name="userId" id="userId" value="{{ $user['id'] }}">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Billing Information</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fname" class="required">First Name</label>
                        <input type="text" name="fname" id="fname" value="{{ ($user['fname'] != "") ? $user['fname'] : '' }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lname" class="required">Last Name</label>
                        <input type="text" name="lname" id="lname" value="{{ ($user['lname'] != "") ? $user['lname'] : '' }}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="required">Email address</label>
                        <input type="text" name="email" id="email" value="{{ ($user['email'] != "") ? $user['email'] : '' }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" onkeypress="return checkOnlyDigits()" name="phone" id="phone" value="{{ ($user['phone'] != "") ? $user['phone'] : '' }}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="company" class="required">Company / Organization</label>
                        <input type="text" name="company" id="company" value="{{ ($user['company'] != "") ? $user['company'] : '' }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bill_address" class="required">Billing Address</label>
                        <input type="text" name="bill_address" id="bill_address" value="{{ $user['address'] }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bill_address_2">Billing Address 2</label>
                        <input type="text" name="bill_address_2" id="bill_address_2" value="{{ $user['address_2'] }}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bill_country" class="required">Billing Country</label>
                        <select class="form-control" name="bill_country" id="bill_country">
                            <option value="">--Select Country--</option>
                        @foreach ($country as $c)
                            <option value="{{ $c['countryId'] }}" {{ ($user['country'] == $c['countryId']) ? 'selected': '' }}>{{ $c['name'] }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bill_zip" class="required">Billing Zip Code</label>
                        <input type="text" name="bill_zip" id="bill_zip" value="{{ $user['zip'] }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bill_city">Billing City</label>
                        <input type="text" name="bill_city" id="bill_city" value="{{ $user['city'] }}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="vat_tax">If you have a registered VAT / GST / Tax ID, please provide :</label>
                </div>
                <div class="col-md-6">
                    <input type="text" name="vat_tax" id="vat_tax" value="{{ $user['vat_tax'] }}" class="form-control">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-theme" id="billSave">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>        

<script type="text/javascript" src="{{ asset('dist/js/jquery.validate.min.js') }}></script>
<script type="text/javascript">
$(document).ready(function() {
    
    $.validator.addMethod("regex", function (value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
    });

    /* billing form validation */
    var bill_form = $('#billingForm');
    bill_form.validate( {
        rules: {
            fname: {
                required: true,
            },
            lname: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            company: {
                required: true
            },
            bill_address: {
                required: true
            },
            bill_country: {
                required: true
            },
            bill_zip: {
                required: true
            },
            bill_city: {
                required: true
            }
        },
        messages: {
            // username: { required : "Please enter your first name", regex : "Please enter valid first name" },
            fname: "Please enter your First name",
            lname: "Please enter your Last name",
            email: "Please enter a valid email address",
            company: "Please enter your company",
            bill_address: "Please Enter your Billing Address",
            bill_country: "Please Select your Country",
            bill_zip: "Please Enter your Zip Code",
            bill_city: "Please Enter your City"
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

    

    /* Billing Information */
    $('#billSave').click(function() {
        if(bill_form.valid())
        {
            var id = $('#userId').val();
            var data = $('#billingForm').serialize();
            $.ajax({
                type: "post",
                url: "{{ url('Home/billing_information/') }}"+id,
                data: data,
                success: function(data) {
                    data = jQuery.parseJSON(data);
                    if(data.success == true)
                    {
                        show_notify(data.message,true);
                        $('#billingModal').modal('hide');
                        setTimeout(function(){
                            location.reload();
                        }, 3000);
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
    
});

function checkOnlyDigits(e) {

  e = e ? e : window.event;
  var charCode = e.which ? e.which : e.keyCode;
  if (charCode < 48 || charCode > 57) {
    //alert('OOPs! Only digits allowed.');
    return false;
  }
} 
</script>
@endsection

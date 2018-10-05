<template>
    <div class="flow-container padding-top-20">

        <div class="flow-chart-float-menu clearfix">
            <div class="content">
                <div class="relative">
                    <i class="fa fa-times-circle-o close-menu" aria-hidden="true"></i>
                </div>
                <div class="row offset-bottom-20">
                    <div class="col-xs-4 text-center">
                        <div class="icon-menu bg-red">
                        <i class="icon-page"></i>                           
                        </div>
                        <strong>Page</strong> 
                    </div>
                    <div class="col-xs-4 text-center">
                        <div class="icon-menu bg-teal">
                        <i class="icon-email"></i>     
                        </div>
                        <strong>Email</strong> 
                    </div>
                    <div class="col-xs-4 text-center">
                        <div class="icon-menu bg-yellow">
                        <i class="icon-condition"></i>     
                        </div>
                        <strong>Condition / Action</strong>     
                    </div>
                </div>
                <div class="row offset-bottom-20">
                    <div class="col-xs-4 text-center">
                        <div class="icon-menu bg-purple">
                        <i class="icon-sms"></i>                           
                        </div>
                        <strong>SMS</strong> 
                    </div>
                    <div class="col-xs-4 text-center">
                        <div class="icon-menu bg-d-yellow">
                        <i class="icon-tag"></i>     
                        </div>
                        <strong>Tag</strong> 
                    </div>
                    <div class="col-xs-4 text-center">
                        <div class="icon-menu bg-cyan">
                        <i class="icon-update-contact"></i>     
                        </div>
                        <strong>Update<br /> Contact</strong>     
                    </div>
                </div>
                <div class="row offset-bottom-20">
                    <div class="col-xs-4 text-center">
                        <div class="icon-menu bg-l-green">
                        <i class="icon-move"></i>                           
                        </div>
                        <strong>Move</strong> 
                    </div>
                    <div class="col-xs-4 text-center">
                        <div class="icon-menu bg-green">
                        <i class="icon-add"></i>     
                        </div>
                        <strong>Add To</strong> 
                    </div>
                    <div class="col-xs-4 text-center">
                        <div class="icon-menu bg-l-grey">
                        <i class="icon-update-contact"></i>     
                        </div>
                        <strong>Skip</strong>     
                    </div>
                </div>
                <div class="row offset-top-15 offset-bottom-20">
                    <div class="col-xs-4 text-center">
                        <div class="icon-menu bg-l-orange">
                        <i class="icon-hour"></i>                           
                        </div>
                        <strong>Wait</strong> 
                    </div>
                    <div class="col-xs-4 text-center">
                        <div class="icon-menu bg-d-grey">
                        <i class="icon-end"></i>     
                        </div>
                        <strong>End</strong> 
                    </div>
                </div>
               
            </div>
            <div class="text-center offset-top-20 bg-off-white padding-20">
                <a href="" class="btn btn1">CREATE</a>
            </div>

        </div>

        <div class="header">
            <div class="clearfix">
                <div class="col-md-6 ">
                    <h4 class="">Welcome To List 01</h4>
                </div>
                <div class="col-md-6 text-right fc-controls">
                   <span class="fc-label-updates"><span class="marker online">&bull;</span> LAST EDIT: <strong>JUST NOW</strong></span> 
                   <span class="fc-switch-live-pause">Live <input type="checkbox" id="switch" class="switch-xs"/><label for="switch" class="switch-xs-lb"></label> Pause</span>

                    <i class="fa fa-check-square" aria-hidden="true"></i>
                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <i class="fa fa-print" aria-hidden="true"></i>
                    <i class="fa fa-share-alt" aria-hidden="true"></i>
                </div>
            </div>
        </div>

        <div class="body">
            <div class="container-fluid ">

                <div class="row align-tems-start">
                    <div class="col-md-12 text-center flow-chart-menu">
                        <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                    </div>
                </div>
                <div style="overflow: hidden; position: relative;">
                <div class="row flow-chart-container"  >

                    <div class="movable-flowchart">
                        <div class="flow-chart">
                            <div class="box update-contact vertical margin-center">
                                <div class="offset-top-20">
                                    <i class="icon-update-contact"></i><br />
                                    <b>UPDATE CONTACT</b><br />
                                    <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </div>  

                                <span class="fc-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="flow-chart">
                            <div class="box send-sms vertical margin-center">
                                <div class="offset-top-20">
                                    <i class="icon-sms"></i><br />
                                    <b>SEND SMS</b><br />
                                    <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </div>  

                                <span class="fc-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            </div>
                        </div>

                        <div class="flow-chart">
                            <div class="box move-box vertical margin-center">
                                <i class="fa fa-arrows-alt i-move" aria-hidden="true"></i>
                                <i class="fa fa-trash i-remove" aria-hidden="true"></i>
                                <div class="">
                                    <i class="fa fa-arrows-alt move-icon" aria-hidden="true"></i><br />
                                    <b>MOVE</b><br />
                                </div>  

                                <span class="fc-plus"><i class="fa fa-arrows-alt" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>    

                    <div class="col-md-12 relative">                          
                        <div class="flow-chart">
                            <div class="layer">
                                <div class="box add-page vertical margin-center">
                                    <div class="offset-top-20">
                                        <i class="icon-page"></i><br />
                                        <b>ADD PAGE</b><br />
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>  

                                    <span class="fc-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                </div>
                               
                            </div>
                        </div>
                        <div class="flow-chart">
                            <div class="layer">
                                <div class="box condition left right margin-center">
                                  <i class="icon-dashboard"></i><br />
                                  <b>CONDITION</b><br />
                                  <p>Segment Contacts by sending them down a yes or no path based on certain conditions</p>

                                  <span class="fc-yes-contact">
                                      <span class="text-label">YES</span>
                                      <span class="content">0 Contact (0%)</span>
                                  </span>

                                  <span class="fc-no-contact">
                                      <span class="text-label">NO</span>
                                      <span class="content">0 Contact (0%)</span>
                                  </span>

                                </div>
                            </div>
                        </div>

                        <div class="flow-chart" style="margin-bottom: 65px;">
                            <div class="layer">                              
                                <div class="row">
                                  <div class="col-xs-6">
                                      <div class="box vertical margin-center noPadding">
                                        <div class="octagon-box">  
                                            <div class="padding-top-20"><br /><br />
                                            <i class="icon-hour"></i><br />
                                            <b>WAIT</b><br />
                                            </div>
                                        </div>
                                        <span class="fc-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                      </div>
                                  </div>
                                  <div class="col-xs-6">
                                      <div class="box happens-next margin-center">
                                        <div class="padding-top-20">
                                          <i class="icon-plus"></i><br />
                                          <b>WHAT HAPPENS NEXT</b><br />
                                          <p>Click here to add new element to your page</p>
                                        </div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                        </div>

                        <div class="flow-chart nomarginTop">
                            <div class="layer">                              
                                <div class="row">
                                  <div class="col-xs-6">
                                      <div class="box send-email vertical margin-center">

                                        <span class="fc-border-top"></span>  

                                        <i class="icon-email"></i><br />
                                        <b>SEND AN EMAIL</b><br />
                                        <p>Moves the Contact to this element when any of the selected goals are achieved</p>

                                         <span class="fc-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                         <span class="fc-plus-left"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                         <span class="fc-plus-right"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                      </div>
                                  </div>
                                </div>
                            </div>
                        </div>

                        <div class="flow-chart">
                            <div class="layer">                              
                                <div class="row">
                                  <div class="col-xs-6">
                                      <div class="box change-tag no-arrow yes-arrrow margin-center">
                                        <i class="icon-tag"></i><br />
                                        <b>CONDITION</b><br />
                                        <p>Moves the Contact to this element when any of the selected goals are achieved</p>
                                      </div>
                                  </div>
                                </div>
                            </div>
                        </div>

                        <div class="flow-chart" style="margin-left: -300px;">
                            <div class="layer">                              
                                <div class="row">
                                  <div class="col-xs-6">
                                      <div class="box add-to margin-center">
                                        <i class="icon-add"></i><br />
                                        <b>ADD TO</b><br />
                                        <p>Segment Contacts by sending them down a yes or no path based on certain conditions</p>
                                      </div>
                                  </div>
                                  <div class="col-xs-6">
                                      <div class="box happens-next vertical margin-center">
                                        <i class="icon-skip"></i><br />
                                        <b>SKIP</b><br />
                                        <p>Segment Contacts by sending them down a yes or no path based on certain conditions</p>

                                        <span class="fc-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                      </div>
                                  </div>
                                </div>
                            </div>
                         </div>

                        <div class="flow-chart" style="margin-left: -300px;">
                            <div class="layer">                              
                                <div class="row">
                                  <div class="col-xs-6">
                                  </div>
                                  <div class="col-xs-6 ">
                                      <div class="margin-center">
                                        <div class="relative">  
                                            <div class="padding-top-10 fc-end-content text-white">
                                                <i class='icon-end'></i><br /><b>END</b><br />
                                            </div>

                                            <div class="hex"></div>
                                        </div>
                                      </div>
                                      
                                  </div>
                                </div>
                            </div>
                         </div>
                         
                    </div>

                    </div>

                </div>
                <!--
                <section class="fc-zoom-buttons">
                    <i class="fa fa-plus-square zoom-in" aria-hidden="true"></i>                   
                    <input type="range" class="zoom-range" min="0.4" max="5" step="0.05"/>
                    <i class="fa fa-minus-square zoom-out" aria-hidden="true"></i>
                </section>-->
                            
          </div>

        </div>


    </div>

</template>

<script>
import 'jquery.panzoom';
export default {
    data() {
        return {}
    },

     mounted() {

         
        // $(".flow-chart-container").panzoom({
        // $zoomIn: $(".zoom-in"),
        // $zoomOut: $(".zoom-out"),
        // $zoomRange: $(".zoom-range"),
        // $reset: $(".reset"),
        // contain: "invert",
        // minScale: 1
        // });

        // $('.panzoom a').on('mousedown touchstart', function( e ) {
        //     e.stopImmediatePropagation();
        // });  

         $('.flow-chart-menu span').click(function(){
            $('.flow-chart-float-menu').toggleClass('active');
        });

        $('.close-menu').click(function(){
            $(this).parents('.flow-chart-float-menu').toggleClass('active');
        });


     }
}
</script>








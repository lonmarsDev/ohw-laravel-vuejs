@extends('layouts.ohwo')

@section('content')
    <section class="mainsection" id="settings-security">
        <div class="container-fluid">
            <div class="row row-no-padding">

                <div class="col-sm-4 col-md-3 col-lg-2">
                    @include('partials.left_sidebar', ['ActiveMenu'=>'details'])
                </div>

                <div class="col-sm-8 col-md-9 col-lg-10">

                    <div class="rightmenumain">
                        <div class="titlemain">
                            <h2>Settings > Security</h2>
                            <!--<div class="right">ccs</div>-->
                        </div>
                    </div>

                    <div class="containbox">
                        <account-security></account-security>
                    </div>
                    <div class="containbox">
                        <account-verification
                                v-bind:security-questions="{{ json_encode($security_questions) }}"
                                v-bind:security-answers="{{ json_encode($security_answers) }}"
                                v-bind:security-questions-answered="{{ $security_questions_answered == 1 ? 'true' : 'false' }}"
                        ></account-verification>
                    </div>
                    <div class="containbox">
                        <data-science-privacy></data-science-privacy>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script-assets')
    <script src="{{ asset('js/settings/security/security.js') }}"></script>
@endsection
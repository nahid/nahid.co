@extends('site.layouts.others')

@section('contents')

<!-- Start Content section -->
<section class="content padding-block border-bottom">
    <!-- start container -->
    <div class="container">
        <!-- start row -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-6">
                <h3 class="title title-resume">Educations</h3>
                <div class="block-grey">
                    <div id="education-slider" class="owl-carousel owl-theme">
                        @foreach($data['edu'] as $edu)
                        <div class="item">
                            <table>
                                <tr>
                                    <td class="font-weight-m width-td">Institute</td>
                                    <td>{{$edu->institute}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-m">Address</td>
                                    <td>{{$edu->address}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-m">Period</td>
                                    <td>{{$edu->period}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-m">Department</td>
                                    <td>{{$edu->section}}</td>
                                </tr>
                            </table>
                            <p>
                                {{$edu->note}}
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-6">
                <h3 class="title title-resume">Works</h3>
                <div class="block-grey">
                    <div id="work-slider" class="owl-carousel owl-theme">
                        @foreach($data['work'] as $work)
                        <div class="item">
                            <table>
                                <tr>
                                    <td class="font-weight-m width-td">Company</td>
                                    <td>{{$work->institute}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-m">Address</td>
                                    <td>{{$work->address}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-m">Period</td>
                                    <td>{{$work->period}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-m">Post</td>
                                    <td>{{$work->section}}</td>
                                </tr>
                            </table>
                            <p>
                                {{$work->note}}
                            </p>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- End Content section -->


<!-- Start Skills section -->
<section class="skills border-bottom padding-block">
    <!-- start container -->
    <div class="container">
        <!-- start row -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-6">
                <h3 class="title title-skills">Professional skills</h3>
                @foreach($data['skillsPro'] as $skill)
                <label class="progress-bar-label">{{$skill->skill}}</label>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$skill->skill_range}}" aria-valuemin="0" aria-valuemax="100">
                        <span>{{$skill->skill_range}}%</span>
                    </div>
                </div>

                @endforeach


            </div>
            <div class="col-xs-12 col-sm-12 col-lg-6">
                <h3 class="title title-skills">Additional skills</h3>
                @foreach($data['skillsAdd'] as $skill)

                <div class="circle-progress-block">
                    <div class="circle-progress">
                        <input type="text" class="dial" value="{{$skill->skill_range}}" data-color="#00b6f9" data-from="0" data-to="100" />
                    </div>
                    <label class="circle-progress-label">{{$skill->skill}}</label>
                </div>

                @endforeach


            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- End Skills section -->


<!-- Start Info section -->
<section class="info border-bottom padding-block text-center">
    <!-- start container -->
    <div class="container">
        <!-- start row -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <h3 class="title">Hobbies &amp; Interest</h3>
            </div>
        </div>
        <!-- end row -->
        <!-- start row -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="circle-block ">
                    <span class="icon hover-animate"><i class="fa fa-trophy"></i></span>
                    <span class="name hover-animate">Cricket</span>
                </div>
                <div class="circle-block">
                    <span class="icon hover-animate"><i class="fa fa-headphones"></i></span>
                    <span class="name hover-animate">Music</span>
                </div>
                <div class="circle-block">
                    <span class="icon hover-animate"><i class="fa fa-taxi"></i></span>
                    <span class="name hover-animate">Travelling</span>
                </div>
                <div class="circle-block">
                    <span class="icon hover-animate"><i class="fa fa-motorcycle"></i></span>
                    <span class="name hover-animate">Bike</span>
                </div>
                <div class="circle-block">
                    <span class="icon hover-animate"><i class="fa fa-microphone"></i></span>
                    <span class="name hover-animate">Singing</span>
                </div>
                <div class="circle-block">
                    <span class="icon hover-animate"><i class="fa fa-puzzle-piece"></i></span>
                    <span class="name hover-animate">Puzzle</span>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- End Info section -->

<!-- Start Info section -->
<section class="info padding-block text-center">
    <!-- start container -->
    <div class="container">
        <!-- start row -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <h3 class="title">Experience</h3>
            </div>
        </div>
        <!-- end row -->
        <!-- start row -->
        <div class="row count">
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="total-numbers" data-perc="900">
                    <div class="iconspace"><i class="fa fa-smile-o"></i></div>
                    <div class="info-text">
                        <span class="sum">450</span>
                        happy clients
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="total-numbers" data-perc="900">
                    <div class="iconspace"><i class="fa fa-thumbs-o-up"></i></div>
                    <div class="info-text">
                        <span class="sum">205</span>
                        projects done
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="total-numbers" data-perc="900">
                    <div class="iconspace"><i class="fa fa-birthday-cake"></i></div>
                    <div class="info-text">
                        <span class="sum">3</span>
                        years experience
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="total-numbers" data-perc="900">
                    <div class="iconspace"><i class="fa fa-trophy"></i></div>
                    <div class="info-text">
                        <span class="sum">12</span>
                        contests won
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- End Info section -->
@endsection

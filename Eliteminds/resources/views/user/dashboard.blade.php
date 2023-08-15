@extends('layouts.layoutV2')
@section('head')
    <link rel="stylesheet" href="{{ asset('helper/css/dashboard.css') }}">
@endsection
@section('content')
    <div class="container">
        
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h1 class="heading">
                        Let's start learning, Dominik
                    </h1>
                     <p style="font-weight: 400;font-size: 1rem; color:var(--text-primary)">
                                  Get ready to expand your horizons with<br />
                        our comprehensive selection of learning courses! 👋
                    </p>
                </div>
            </div>
        </div>

        <div class="row dashboard-items">
            <div class="col-12 col-md-4" >
                <div class="d-flex justify-content-start align-items-center gap-5">
                    <img style="width:50px; height:58px" src="{{ asset('images/dashboard-images/Frame.svg') }}" class="card-img  scale" alt="card image" />
                    <div class="d-flex flex-column justify-content-start">
                        <span  class="item-title" >Open Course</span> 
                        <a  class="item-number">10</a>
                    </div>
                </div>
            </div>
             <div class="col-12 col-md-4 d-flex justify-content-center">
                <div class="d-flex justify-content-start align-items-center gap-5">
                    <img style="width:50px; height:58px" src="{{ asset('images/dashboard-images/Frame (1).svg') }}" class="card-img  scale" alt="card image" />
                    <div class="d-flex flex-column justify-content-start">
                        <span  class="item-title">Finished Courses</span> 
                        <a class="item-number">20</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4  d-flex justify-content-center">
                <div class="d-flex justify-content-start align-items-center gap-5">
                    <img style="width:50px; height:58px" src="{{ asset('images/dashboard-images/Frame.svg') }}" class="card-img  scale" alt="card image" />
                    <div class="d-flex flex-column justify-content-start">
                        <span  class="item-title">Certifications</span> 
                        <a class="item-number">20</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <h1 class="heading my-5">Continue Learning</h1>
            <a href="#" class="d-none d-md-block link-style" style="font-weight: 700;font-size: 16px;">View all courses</a>
        </div>

        @foreach ($userPackagesList as $i)
            @php
                $image = $newStr = str_replace('public/', '', $i['package']->img);
            @endphp
            <div class="dashboard-learning-item">
                <div class="dashboard-img">
                    <a href="{{route('package.details', $i['package']->package_id)}}">
                        <div class="play-icon" >                    
                            <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.22917 3.31544C1.22917 2.50008 1.22917 2.0924 1.39956 1.8648C1.54805 1.66646 1.77535 1.54237 2.02249 1.52472C2.30608 1.50446 2.64901 1.72492 3.33487 2.16583L11.3992 7.35005C11.9944 7.73266 12.292 7.92396 12.3947 8.16721C12.4845 8.37975 12.4845 8.61958 12.3947 8.83212C12.292 9.07537 11.9944 9.26668 11.3992 9.64928L3.33488 14.8335C2.64901 15.2744 2.30608 15.4949 2.02249 15.4746C1.77535 15.457 1.54805 15.3329 1.39956 15.1345C1.22917 14.9069 1.22917 14.4993 1.22917 13.6839V3.31544Z" fill="#F58634" stroke="#F58634" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            </div>
                        <!--<img src="https://demo.eliteminds.co/storage/package/imgs/1qI21R2YgU4CDFNJvRSpisNxTnFldf3SQpkfthGR.jpeg" alt="">-->
                        <img src="https://demo.eliteminds.co/storage/{{$image}}"  alt="" />
                    </a>
                </div>

                <div class="dashboard-package-details">
                    <a href="{{route('package.details', $i['package']->package_id)}}" class="dashboard-package-title">Professional in {{$i['package']->name}}</a>
                    <p class="dashboard-package-para">
                        3 total hours ･ 120 lectures ･ English
                    </p>
                    <div class="dashboard-package-progress">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{$i['progress']}}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="displayed-percent">{{$i['progress']}}%</span>
                    </div>
                </div>
                
                <div class="dashboard-pass-failed">
                    <div>
                        <div class="pass">
                            <div class="pass-icon">
                                <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.5 4L4.5 7L10.5 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <span class="pass-num">{{  \App\Quiz::where('user_id', Auth::user()->id)->where('score' , '>' , 75)->where('package_id', $i['package']->package_id)->where('complete', 1)->count() ?? '' }}</span>
                            <span class="pass-text">Passed</span>
                        </div>
                        <div class="failed">
                            <div class="failed-icon">
                                <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 1L1 7M1 1L4 4L7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <span class="pass-num">{{  \App\Quiz::where('user_id', Auth::user()->id)->where('score' , '>' , 75)->where('package_id', $i['package']->package_id)->where('complete', 1)->count() ?? '' }}</span>
                            <span class="pass-text">Failed</span> 
                        </div>
                    </div>
                </div>
                <div class="dashboard-flag ">
                    @if($i['progress'] <100 )
                        <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M32 40.7502C22.335 40.7502 14.5 32.9151 14.5 23.2502V7.04645C14.5 5.83941 14.5 5.23587 14.6759 4.7526C14.9708 3.94244 15.6089 3.30427 16.4191 3.0094C16.9023 2.8335 17.5059 2.8335 18.7129 2.8335H45.2871C46.4941 2.8335 47.0975 2.8335 47.5808 3.0094C48.3911 3.30427 49.0292 3.94244 49.3241 4.7526C49.5 5.23587 49.5 5.83941 49.5 7.04645V23.2502C49.5 32.9151 41.6649 40.7502 32 40.7502ZM32 40.7502V49.5002M49.5 8.66683H56.7916C58.1505 8.66683 58.8301 8.66683 59.3662 8.88885C60.0808 9.18486 60.6486 9.75268 60.9447 10.4673C61.1666 11.0033 61.1666 11.6828 61.1666 13.0418V14.5002C61.1666 17.2126 61.1666 18.5688 60.8686 19.6815C60.0595 22.701 57.7008 25.0596 54.6814 25.8687C53.5687 26.1668 52.2125 26.1668 49.5 26.1668M14.5 8.66683H7.20831C5.84932 8.66683 5.16983 8.66683 4.63383 8.88885C3.91916 9.18486 3.35134 9.75268 3.05533 10.4673C2.83331 11.0033 2.83331 11.6828 2.83331 13.0418V14.5002C2.83331 17.2126 2.83331 18.5688 3.13145 19.6815C3.94054 22.701 6.2991 25.0596 9.31864 25.8687C10.4313 26.1668 11.7876 26.1668 14.5 26.1668M18.7129 61.1668H45.2871C46.0029 61.1668 46.5833 60.5864 46.5833 59.8707C46.5833 54.1432 41.9403 49.5002 36.2128 49.5002H27.7871C22.0596 49.5002 17.4166 54.1432 17.4166 59.8707C17.4166 60.5864 17.997 61.1668 18.7129 61.1668Z" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    @else
                        <svg class="dashboard-flag colored" width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M32 40.7502C22.335 40.7502 14.5 32.9151 14.5 23.2502V7.04645C14.5 5.83941 14.5 5.23587 14.6759 4.7526C14.9708 3.94244 15.6089 3.30427 16.4191 3.0094C16.9023 2.8335 17.5059 2.8335 18.7129 2.8335H45.2871C46.4941 2.8335 47.0975 2.8335 47.5808 3.0094C48.3911 3.30427 49.0292 3.94244 49.3241 4.7526C49.5 5.23587 49.5 5.83941 49.5 7.04645V23.2502C49.5 32.9151 41.6649 40.7502 32 40.7502ZM32 40.7502V49.5002M49.5 8.66683H56.7916C58.1505 8.66683 58.8301 8.66683 59.3662 8.88885C60.0808 9.18486 60.6486 9.75268 60.9447 10.4673C61.1666 11.0033 61.1666 11.6828 61.1666 13.0418V14.5002C61.1666 17.2126 61.1666 18.5688 60.8686 19.6815C60.0595 22.701 57.7008 25.0596 54.6814 25.8687C53.5687 26.1668 52.2125 26.1668 49.5 26.1668M14.5 8.66683H7.20831C5.84932 8.66683 5.16983 8.66683 4.63383 8.88885C3.91916 9.18486 3.35134 9.75268 3.05533 10.4673C2.83331 11.0033 2.83331 11.6828 2.83331 13.0418V14.5002C2.83331 17.2126 2.83331 18.5688 3.13145 19.6815C3.94054 22.701 6.2991 25.0596 9.31864 25.8687C10.4313 26.1668 11.7876 26.1668 14.5 26.1668M18.7129 61.1668H45.2871C46.0029 61.1668 46.5833 60.5864 46.5833 59.8707C46.5833 54.1432 41.9403 49.5002 36.2128 49.5002H27.7871C22.0596 49.5002 17.4166 54.1432 17.4166 59.8707C17.4166 60.5864 17.997 61.1668 18.7129 61.1668Z" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    @endif
                </div>
                <div class="dashboard-action">
                    <a href="{{ route('material.show', $i['package']->course_id) }}">View all material</a>
                </div>
            </div>
        @endforeach
        
    </div>
@endsection

@section('jscode')
    {{-- <script>
        _initTimeChart();
        function _initTimeChart() {

            if (document.getElementById('timeChart')) {
                var ctx = document.getElementById('timeChart').getContext('2d');
                this._timeChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        datasets: [
                            {
                                label: '',
                                data: [{{ ($all_quizzes_number - $success_number) }}, {{$success_number}}],
                                backgroundColor: ['rgba(242, 58, 67,0.1)', 'rgba(79, 197, 240,0.1)'],
                                borderColor: ['rgba(242, 58, 67,1)', 'rgba(79, 197, 240,1)'],
                            },
                        ],
                        labels: ['Failure', 'Success'],
                        icons: ['graduation', 'graduation'],
                    },
                    options: {
                        plugins: {
                            datalabels: {display: false},
                        },
                        cutoutPercentage: 70,
                        responsive: true,
                        maintainAspectRatio: false,
                        title: {
                            display: false,
                        },
                        layout: {
                            padding: {
                                bottom: 20,
                            },
                        },
                        legend: {
                            position: 'bottom',
                            labels: ChartsExtend.LegendLabels(),
                        },
                        tooltips: {
                            enabled: false,
                            custom: function (tooltip) {
                                var tooltipEl = this._chart.canvas.parentElement.querySelector('.custom-tooltip');
                                if (tooltip.opacity === 0) {
                                    tooltipEl.style.opacity = 0;
                                    return;
                                }
                                tooltipEl.classList.remove('above', 'below', 'no-transform');
                                if (tooltip.yAlign) {
                                    tooltipEl.classList.add(tooltip.yAlign);
                                } else {
                                    tooltipEl.classList.add('no-transform');
                                }
                                if (tooltip.body) {
                                    var chart = this;
                                    var index = tooltip.dataPoints[0].index;
                                    var icon = tooltipEl.querySelector('.icon');
                                    icon.style = 'color: ' + tooltip.labelColors[0].borderColor;
                                    icon.setAttribute('data-cs-icon', chart._data.icons[index]);
                                    csicons.replace();
                                    var iconContainer = tooltipEl.querySelector('.icon-container');
                                    iconContainer.style = 'border-color: ' + tooltip.labelColors[0].borderColor + '!important';
                                    tooltipEl.querySelector('.text').innerHTML = chart._data.labels[index].toLocaleUpperCase();
                                    tooltipEl.querySelector('.value').innerHTML = chart._data.datasets[0].data[index];
                                }
                                var positionY = this._chart.canvas.offsetTop;
                                var positionX = this._chart.canvas.offsetLeft;
                                tooltipEl.style.opacity = 1;
                                tooltipEl.style.left = positionX + tooltip.caretX + 'px';
                                tooltipEl.style.top = positionY + tooltip.caretY + 'px';
                            },
                        },
                    },
                });
            }
        }
    </script> --}}
@endsection

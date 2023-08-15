@extends('layouts.layoutV2')
@section('head')
    <link rel="stylesheet" href="{{ asset('helper/css/dashboard.css') }}">
    <style>
        .primary-text, input, select{
            color:var(--text-primary) !important;
        }
        .form-control{
            background: var(--bg-main) !important;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <h3 class="primary-text" style="font-size:2rem; font-weight:700;" >Update Profile User</h3>
        @if (session('error'))
            <span class="alert alert-danger" style="display:block">
                        <strong>{{ session('error') }}</strong>
                    </span>
        @endif
        @if (session('success'))
            <span class="alert alert-success" style="display:block">
                        <strong>{{ session('success') }}</strong>
                    </span>
        @endif
        @if ($errors->has('email'))
            <span class="alert alert-danger" style="display:block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
        @endif
        @if ($errors->has('password'))
            <span class="alert alert-danger" style="display:block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
        @endif
        <!-- Title and Top Buttons Start -->
       <form class="form" action="{{ route('user.updateprofile') }}" method="POST" enctype="multipart/form-data" style="padding: 24px;background: var(--bg-primary); margin: 0 auto; margin-top:75px;">
            @csrf
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                    <label class="form-label primary-text input-label " for="form6Example2">Name</label>
                  <input type="text" name="name" value="{{$user->name}}" id="form6Example2" class="form-control" required/>
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                    <label class="form-label primary-text input-label" for="form6Example1">Email</label>
                  <input type="email" name="email" value="{{$user->email}}" id="form6Example1" class="form-control" required/>
                </div>
              </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                      <label class="form-label primary-text input-label" for="form6Example1">Phone</label>
                    <input type="text" name ="phone" value="{{$user->phone}}" id="form6Example1" class="form-control" required/>
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                        <label class="form-label primary-text input-label" for="form6Example2">  WhatsApp </label>
                        <input type="text" name="whats" value="{{$user->whats}}" id="form6Example2" class="form-control" required/>
                  </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                        <label class="form-label primary-text input-label" for="form6Example2"> Country </label>
                        <select  name="country" class="form-control" >
                            @foreach(DB::table('countries')->get() as $country)
                                <option value="{{$country->id}}" @if($country->name == $user->country) selected @endif>{{$country->name}}</option>
                            @endforeach
                        </select>
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                        <label class="form-label primary-text input-label" for="form6Example1"> City  </label>
                        <input type="text" name="city" value="{{$user->city}}" id="form6Example2" class="form-control" required/>
                  </div>
                </div>
                
              </div>
            <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                      <label class="form-label primary-text input-label" for="form6Example2"> Password </label>
                    <input type="password" name="confirm" id="form6Example2" class="form-control" />
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                      <label class="form-label primary-text input-label" for="form6Example1"> Confirm Password  </label>
                    <input type="password" name ="password" id="form6Example1" class="form-control" />
                  </div>
                </div>
                
              </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4" style="
            display: block;background-color: #f58634;
            ">Edit</button>
        </form>
        <!-- Content End -->
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

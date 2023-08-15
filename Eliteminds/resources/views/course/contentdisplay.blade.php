 <div id="planA" style="display: none; margin-bottom:21px"  class=" bg-white ">
    @if($coursdetails->plan_a && $coursdetails->plan_a_details !== null)
    @php  $quizzess =0;
        $exams_numbera = 0;
    @endphp
    <p class="Roboto fw-semibold textGrey h3"></p>
    <div class="accordion  example2" id="accordionExamplea">
        <!--@if($coursdetails->plan_a_details['total_videos_num'] )-->
        <!--    {{$coursdetails->plan_a_details['total_time']}} &#x2022; {{$coursdetails->plan_a_details['total_videos_num']}} {{__('Public/package.lectures')}}ss-->
        <!--@endif-->
        @foreach($coursdetails->plan_a_details['chapter_list'] as $chapterr)
        @php 
        $demoo = \App\Video::where('chapter', $chapterr->id)->get(); @endphp
        @php $explanationss = \App\Explanation::where('chapter_id', $chapterr->id)->count(); @endphp
        @php $demob2 = \App\Video::where('chapter', $chapterr->id)->where('demo',1)->get(); @endphp
        @php $questionss = \App\Question::where('chapter', $chapterr->id)->count(); @endphp
        @if(count($demoo) || $explanationss || $questionss)
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$chapterr->id}}" aria-expanded="true" aria-controls="collapseOne{{$chapterr->id}}">
                    <!--<span> @if(app()->getLocale() == 'ar') {{$chapterr->name_ar}}   @else  {{$chapterr->name}}    @endif</span>-->
                    <!--<span> {{ count($demoo) }} lectures &#x2022; {{ $chapterr->total_hours }} Hr {{ $chapterr->total_min }} Min  {{ $chapterr->total_sec }} Sec </span>-->
                    <div class="d-flex flex-column flex-md-row justify-content-between w-100 pe-4">
                        <span>@if(app()->getLocale() == 'ar') {{$chapterr->name_ar}}   @else  {{$chapterr->name}}    @endif</span> 
                       
                        <span>
                             @if(count($demob2) > 0)
                                    <span style="color:#F58634; font-size: 14px;margin-right:15px">Preview</span> 
                                @endif
                            {{ count($demoo) }} Lecture  &#x2022; {{ $chapterr->total_hours }} hr {{ $chapterr->total_min }} min</span>
                    </div>
                </button>
            </h2>
            <div id="collapseOne{{$chapterr->id}}" class="accordion-collapse collapse " data-bs-parent="#accordionExamplea">
                <div class="accordion-body">
                    <ul >
                        @foreach($demoo as $videoo)
                            <div class="d-flex justify-content-between align-items-center" >
                                <li> {{Transcode::evaluate($videoo)['title']}}</li> 
                                <samp>  
                                    <!--<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                                    <!--    <circle cx="8.5" cy="8.5" r="7.5" stroke="#4B4B4D" stroke-width="2"/>-->
                                    <!--    <path d="M12.5264 8.49995L6.48689 11.9868L6.48689 5.01306L12.5264 8.49995Z" fill="#4B4B4D"/>-->
                                    <!--</svg>-->
                                    <!--{{ explode(':', $videoo->duration)[1]. ':'. explode(':', $videoo->duration)[2]}}-->
                                    @if($videoo->demo)
                                         <button class="btn-primary p-1 mx-2" data-bs-toggle="modal" data-bs-target="#demoVideo" onclick="getVideo('{{$videoo->id}}')"
                                         style="outline:none; background:transparent;border:none">
                                             <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="8.5" cy="8.5" r="7.5" stroke="#F58634" stroke-width="2"/>
                                            <path d="M12.5264 8.49995L6.48689 11.9868L6.48689 5.01306L12.5264 8.49995Z" fill="#F58634"/>
                                            </svg>
                                         </button>
                                         @else
                                         <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="8.5" cy="8.5" r="7.5" stroke="#4B4B4D" stroke-width="2"/>
                                            <path d="M12.5264 8.49995L6.48689 11.9868L6.48689 5.01306L12.5264 8.49995Z" fill="#4B4B4D"/>
                                            </svg>
                                         @endif
                                    {{ explode(':', $videoo->duration)[1]. ':'. explode(':', $videoo->duration)[2]}}
                                </samp>  
                                <!--@if($videoo->demo)-->
                                <!--    <button class="btn-primary p-1 mx-2" data-bs-toggle="modal" data-bs-target="#demoVideo" onclick="getVideo('{{$videoo->id}}')">Preview</button> -->
                                <!--@endif-->
                            </div>
                        @endforeach
                    </ul>
                    @if($questionss)
                    @php  $quizzess++ @endphp
                        <div class="d-flex justify-content-between align-items-center" >
                            <li>  {{$questionss}} Questions </li> 
                            <samp> 
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="8.5" cy="8.5" r="7.5" stroke="#4B4B4D" stroke-width="2"/>
                                    <path d="M12.5264 8.49995L6.48689 11.9868L6.48689 5.01306L12.5264 8.49995Z" fill="#4B4B4D"/>
                                </svg>
                                Quiz 
                            </samp>
                        </div>
                    @endif
                    @if($explanationss)
                        <div class="d-flex justify-content-between align-items-center" >
                            <li>   {{$explanationss}} Items </li> 
                            <samp>
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="8.5" cy="8.5" r="7.5" stroke="#4B4B4D" stroke-width="2"/>
                                    <path d="M12.5264 8.49995L6.48689 11.9868L6.48689 5.01306L12.5264 8.49995Z" fill="#4B4B4D"/>
                                </svg>
                                Explanations
                            </samp>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
@endforeach
                <div class="accordion accordion-flush" id="accordionFlushExampler">
                  
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOner" aria-expanded="false" aria-controls="flush-collapseOner">
                          <span style="    color: #4B4B4D;font-size: 16px;font-family: Roboto;font-style: normal;font-weight: 600;line-height: normal;letter-spacing: -0.24px;">Practice Exams  </span>
                        </button>
                      </h2>
                      <div id="flush-collapseOner" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExampler">
                        <div class="accordion-body">
                  @foreach($coursdetails->plan_a_details['exam_list'] as $exama)
                    @php $exams_numbera++; @endphp
                    @php $e_counta = \App\Question::where(DB::raw("CONCAT(',', TRIM(BOTH '\"' FROM `exam_num`), ',')"), 'LIKE', '%,'.$exama->id.',%')->get()->count(); @endphp
                    @if($e_counta > 0)
                          <ul>
                                  <div class="d-flex justify-content-between align-items-center" ><li> {{Transcode::evaluate( \App\Exam::find($exama->id) )['name'] }} </li> 
                                    <samp> 
                                      
                                    <!--<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                                    <!--<circle cx="8.5" cy="8.5" r="7.5" stroke="#4B4B4D" stroke-width="2"/>-->
                                    <!--<path d="M12.5264 8.49995L6.48689 11.9868L6.48689 5.01306L12.5264 8.49995Z" fill="#4B4B4D"/>-->
                                    <!--</svg>-->
                                    {{ round( $e_counta) }} {{__('Public/package.questions')}}
                                    </samp>
                                      </div>
                                                                                  
                            </ul>
                    @endif
                  @endforeach
                        </div>
                      </div>
                    </div>
                  </div>

                    {{-- <div class="accordion accordion-flush" id="accordionFlushExample">
                  
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                          Exams
                        </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                  @foreach($coursdetails->plan_b_details['exam_list'] as $exam)
                    @php $exams_number++; @endphp
                    @php $e_count = \App\Question::where(DB::raw("CONCAT(',', TRIM(BOTH '\"' FROM `exam_num`), ',')"), 'LIKE', '%,'.$exam->id.',%')->get()->count(); @endphp
                    @if($e_count > 0)
                          <ul>
                                  <div class="d-flex justify-content-between align-items-center" ><li> {{Transcode::evaluate( \App\Exam::find($exam->id) )['name'] }} </li> 
                                    <samp> 
                                      
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="8.5" cy="8.5" r="7.5" stroke="#4B4B4D" stroke-width="2"/>
                                    <path d="M12.5264 8.49995L6.48689 11.9868L6.48689 5.01306L12.5264 8.49995Z" fill="#4B4B4D"/>
                                    </svg>
                                    {{ round( $e_count) }} {{__('Public/package.questions')}}
                                    </samp>
                                      </div>
                                                                                  
                            </ul>
                          @endif
                                                                                  @endforeach
                        </div>
                      </div>
                    </div>
                  </div> --}}
                  </div>
                  @endif
            </div>
             <div id="planB" style=" margin-bottom:21px""     class="bg-white ">
                    @if($coursdetails->plan_b && $coursdetails->plan_b_details !== null)
                    @php  $quizzesb =0;
                        $exams_numberb = 0;
                     @endphp
                    <p class="Roboto fw-semibold textGrey h3"> </p>
                  <div class="accordion example2" id="accordionExampleb">
                    <!--@if($coursdetails->plan_b_details['total_videos_num'] )-->
                    <!--                            {{$coursdetails->plan_b_details['total_time']}} | {{$coursdetails->plan_b_details['total_videos_num']}} {{__('Public/package.lectures')}}-->
                    <!--                      @endif-->
                                  @foreach($coursdetails->plan_b_details['chapter_list'] as $chapterb)

                                      @php $demob = \App\Video::where('chapter', $chapterb->id)->get(); @endphp
                                      @php $demob2 = \App\Video::where('chapter', $chapterb->id)->where('demo',1)->get(); @endphp
                                                                      @php $explanationsb = \App\Explanation::where('chapter_id', $chapterb->id)->count(); @endphp
                                                                      @php $questionsb = \App\Question::where('chapter', $chapterb->id)->count(); @endphp
                                                                      
                                      @if(count($demob) || $explanationsb || $questionsb)
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$chapterb->id}}" aria-expanded="true" aria-controls="collapseOne{{$chapterb->id}}">
                          <div class="d-flex flex-column flex-md-row justify-content-between w-100 pe-4">
                            <span>@if(app()->getLocale() == 'ar') {{$chapterb->name_ar}}   @else  {{$chapterb->name}}    @endif</span>
                            <span>
                                @if(count($demob2) > 0)
                                    <span style="color:#F58634; font-size: 14px;margin-right:15px">Preview</span> 
                                @endif
                                {{ count($demob) }} Lecture  &#x2022; {{ $chapterb->total_hours }} hr {{ $chapterb->total_min }} min</span>
                          </div>

                        </button>
                      </h2>
                      <div id="collapseOne{{$chapterb->id}}" class="accordion-collapse collapse " data-bs-parent="#accordionExampleb">
                        <div class="accordion-body">
                            <ul >
                                @foreach($demob as $videob)
                                  <div class="d-flex justify-content-between align-items-center" >
                                      <li> {{Transcode::evaluate($videob)['title']}}</li> 
                                    <samp>
                                         @if($videob->demo)
                                         <button class="btn-primary p-1 mx-2" data-bs-toggle="modal" data-bs-target="#demoVideo" onclick="getVideo('{{$videob->id}}')"
                                         style="outline:none; background:transparent;border:none">
                                             <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="8.5" cy="8.5" r="7.5" stroke="#F58634" stroke-width="2"/>
                                            <path d="M12.5264 8.49995L6.48689 11.9868L6.48689 5.01306L12.5264 8.49995Z" fill="#F58634"/>
                                            </svg>
                                         </button>
                                         @else
                                         <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="8.5" cy="8.5" r="7.5" stroke="#4B4B4D" stroke-width="2"/>
                                            <path d="M12.5264 8.49995L6.48689 11.9868L6.48689 5.01306L12.5264 8.49995Z" fill="#4B4B4D"/>
                                            </svg>
                                         @endif
                                    {{ explode(':', $videob->duration)[1]. ':'. explode(':', $videob->duration)[2]}}
                                    </samp>
                                    @if($videob->demo)
                                        {{-- <small class="btn-primary p-1 mx-2" data-bs-toggle="modal" data-bs-target="#demoVideo" @click="getVideo('{{$video->id}}')">Preview</small> --}}
                                        
                                    <!--<button class="btn-primary p-1 mx-2" data-bs-toggle="modal" data-bs-target="#demoVideo" onclick="getVideo('{{$videob->id}}')">Preview</button>-->
                                    @endif
                                    </div>
                                @endforeach
                            </ul>
                            @if($questionsb)
                                  @php $quizzesb++ @endphp
                                    <div class="d-flex justify-content-between align-items-center" >
                                      <li>  {{$questionsb}} Questions </li> 
                                    <samp>
                                        <!--<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                                        <!--<circle cx="8.5" cy="8.5" r="7.5" stroke="#4B4B4D" stroke-width="2"/>-->
                                        <!--<path d="M12.5264 8.49995L6.48689 11.9868L6.48689 5.01306L12.5264 8.49995Z" fill="#4B4B4D"/>-->
                                        <!--</svg>-->
                                        Quiz 
                                    </samp>
                                    </div>
                              @endif
        
                              @if($explanationsb)
        
                                <div class="d-flex justify-content-between align-items-center" >
                                      <li>   {{$explanationsb}} Items </li> 
                                    <samp>
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="8.5" cy="8.5" r="7.5" stroke="#4B4B4D" stroke-width="2"/>
                                    <path d="M12.5264 8.49995L6.48689 11.9868L6.48689 5.01306L12.5264 8.49995Z" fill="#4B4B4D"/>
                                    </svg>
                                    Explanations </samp>
                                    </div>
                              @endif
                        </div>
                      </div>
                    </div>
                    @endif
                    @endforeach

                    <div class="accordion accordion-flush" id="accordionFlushExampleb">
                  
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOneb" aria-expanded="false" aria-controls="flush-collapseOneb">
                          <!--<span style="    color: #4B4B4D;font-size: 16px;font-family: Roboto;font-style: normal;font-weight: 600;line-height: normal;letter-spacing: -0.24px;"> Practice Exams  {{ count($coursdetails->plan_b_details['exam_list']) }} </span>-->
                          <span style="    color: #4B4B4D;font-size: 16px;font-family: Roboto;font-style: normal;font-weight: 600;line-height: normal;letter-spacing: -0.24px;"> Practice Exams  </span>
                        </button>
                      </h2>
                      <div id="flush-collapseOneb" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExampleb">
                        <div class="accordion-body">
                  @foreach($coursdetails->plan_b_details['exam_list'] as $examb)
                    @php $exams_numberb++; @endphp
                    @php $e_countb = \App\Question::where(DB::raw("CONCAT(',', TRIM(BOTH '\"' FROM `exam_num`), ',')"), 'LIKE', '%,'.$examb->id.',%')->get()->count(); @endphp
                    @if($e_countb > 0)
                          <ul>
                                  <div class="d-flex justify-content-between align-items-center   bg-white " ><li> {{Transcode::evaluate( \App\Exam::find($examb->id) )['name'] }} </li> 
                                    <samp> 
                                      
                                    <!--<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                                    <!--<circle cx="8.5" cy="8.5" r="7.5" stroke="#4B4B4D" stroke-width="2"/>-->
                                    <!--<path d="M12.5264 8.49995L6.48689 11.9868L6.48689 5.01306L12.5264 8.49995Z" fill="#4B4B4D"/>-->
                                    <!--</svg>-->
                                    {{ round( $e_countb) }} {{__('Public/package.questions')}}
                                    </samp>
                                      </div>
                                                                                  
                            </ul>
                    @endif
                  @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                  @endif
            </div>
             <div id="planC" style="display: none; margin-bottom:21px""  class=" bg-white ">
                    @if($coursdetails->plan_c && $coursdetails->plan_c_details !== null)
                      @php  $quizzesc =0;
                        $exams_numberc = 0;
                     @endphp
                    <p class="Roboto fw-semibold textGrey h3"></p>
                  <div class="accordion example2" id="accordionExamplec">
                    <!--@if($coursdetails->plan_c_details['total_videos_num'] )-->
                    <!--                            {{$coursdetails->plan_c_details['total_time']}} &#x2022; {{$coursdetails->plan_c_details['total_videos_num']}} {{__('Public/package.lectures')}}-->
                    <!--@endif-->
                                  @foreach($coursdetails->plan_c_details['chapter_list'] as $chapterc)
                                      @php $democ = \App\Video::where('chapter', $chapterc->id)->get(); @endphp
                                                                      @php $explanationsc = \App\Explanation::where('chapter_id', $chapterc->id)->count(); @endphp
                                                                      @php $demob2 = \App\Video::where('chapter', $chapterc->id)->where('demo',1)->get(); @endphp
                                                                      @php $questionsc = \App\Question::where('chapter', $chapterc->id)->count(); @endphp
                                      @if(count($democ) || $explanationsc || $questionsc)
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$chapterc->id}}" 
                            aria-expanded="true" aria-controls="collapseOne{{$chapterc->id}}">
                            
                            <!--@if(app()->getLocale() == 'ar') {{$chapterc->name_ar}}   @else  {{$chapterc->name}}    @endif-->
                            <!--{{ count($democ) }} | {{ $chapterc->total_hours }} Hr {{ $chapterc->total_min }} Min  {{ $chapterc->total_sec }} Sec -->
                            <div class="d-flex flex-column flex-md-row justify-content-between w-100 pe-4">
                                <span>@if(app()->getLocale() == 'ar') {{$chapterc->name_ar}}   @else  {{$chapterc->name}}    @endif</span> 
                              
                                <span>   @if(count($demob2) > 0)
                                    <span style="color:#F58634; font-size: 14px;margin-right:15px">Preview</span> 
                                @endif {{ count($democ) }} Lecture  &#x2022; {{ $chapterc->total_hours }} hr {{ $chapterc->total_min }} min</span>
                             </div>
                        </button>
                      </h2>
                      <div id="collapseOne{{$chapterc->id}}" class="accordion-collapse collapse " data-bs-parent="#accordionExamplec">
                        <div class="accordion-body">
                          <ul >
                          @foreach($democ as $videoc)
                          
                                  <div class="d-flex justify-content-between align-items-center" ><li> {{Transcode::evaluate($videoc)['title']}}</li> 
                                    <samp> 
                                      
                                    <!--<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                                    <!--<circle cx="8.5" cy="8.5" r="7.5" stroke="#4B4B4D" stroke-width="2"/>-->
                                    <!--<path d="M12.5264 8.49995L6.48689 11.9868L6.48689 5.01306L12.5264 8.49995Z" fill="#4B4B4D"/>-->
                                    <!--</svg>-->
                                    <!--{{ explode(':', $videoc->duration)[1]. ':'. explode(':', $videoc->duration)[2]}}-->
                                    @if($videoc->demo)
                                         <button class="btn-primary p-1 mx-2" data-bs-toggle="modal" data-bs-target="#demoVideo" onclick="getVideo('{{$videoc->id}}')"
                                         style="outline:none; background:transparent;border:none">
                                             <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="8.5" cy="8.5" r="7.5" stroke="#F58634" stroke-width="2"/>
                                            <path d="M12.5264 8.49995L6.48689 11.9868L6.48689 5.01306L12.5264 8.49995Z" fill="#F58634"/>
                                            </svg>
                                         </button>
                                         @else
                                         <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="8.5" cy="8.5" r="7.5" stroke="#4B4B4D" stroke-width="2"/>
                                            <path d="M12.5264 8.49995L6.48689 11.9868L6.48689 5.01306L12.5264 8.49995Z" fill="#4B4B4D"/>
                                            </svg>
                                         @endif
                                    {{ explode(':', $videoc->duration)[1]. ':'. explode(':', $videoc->duration)[2]}}
                                    
                                    </samp>  
                                    @if($videoc->demo)
                                                                    {{-- <small class="btn-primary p-1 mx-2" data-bs-toggle="modal" data-bs-target="#demoVideo" @click="getVideo('{{$video->id}}')">Preview</small> --}}
                                                                    <!--<button class="btn-primary p-1 mx-2" data-bs-toggle="modal" data-bs-target="#demoVideo" onclick="getVideo('{{$videoc->id}}')">Preview</button>-->
                                                                                                      @endif</div>
                                                                                      @endforeach
                                                                                      </ul>
                                                                                      @if($questionsc)
                                                                                          @php $quizzesc++ @endphp
                                                                                            <div class="d-flex justify-content-between align-items-center" >
                                                                                              <li>  {{$questionsc}} Questions </li> 
                                                                                            <samp> 
                                                                                              
                                                                                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                            <circle cx="8.5" cy="8.5" r="7.5" stroke="#4B4B4D" stroke-width="2"/>
                                                                                            <path d="M12.5264 8.49995L6.48689 11.9868L6.48689 5.01306L12.5264 8.49995Z" fill="#4B4B4D"/>
                                                                                            </svg>
                                                                                            Quiz </samp>
                                                                                            </div>
                                                                                      @endif

                                                                                      @if($explanationsc)

                                                                                        <div class="d-flex justify-content-between align-items-center" >
                                                                                              <li>   {{$explanationsc}} Items </li> 
                                                                                            <samp> 
                                                                                              
                                                                                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                            <circle cx="8.5" cy="8.5" r="7.5" stroke="#4B4B4D" stroke-width="2"/>
                                                                                            <path d="M12.5264 8.49995L6.48689 11.9868L6.48689 5.01306L12.5264 8.49995Z" fill="#4B4B4D"/>
                                                                                            </svg>
                                                                                            Explanations </samp>
                                                                                            </div>
                                                                                      @endif

                        </div>
                      </div>
                    </div>
                    @endif
                    @endforeach

                    <div class="accordion accordion-flush" id="accordionFlushExample">
                  
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                          <span style="    color: #4B4B4D;font-size: 16px;font-family: Roboto;font-style: normal;font-weight: 600;line-height: normal;letter-spacing: -0.24px;">Practice Exams  </span>
                        </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                    @foreach($coursdetails->plan_c_details['exam_list'] as $examc)
                    @php $exams_numberc++; @endphp
                    @php $e_countc = \App\Question::where(DB::raw("CONCAT(',', TRIM(BOTH '\"' FROM `exam_num`), ',')"), 'LIKE', '%,'.$examc->id.',%')->get()->count(); @endphp
                    @if($e_countc > 0)
                          <ul>
                                  <div class="d-flex justify-content-between align-items-center" ><li> {{Transcode::evaluate( \App\Exam::find($examc->id) )['name'] }} </li> 
                                    <samp> 
                                      
                                    <!--<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                                    <!--<circle cx="8.5" cy="8.5" r="7.5" stroke="#4B4B4D" stroke-width="2"/>-->
                                    <!--<path d="M12.5264 8.49995L6.48689 11.9868L6.48689 5.01306L12.5264 8.49995Z" fill="#4B4B4D"/>-->
                                    <!--</svg>-->
                                    {{ round( $e_countc) }} {{__('Public/package.questions')}}
                                    </samp>
                                      </div>
                                                                                  
                            </ul>
                    @endif
                    @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                  @endif
            </div>
            
            
            <div class="modal fade" id="demoVideo">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Reviews Form Start -->
                        <div class="modal-body reviews-form" id="videoContainer">
                            
                        </div>
                        <!-- Reviews Form End -->
                    </div>
                </div>
            </div>
@extends('layouts.layoutV2')

@section('head')
    <link rel="stylesheet" href="{{ asset('helper/css/mypackage.css') }}">
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
/>

<link rel="stylesheet" href="{{ asset('helper/css/style22.css') }}">

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.es.js" integrity="sha512-VTufZOUx+Gc0N4JkluA0ZkVs2x4wfDI3p60gRWpHT761kMQ+hiNlYI+8MGXbLO48ymPKAeRa1wsEm3BIaxSEvw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.es.min.js" integrity="sha512-3chOMtjYaSa9m2bCC8qGxmEcX449u63D1fMXMQdueS3/XgE12iHQdmZVXVVbhBLc9i7h9WUuuM15B0CCE6Jtvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
<style>
.package-title{
  font-size:18px;
  font-weight:18px;
  color: var(--text-primary);
  cursor: default;
}
.package-title:hover{
color:var(--text-accent)
color: var(--text-primary);
}
.heading {
  font-weight: 700;
  font-size: 2rem;
  color: var(--text-primary) !important;
}
.invoice-btn{
  background-color: #f58634;
  font-size:18px;
  width: 100px;
  height: 35px;
  display:flex;
  justify-content:center;
  align-items:center;
}
</style>
@endsection


@section('content')
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-12 col-md-7">
                    <h1 class="heading" id="title">  {{__('messages.My_Packages_Invoices')}}  </h1>

                </div>
                <!-- Title End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <!-- Content Start -->

        <!-- Popular Start -->


        <div class="row ">
<div class="swiper">
  <!-- Additional required wrapper -->
  
  <!-- If we need pagination -->
  <div class="swiper-pagination"></div>

  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

  <!-- If we need scrollbar -->
  {{-- <div class="swiper-scrollbar"></div> --}}
</div>

        </div>
        <!-- Popular End -->

        <!-- Paths Start -->
        <h1 class="heading"></h1>
        <div class="row g-3 row-cols-1 row-cols-xl-1 row-cols-xxl-1 mb-5">
            <!-- Button trigger modal -->


<!-- Modal -->

            @php
                $icons = ['user-assets/img/illustration/icon-accounts.png', 'user-assets/img/illustration/icon-storage.png', 'user-assets/img/illustration/icon-experiment.png', 'user-assets/img/illustration/icon-performance.png'];
            @endphp
            @foreach ($packages as $course)
                <div class="col ">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-2">
                                    <!--<img src="{{ asset(array_random($icons)) }}" class="theme-filter" alt="performance" />-->
                                     <img src="{{ url('storage/package/imgs/' . basename($course->packages->img)) }}" class="card-img-top sh-22" alt="card image" style=" height: auto !important;"/>
                                </div>
                                <div class="col-8 col-md-5">
                                    <div class="d-flex flex-column">
                                        <a class="package-title">{{ $course->packages->name }}</a>
                                        <p></p>
                                    </div>
                                    <div class="card-footer border-0 pt-0">
                                        <div class="card-text mb-0">
                                            
                                        </div>
                                        <div class="mb-2">
                                            <div class="br-wrapper br-theme-cs-icon d-inline-block">
                                                
                                            </div>
                                        </div>
                                        

                                    </div>
                                </div>
                                <div class="col-12 col-md-5 d-flex more-details my-5">
                                    <!--<button type="button" class="card-btn btn more-details-color">-->

                                    <!--    more details-->
                                    <!--</button>-->
                                    <a href="javascript:void(0)" class="btn invoice-btn" onclick="printPdf('my-invoicesprint/{{$course->packages->id}}')"> {{__('messages.print')}} </a>
                                    
                        </div>

                         </div>
                    </div>
                </div>
            </div>
             @endforeach
        </div>
    </div>
               

        
           
            <!--<div class="row col-12"> <button type="button" class="card-btn btn load-more">-->

            <!--        Load More-->
            <!--    </button></div>-->
        </div>
        <!-- Paths End -->
        
        
        
        <!-- Content End -->
    </div>
    
    
@endsection
@section('jscode')

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>-->

<script>
    function downloadPDF() 
    {
        // Create a new jsPDF instance
        const doc = new jsPDF();

        // Get the element to be downloaded as a PDF
        const element = document.getElementById('invoice');

        // Add the element as an image to the PDF
        doc.addImage(element, 'JPEG', 0, 0, doc.internal.pageSize.getWidth(), doc.internal.pageSize.getHeight());

        // Download the PDF
        doc.save('element.pdf');
    }
</script>

    <script src="{{ asset('user-assets/js/pages/course.explore.js') }}"></script>
    {{-- <script src="{{ asset('helper/js/mypackage.js') }}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {

  // Optional parameters
slidesPerView: 3,
  spaceBetween: 50,
  loop: true,
 breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 40,
        }
      },
  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});
        </script>
        
    <script>
        function printPdf(link) 
        {
            var iframe = document.createElement('iframe');
            iframe.style.display = "none";
            // iframe.style.dir = "rtl";
            iframe.src = link;
            document.body.appendChild(iframe);
            iframe.contentWindow.focus();
            iframe.contentWindow.print();
        }
    </script>
@endsection

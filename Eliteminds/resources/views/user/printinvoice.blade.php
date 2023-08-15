<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Invoice-09</title>
    <!-- Latest compiled and minified CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('helper/css/invoice.css') }}" />
  </head>
  <body>
    <div class="container" >
      <header>
        <div class="row d-flex">
          <div class="col-md-6 col-6">
            <img src="{{ asset('images/image 13.png') }}" alt="logo" class="logo" />
          </div>
          <div class="col-md-6 col-6 d-flex justify-content-end">
            <h2 class="title">INVOICE</h2>
          </div>
        </div>
      </header>
      <hr class="col-12" />
      <div>
        <div class="row d-flex mb-3">
          <div class="col-md-6 col-6 invoice-to">
            <span class="text">Invoice to</span>
            <h2>{{ Auth::user()->name }}</h2>

            <span class="text">www.eliteminds.com</span><br />
            <span class="text">+962797205176</span><br />
            <span class="text">info@eliteminds.com</span>
          </div>
          <div class="col-md-6 col-6 totaldues">
            <div>
              <div>
                <span class="text">Total Dues</span>
                <h2>{{ $payments->currency }} {{ $payments->totalPaid }}</h2>
              </div>
              <div>
                <span class="text">Invoice NO.</span>
                <span class="text">{{ $payments->id }}</span>
              </div>
              <div>
                <span class="text">Invoice Date:</span>
                <span class="text">{{ $payments->created_at }}</span>
              </div>
              <div>
                <span class="text">Issue Date:</span>
                <span class="text">{{ $newdate }}</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Description</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th class="total">Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="gray-col">{{ $package->name }}</td>
                <td>1</td>
                <td class="gray-col">{{ $payments->totalPaid }}</td>
                <td>{{ $payments->currency }} {{ $payments->totalPaid }}</td>
              </tr>
             
              
              <tr class="table-footer">
                <td class="table-footer"></td>
                  <td></td>
                    <td>Sub Total</td>
                      <td >{{ $payments->currency }} {{ $payments->totalPaid }}</td>
              </tr>
               <tr>
                <td class="table-footer"></td>
                  <td class="table-footer"></td>
                    <td class="sec-foot-tr">Tax Apply</td>
                      <td class="sec-foot-tr">0.0%</td>
              </tr>
               <tr >
                <td class="table-footer"></td>
                  <td class="table-footer"></td>
                    <td  class="table-footer">Grand Total</td>
                      <td  class="table-footer">{{ $payments->currency }} {{ $payments->totalPaid }}</td>
              </tr>
              <tr >
                <td class="table-footer"></td>
                  <td class="table-footer"></td>
                    <td  class="table-footer"></td>
                      <td  class="height" ></td>
              </tr>
               <tr >
                <td class="table-footer"></td>
                  <td class="table-footer"></td>
                    <td  class="table-footer"></td>
                      <td  class="table-footer">Signature</td>
              </tr>
            </tbody>
          </table>
        </div>
<div class="footer-background-wrapper">
  <img class="footer-background" src="{{ asset('images/footer-background.png') }}"/>
</div>

        <footer>
          <div class="row">
          <h2 class="footer-hr">THANK YOU FOR THE BUSINESS</h2>
          <hr/>
       <div class="col-md-6 col-12">
 <div>
              <img class="img-footer"src="{{ asset('images/globe.png') }}" alt="globe" />
              <span>www.eliteminds.com</span>
            </div>
            <div>
              <img class="img-footer" src="{{ asset('images/telephone.png') }}" alt="telephone" />
               <span>+201021567874</span>
             
            </div>
       </div>
           
      <div class="col-md-6 col-12">
              <div>
              <img class="img-footer" src="{{ asset('images/email.png') }}" alt="email" />
               <span>info.eliteminds.com</span>
            </div>
            <div>
              <img  class="img-footer" src="{{ asset('images/Location.png') }}" alt="location" />
              <span>Cairo, Egypt</span>
            </div>
      </div>
        
        </div>
       
        </footer>

      </main>
    </div>
    </div>
 <div class="row col-12 hrfoot" >
        
 </div>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous">
  </script>
  </body>
</html>
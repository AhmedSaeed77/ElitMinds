<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Elite Minds Community | Register</title>
    <link rel="stylesheet" href="{{asset('newfront/style/styleLogIn.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.3.2/swiper-bundle.min.css" integrity="sha512-Y1c7KsgMNtf7pIhrj/Ul2LhutImFYr+TsCmjB8mGAk+cgG1Vm8U1g7tvfmRr6yD5nds03Qgc6Mcb86MBKu1Llg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.3.2/swiper-bundle.min.js" integrity="sha512-+z66PuMP/eeemN2MgRhPvI3G15FOBbsp5NcCJBojg6dZBEFL0Zoi0PEGkhjubEcQF7N1EpTX15LZvfuw+Ej95Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  </head>
  <body>
    <section class="container-fluid g-0 m-0">
      <div class="row g-0 m-0 col-12 d-flex">
        <section class="col-md-6 bg-white p-5" style="min-height: 100vh">
          <div class="container col-12 d-flex flex-column justify-content-between wrapper full" >
            <div class="col-12 mb-5">
              <a href="{{route('index')}}"
                ><img src="{{asset('newfront/images/image 13.png')}}" alt="logo" 
              /></a>
            </div>
            <div class="d-flex flex-column justify-content-start align-items-start col-12">
              <h2 class="Roboto fw-bolder form-title">Create a new Account</h2>
              @if ($errors->has('name'))
                            <span class="alert alert-danger" style="display:block;">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                                   @endif
                                @if ($errors->has('email'))
                                    <span class="alert alert-danger" style="display:block;">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                                @endif
                                @if ($errors->has('password'))
                                    <span class="alert alert-danger" style="display:block;">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                @endif
                                @if ($errors->has('country'))
                                <span class="alert alert-danger" style="display:block;">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                                @endif
                                @if ($errors->has('city'))
                                    <span class="alert alert-danger" style="display:block;">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                                @endif
                                @if ($errors->has('phone'))
                                    <span class="alert alert-danger" style="display:block;">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
              <form class="col-12" action="{{ route('register') }}" method="POST">
                <div class="mb-3 col-12">
                  <input
                    type="text"
                    class="form-control"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Full Name"
                  />
                </div>
                <div class="mb-3 col-12">
                  <input
                    type="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    name="email"
                    placeholder="Email"
                  />
                </div>
                <div class="mb-3 col-12">
                  <select class="form-select country" placeholder="Country" name="country">
                                        <option value="" selected disabled>Country</option>
                                        <option value="United States">United States</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-bissau">Guinea-bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macao">Macao</option>
                                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russian Federation">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Helena">Saint Helena</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-leste">Timor-leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                </div>
                <div class="mb-3 col-12">
                  <input
                    type="text"
                    class="form-control"
                   value="{{ old('city') }}" 
                    name="city"
                    placeholder="City"
                  />
                </div>
                <div class="mb-3 col-12">
                  <input
                    type="text"
                    class="form-control"
                    value="{{ old('phone') }}"
                    name="phone"
                    placeholder="Phone Number"
                  />
                </div>
                <div class="mb-3 col-12">
                  <input
                    type="password"
                    class="form-control"
                    
                    name="password"
                    placeholder="Password"
                  />
                </div>
                <div class="mb-3 col-12">
                  <input
                    type="password"
                    class="form-control"
                    name="password_confirmation"
                    placeholder="Confirm Password"
                  />
                </div>
                <div class="mt-3 col-12">
                  <button
                    type="submit"
                    class="btn bgorange text-white col-12 text-center Roboto"
                  >
                    Sign Up
                  </button>
                  <small
                    class="col-12 Roboto pt-3 d-flex justify-content-center align-items-center gap-1 flex-md-row flex-column"
                  >
                    <span class="Roboto textGrey">Don’t have an Account? </span
                    ><a class="textOrang Roboto" href="{{route('login')}}">
                      Sign In</a
                    ></small
                  >
                </div>
              </form>
            </div>
            <a class="social-link">
              <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_797_1567)">
                <path d="M28.7173 14.834C28.7173 13.8484 28.6374 12.8574 28.4669 11.8877H14.79V17.4714H22.6221C22.2971 19.2722 21.2528 20.8653 19.7237 21.8776V25.5006H24.3963C27.1402 22.9751 28.7173 19.2456 28.7173 14.834Z" fill="#4285F4"/>
                <path d="M14.7896 29.0008C18.7003 29.0008 21.9983 27.7167 24.4012 25.5003L19.7286 21.8773C18.4286 22.7618 16.7503 23.2626 14.7949 23.2626C11.0121 23.2626 7.80466 20.7105 6.65382 17.2793H1.83203V21.0142C4.29354 25.9106 9.30714 29.0008 14.7896 29.0008Z" fill="#34A853"/>
                <path d="M6.64894 17.2793C6.04155 15.4784 6.04155 13.5284 6.64894 11.7276V7.99268H1.83248C-0.224108 12.0899 -0.224108 16.917 1.83248 21.0142L6.64894 17.2793Z" fill="#FBBC04"/>
                <path d="M14.7896 5.73917C16.8568 5.7072 18.8548 6.48509 20.352 7.91297L24.4918 3.77316C21.8704 1.31165 18.3913 -0.0416464 14.7896 0.000977138C9.30714 0.000977138 4.29354 3.09118 1.83203 7.99289L6.64849 11.7278C7.794 8.29126 11.0068 5.73917 14.7896 5.73917Z" fill="#EA4335"/>
                </g>
                <defs>
                <clipPath id="clip0_797_1567">
                <rect width="29" height="29" fill="white"/>
                </clipPath>
                </defs>
              </svg>
              <span>Continue with Google</span> 
            </a>
            <a class="social-link">
              <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_797_1571)">
                <path d="M29 14.5C29 6.49187 22.5081 0 14.5 0C6.49187 0 0 6.49187 0 14.5C0 21.7373 5.30241 27.7361 12.2344 28.8238V18.6914H8.55273V14.5H12.2344V11.3055C12.2344 7.67141 14.3992 5.66406 17.7112 5.66406C19.2972 5.66406 20.957 5.94727 20.957 5.94727V9.51562H19.1287C17.3275 9.51562 16.7656 10.6334 16.7656 11.7812V14.5H20.7871L20.1442 18.6914H16.7656V28.8238C23.6976 27.7361 29 21.7373 29 14.5Z" fill="#1877F2"/>
                <path d="M20.1442 18.6914L20.7871 14.5H16.7656V11.7812C16.7656 10.6346 17.3275 9.51563 19.1287 9.51563H20.957V5.94727C20.957 5.94727 19.2977 5.66406 17.7112 5.66406C14.3992 5.66406 12.2344 7.67141 12.2344 11.3055V14.5H8.55273V18.6914H12.2344V28.8238C13.7357 29.0587 15.2643 29.0587 16.7656 28.8238V18.6914H20.1442Z" fill="white"/>
                </g>
                <defs>
                <clipPath id="clip0_797_1571">
                <rect width="29" height="29" fill="white"/>
                </clipPath>
                </defs>
              </svg>
              <span>Continue with Facebook</span>  
            </a>
          </div>
        </section>
        <section class="col-md-6 d-none d-md-flex bgorange1 d-flex justify-content-center align-items-center" >
          <div
            class="container d-flex justify-content-center  position-relative"  style="max-width: 488px;"
          >
            <div class="bgCenter col-10 d-flex justify-content-center align-items-center flex-column w-100 ">   
              <div class="swiper loginSwiper">
                <div class="swiper-wrapper ">
                    <div class="swiper-slide">
                      <div class="d-flex justify-content-center align-items-center flex-column">
                          <svg
                            width="165"
                            height="145"
                            viewBox="0 0 165 145"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              d="M150.433 0.685059H14.5649C6.53348 0.685059 0 7.21828 0 15.2499V109.419C0 117.451 6.53348 123.984 14.5649 123.984H61.2632C62.6884 123.984 63.8413 122.831 63.8413 121.406C63.8413 119.981 62.6884 118.828 61.2632 118.828H14.5649C9.37613 118.828 5.15625 114.608 5.15625 109.419V15.2499C5.15625 10.0609 9.37613 5.84131 14.5649 5.84131H150.433C155.622 5.84131 159.844 10.0609 159.844 15.2499V109.419C159.844 114.608 155.622 118.828 150.433 118.828C149.008 118.828 147.854 119.981 147.854 121.406C147.854 122.831 149.008 123.984 150.433 123.984C158.464 123.984 165 117.451 165 109.419V15.2499C165 7.21828 158.464 0.685059 150.433 0.685059Z"
                              fill="white"
                            />
                            <path
                              d="M56.7188 72.8726H25.7812C24.3563 72.8726 23.2031 74.0255 23.2031 75.4507C23.2031 76.8756 24.3563 78.0288 25.7812 78.0288H56.7188C58.1439 78.0288 59.2969 76.8756 59.2969 75.4507C59.2969 74.0255 58.1439 72.8726 56.7188 72.8726Z"
                              fill="white"
                            />
                            <path
                              d="M56.7188 89.7588H25.7812C24.3563 89.7588 23.2031 90.9117 23.2031 92.3369C23.2031 93.7618 24.3563 94.915 25.7812 94.915H56.7188C58.1439 94.915 59.2969 93.7618 59.2969 92.3369C59.2969 90.9117 58.1439 89.7588 56.7188 89.7588Z"
                              fill="white"
                            />
                            <path
                              d="M133.385 98.2836C133.338 98.1212 133.234 97.9977 133.16 97.8528C138.512 91.913 141.797 84.075 141.797 75.4507C141.797 56.9405 126.792 41.9351 108.281 41.9351C89.7713 41.9351 74.7659 56.9405 74.7659 75.4507C74.7659 83.9801 77.9787 91.7411 83.226 97.6571C83.1718 97.7744 83.0862 97.8688 83.0491 97.9966L72.2029 135.183C71.9183 136.16 72.2331 137.21 73.006 137.869C73.779 138.529 74.8667 138.668 75.7832 138.234L87.1682 132.826L94.3209 143.199C94.8069 143.904 95.6048 144.315 96.4433 144.315C96.5894 144.315 96.7354 144.302 96.8815 144.277C97.8733 144.106 98.6741 143.376 98.9335 142.404L107.897 108.947C108.027 108.948 108.152 108.966 108.281 108.966C108.343 108.966 108.402 108.957 108.463 108.957L117.428 142.404C117.688 143.373 118.486 144.103 119.475 144.277C119.624 144.302 119.772 144.315 119.918 144.315C120.754 144.315 121.547 143.909 122.036 143.209L129.211 132.887L140.584 138.239C141.498 138.668 142.583 138.524 143.358 137.864C144.129 137.205 144.441 136.157 144.156 135.183L133.385 98.2836ZM108.281 47.0913C123.919 47.0913 136.641 59.8131 136.641 75.4507C136.641 91.088 123.919 103.81 108.281 103.81C92.6441 103.81 79.9221 91.088 79.9221 75.4507C79.9221 59.8131 92.6441 47.0913 108.281 47.0913ZM95.3986 135.679L90.1668 128.093C89.4491 127.053 88.087 126.681 86.939 127.227L78.7614 131.112L87.3654 101.614C91.717 105.098 96.956 107.497 102.689 108.463L95.3986 135.679ZM129.435 127.293C128.295 126.764 126.938 127.121 126.22 128.153L120.971 135.707L113.677 108.493C119.412 107.562 124.656 105.195 129.024 101.744L137.603 131.137L129.435 127.293Z"
                              fill="white"
                            />
                            <path
                              d="M59.2969 29.0444C59.2969 26.1966 56.9884 23.8882 54.1406 23.8882H28.3594C25.5118 23.8882 23.2031 26.1966 23.2031 29.0444V54.8257C23.2031 57.6732 25.5118 59.9819 28.3594 59.9819H54.1406C56.9884 59.9819 59.2969 57.6732 59.2969 54.8257V29.0444ZM54.1406 54.8257H28.3594V29.0444H54.1406V54.8257Z"
                              fill="white"
                            />
                            <path
                              d="M108.281 90.9194C116.825 90.9194 123.75 83.9938 123.75 75.4507C123.75 66.9073 116.825 59.9819 108.281 59.9819C99.7381 59.9819 92.8125 66.9073 92.8125 75.4507C92.8125 83.9938 99.7381 90.9194 108.281 90.9194ZM108.281 65.1382C113.968 65.1382 118.594 69.7641 118.594 75.4507C118.594 81.137 113.968 85.7632 108.281 85.7632C102.595 85.7632 97.9688 81.137 97.9688 75.4507C97.9688 69.7641 102.595 65.1382 108.281 65.1382Z"
                              fill="white"
                            />
                          </svg>
                          <p class="text-center text-white certificate-title">
                            Wide range of certificates library
                          </p>
                      </div>
                               </div>
                               <div class="swiper-slide">
                      <div class="d-flex justify-content-center align-items-center flex-column">
                            <svg
                              width="165"
                              height="145"
                              viewBox="0 0 165 145"
                              fill="none"
                              xmlns="http://www.w3.org/2000/svg"
                            >
                              <path
                                d="M150.433 0.685059H14.5649C6.53348 0.685059 0 7.21828 0 15.2499V109.419C0 117.451 6.53348 123.984 14.5649 123.984H61.2632C62.6884 123.984 63.8413 122.831 63.8413 121.406C63.8413 119.981 62.6884 118.828 61.2632 118.828H14.5649C9.37613 118.828 5.15625 114.608 5.15625 109.419V15.2499C5.15625 10.0609 9.37613 5.84131 14.5649 5.84131H150.433C155.622 5.84131 159.844 10.0609 159.844 15.2499V109.419C159.844 114.608 155.622 118.828 150.433 118.828C149.008 118.828 147.854 119.981 147.854 121.406C147.854 122.831 149.008 123.984 150.433 123.984C158.464 123.984 165 117.451 165 109.419V15.2499C165 7.21828 158.464 0.685059 150.433 0.685059Z"
                                fill="white"
                              />
                              <path
                                d="M56.7188 72.8726H25.7812C24.3563 72.8726 23.2031 74.0255 23.2031 75.4507C23.2031 76.8756 24.3563 78.0288 25.7812 78.0288H56.7188C58.1439 78.0288 59.2969 76.8756 59.2969 75.4507C59.2969 74.0255 58.1439 72.8726 56.7188 72.8726Z"
                                fill="white"
                              />
                              <path
                                d="M56.7188 89.7588H25.7812C24.3563 89.7588 23.2031 90.9117 23.2031 92.3369C23.2031 93.7618 24.3563 94.915 25.7812 94.915H56.7188C58.1439 94.915 59.2969 93.7618 59.2969 92.3369C59.2969 90.9117 58.1439 89.7588 56.7188 89.7588Z"
                                fill="white"
                              />
                              <path
                                d="M133.385 98.2836C133.338 98.1212 133.234 97.9977 133.16 97.8528C138.512 91.913 141.797 84.075 141.797 75.4507C141.797 56.9405 126.792 41.9351 108.281 41.9351C89.7713 41.9351 74.7659 56.9405 74.7659 75.4507C74.7659 83.9801 77.9787 91.7411 83.226 97.6571C83.1718 97.7744 83.0862 97.8688 83.0491 97.9966L72.2029 135.183C71.9183 136.16 72.2331 137.21 73.006 137.869C73.779 138.529 74.8667 138.668 75.7832 138.234L87.1682 132.826L94.3209 143.199C94.8069 143.904 95.6048 144.315 96.4433 144.315C96.5894 144.315 96.7354 144.302 96.8815 144.277C97.8733 144.106 98.6741 143.376 98.9335 142.404L107.897 108.947C108.027 108.948 108.152 108.966 108.281 108.966C108.343 108.966 108.402 108.957 108.463 108.957L117.428 142.404C117.688 143.373 118.486 144.103 119.475 144.277C119.624 144.302 119.772 144.315 119.918 144.315C120.754 144.315 121.547 143.909 122.036 143.209L129.211 132.887L140.584 138.239C141.498 138.668 142.583 138.524 143.358 137.864C144.129 137.205 144.441 136.157 144.156 135.183L133.385 98.2836ZM108.281 47.0913C123.919 47.0913 136.641 59.8131 136.641 75.4507C136.641 91.088 123.919 103.81 108.281 103.81C92.6441 103.81 79.9221 91.088 79.9221 75.4507C79.9221 59.8131 92.6441 47.0913 108.281 47.0913ZM95.3986 135.679L90.1668 128.093C89.4491 127.053 88.087 126.681 86.939 127.227L78.7614 131.112L87.3654 101.614C91.717 105.098 96.956 107.497 102.689 108.463L95.3986 135.679ZM129.435 127.293C128.295 126.764 126.938 127.121 126.22 128.153L120.971 135.707L113.677 108.493C119.412 107.562 124.656 105.195 129.024 101.744L137.603 131.137L129.435 127.293Z"
                                fill="white"
                              />
                              <path
                                d="M59.2969 29.0444C59.2969 26.1966 56.9884 23.8882 54.1406 23.8882H28.3594C25.5118 23.8882 23.2031 26.1966 23.2031 29.0444V54.8257C23.2031 57.6732 25.5118 59.9819 28.3594 59.9819H54.1406C56.9884 59.9819 59.2969 57.6732 59.2969 54.8257V29.0444ZM54.1406 54.8257H28.3594V29.0444H54.1406V54.8257Z"
                                fill="white"
                              />
                              <path
                                d="M108.281 90.9194C116.825 90.9194 123.75 83.9938 123.75 75.4507C123.75 66.9073 116.825 59.9819 108.281 59.9819C99.7381 59.9819 92.8125 66.9073 92.8125 75.4507C92.8125 83.9938 99.7381 90.9194 108.281 90.9194ZM108.281 65.1382C113.968 65.1382 118.594 69.7641 118.594 75.4507C118.594 81.137 113.968 85.7632 108.281 85.7632C102.595 85.7632 97.9688 81.137 97.9688 75.4507C97.9688 69.7641 102.595 65.1382 108.281 65.1382Z"
                                fill="white"
                              />
                            </svg>
                            <p class="text-center text-white certificate-title">
                              Wide range of courses
                            </p>
                        </div>
                      </div>                    <div class="swiper-slide">
                      <div class="d-flex justify-content-center align-items-center flex-column">
                            <svg
                              width="165"
                              height="145"
                              viewBox="0 0 165 145"
                              fill="none"
                              xmlns="http://www.w3.org/2000/svg"
                            >
                              <path
                                d="M150.433 0.685059H14.5649C6.53348 0.685059 0 7.21828 0 15.2499V109.419C0 117.451 6.53348 123.984 14.5649 123.984H61.2632C62.6884 123.984 63.8413 122.831 63.8413 121.406C63.8413 119.981 62.6884 118.828 61.2632 118.828H14.5649C9.37613 118.828 5.15625 114.608 5.15625 109.419V15.2499C5.15625 10.0609 9.37613 5.84131 14.5649 5.84131H150.433C155.622 5.84131 159.844 10.0609 159.844 15.2499V109.419C159.844 114.608 155.622 118.828 150.433 118.828C149.008 118.828 147.854 119.981 147.854 121.406C147.854 122.831 149.008 123.984 150.433 123.984C158.464 123.984 165 117.451 165 109.419V15.2499C165 7.21828 158.464 0.685059 150.433 0.685059Z"
                                fill="white"
                              />
                              <path
                                d="M56.7188 72.8726H25.7812C24.3563 72.8726 23.2031 74.0255 23.2031 75.4507C23.2031 76.8756 24.3563 78.0288 25.7812 78.0288H56.7188C58.1439 78.0288 59.2969 76.8756 59.2969 75.4507C59.2969 74.0255 58.1439 72.8726 56.7188 72.8726Z"
                                fill="white"
                              />
                              <path
                                d="M56.7188 89.7588H25.7812C24.3563 89.7588 23.2031 90.9117 23.2031 92.3369C23.2031 93.7618 24.3563 94.915 25.7812 94.915H56.7188C58.1439 94.915 59.2969 93.7618 59.2969 92.3369C59.2969 90.9117 58.1439 89.7588 56.7188 89.7588Z"
                                fill="white"
                              />
                              <path
                                d="M133.385 98.2836C133.338 98.1212 133.234 97.9977 133.16 97.8528C138.512 91.913 141.797 84.075 141.797 75.4507C141.797 56.9405 126.792 41.9351 108.281 41.9351C89.7713 41.9351 74.7659 56.9405 74.7659 75.4507C74.7659 83.9801 77.9787 91.7411 83.226 97.6571C83.1718 97.7744 83.0862 97.8688 83.0491 97.9966L72.2029 135.183C71.9183 136.16 72.2331 137.21 73.006 137.869C73.779 138.529 74.8667 138.668 75.7832 138.234L87.1682 132.826L94.3209 143.199C94.8069 143.904 95.6048 144.315 96.4433 144.315C96.5894 144.315 96.7354 144.302 96.8815 144.277C97.8733 144.106 98.6741 143.376 98.9335 142.404L107.897 108.947C108.027 108.948 108.152 108.966 108.281 108.966C108.343 108.966 108.402 108.957 108.463 108.957L117.428 142.404C117.688 143.373 118.486 144.103 119.475 144.277C119.624 144.302 119.772 144.315 119.918 144.315C120.754 144.315 121.547 143.909 122.036 143.209L129.211 132.887L140.584 138.239C141.498 138.668 142.583 138.524 143.358 137.864C144.129 137.205 144.441 136.157 144.156 135.183L133.385 98.2836ZM108.281 47.0913C123.919 47.0913 136.641 59.8131 136.641 75.4507C136.641 91.088 123.919 103.81 108.281 103.81C92.6441 103.81 79.9221 91.088 79.9221 75.4507C79.9221 59.8131 92.6441 47.0913 108.281 47.0913ZM95.3986 135.679L90.1668 128.093C89.4491 127.053 88.087 126.681 86.939 127.227L78.7614 131.112L87.3654 101.614C91.717 105.098 96.956 107.497 102.689 108.463L95.3986 135.679ZM129.435 127.293C128.295 126.764 126.938 127.121 126.22 128.153L120.971 135.707L113.677 108.493C119.412 107.562 124.656 105.195 129.024 101.744L137.603 131.137L129.435 127.293Z"
                                fill="white"
                              />
                              <path
                                d="M59.2969 29.0444C59.2969 26.1966 56.9884 23.8882 54.1406 23.8882H28.3594C25.5118 23.8882 23.2031 26.1966 23.2031 29.0444V54.8257C23.2031 57.6732 25.5118 59.9819 28.3594 59.9819H54.1406C56.9884 59.9819 59.2969 57.6732 59.2969 54.8257V29.0444ZM54.1406 54.8257H28.3594V29.0444H54.1406V54.8257Z"
                                fill="white"
                              />
                              <path
                                d="M108.281 90.9194C116.825 90.9194 123.75 83.9938 123.75 75.4507C123.75 66.9073 116.825 59.9819 108.281 59.9819C99.7381 59.9819 92.8125 66.9073 92.8125 75.4507C92.8125 83.9938 99.7381 90.9194 108.281 90.9194ZM108.281 65.1382C113.968 65.1382 118.594 69.7641 118.594 75.4507C118.594 81.137 113.968 85.7632 108.281 85.7632C102.595 85.7632 97.9688 81.137 97.9688 75.4507C97.9688 69.7641 102.595 65.1382 108.281 65.1382Z"
                                fill="white"
                              />
                            </svg>
                            <p class="text-center text-white certificate-title">
                              Wide range of exames
                            </p>
                        </div>
                      </div>
                
                    </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
            <div class="bgHlftcircle ">
                <svg
                  width="135"
                  height="135"
                  viewBox="0 0 135 135"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <circle cx="67.5" cy="67.5" r="67.5" fill="#4B4B4D" />
                  <circle cx="67.5" cy="67.5" r="36.5" fill="#F58634" />
                </svg>
              </div>

              <div class="bgCircle ">
                <svg
                  width="140"
                  height="146"
                  viewBox="0 0 140 146"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M116.997 116.997C88.256 148.505 41.6874 154.057 6.73825 132.301C-0.763527 127.631 -1.18589 117.369 4.76921 110.84C15.3977 99.1883 32.8924 80.009 52.6734 58.3233C72.4543 36.6375 89.9489 17.4582 100.577 5.80624C106.533 -0.722291 116.79 -1.24251 122.128 5.79955C146.997 38.607 145.737 85.4884 116.997 116.997Z"
                    fill="#4B4B4D"
                  />
                  <path
                    d="M99.6969 101.217C85.0032 117.325 64.8152 124.201 48.7425 120.143C40.1748 117.979 39.5772 107.424 45.5323 100.896C51.8653 93.9529 60.4801 84.5086 69.9719 74.1028C79.4637 63.6969 88.0785 54.2526 94.4115 47.3098C100.367 40.7813 110.932 40.4087 113.872 48.7419C119.386 64.375 114.391 85.1082 99.6969 101.217Z"
                    fill="#F58634"
                  />
                </svg>
              </div>

          </div>
        </section>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
var reviewsSwiper = new Swiper(".loginSwiper", {
  loop: true,
  autoplay: {
   delay: 1500,
   pauseOnMouseEnter:true,
   },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
</script>
  </body>
</html>

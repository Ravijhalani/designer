@extends('frontend.Layouts.main')

@section('content')
    @push('css')
        <link rel="stylesheet" href="{{ asset('allAssets/services.css') }}" />
        <style>
            :root {
                --dot-size: 1.25rem;
                --max-block-size: calc(var(--dot-size) * 5);
                --dot-color: lch(80.94% 62.75 148.82);
                --dot-color-transition-1: lch(59.2% 85.33 318.2);
                --dot-color-transition-2: lch(95.29% 85.33 97.41);
                --delay: 0ms;
            }

            body {
                font-family: system-ui, sans-serif;
                color: #f2f2f2;
                background-color: #18181e;
            }

            h1 {
                font-size: 1.75rem;
                font-weight: 800;
                text-align: center;
            }

            .loader {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: calc(var(--dot-size) / 2);
                block-size: var(--max-block-size);
            }

            .dot {
                inline-size: var(--dot-size);
                block-size: var(--dot-size);
                border-radius: calc(var(--dot-size) / 2);
                background: var(--dot-color);
                -webkit-animation: y-grow 2s infinite ease-in-out;
                animation: y-grow 2s infinite ease-in-out;
                -webkit-animation-delay: calc(var(--delay) * 1ms);
                animation-delay: calc(var(--delay) * 1ms);
            }

            @-webkit-keyframes y-grow {
                25% {
                    block-size: var(--max-block-size);
                    background-color: var(--dot-color-transition-1);
                }

                50% {
                    block-size: var(--dot-size);
                    background-color: var(--dot-color-transition-2);
                }
            }

            @keyframes y-grow {
                25% {
                    block-size: var(--max-block-size);
                    background-color: var(--dot-color-transition-1);
                }

                50% {
                    block-size: var(--dot-size);
                    background-color: var(--dot-color-transition-2);
                }
            }
        </style>
    @endpush
    <!---------------------content starts from here------------------>
    <div class="m-4 form-main-parent px-3 py-3 over-flow-class-all">
        <div class="p-0 m-0 d-flex justify-content-between align-items-center">
            <p class="form-main-heading mb-3">Services</p>
            <a href="{{ route('service.add') }}" class="add-more-button mb-3">Add more +</a>
        </div>
        <hr class="p-0 m-0" />
        <div>
            <p class="form-main-heading-two">Categories</p>


            <div id="carouselExampleControls" class="carousel slide crousel-main-parent">
                <div class="carousel-inner px-3">
                    <div class="carousel-item active">
                        <div class="d-flex gap-3 flex-wrap">
                            <div class="container">
                                <ul class="nav nav-tabs gap-3" id="myTab" role="tablist">
                                   

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <button class="carousel-control-prev d-flex justify-content-start" type="button"
                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="crousel-icon" aria-hidden="true">◀︎</span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next d-flex justify-content-end" type="button"
                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="crousel-icon" aria-hidden="true">►</span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- --------------------ends here------------------ -->
        </div>

        <main id="loader" style="display: none;">
            <div class="loader js-loader" data-delay="200">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </main>

        <div class="row" id="ServiceData">



           @forelse ($booking['items'] as $key=>$item)
           @php 
            $uniqueID = \Illuminate\Support\Facades\Crypt::encryptString($item['id']);

           @endphp
                <div class="col-lg-4 col-md-6 col-sm-12 col-12 pt-3">
                    <div class="card-white px-3 py-3" role="button"
                        onclick="return window.location.href='{{ route('start.meeting', ['meeting_id' =>  $uniqueID ]) }}'">
                        <div class="d-flex flex-row justify-content-between align-items-start flex-wrap">
                            <div>
                                <p class="cards-main-heading m-0">{{ $item['profile_service']['title'] }}</p>
                                
                            </div>
                            <div class="d-flex justify-content-end align-items-start gap-2 flex-wrap mt-2">
                                <p class="status-text m-0">{{ $item['slot_date'] }}</p>
                                <i class="uil uil-ellipsis-v"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            
                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <p class="cards-main-heading-two">Slot Start Time</p>
                                <p class="cards-main-heading m-0">{{ getIst($item['slot_start_time'])->format('H:i') }} </p>
                            </div>

                            <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                <p class="cards-main-heading-two">Slot End Time</p>
                                <p class="cards-main-heading m-0">{{ getIst($item['slot_end_time'])->format('H:i')  }} </p>
                            </div>

                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column justify-content-center align-items-start w-100 mt-4">
                                <p class="cards-main-heading-two">Status</p>
                                <p class="cards-main-heading m-0">{{ $item['status'] }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            @empty
                <div class="container mt-5">
                    <div class="card-white px-3 py-3">
                        <h3 class="text-center">No service available</h3>
                    </div>
                </div>
            @endforelse




        </div>
    </div>
@endsection

@push('js')
  
@endpush

@forelse ($data as $key=>$item)
    <div class="col-lg-4 col-md-6 col-sm-12 col-12 pt-3">

        <div class="card-white px-3 py-3" role="button"
            onclick="return window.location.href='{{ route('service.edit', ['service_id' => $item['id']]) }}'">
            <div class="d-flex flex-row justify-content-between align-items-start flex-wrap">
                <div>
                    <p class="cards-main-heading m-0">{{ $item['title'] }}</p>
                    <p class="cards-main-heading-two">{{ isset($item['company'])?$item['company']['name']:"" }}</p>
                </div>
                <div class="d-flex justify-content-end align-items-start gap-2 flex-wrap mt-2">
                    <p class="status-text m-0">{{ $item['job_location_type'] }}</p>
                    <i class="uil uil-ellipsis-v"></i>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex flex-column justify-content-center align-items-start w-100">
                    <p class="cards-main-heading-two">Designation</p>
                    <p class="cards-main-heading m-0">{{ (isset($item['designation']))?$item['designation']['name']:"" }}</p>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-start w-100">
                    <p class="cards-main-heading-two">Experience</p>
                    <p class="cards-main-heading m-0">{{ $item['experience_years'] }} Years</p>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex flex-column justify-content-center align-items-start w-100 mt-4">
                    <p class="cards-main-heading-two">Description</p>
                    <p class="cards-main-heading m-0">{{ $item['description'] }}</p>
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

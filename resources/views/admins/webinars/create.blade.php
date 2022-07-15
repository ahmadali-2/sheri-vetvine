@extends('admins.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Add New Event/Webinar</strong>
                </div>
                <div class="card-body">
                    <div id="pay-invoice">
                        <div class="card-body">
                            <form action="{{ route('webinars.store') }}" method="post" id="continueeducationfrm"
                                novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="event_title" class="control-label mb-1">Main Title</label>
                                            <input id="event_title" placeholder="Enter Name" name="event_title" type="text"
                                                class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="tags" class="control-label mb-1">Tags (Keywords)</label>
                                            <input id="tags" placeholder="Enter Name" name="tags" type="text"
                                                class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="network_id" class="control-label mb-1 form-select">Event
                                                Category</label>
                                            <select id="category_id" name="category_id" aria-label="Default select example"
                                                class="form-control cc-number identified visa" value="" data-val="true">
                                                <option selected value="">Select Category</option>
                                                @foreach ($eventcategory as $events)
                                                    <option value="{{ $events->id }}">{{ $events->category_title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="main_photo" class="control-label mb-1">Main Photo</label>
                                            <input id="main_photo" placeholder="Enter Name" name="main_photo" type="file"
                                                class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="date" class="control-label mb-1">Date</label>
                                            <input id="date" placeholder="" name="date" type="date" class="form-control"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="time" class="control-label mb-1">Time</label>
                                            <input id="time" placeholder="" name="time" type="time" class="form-control"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="presenter_one" class="control-label mb-1">Presenter 1</label>
                                            <input id="presenter_one" placeholder="Enter Name" name="presenter_one"
                                                type="text" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="presenter_one_url" class="control-label mb-1">Presenter 1
                                                URL </label>
                                            <input id="presenter_one_url" placeholder="https://" name="presenter_one_url" type="url"
                                                class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="presenter_two" class="control-label mb-1">Presenter 2 (optional)</label>
                                            <input id="presenter_two" placeholder="Enter Name" name="presenter_two"
                                                type="text" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="presenter_two_url" class="control-label mb-1">Presenter 2
                                                URL (optional)</label>
                                            <input id="presenter_two_url" placeholder="https://" name="presenter_two_url" type="url"
                                                class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="presenter_three" class="control-label mb-1">Presenter 3 (optional)</label>
                                            <input id="presenter_three" placeholder="Enter Name" name="presenter_three"
                                                type="text" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="presenter_three_url" class="control-label mb-1">Presenter 3
                                                URL (optional)</label>
                                            <input id="presenter_three_url" placeholder="https://" name="presenter_three_url"
                                                type="url" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="pet_owner_fee" class="control-label mb-1">Pet Owner Fee $</label>
                                            <input id="pet_owner_fee" placeholder="Enter Fee" name="pet_owner_fee"
                                                type="number" class="form-control" value="" min="0">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="pet_owner_premium_fee" class="control-label mb-1">Pet Owner Premium
                                                Fee
                                                $</label>
                                            <input id="pet_owner_premium_fee" placeholder="Enter Fee"
                                                name="pet_owner_premium_fee" type="number" class="form-control" value="" min="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="vet_pet_prof_fee" class="control-label mb-1">Vet/Pet Prof. Fee
                                                $</label>
                                            <input id="vet_pet_prof_fee" placeholder="Enter Fee" name="vet_pet_prof_fee"
                                                type="number" class="form-control" min="0">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="vet_pet_prof_premium_fee" class="control-label mb-1">Vet/Pet Prof.
                                                Premium Fee
                                                $</label>
                                            <input placeholder="Enter Fee" name="vet_pet_prof_premium_fee" type="number"
                                                class="form-control" min="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="event_add_ytlink" class="control-label mb-1">Add Video Link</label>
                                            <input id="event_add_ytlink" placeholder="https://" name="event_add_ytlink"
                                                type="url" class="form-control" value="">
                                        </div>
                                    </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="network_id" class="control-label mb-1 form-select">Select Sponsor
                                                </label>
                                                <select id="sponser_id" style="width: 100%" name="sponser_id[]"
                                                    aria-label="Default select example"
                                                    class="js-example-basic-multiple form-control" data-val="true"
                                                    multiple="multiple">
                                                    @foreach ($sponser as $sponsers)
                                                        <option value="{{ $sponsers->id }}">{{ $sponsers->sponser_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="event_description" class="control-label mb-1">Event
                                                Detail</label>
                                            <textarea class="form-control" id="event_description" rows="3" name="event_description" value=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Enter Time Zone link</label>
                                            <input type="url" name="timezone_url" id="timezone_url" class="form-control timezone_url" placeholder="Enter Url" required>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Submit</span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

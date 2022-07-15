@extends('admins.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Edit User Type</strong>
                </div>
                <div class="card-body">
                    <div id="pay-invoice">
                        <div class="card-body">
                            <form action="{{ route('updateusertype', $user->id) }}" method="POST" id="editusertype">
                                @csrf
                                <div class="row">
                                    <div class=" col-6">
                                        <div class="form-group">
                                            <label for="type" class="control-label mb-1 form-select">User Type</label>
                                            <select id="type" name="type" aria-label="Default select example"
                                                class="form-control cc-number identified visa" value="" data-val="true">
                                                <option selected value="">Open this select level</option>
                                                @foreach ($memberTypes as $mt)
                                                    <option value="{{ $mt->id }}"
                                                        {{ $user->type == $mt->id ? 'selected' : '' }}>
                                                        {{ $mt->member_type }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Update</span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                    </button>
                                </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

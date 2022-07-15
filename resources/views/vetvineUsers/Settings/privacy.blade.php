@extends('vetvineUsers.dashboard_master')
@section('dashboardcontent')
@php
    $user = Auth::user();
@endphp
<div class="dashboard-content-wrapper">
        <h4>Privacy Settings</h4>
    <form method="post" action="{{ route('privacy.store') }}" id="privacyfrm">
        @csrf
        <div class="row">
          <div class="col-sm-12 mt-4">
            <h6>Blocked Members</h6>
            <p class="text-right">Adding a person to your block list makes your profile (and all of your other content) unviewable to them. Any connections you have to the blocked person will be canceled. To add someone to your block list, visit that person's profile page.</p>
            <div class="form-check">
                <input type="hidden" name="blocked_search" value="1">
                <input class="form-check-input" type="checkbox" value="0" id="" name="blocked_search" @if(isset($user->blocked_search) && $user->blocked_search==0 ) checked @endif>
                <label class="form-check-label" for="flexCheckDefault">
                    Do not display me in searches, browsing members, or the "Online Members" list.
                </label>
            </div>
        </div>
        <div class="col-sm-6 mt-4">
            <h6>Profile Privacy</h6>
            <p class="text-right">Who can view your profile?</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="profile_privacy" id="profile_privacy" value="onlyme" @if(isset($user->profile_privacy) && $user->profile_privacy== 'onlyme' ) checked @endif>
                <label class="form-check-label" for="flexRadioDefault1">
                  Only Me
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="profile_privacy" id="profile_privacy" value="onlymyfriends" @if(isset($user->profile_privacy) && $user->profile_privacy== 'onlymyfriends' ) checked @endif>
                <label class="form-check-label" for="flexRadioDefault2">
                  Only My Friends
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="profile_privacy" id="profile_privacy" value="friends&networks" @if(isset($user->profile_privacy) && $user->profile_privacy== 'friends&networks' ) checked @endif>
                <label class="form-check-label" for="flexRadioDefault2">
                  Friends & Networks
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="profile_privacy" id="profile_privacy" value="allregisteredmembers" @if(isset($user->profile_privacy) && $user->profile_privacy== 'allregisteredmembers' ) checked @endif>
                <label class="form-check-label" for="flexRadioDefault2">
                  All Registered Members
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="profile_privacy" id="profile_privacy" value="everyone" @if(isset($user->profile_privacy) && $user->profile_privacy== 'everyone' ) checked @endif>
                <label class="form-check-label" for="flexRadioDefault2">
                  Everyone
                </label>
              </div>
        </div>
        <div class="col-sm-6 mt-4">
            <h6>Profile Posting Privacy</h6>
            <p class="text-right">Who can post on your profile?</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="profile_posting_privacy" id="profile_posting_privacy" value="onlyme" @if(isset($user->profile_posting_privacy) && $user->profile_posting_privacy== 'onlyme' ) checked @endif>
                <label class="form-check-label" for="flexRadioDefault1">
                  Only Me
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="profile_posting_privacy" id="profile_posting_privacy" value="onlymyfriends" @if(isset($user->profile_posting_privacy) && $user->profile_posting_privacy== 'onlymyfriends' ) checked @endif>
                <label class="form-check-label" for="flexRadioDefault2">
                  Only My Friends
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="profile_posting_privacy" id="profile_posting_privacy" value="friends&networks" @if(isset($user->profile_posting_privacy) && $user->profile_posting_privacy== 'friends&networks' ) checked @endif>
                <label class="form-check-label" for="flexRadioDefault2">
                  Friends & Networks
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="profile_posting_privacy" id="profile_posting_privacy" value="allregisteredmembers" @if(isset($user->profile_posting_privacy) && $user->profile_posting_privacy== 'allregisteredmembers' ) checked @endif>
                <label class="form-check-label" for="flexRadioDefault2">
                  All Registered Members
                </label>
              </div>
        </div>
          <div class="col-sm-12 mt-5">
            <button type="button" class="dashboard-btn mr-3">Save & Complete Later</button>
            <input type="submit" class="dashboard-btn" value="Save & Continue">
          </div>
        </div>
    </form>
      </div>
@endsection
@section('scripts')
<script>

</script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\VetvineUsers\Settings\PrivacySettingRequest','#privacyfrm') !!}
@endsection

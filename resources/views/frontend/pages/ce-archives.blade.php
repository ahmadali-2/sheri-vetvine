@extends('frontend.master')
@section('content')
<main>
    <section class="video-section-wrapper mb-4">
        <div class="container">
           <!-- <div class="filter-div category-div">
              <div id="fav_show_wrapper">
                  <label for="fav_Show" id="fav_show_label">Category:</label>
                  <select name="fav_show" id="fav_show" class="filter-slect">
                      <option title="" value="" label=""></option>
                      <option title="Anesthesia" value="72" label="Anesthesia">Anesthesia</option>
                      <option title="Behavior" value="83" label="Behavior">Behavior</option>
                      <option title="Cardiology" value="49" label="Cardiology">Cardiology</option>
                      <option title="Dentistry" value="51" label="Dentistry">Dentistry</option>
                      <option title="Dermatology" value="31" label="Dermatology">Dermatology</option>
                      <option title="Emergency &amp; Critical Care" value="33" label="Emergency &amp; Critical Care">Emergency &amp; Critical Care</option>
                      <option title="Equine" value="71" label="Equine">Equine</option>
                      <option title="Euthanasia" value="92" label="Euthanasia">Euthanasia</option>
                      <option title="Evidence Based / Specialty Updates" value="84" label="Evidence Based / Specialty Updates">Evidence Based / Specialty Updates</option>
                      <option title="Human-Animal Bond" value="93" label="Human-Animal Bond">Human-Animal Bond</option>
                      <option title="Integrative Care &amp; Pain Management" value="85" label="Integrative Care &amp; Pain Management">Integrative Care &amp; Pain Management</option>
                      <option title="Internal Medicine - Small Animal" value="34" label="Internal Medicine - Small Animal">Internal Medicine - Small Animal</option>
                      <option title="Neurology" value="87" label="Neurology">Neurology</option>
                      <option title="Oncology" value="59" label="Oncology">Oncology</option>
                      <option title="Ophthalmology" value="36" label="Ophthalmology">Ophthalmology</option>
                      <option title="Parasitology" value="89" label="Parasitology">Parasitology</option>
                      <option title="Pet Owners" value="47" label="Pet Owners">Pet Owners</option>
                      <option title="Professional Development / Practice Management" value="38" label="Professional Development / Practice Management">Professional Development / Practice Management</option>
                      <option title="Surgery " value="55" label="Surgery ">Surgery </option>
                      <option title="Wildlife Conservation" value="91" label="Wildlife Conservation">Wildlife Conservation</option>
                  </select>
              </div>
              </div> -->
           <h1 class="Upcoming-webinars mt-2">CE ARCHIVES</h1>
           <ul class="filter_list">
              <li class="top-three-input">
                 <label>Title / Keyword</label>
                 <input type="text" class=" form-control">
              </li>
              <li>
                 <div id="fav_show_wrapper mt-0">
                    <label for="fav_Show" id="fav_show_label">Category:</label>
                    <select name="fav_show" id="fav_show" class="filter-slect">
                       <option title="" value="" label=""></option>
                       <option title="Anesthesia" value="72" label="Anesthesia">Anesthesia</option>
                       <option title="Behavior" value="83" label="Behavior">Behavior</option>
                       <option title="Cardiology" value="49" label="Cardiology">Cardiology</option>
                       <option title="Dentistry" value="51" label="Dentistry">Dentistry</option>
                       <option title="Dermatology" value="31" label="Dermatology">Dermatology</option>
                       <option title="Emergency &amp; Critical Care" value="33"
                          label="Emergency &amp; Critical Care">Emergency &amp; Critical Care</option>
                       <option title="Equine" value="71" label="Equine">Equine</option>
                       <option title="Euthanasia" value="92" label="Euthanasia">Euthanasia</option>
                       <option title="Evidence Based / Specialty Updates" value="84"
                          label="Evidence Based / Specialty Updates">Evidence Based / Specialty Updates</option>
                       <option title="Human-Animal Bond" value="93" label="Human-Animal Bond">Human-Animal Bond
                       </option>
                       <option title="Integrative Care &amp; Pain Management" value="85"
                          label="Integrative Care &amp; Pain Management">Integrative Care &amp; Pain Management
                       </option>
                       <option title="Internal Medicine - Small Animal" value="34"
                          label="Internal Medicine - Small Animal">Internal Medicine - Small Animal</option>
                       <option title="Neurology" value="87" label="Neurology">Neurology</option>
                       <option title="Oncology" value="59" label="Oncology">Oncology</option>
                       <option title="Ophthalmology" value="36" label="Ophthalmology">Ophthalmology</option>
                       <option title="Parasitology" value="89" label="Parasitology">Parasitology</option>
                       <option title="Pet Owners" value="47" label="Pet Owners">Pet Owners</option>
                       <option title="Professional Development / Practice Management" value="38"
                          label="Professional Development / Practice Management">Professional Development /
                          Practice Management
                       </option>
                       <option title="Surgery " value="55" label="Surgery ">Surgery </option>
                       <option title="Wildlife Conservation" value="91" label="Wildlife Conservation">Wildlife
                          Conservation
                       </option>
                    </select>
                 </div>
              </li>
              <li class="top-three-input">
                 <label> Presenter </label>
                 <input type="text" class=" form-control">
              </li>
              <li>
                 <label>Sponsor</label>
                 <input type="text" class=" form-control">
              </li>
              <li>
                 <label>From</label>
                 <input type="date" class=" form-control">
              </li>
              <li>
                 <label>To</label>
                 <input type="date" class=" form-control">
              </li>
              <li>
                 <button class="btn filter-searchBtn" type="button">Search</button>
              </li>
           </ul>
           <ul class="page-link-list">
              <li @if(ROUTE::current()->uri == 'upcoming-webinars') class="active"  @endif>
                 <a href="{{ route('upcoming_webinars') }}">Upcoming webinars</a>
              </li>
              <li @if(ROUTE::current()->uri == 'videos-on-demand') class="active"  @endif>
                 <a href="{{ route('videosOnDemand') }}">ce/videos on demand</a>
              </li>
              
              <li @if(ROUTE::current()->uri == 'ce-archives') class="active"  @endif>
                 <a href="{{ route('ceArchives') }}">ce archives</a>
              </li>
           </ul>
           <div class="row w-100 video-cat-main m-0">
              <div class="col-md-6 col-lg-4">
                 <div class="video-box-main">
                    <div class="video-box">
                       <iframe src="https://www.youtube.com/embed/gXWiDNhvIpM" title="YouTube video player"
                          frameborder="0"
                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                          allowfullscreen></iframe>
                    </div>
                    <div class="video-bottom-text">
                       <h3>Feeding Mares and
                          Young Horses
                       </h3>
                       <div>
                          <p>55 mins</p>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                       </div>
                    </div>
                    <div class="video-bottom-description">
                       <h5>02/17/2022</h5>
                       <p><span>Presented by:</span> Stephen G. Jackson, PhD <br />
                          <strong>Sponsored by:</strong> VetVine
                       </p>
                       <p class="para-decription">
                          This is the second of a 4-part series on feeding the horse, presented by
                          internationally recognized and leading equine nutrition consultant Dr. Steve
                          Jackson. This segment...
                       </p>
                       <a href="#">Read More</a>
                    </div>
                 </div>
              </div>
              <div class="col-md-6 col-lg-4">
                 <div class="video-box-main">
                    <div class="video-box">
                       <iframe src="https://www.youtube.com/embed/USrRlnBFoSw" title="YouTube video player"
                          frameborder="0"
                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                          allowfullscreen></iframe>
                    </div>
                    <div class="video-bottom-text">
                       <h3>Feeding Mares and
                          Young Horses
                       </h3>
                       <div>
                          <p>55 mins</p>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                       </div>
                    </div>
                    <div class="video-bottom-description">
                       <h5>02/17/2022</h5>
                       <p><span>Presented by:</span> Stephen G. Jackson, PhD <br />
                          <strong>Sponsored by:</strong> VetVine
                       </p>
                       <p class="para-decription">
                          This is the second of a 4-part series on feeding the horse, presented by
                          internationally recognized and leading equine nutrition consultant Dr. Steve
                          Jackson. This segment...
                       </p>
                       <a href="#">Read More</a>
                    </div>
                 </div>
              </div>
              <div class="col-md-6 col-lg-4">
                 <div class="video-box-main">
                    <div class="video-box">
                       <iframe src="https://www.youtube.com/embed/6265Qk-W-xI" title="YouTube video player"
                          frameborder="0"
                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                          allowfullscreen></iframe>
                    </div>
                    <div class="video-bottom-text">
                       <h3>Feeding Mares and
                          Young Horses
                       </h3>
                       <div>
                          <p>55 mins</p>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                       </div>
                    </div>
                    <div class="video-bottom-description">
                       <h5>02/17/2022</h5>
                       <p><span>Presented by:</span> Stephen G. Jackson, PhD <br />
                          <strong>Sponsored by:</strong> VetVine
                       </p>
                       <p class="para-decription">
                          This is the second of a 4-part series on feeding the horse, presented by
                          internationally recognized and leading equine nutrition consultant Dr. Steve
                          Jackson. This segment...
                       </p>
                       <a href="#">Read More</a>
                    </div>
                 </div>
              </div>
              <!-- 2nd row start  -->
              <div class="col-md-6 col-lg-4">
                 <div class="video-box-main">
                    <div class="video-box">
                       <iframe src="https://www.youtube.com/embed/I09bqs0-wVA" title="YouTube video player"
                          frameborder="0"
                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                          allowfullscreen></iframe>
                    </div>
                    <div class="video-bottom-text">
                       <h3>Feeding Mares and
                          Young Horses
                       </h3>
                       <div>
                          <p>55 mins</p>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                       </div>
                    </div>
                    <div class="video-bottom-description">
                       <h5>02/17/2022</h5>
                       <p><span>Presented by:</span> Stephen G. Jackson, PhD <br />
                          <strong>Sponsored by:</strong> VetVine
                       </p>
                       <p class="para-decription">
                          This is the second of a 4-part series on feeding the horse, presented by
                          internationally recognized and leading equine nutrition consultant Dr. Steve
                          Jackson. This segment...
                       </p>
                       <a href="#">Read More</a>
                    </div>
                 </div>
              </div>
              <div class="col-md-6 col-lg-4">
                 <div class="video-box-main">
                    <div class="video-box">
                       <iframe src="https://www.youtube.com/embed/5NCXXiw1w9E" title="YouTube video player"
                          frameborder="0"
                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                          allowfullscreen></iframe>
                    </div>
                    <div class="video-bottom-text">
                       <h3>Feeding Mares and
                          Young Horses
                       </h3>
                       <div>
                          <p>55 mins</p>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                       </div>
                    </div>
                    <div class="video-bottom-description">
                       <h5>02/17/2022</h5>
                       <p><span>Presented by:</span> Stephen G. Jackson, PhD <br />
                          <strong>Sponsored by:</strong> VetVine
                       </p>
                       <p class="para-decription">
                          This is the second of a 4-part series on feeding the horse, presented by
                          internationally recognized and leading equine nutrition consultant Dr. Steve
                          Jackson. This segment...
                       </p>
                       <a href="#">Read More</a>
                    </div>
                 </div>
              </div>
              <div class="col-md-6 col-lg-4">
                 <div class="video-box-main">
                    <div class="video-box">
                       <iframe src="https://www.youtube.com/embed/6265Qk-W-xI" title="YouTube video player"
                          frameborder="0"
                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                          allowfullscreen></iframe>
                    </div>
                    <div class="video-bottom-text">
                       <h3>Feeding Mares and
                          Young Horses
                       </h3>
                       <div>
                          <p>55 mins</p>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                       </div>
                    </div>
                    <div class="video-bottom-description">
                       <h5>02/17/2022</h5>
                       <p><span>Presented by:</span> Stephen G. Jackson, PhD <br />
                          <strong>Sponsored by:</strong> VetVine
                       </p>
                       <p class="para-decription">
                          This is the second of a 4-part series on feeding the horse, presented by
                          internationally recognized and leading equine nutrition consultant Dr. Steve
                          Jackson. This segment...
                       </p>
                       <a href="#">Read More</a>
                    </div>
                 </div>
              </div>
              <!-- 3rd row  start-->
              <div class="col-md-6 col-lg-4">
                 <div class="video-box-main">
                    <div class="video-box">
                       <iframe src="https://www.youtube.com/embed/gXWiDNhvIpM" title="YouTube video player"
                          frameborder="0"
                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                          allowfullscreen></iframe>
                    </div>
                    <div class="video-bottom-text">
                       <h3>Feeding Mares and
                          Young Horses
                       </h3>
                       <div>
                          <p>55 mins</p>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                       </div>
                    </div>
                    <div class="video-bottom-description">
                       <h5>02/17/2022</h5>
                       <p><span>Presented by:</span> Stephen G. Jackson, PhD <br />
                          <strong>Sponsored by:</strong> VetVine
                       </p>
                       <p class="para-decription">
                          This is the second of a 4-part series on feeding the horse, presented by
                          internationally recognized and leading equine nutrition consultant Dr. Steve
                          Jackson. This segment...
                       </p>
                       <a href="#">Read More</a>
                    </div>
                 </div>
              </div>
              <div class="col-md-6 col-lg-4">
                 <div class="video-box-main">
                    <div class="video-box">
                       <iframe src="https://www.youtube.com/embed/USrRlnBFoSw" title="YouTube video player"
                          frameborder="0"
                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                          allowfullscreen></iframe>
                    </div>
                    <div class="video-bottom-text">
                       <h3>Feeding Mares and
                          Young Horses
                       </h3>
                       <div>
                          <p>55 mins</p>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                       </div>
                    </div>
                    <div class="video-bottom-description">
                       <h5>02/17/2022</h5>
                       <p><span>Presented by:</span> Stephen G. Jackson, PhD <br />
                          <strong>Sponsored by:</strong> VetVine
                       </p>
                       <p class="para-decription">
                          This is the second of a 4-part series on feeding the horse, presented by
                          internationally recognized and leading equine nutrition consultant Dr. Steve
                          Jackson. This segment...
                       </p>
                       <a href="#">Read More</a>
                    </div>
                 </div>
              </div>
              <div class="col-md-6 col-lg-4">
                 <div class="video-box-main">
                    <div class="video-box">
                       <iframe src="https://www.youtube.com/embed/6265Qk-W-xI" title="YouTube video player"
                          frameborder="0"
                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                          allowfullscreen></iframe>
                    </div>
                    <div class="video-bottom-text">
                       <h3>Feeding Mares and
                          Young Horses
                       </h3>
                       <div>
                          <p>55 mins</p>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                          <span class="fas fa-star"></span>
                       </div>
                    </div>
                    <div class="video-bottom-description">
                       <h5>02/17/2022</h5>
                       <p><span>Presented by:</span> Stephen G. Jackson, PhD <br />
                          <strong>Sponsored by:</strong> VetVine
                       </p>
                       <p class="para-decription">
                          This is the second of a 4-part series on feeding the horse, presented by
                          internationally recognized and leading equine nutrition consultant Dr. Steve
                          Jackson. This segment...
                       </p>
                       <a href="#">Read More</a>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
@endsection

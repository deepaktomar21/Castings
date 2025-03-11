@extends('Frotent.layout')

@section('title', 'Home')

@section('content')
<!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>-->

  <!-- ================ start banner Area ================= -->
   
  <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{ asset('Frotent/images/bg_1.jpg')}}')">
    <div class="container">
      <div class="row align-items-end">
        <div class="col-lg-7">
          <h2 class="mb-0">Courses</h2>
          <!--<p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>-->
        </div>
      </div>
    </div>
  </div> 


<div class="custom-breadcrumns border-bottom">
  <div class="container">
    @if(auth()->user())
    <a href="{{route('user.dashboard')}}">Home</a>
    @else
    <a href="{{route('index')}}">Home</a>
    @endif
    <span class="mx-3 icon-keyboard_arrow_right"></span>
    <span class="current">Courses</span>
  </div>
</div>

<!--<div class="site-section">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
            <!--<div class="col-lg-4 col-md-6 mb-4">-->
            <!--    <div class="course-1-item">-->
            <!--        <figure class="thumnail">-->
            <!--        <a href="course-single.html"><img src="{{ asset('Frotent/images/course_1.jpg')}}" alt="Image" class="img-fluid"></a>-->
            <!--        <div class="price">$99.00</div>-->
            <!--        <div class="category"><h3>Mobile Application</h3></div>  -->
            <!--        </figure>-->
            <!--        <div class="course-1-content pb-4">-->
            <!--        <h2>How To Create Mobile Apps Using Ionic</h2>-->
            <!--        <div class="rating text-center mb-3">-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--        </div>-->
            <!--        <p class="desc mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique accusantium ipsam.</p>-->
            <!--        <p><a href="course-single.html" class="btn btn-primary rounded-0 px-4">Enroll In This Course</a></p>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

            <!--<div class="col-lg-4 col-md-6 mb-4">-->
            <!--    <div class="course-1-item">-->
            <!--        <figure class="thumnail">-->
            <!--                <a href="course-single.html"><img src="{{ asset('Frotent/images/course_2.jpg')}}" alt="Image" class="img-fluid"></a>-->
            <!--        <div class="price">$99.00</div>-->
            <!--        <div class="category"><h3>Mobile Application</h3></div>  -->
            <!--        </figure>-->
            <!--        <div class="course-1-content pb-4">-->
            <!--        <h2>How To Create Mobile Apps Using Ionic</h2>-->
            <!--        <div class="rating text-center mb-3">-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--        </div>-->
            <!--        <p class="desc mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique accusantium ipsam.</p>-->
            <!--        <p><a href="course-single.html" class="btn btn-primary rounded-0 px-4">Enroll In This Course</a></p>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

            <!--<div class="col-lg-4 col-md-6 mb-4">-->
            <!--    <div class="course-1-item">-->
            <!--        <figure class="thumnail">-->
            <!--                <a href="course-single.html"><img src="{{ asset('Frotent/images/course_3.jpg')}}" alt="Image" class="img-fluid"></a>-->
            <!--        <div class="price">$99.00</div>-->
            <!--        <div class="category"><h3>Mobile Application</h3></div>  -->
            <!--        </figure>-->
            <!--        <div class="course-1-content pb-4">-->
            <!--        <h2>How To Create Mobile Apps Using Ionic</h2>-->
            <!--        <div class="rating text-center mb-3">-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--        </div>-->
            <!--        <p class="desc mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique accusantium ipsam.</p>-->
            <!--        <p><a href="course-single.html" class="btn btn-primary rounded-0 px-4">Enroll In This Course</a></p>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->


            <!--<div class="col-lg-4 col-md-6 mb-4">-->
            <!--    <div class="course-1-item">-->
            <!--        <figure class="thumnail">-->
            <!--                <a href="course-single.html"><img src="{{ asset('Frotent/images/course_4.jpg')}}" alt="Image" class="img-fluid"></a>-->
            <!--        <div class="price">$99.00</div>-->
            <!--        <div class="category"><h3>Mobile Application</h3></div>  -->
            <!--        </figure>-->
            <!--        <div class="course-1-content pb-4">-->
            <!--        <h2>How To Create Mobile Apps Using Ionic</h2>-->
            <!--        <div class="rating text-center mb-3">-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--        </div>-->
            <!--        <p class="desc mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique accusantium ipsam.</p>-->
            <!--        <p><a href="course-single.html" class="btn btn-primary rounded-0 px-4">Enroll In This Course</a></p>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

            <!--<div class="col-lg-4 col-md-6 mb-4">-->
            <!--    <div class="course-1-item">-->
            <!--        <figure class="thumnail">-->
            <!--                <a href="course-single.html"><img src="{{ asset('Frotent/images/course_5.jpg')}}" alt="Image" class="img-fluid"></a>-->
            <!--        <div class="price">$99.00</div>-->
            <!--        <div class="category"><h3>Mobile Application</h3></div>  -->
            <!--        </figure>-->
            <!--        <div class="course-1-content pb-4">-->
            <!--        <h2>How To Create Mobile Apps Using Ionic</h2>-->
            <!--        <div class="rating text-center mb-3">-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--        </div>-->
            <!--        <p class="desc mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique accusantium ipsam.</p>-->
            <!--        <p><a href="course-single.html" class="btn btn-primary rounded-0 px-4">Enroll In This Course</a></p>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

            <!--<div class="col-lg-4 col-md-6 mb-4">-->
            <!--    <div class="course-1-item">-->
            <!--        <figure class="thumnail">-->
            <!--                <a href="course-single.html"><img src="{{ asset('Frotent/images/course_6.jpg')}}" alt="Image" class="img-fluid"></a>-->
            <!--        <div class="price">$99.00</div>-->
            <!--        <div class="category"><h3>Mobile Application</h3></div>  -->
            <!--        </figure>-->
            <!--        <div class="course-1-content pb-4">-->
            <!--        <h2>How To Create Mobile Apps Using Ionic</h2>-->
            <!--        <div class="rating text-center mb-3">-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--            <span class="icon-star2 text-warning"></span>-->
            <!--        </div>-->
            <!--        <p class="desc mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique accusantium ipsam.</p>-->
            <!--        <p><a href="course-single.html" class="btn btn-primary rounded-0 px-4">Enroll In This Course</a></p>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="site-section">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--              @foreach($courses as $course)-->
<!--    <div class="col-lg-4 col-md-6 mb-4 d-flex">-->
<!--        <div class="course-1-item d-flex flex-column">-->
<!--            <figure class="thumbnail">-->
<!--                <a href="{{ $course->video_link }}" target="_blank">-->
<!--                    <img src="{{ asset($course->image) }}" alt="{{ $course->title }}" class="img-fluid" style="height: 180px;">-->
<!--                </a>-->
<!--                <div class="category a">-->
<!--                    <h3>{{ $course->title }}</h3>-->
<!--                </div>-->
<!--            </figure>-->
<!--            <div class="course-1-content pb-4 flex-grow-1 d-flex flex-column">-->
                <!--<h2>{{ $course->title }}</h2>-->
<!--                <p class="desc mb-4">-->
<!--                    <span class="short-text">{{ Str::limit($course->description, 20) }}</span>-->
<!--                </p>-->
<!--                        @if(auth()->user())-->
<!--         <a href="{{route('user.courses.details',$course->id)}}" >Read More</a>-->
<!--        @else-->
<!--        <a href="{{route('coursesdetails',$course->id)}}" >Read More</a>-->
<!--        @endif-->
                <!--<button class="btn btsd toggle-text" data-toggle-text="Read More">-->
                <!--    Read More-->
                <!--</button>-->

<!--                <div class="mt-auto">-->
<!--                    <a href="{{ $course->video_link }}" target="_blank" class="btn a rounded-0 px-4">-->
<!--                        Enroll in this course-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    @endforeach-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<div class="site-section">
    <div class="container">
        <div class="row">
            @foreach($courses as $course)
                <div class="col-lg-4 col-md-6 mb-4 d-flex">
                    <div class="course-1-item d-flex flex-column">
                        <figure class="thumbnail">
                            <a href="" >
                                <img src="{{ asset($course->image) }}" alt="{{ $course->title }}" class="img-fluid" style="height: 180px;">
                            </a>
                            <div class="category a">
                                <h3>{{ $course->title }}</h3>
                            </div>
                        </figure>
                        <div class="course-1-content pb-4 flex-grow-1 d-flex flex-column">
                            <p class="desc mb-4">
                                <span class="short-text">{{ Str::limit($course->description, 20) }}</span>
                            </p>
                            <div class="mt-auto">
                                <button class="btn a rounded-0 px-4" onclick="showCourseOverview({{ $course->id }})">
                                    Enroll in this course
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Course Overview Modal -->
<div class="modal fade courseOverviewModal" id="courseOverviewModal" tabindex="-1" aria-labelledby="courseOverviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="courseOverviewModalLabel">Course Overview</h5>
                <!--<button type="button" class="btn-close" id="closeModalButton">X</button>-->
            </div>
            <div class="modal-body">
                <div id="courseOverviewContent">
                    <!-- Course details will be loaded dynamically via AJAX -->
                </div>
            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
                <button type="button" class="btn btn-secondary"  id="closeModalButton">Close</button>
                 <!--<button type="submit" class="btn btn-secondary " id="closeModalButton">Close</button>-->
                                 <!--<button type="button" class="btn btn-secondary close-modal-button">Close</button>-->
                <a href="#" id="startCourseButton" class="btn a">Start Course</a>
                
            </div>
        </div>
    </div>
</div>

<script>
    // Show Course Overview
    function showCourseOverview(courseId) {
        const modal = new bootstrap.Modal(document.getElementById('courseOverviewModal'), {});
        modal.show();

        // AJAX Request to fetch course details
        fetch(`/course-overview/${courseId}`)
            .then(response => response.json())
            .then(data => {
                const courseContent = `
                    <h3>${data.title}</h3>
                    <p>${data.description}</p>
                `;

                document.getElementById('courseOverviewContent').innerHTML = courseContent;
                @if(auth()->user())
                
                document.getElementById('startCourseButton').setAttribute('href', `/user/courses-details/${courseId}`);
                @else
                document.getElementById('startCourseButton').setAttribute('href', `/coursesdetails/${courseId}`);
                @endif
            })
            .catch(error => console.error('Error fetching course details:', error));
    }
   </script>
  
            @endforeach
       
        </div>
    </div>
</div>

 <script>
 document.getElementById('closeModalButton').addEventListener('click', function () {
    window.location.reload(); // Reload the page when the close button is clicked
});
    // JavaScript to close the modal when the button is clicked using class selector
//  document.querySelectorAll('.close-modal-button').forEach(function(button) {
//     button.addEventListener('click', function() {
//         const modalElement = document.getElementById('courseOverviewModal'); // Use `getElementById`
//         if (modalElement) {
//             const modal = bootstrap.Modal.getInstance(modalElement); // Get the modal instance
//             if (modal) {
//                 modal.hide(); // Hide the modal
//             } else {
//                 console.error('Modal instance not found.');
//             }
//         } else {
//             console.error('Modal element not found.');
//         }
//     });
// });
</script>

<!--<div class="section-bg style-1" style="background-image: url('{{ asset('Frotent/images/hero_1.jpg')}}');">-->
<!--    <div class="container">-->
<!--      <div class="row">-->
<!--        <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">-->
<!--          <span class="icon flaticon-mortarboard"></span>-->
<!--          <h3>Our Philosphy</h3>-->
<!--          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea? Dolore, amet reprehenderit.</p>-->
<!--        </div>-->
<!--        <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">-->
<!--          <span class="icon flaticon-school-material"></span>-->
<!--          <h3>Academics Principle</h3>-->
<!--          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea?-->
<!--            Dolore, amet reprehenderit.</p>-->
<!--        </div>-->
<!--        <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">-->
<!--          <span class="icon flaticon-library"></span>-->
<!--          <h3>Key of Success</h3>-->
<!--          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea?-->
<!--            Dolore, amet reprehenderit.</p>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
  
    <!-- ================ End Feature Area ================= -->
<!--    <script>document.addEventListener("DOMContentLoaded", function () {-->
<!--    const toggleButtons = document.querySelectorAll(".toggle-text");-->

<!--    toggleButtons.forEach(button => {-->
<!--        button.addEventListener("click", function () {-->
<!--            const card = button.closest(".course-1-content");-->
<!--            const shortTexts = card.querySelectorAll(".short-text");-->
<!--            const fullTexts = card.querySelectorAll(".full-text");-->

<!--            shortTexts.forEach(el => el.classList.toggle("d-none"));-->
<!--            fullTexts.forEach(el => el.classList.toggle("d-none"));-->

<!--            button.textContent = button.textContent === "Read More" ? "Read Less" : "Read More";-->
<!--        });-->
<!--    });-->
<!--});-->
<!--</script>-->
<style>.course-1-item {
    display: flex;
    flex-direction: column;
    height: 100%;
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

.course-1-content {
    display: flex;
    flex-direction: column;
}

.thumbnail img {
    width: 100%;
    height: auto;
    border-radius: 8px 8px 0 0;
}

.category h3 {
    font-size: 16px;
    color: #fff;
    background-color: #f0c71e;
    padding: 5px;
    text-align: center;
    margin-top: -25px;
    position: relative;
}

.desc,
.optional-desc {
    font-size: 14px;
    color: #555;
}

.btn {
    margin-top: auto;
    text-align: center;
}
.btsd{
    font-weight: 400;
    color: #f0c71e;
    background-color: transparent;
    }

</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    @endsection
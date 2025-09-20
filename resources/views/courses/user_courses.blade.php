@extends('layouts.app')
@section('content')


    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">


            @if (count($courses) > 0)
                @foreach ($courses as $course)
                    <div class="col-md-6 col-xxl-4 mb-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="bg-label-primary rounded text-center mb-4 pt-4">
                                    <img @if ($course->thumbnail != null) src="{{ asset('course_file/thumbnail/' . $course->thumbnail) }}"
                          @else
                            src="{{ asset('assets/img/illustrations/girl-with-laptop.png') }}" @endif
                                        alt="Course Image" width="140" height="200px" />
                                </div>
                                <h5 class="mb-2">{{ $course->title }}</h5>

                                <div class="row mb-4 g-3">
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <span class="avatar-initial rounded bg-label-primary"><i
                                                        class="icon-base ti tabler-calendar-event icon-28px"></i></span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-nowrap">{{ $course->created_at }}</h6>
                                                <small>Date</small>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <button type="button" onclick="openCourse('{{$course->file_type}}','{{$course->path}}')" class="btn btn-primary w-100">View</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center img-fluid">
                    <img src="{{ asset('assets/img/course-not-found.jpg') }}" alt="No Courses Found" width="auto">

                </div>
            @endif


        </div>
    </div>
    <!--/ Content -->


    <div class="modal fade" id="courseModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="rounded-top">
                        <iframe id="iframeViewer" allowfullscreen></iframe>
                        <video id="videoPlayer" controls></video>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        function openCourse(type, path) {
         console.log(type,path);

            const iframe = document.getElementById("iframeViewer");
            const video = document.getElementById("videoPlayer");

            iframe.style.display = "none";
            video.style.display = "none";
            iframe.src = "";
            video.src = "";

            if (type === 'video_url') {
                iframe.src = path;
                iframe.style.display = "block";
            } else if (type === 'pdf_url') {
                iframe.src = `https://docs.google.com/gview?url=${path}&embedded=true`;
                iframe.style.display = "block";
            } else if (type === 'video') {
                path = '{{ asset("course_file") }}/' + path;
                video.src = path;
                video.style.display = "block";
            } else if (type === 'pdf') {
                path = '{{ asset("course_file") }}/' + path;
                iframe.src = path;
                iframe.style.display = "block";
            }

            $('#courseModal').show();
        }
    </script>
@endpush

@extends('main')
 <!-- About Section Start From here -->
@section('content')
        <section id="about-section">
            <!-- about left  -->
            <div class="about-left">
                <img src="./template/images/Logo/contactus.png" width="350px" />
            </div>

            <!-- about right  -->
            <div class="about-right">
                <h2>My Story</h2>
                <h1>About Me</h1>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Debitis fugiat a dolorem at similique maxime dolorum dolore
                    enim dicta voluptatibus, illum recusandae, vel optio tempore
                    ipsum incidunt eum. Aspernatur, repellendus.
                </p>
                <div class="address">
                    <ul>
                        <li>
                            <span class="address-logo">
                                <i class="fa fa-paper-plane"></i>
                            </span>
                            <p>Address</p>
                            <span class="saprater">:</span>
                            <p>Jaipur, Rajasthan, India</p>
                        </li>
                        <li>
                            <span class="address-logo">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </span>
                            <p>Phone No</p>
                            <span class="saprater">:</span>
                            <p>+91 987-654-4321</p>
                        </li>
                        <li>
                            <span class="address-logo">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                            <p>Email ID</p>
                            <span class="saprater">:</span>
                            <p>crowncoder@gmail.com</p>
                        </li>
                    </ul>
                </div>
                <div class="expertise">
                    <h3>My Expertise</h3>
                    <ul>
                        <li>
                            <span class="expertise-logo">
                                <i class="fa fa-html5" aria-hidden="true"></i>
                            </span>
                            <p>HTML</p>
                        </li>
                        <li>
                            <span class="expertise-logo">
                                <i class="fa fa-css3" aria-hidden="true"></i>
                            </span>
                            <p>CSS</p>
                        </li>
                        <li>
                            <span class="expertise-logo">
                                <i class="fa fa-rocket" aria-hidden="true"></i>
                            </span>
                            <p>JavaScript</p>
                        </li>
                        <li>
                            <span class="expertise-logo">
                                <i class="fa fa-stack-overflow" aria-hidden="true"></i>
                            </span>
                            <p>Laravel</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
@endsection
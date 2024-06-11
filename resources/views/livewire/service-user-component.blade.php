<section id="services" class="services section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Servicios</h2>
        <p>Conoce nuestros servicios</p>
    </div><!-- End Section Title -->
    
    <div class="container">
        <div class="row gy-4">
            @foreach ($services as $service)
                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-activity icon"></i></div>
                        <h4><a href="service-details.html" class="stretched-link">{{$service->name}}</a></h4>
                        <p>{{$service->description}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</section>

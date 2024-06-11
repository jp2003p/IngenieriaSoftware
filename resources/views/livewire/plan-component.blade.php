<section id="pricing" class="pricing section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Precios</h2>
        <p>Elije entre nuestros diferentes planes</p>
    </div>
    <div class="container">
        <div class="row gy-4">
            @foreach ($plans as $plan)
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="pricing-item">
                        <h3>{{ $plan->name }}</h3>
                        <h4><sup>$</sup>{{ $plan->services->sum('price') }}<span></span></h4>
                        <ul>
                            @foreach ($plan->services as $service)
                                <li><i class="bi bi-check"></i> <span>{{ $service->description }}</span></li>
                            @endforeach
                        </ul>
                        <button class="buy-btn" value="{{ $plan->id }}">Solicitar ahora</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    @push('script-plan')
        <script>
            const buttonsRequestService = document.querySelectorAll('.buy-btn');
            buttonsRequestService.forEach(b => {
                b.addEventListener('click', function() {
                    Swal.fire({
                        title: '¿Deseas solicitar este servicio?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Aceptar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                                '¡Solicitud enviada!',
                                'Tu solicitud para el servicio ha sido enviada.',
                                'success'
                            );
                            
                            Livewire.dispatch('add-service', {
                                id: b.value
                            });

                        } else {
                            Swal.fire(
                                'Solicitud cancelada',
                                'Tu solicitud para el servicio ha sido cancelada.',
                                'info'
                            );
                        }
                    });
                });
            });
        </script>
    @endpush

</section>

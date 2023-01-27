    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">
  
          <div class="section-title">
            <h2>SUBJECT OFFERED</h2>
            <p>"We offer a wide range of comprehensive, diverse, and engaging subject options that are high-quality, innovative, and interactive, taught by knowledgeable and professional instructors to ensure you receive relevant, specialized, and tailored learning opportunities that are up-to-date and well-rounded, aimed to help you achieve success in your study"</p>
          </div>
  
          <table class="table table-hover" style="max-width: 60%; margin: 0 auto;">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Subject</th>
                <th scope="col">Schedule</th>
                <th scope="col">Price</th>
              </tr>
            </thead>
            <tbody>
              @php
                $i=1;
              @endphp
              @foreach ($subjects as $subject)                  
              <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $subject->name }}</td>
                <td>{{ $subject->day }} - {{ $subject->time }}</td>
                <td>RM{{ $subject->price }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </section><!-- End Services Section -->
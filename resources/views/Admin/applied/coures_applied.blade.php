@include('../Layouts/header')
@include('../Layouts/sidebar')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      Candidate Name
                    </th>
                    <th> Candidate Email</th>
                    <th> Candidate Phone Number</th>
                    <th> Applied Course</th>
                    <th>Applied College</th>
                  </tr>
                </thead>
                <tbody>
                @if (!empty($coursesApplied))
                @foreach ($coursesApplied as $candidate)
                <tr>
                    <td>{{$candidate->first_name}} {{$candidate->last_name}}</td>
                    <td>{{$candidate->email}}</td>
                    <td>{{$candidate->phone_number}}</td>
                    <td>{{$candidate->course}}</td>
                    <td>{{$candidate->college}}</td>
                  </tr>
                @endforeach

                @endif
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

@include('../Layouts/footer')

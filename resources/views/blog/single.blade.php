@extends('layout.index')
@section('main')

<main class="container">
      <section class="single-blog-post">
        <h1>Mumbai Hits 32Deg summer</h1>

        <p class="time-and-author">
          2 hours ago
          <span>Written By UiMonk </span>
        </p>

        <div class="single-blog-post-ContentImage" data-aos="fade-left">
          <img src="images/pic1.jpg" alt="" />
        </div>

        <div class="about-text">
          <p>
            Vaccination is the most
            effective way to protect against infectious diseases. Vaccines
            strengthen your immune system by training it to recognise and
            fight against specific viruses. When you get vaccinated, you are
            protecting yourself and helping to protect the whole community.
            <br><br>
            A COVID-19 vaccine might:
          <ul>
            <li> Prevent you from getting COVID-19 or from
              becoming seriously ill or dying due to COVID-19 </li>
            <li>Prevent you from
              spreading the COVID-19 virus to others </li>
            <li> Add to the number of people
              in the community who are protected from getting COVID-19 — making
              it harder for the disease to spread and contributing to herd
              immunity </li>
            <li> Prevent the COVID-19 virus from spreading and
              replicating, which allows it to mutate and possibly become more
              resistant to vaccines</li>
          </ul>
          </p>
        </div>
      </section>
      <section class="recommended">
        <p>Related</p>
        <div class="recommended-cards">
       
          <a href="">
            <div class="recommended-card">
              <img src="images/pic2.jpg" alt="" loading="lazy" />
              <h4>
                India KicksOff IPL 16
              </h4>
            </div>
          </a>
      

        </div>
      </section>
    </main>

@endsection
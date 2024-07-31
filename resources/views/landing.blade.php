<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BAPPEDA ACEH</title>
  <link rel="icon" href="{{ asset('images/pancacita.png') }}" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.3.1/dist/full.css" rel="stylesheet">
  <style>
    .hero {
      background-image: url('{{ asset('images/kantor.jpg') }}');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }
  </style>
</head>
<body>
  @include('components/navbar')

  <div class="hero min-h-screen">
    <div class="hero-overlay bg-opacity-60"></div>
    <div class="hero-content text-neutral-content text-center flex flex-col justify-center items-center px-4">
      <div class="max-w-md">
        <h1 class="mb-5 text-4xl md:text-5xl font-bold">Hello there</h1>
        <p class="mb-5 text-sm md:text-base">
          Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
          quasi. In deleniti eaque aut repudiandae et a id nisi.
        </p>
        <button class="btn btn-primary">Get Started</button>
      </div>
    </div>
  </div>

  <!-- YouTube Video Section -->
  <div class="flex justify-center py-10 px-10 ">
    <div class="max-w-xl w-full">
      <div class="video-container">
        <iframe class="w-full h-full" src="https://www.youtube.com/embed/RztA43D8330" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
  </div>

  @include('components/footer')
</body>
</html>

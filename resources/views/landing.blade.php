<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.3.1/dist/full.css" rel="stylesheet">
  <style>
    .hero {
      background-image: url('{{ asset('images/kantor.jpg') }}');
      background-size: cover; /* Cover ensures the background image covers the entire element */
      background-position: center; /* Center the image */
      background-repeat: no-repeat; /* Prevent repeating the image */
    }
  </style>
</head>
<body>
  @include('components/navbar')
  <div class="hero min-h-screen">
    <div class="hero-overlay bg-opacity-60"></div>
    <div class="hero-content text-neutral-content text-center">
      <div class="max-w-md">
        <h1 class="mb-5 text-5xl font-bold">Hello there</h1>
        <p class="mb-5">
          Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
          quasi. In deleniti eaque aut repudiandae et a id nisi.
        </p>
        <button class="btn btn-primary">Get Started</button>
      </div>
    </div>
  </div>
  @include('components/footer')
</body>
</html>

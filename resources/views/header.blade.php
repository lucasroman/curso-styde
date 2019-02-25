<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/">{{ __('messages.curse') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarCollapse" aria-controls="navbarCollapse"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('users.create') }}">
              {{ __('messages.user_new') }}<span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('users.show', ['id' => 1])}}">
              {{ __('messages.user_id') }}
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('users.index') }}">
              {{ __('messages.user_list') }}
          </a>
        </li>
      </ul>
      <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button"
            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Language
          </button>
          
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item"
                href="{{ route('language', ['locale' => 'en']) }}" id="en">
                English
              </a>
              <a class="dropdown-item"
                href="{{ route('language', ['locale' => 'es']) }}" id="es">
                Spanish
              </a>
              <a class="dropdown-item"
                href="{{ route('language', ['locale' => 'de']) }}" id="de">
                German
              </a>
          </div>
      </div>
    </div>
  </nav>
</header>

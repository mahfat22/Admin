<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#"> Admin </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{(request()->segment(1) == 'company')? "active":""}}">
                    <a class="nav-link" href="{{route('company.index')}}"> {{trans('lang.companies')}}  </a>
                </li>
                <li class="nav-item {{(request()->segment(1) == 'employee')? "active":""}}">
                    <a class="nav-link" href="{{route('employee.index')}}"> {{trans('lang.employees')}} </a>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto float-right">

                <li>
                    {{--{{app()->getLocale()}}--}}
                    <form action="{{route('changeLang')}}" id="formLang">
                        <select name="lang" id="selectChange" class="form-control">
                            <option value="en" {{(app()->getLocale() == "en")?"selected":""}}> English </option>
                            <option value="ar" {{(app()->getLocale() == "ar")?"selected":""}}> عربي </option>
                        </select>
                    </form>
                </li>
                <li class="nav-item active mg-h-20">
                    <a class="nav-link text-success btn btn-outline-success" href="{{ route('logout') }}"
                       document.getElementById('logout-form').submit();">
                    {{trans('lang.logout')}}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</header>
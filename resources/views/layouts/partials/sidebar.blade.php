<nav id="sidebar" style="z-index: 235">
    <div class="sidebar-header text-center">
        <a href="{{ route('home') }}">
            <h3>
                <img class="mr-2 d-inline-block" src="/images/logo-small.png" alt="" width="30" height="30">
                <span class="d-inline-block align-middle">Make It All</span>
            </h3>
            <strong><img class="mb-4" src="/images/logo-small.png" alt="" width="40" height="40"></strong>
        </a>
    </div>

    <ul class="list-unstyled">
        @unless(auth()->user()->isAnalyst())
        <li class="search">
            <input type="text" id="problem-search" placeholder="Search for a problem...">
        </li>
        @endunless

        @if(auth()->user()->isOperator())
            <li class="new-problem pb-0 pt-sm-1">
                <a href="#" @click="manualNewCall" class="new-problem-button-collapsed d-none" title="Create new call">
                    <i class="fas fa-phone"></i>
                </a>
                <a href="#" @click="manualNewCall" class="new-problem-button">New Call</a>
            </li>
            <li class="new-problem">
                <a href="#" class="new-problem-button-collapsed d-none" title="Create new problem" data-toggle="modal" data-target="#createProblemModal">
                    <i class="fas fa-plus"></i>
                </a>
                <a href="#" class="new-problem-button" data-toggle="modal" data-target="#createProblemModal">New Problem</a>
            </li>
        @endif


        <li :class="{ 'active': $route.name == 'home' }" class="{{ auth()->user()->isAnalyst() ? 'mt-1' : '' }}">
            <a href="#" :class="{ 'p-0': $route }">
                <router-link :to="{ name: 'home' }" tag="div"  :style="{ 'padding': $route ? '10px' : '0px' }">
                    <i class="fas fa-home"></i>
                    Dashboard
                </router-link>
            </a>
        </li>

        @unless(auth()->user()->isAnalyst())
            <li :class="{ 'active': $route.name == 'problems' }">
                <a href="#" :class="{ 'p-0': $route }">
                    <router-link :to="{ name: 'problems' }" tag="div" :style="{ 'padding': $route ? '10px' : '0px' }">
                        <i class="fas fa-briefcase"></i>
                        Problems
                    </router-link>
                </a>
            </li>
        @endunless

        @if(auth()->user()->isOperator())
            <li :class="{ 'active': $route.name == 'calls' }">
                <a href="#" :class="{ 'p-0': $route }">
                    <router-link :to="{ name: 'calls' }" tag="div" :style="{ 'padding': $route ? '10px' : '0px' }">
                        <i class="fas fa-phone"></i>
                        Calls
                    </router-link>
                </a>
            </li>
        @endif

        <li class="{{ active_route(['account.change-password']) }}">
            <a href="#accountSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-user"></i>
                Account
            </a>
            <ul class="collapse list-unstyled {{ active_route(['account.change-password'], 'show') }}" id="accountSubmenu">
                <li>
                    <a href="#">Change Password</a>
                </li>
                <li>
                    <a href="#">Settings</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
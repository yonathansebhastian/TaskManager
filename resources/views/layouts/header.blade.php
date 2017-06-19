<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="{{route('dashboard')}}" class="logo"><b>TaskManager</b></a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->

                <!-- Tasks Menu -->
                <li class="dropdown tasks-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        @if(count($datav['dueTasks'])>0)
                        <span class="label label-danger">{{count($datav['dueTasks'])}}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                      @if(count($datav['dueTasks'])==0)
                      <li class="header">You have no task due today!</li>
                      @endif
                        <li class="header">You have {{count($datav['dueTasks'])}} {{count($datav['dueTasks'])>1?'tasks':'task'}} due today!</li>
                        <li>
                            <!-- Inner menu: contains the tasks -->
                            <ul class="menu">
                              @foreach($datav['dueTasks'] as $dueTask)
                                <li><!-- Task item -->
                                    <a href="{{route('editTask', $dueTask['id'])}}">
                                        <!-- Task title and progress text -->
                                        <h3>
                                            {{$dueTask['name']}}
                                        </h3>
                                        <span class="label {{$taskColor[$dueTask['status']]}}">{!!  array_get($datav['status'],$dueTask->status) !!}</span>
                                        <span class="label {{$pColor[$dueTask['priority']]}}">{!!  array_get($datav['priority'],$dueTask->priority) !!}</span>
                                        </a>
                                </li><!-- end task item -->
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{ asset("/bower_components/AdminLTE/dist/img/default.png") }}" class="user-image" alt="User Image"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{!! auth()->user()->name !!}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ asset("/bower_components/AdminLTE/dist/img/default.png") }}" class="img-circle" alt="User Image" />
                            <p>
                                {!! auth()->user()->name !!}
                                <small>Member since {{ auth()->user()->created_at->format('M.Y') }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">

                            <div class="pull-right">
                                <a href="{{route('logout')}}" class="btn btn-warning btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
